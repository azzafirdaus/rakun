<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator, Input;
use App\TransaksiMassage;
use App\Terapis;
use App\Gelang;
use App\Absen;
use App\Periode;
use App\Fasilitas;
use Auth;
use App\GelangCustomer;
use App\HistoriPelanggan;

class TerapisController extends Controller{
    //
    public function terapisMenu(){

    	return view('terapisMenu')->with('nama', '')->with('success', '')->with('saldo', '');;
    }
    
    public function terapisConfirmMenu(){

    	return view('konfirmasiTerapis');
    }

    public function changeTerapis(){

    	return view('changeTerapis');
    }

    public function changedTerapis(){
        
        $rules = array(
            'noTerapis' => 'required',
            'noKartu' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);


        if($validator->fails()){

            return redirect('changeTerapis')->withErrors($validator);
        }

        $user = array(
			'username' => 'supervisor',
			'password' => Input::get('password') 
		);    
        
        if(Auth::attempt($user)){
            
        $noTerapis = Input::get('noTerapis');
        $noKartu = Input::get('noKartu');
        $password = Input::get('password');    
            
        if(TransaksiMassage::getTerapis($noKartu) != NULL) {
            
                    if(TransaksiMassage::checkNotPaid($noTerapis) > 0) {
                        return view('terapisMenu')->with('nama', '')->withErrors("Transaksi massage sebelumnya belum dibayar")->with('success', '')->with('saldo', '');;
        
                    }
        $result = Terapis::countExist($noTerapis);
        
        if($result > 0) { 
            $terapis = TransaksiMassage::getTerapis($noKartu);
            $start = TransaksiMassage::getStart($terapis);
            $end = date('Y-m-d H:i:s');
        
            list($date1, $time1) = preg_split('/[ ]/', $start);
            list($date2, $time2) = preg_split('/[ ]/', $end);
        
            list($hour1, $minute1, $second1) = preg_split('/[:]/', $time1);
            list($hour2, $minute2, $second2) = preg_split('/[:]/', $time2);
        
            if ($hour1 > $hour2) {
                $hour2 += 24;
            }
            $duration1 = 60 * $hour1 + $minute1;
            $duration2 = 60 * $hour2 + $minute2;
            $duration = $duration2 - $duration1;
                
            TransaksiMassage::remove($noKartu);
            TransaksiMassage::startTime($noTerapis, $noKartu, $duration);
            return view('terapisMenu')->with('nama', '')->with('success', 'Terapis berhasil diganti')->with('saldo', '');
        } else {
            return view('terapisMenu')->with('nama', '')->withErrors("Nomor terapis tidak terdaftar")->with('success', '')->with('saldo', '');;
        }   
        } else {
            return view('terapisMenu')->with('nama', '')->withErrors("Customer belum melakukan transaksi massage")->with('success', '')->with('saldo', '');;
            
        }
        
		} else {
            return view('terapisMenu')->with('nama', '')->withErrors("Password supervisor salah")->with('success', '')->with('saldo', '');;
        }
        
    }
    
    public function stopTerapis(){
        $idTerapis = Input::get('password');
        $result = TransaksiMassage::checkAvailable($idTerapis);
        
        if($result == 0) {
            return redirect('terapisMenu')->with('nama', '')->withErrors("Password terapis salah")->with('saldo', '');
        } else {
            $result = Terapis::countExist($idTerapis);
            if($result > 0) { 
                
                $start = TransaksiMassage::getStart($idTerapis);
                $end = date('Y-m-d H:i:s');
        
        list($date1, $time1) = preg_split('/[ ]/', $start);
        list($date2, $time2) = preg_split('/[ ]/', $end);
        
        list($hour1, $minute1, $second1) = preg_split('/[:]/', $time1);
        list($hour2, $minute2, $second2) = preg_split('/[:]/', $time2);
        
        if ($hour1 > $hour2) {
            $hour2 += 24;
        }
            $duration1 = 60 * $hour1 + $minute1;
            $duration2 = 60 * $hour2 + $minute2;
            $duration = $duration2 - $duration1;
                
            $harga = 0;
            $refund = 0;

        if ($duration < 60) {
            $harga = Fasilitas::getHarga('Massage', '< 60');
            $refund = 75000;
        } else if ($duration == 60) {
            $harga = Fasilitas::getHarga('Massage', '60');  
            $refund = 100000;  
        } else {
            $jam = floor($duration / 60);
            $harga = $jam * Fasilitas::getHarga('Massage', '60'); 
            $refund = $jam * 100000;
            $temp = $duration - ($jam * 60);
            if ($temp >= 15 && $temp < 50) {
                $harga += Fasilitas::getHarga('Massage', '+ 15');
                $refund += 50000;
            } else if ($temp >= 50){
                $harga += Fasilitas::getHarga('Massage', '60');
                $refund += 100000;
            }
        }
                
                
                TransaksiMassage::stop($idTerapis, $end, $duration, $harga, $refund);
                return view('terapisMenu')->with('nama', '')->with('success', 'Billing transaksi massage berhasil dihentikan')->with('saldo', '');
            } else {
                return redirect('terapisMenu')->with('nama', '')->withErrors("Nomor terapis tidak terdaftar")->with('success', '')->with('saldo', '');;
            }   
        }
    }

    public function konfirmasiTerapis(){
        
        if(Periode::activeExist() == 1) {
            $noGelang = Input::get('noGelang');
            $result = Gelang::checkAvailable($noGelang);
            
            if($result == 0) {
                return view('terapisMenu')->with('nama', '')->withErrors("Nomor kartu belum dipakai")->with('success', '')->with('saldo', '');;
            } else {
                $noKartu = Input::get('noKartu');
                $result = Terapis::countExist($noKartu);
                echo $noGelang;
                
                if(TransaksiMassage::getTerapis($noGelang) != NULL) {
                    return redirect('terapisMenu')->with('nama', '')->withErrors("Transaksi massage sedang berjalan")->with('success', '')->with('saldo', '');;        
                }
            
                if($result > 0) { 
                    
                    //cek terapis transaksi sebelumnya sudah dibayar atau belum
                    if(TransaksiMassage::checkNotPaid($noKartu) > 0)
                        return redirect('terapisMenu')->with('nama', '')->withErrors("Transaksi massage sebelumnya belum dibayar")->with('success', '')->with('saldo', '');;
                        
                    $data = array('noKartu' => $noKartu, 'noGelang' => $noGelang);
                    return view('konfirmasiTerapis')->with($data);
                } else {
                    return redirect('terapisMenu')->with('nama', '')->withErrors("Nomor terapis tidak terdaftar")->with('success', '')->with('saldo', '');;
                }   
            }
        } else {
            return view('terapisMenu')->with('nama', '')->withErrors('Transaksi belum dibuka')->with('success', '')->with('saldo', '');;
        } 
        
        
    }
    
    public function cekTerapis(){
        
       if(Periode::activeExist() == 1) {
            $noGelang = Input::get('noGelang');
        $result = Gelang::checkAvailable($noGelang);
        if($result == 0) {
                return view('terapisMenu')->with('nama', '')->withErrors("Nomor kartu pelanggan belum dipakai")->with('success', '')->with('saldo', '');;
            } else {
                return view('terapisMenu')->with('nama', $noGelang)->with('success', '')->with('saldo', Gelang::getSaldo($noGelang));;
            }
        } else {
            return view('terapisMenu')->with('nama', '')->withErrors('Transaksi belum dibuka')->with('success', '')->with('saldo', '');;
        }          
    }
    
    public function stopTerapisMenu() {
            return view('konfirmasiTerapisStop');
    }

    public function konfirmasiTerapisFinish(){
        
       $rules = array(
            'password' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        
        $noKartu = Input::get('noKartu');
        $noGelang = Input::get('noGelang');
        
        $data = array('noKartu' => $noKartu, 'noGelang' => $noGelang);
        
        if($validator->fails()){
            return view('konfirmasiTerapis')->withErrors($validator)->with($data);
        }
        
        $password = Input::get('password');
        $no_kartu = Terapis::getNoKartu($noKartu);
                
//        list($year, $month, $day) = preg_split('/[-]/', $tglLahir);
//        $tglLahir = $day.$month.$year;
        
        if($noKartu == $no_kartu) {
            TransaksiMassage::start($noKartu, $noGelang);
            Absen::absen($noKartu);

            return view('terapisMenu')->with('nama', '')->with('success', 'Billing transaksi massage berhasil dimulai')->with('saldo', '');;
        } else {
            return view('konfirmasiTerapis')->withErrors('Password Salah')->with($data);
        }
    }

    public function free_terapis(){
        $free = array();
        $notFree = array();
        $transaksiMassage = TransaksiMassage::all()->where('id_periode', Periode::getLastId());
        $terapis = Terapis::all();
        foreach($terapis as $kangPijet) {
            if (TransaksiMassage::checkNotPaid($kangPijet->no_kartu) > 0) {
                array_push($notFree, $kangPijet->no_kartu);
            } else {
                array_push($free, $kangPijet->no_kartu);
            }
        }
        return view('free-terapis')->with('free', $free)->with('notFree', $notFree);
    }
    
    public function cari(){

        return view('cariTerapis');
    }

    public function hasil_cari(){
        
        $rules = array(
            'noKartu' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);


        if($validator->fails()){

            return redirect('cariTerapis')->withErrors($validator);
        }
        
        return view('hasilCariTerapis')->with('saldo', Gelang::getSaldo(Input::get('noKartu')));
    }

    public function terapisBayar(){

        return view('terapisBayar');
    }

    public function terapisBayarProcess(){
        
        $rules = array(
            'noKartu' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);


        if($validator->fails()){

            return redirect('terapisBayar')->withErrors($validator);
        }
        
        $kartu = Input::get('noKartu');
        if(Gelang::checkAvailable($kartu) == 0) {
            
            return redirect('terapisBayar')->withErrors("Nomor kartu belum dipakai");
        }
        
        if(TransaksiMassage::notPaid($kartu) == 0) {
            
            return redirect('terapisBayar')->withErrors("Tidak ada tagihan massage");
        }
        
        $transaksi = TransaksiMassage::getTransaksi($kartu);
        
            $total = 0;
            $durasi = 0;
            $refund = 0;
            $harga = 0;
            $data = array();
            foreach($transaksi as $terapi) {
                $durasi += $terapi->durasi;
                $harga += $terapi->harga;
                $refund += $terapi->refund;
                $total = $refund + $harga;
            }
        
        if ($total > Gelang::getSaldo($kartu)) {
            
            return redirect('terapisBayar')->withErrors("Saldo tidak mencukupi, Jumlah tagihan : ".$total.", Saldo harus ditop up : ".($total-Gelang::getSaldo($kartu)));
        }
        
        if (TransaksiMassage::notEnd($kartu) > 0) {
            
            return redirect('terapisBayar')->withErrors("Transaksi massage belum dihentikan");
        }
        
        $saldoAwal = Gelang::getSaldo($kartu);
        
        TransaksiMassage::setInactive($kartu);
	    Gelang::minSaldo($kartu, $total);
        
        $ldate = date('d-m-Y');
        
        return view('terapisInvoice')
        ->with('noKartu', Input::get('noKartu'))
        ->with('total', $total)
        ->with('saldoAwal', $saldoAwal)
        ->with('sisaSaldo', Gelang::getSaldo($kartu))
        ->with('refund', $refund)
        ->with('harga', $harga)
        ->with('durasi', $durasi)
        ->with('date', $ldate);
    }

    public function terapisPrint(){
        return view('terapisMenu')->with('nama', '')->with('success', 'Transaksi massage berhasil')->with('saldo', '');
    }

    public function menuTerapis(){

        return view('terapis.terapis-menu')->with('nama', '')->with('success', '')->with('saldo', '');;
    }

    public function konfirmasiNaik(){
        
        if (Periode::activeExist() == 1) {
            return view('terapis.naik-pelanggan')->with('nama', '')->with('success', '')->with('saldo', '');;
        
        } else {
            return view('terapis.terapis-menu')->with('nama', '')->withErrors('Transaksi belum dibuka')->with('success', '')->with('saldo', '');;
        }   
    }

    public function konfirmasiPelanggan(){
        
        if(Periode::activeExist() == 1) {
            
            $rules = array(
            'noGelang' => 'required'
            );

            $validator = Validator::make(Input::all(), $rules);

            if($validator->fails()){
                return view('terapis.naik-pelanggan')->withErrors($validator)->with('nama', '')->with('success', '')->with('saldo', '');;
            }else{
                $noGelang = Input::get('noGelang');
                $result = Gelang::checkAvailable($noGelang);
                
                if($result == 0) {
                    return view('terapis.naik-pelanggan')->with('nama', '')->withErrors("Nomor kartu pelanggan belum dipakai")->with('success', '')->with('saldo', '');;
                } 
                else {
                    if(TransaksiMassage::notPaid($noGelang) > 0) {
                        return view('terapis.naik-pelanggan')->with('nama', '')->withErrors("Transaksi massage sebelumnya belum dibayar")->with('success', '')->with('saldo', '');;
                    } else{
                        return view('terapis.naik-terapis')->with('nama', $noGelang)->with('success', '')->with('saldo', Gelang::getSaldo($noGelang));;          
                    }
                }
            } 
        } else {
            return view('terapis.naik-pelanggan')->with('nama', '')->withErrors('Transaksi belum dibuka')->with('success', '')->with('saldo', '');;
        } 
    }

    public function terapisNaik()
    {
        return view('terapis.naik-pelanggan')->with('nama', '')->with('success', '')->with('saldo', '');;
    }

    public function autoKonfirmasiTerapis(){
        
        $noGelang = Input::get('noGelang');

        if(Periode::activeExist() == 1) {

            $rules = array(
            'noKartu' => 'required'
            );

            $validator = Validator::make(Input::all(), $rules);

            if($validator->fails()){
                return view('terapis.naik-terapis')->withErrors($validator)->with('nama', $noGelang)->with('success', '')->with('saldo', '');;
            }
            else{
                $noKartu = Input::get('noKartu');
                $result = Terapis::countExist($noKartu);
                
                if(TransaksiMassage::getTerapis($noGelang) != NULL) {
                    return view('terapis.naik-terapis')->with('nama', $noGelang)->withErrors("Transaksi massage sedang berjalan")->with('success', '')->with('saldo', '');;        
                }
            
                if($result > 0) { 
                    
                    //cek terapis transaksi sebelumnya sudah dibayar atau belum
                    if(TransaksiMassage::checkNotPaid($noKartu) > 0)
                        return view('terapis.naik-terapis')->with('nama', $noGelang)->withErrors("Transaksi massage sebelumnya belum dibayar")->with('success', '')->with('saldo', '');;
                        
                    $data = array('noKartu' => $noKartu, 'noGelang' => $noGelang);
                    
                    $no_kartu = Terapis::getNoKartu($noKartu);
                                 
                    if($noKartu == $no_kartu) {
                        TransaksiMassage::start($noKartu, $noGelang);
                        Absen::absen($noKartu);
                        $start_time = date('H:i:s');
                        return view('terapis.terapis-hasil')->with('nama', '')->with('success', 'BERHASIL')->with('saldo', '')->with('start', $start_time);;
                    }
                    // return view('konfirmasiTerapis')->with($data);     
                } else {
                    return view('terapis.naik-terapis')->with('nama', $noGelang)->withErrors("Nomor terapis tidak terdaftar")->with('success', '')->with('saldo', '');;
                }    
            }
               
        } else {
            return view('terapis.naik-terapis')->with('nama', $noGelang)->withErrors('Transaksi belum dibuka')->with('success', '')->with('saldo', '');;
        }  
    }

    public function konfirmasiSelesai(){
        
        $noKartu = Input::get('noKartu');
        $noGelang = Input::get('noGelang');
        
        $data = array('noKartu' => $noKartu, 'noGelang' => $noGelang);
        
        $no_kartu = Terapis::getNoKartu($noKartu);
                     
        if($noKartu == $no_kartu) {
            TransaksiMassage::start($noKartu, $noGelang);
            Absen::absen($noKartu);
            return view('terapis-hasil')->with('nama', '')->with('success', 'Berhasil')->with('saldo', '');;
        }
    }

    public function menuTerapisStop() {
        if(Periode::activeExist() == 1) {
            return view('terapis.stop-terapis')->with('nama', '')->with('success', '')->with('saldo', '');;
        } else{
            return view('terapis.terapis-menu')->with('nama', '')->withErrors('Transaksi belum dibuka')->with('success', '')->with('saldo', '');;
        }
    }

    public function terapisStop(){
        $rules = array(
            'password' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()){
            return view('terapis.stop-terapis')->withErrors($validator)->with('nama', '')->with('success', '')->with('saldo', '');;
        }

        $idTerapis = Input::get('password');
        $result = TransaksiMassage::checkAvailable($idTerapis);
        
        if($result == 0) {
            return view('terapis.stop-terapis')->with('nama', '')->withErrors("Password terapis salah")->with('saldo', '')->with('success', '');
        } else {
            $result = Terapis::countExist($idTerapis);
            if($result > 0) { 
                
                $start = TransaksiMassage::getStart($idTerapis);
                $end = date('Y-m-d H:i:s');
        
                list($date1, $time1) = preg_split('/[ ]/', $start);
                list($date2, $time2) = preg_split('/[ ]/', $end);
                
                list($hour1, $minute1, $second1) = preg_split('/[:]/', $time1);
                list($hour2, $minute2, $second2) = preg_split('/[:]/', $time2);
                
                if ($hour1 > $hour2) {
                    $hour2 += 24;
                }
    
                $duration1 = 60 * $hour1 + $minute1;
                $duration2 = 60 * $hour2 + $minute2;
                $duration = $duration2 - $duration1;
       
                $harga = 0;
                $refund = 0;
    
                if ($duration < 60) {
                    $harga = Fasilitas::getHarga('Massage', '< 60');
                    $refund = 75000;
                } else if ($duration == 60) {
                    $harga = Fasilitas::getHarga('Massage', '60');  
                    $refund = 100000;  
                } else {
                    $jam = floor($duration / 60);
                    $harga = $jam * Fasilitas::getHarga('Massage', '60'); 
                    $refund = $jam * 100000;
                    $temp = $duration - ($jam * 60);
                    if ($temp >= 15 && $temp < 50) {
                        $harga += Fasilitas::getHarga('Massage', '+ 15');
                        $refund += 50000;
                    } else if ($temp >= 50){
                        $harga += Fasilitas::getHarga('Massage', '60');
                        $refund += 100000;
                    }
                }
                
                $data = array('start'=>$time1, 'end'=>$time2);

                TransaksiMassage::stop($idTerapis, $end, $duration, $harga, $refund);
                return view('terapis.bayar-terapis')->with('nama', '')->with('success', '')->with('saldo', '')->with($data);;

            } else {
                return view('terapis.stop-terapis')->with('nama', '')->withErrors("Nomor terapis tidak terdaftar")->with('success', '')->with('saldo', '');;
            }   
        }
    }

    public function konfirmasiStopPelanggan(){
        return view('terapis.bayar-terapis')->with('nama', '')->with('success', '')->with('saldo', '');;
    }

    public function bayarTerapis(){
        
        $rules = array(
            'noKartu' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);


        if($validator->fails()){

            return view('terapis.bayar-terapis')->withErrors($validator)->with('success', '');
        }
        
        $kartu = Input::get('noKartu');
        if(Gelang::checkAvailable($kartu) == 0) {
            
            return view('terapis.bayar-terapis')->withErrors("Nomor kartu belum dipakai")->with('success', '');
        }
        
        if(TransaksiMassage::notPaid($kartu) == 0) {
            
            return view('terapis.bayar-terapis')->withErrors("Tidak ada tagihan massage")->with('success', '');
        }
        
        $transaksi = TransaksiMassage::getTransaksi($kartu);
        
            $total = 0;
            $durasi = 0;
            $refund = 0;
            $harga = 0;
            $data = array();
            foreach($transaksi as $terapi) {
                $durasi += $terapi->durasi;
                $harga += $terapi->harga;
                $refund += $terapi->refund;
                $total = $harga + $refund;           
            }
        
        if ($total > Gelang::getSaldo($kartu)) {
            
            return view('terapis.bayar-terapis')->withErrors("Saldo tidak mencukupi, Jumlah tagihan : Rp. ".number_format($total).", Saldo yang harus ditop up : Rp. ".number_format($total-Gelang::getSaldo($kartu)))->with('success', 'gagal');
        }
        
        if (TransaksiMassage::notEnd($kartu) > 0) {
            
            return view('terapis.bayar-terapis')->withErrors("Transaksi massage belum dihentikan")->with('success', '');
        }
        
        $saldoAwal = Gelang::getSaldo($kartu);
        
        TransaksiMassage::setInactive($kartu);
        Gelang::minSaldo($kartu, $total);
        
        $ldate = date('d-m-Y');
        
        return view('terapis.pembayaran-sukses')
        ->with('noKartu', Input::get('noKartu'))
        ->with('saldoAwal', $saldoAwal)
        ->with('total', $total)
        ->with('harga', $harga)
        ->with('sisaSaldo', Gelang::getSaldo($kartu))
        ->with('refund', $refund)
        ->with('durasi', $durasi)
        ->with('date', $ldate);
    }

    public function menuPelanggan(){

        return view('terapis.pelanggan-menu')->with('nama', '')->with('success', '')->with('saldo', '');;
    }

    public function saldoCek(){
        if(Periode::activeExist() == 1) {
            return view('terapis.cek-saldo')->with('nama', '')->with('success', '')->with('saldo', '');;
        } else {
            return view('terapis.pelanggan-menu')->with('nama', '')->withErrors('Transaksi belum dibuka')->with('success', '')->with('saldo', '');;
        }      
    }

    public function historiCek(){
        if(Periode::activeExist() == 1) {
            return view('terapis.cek-histori')->with('nama', '')->with('success', '')->with('saldo', '');;
        } else {
            return view('terapis.pelanggan-menu')->with('nama', '')->withErrors('Transaksi belum dibuka')->with('success', '')->with('saldo', '');;
        }      
    }

    public function saldoPelanggan(){
        
        if(Periode::activeExist() == 1) {

            $rules = array(
                'noGelang' => 'required'
            );

            $validator = Validator::make(Input::all(), $rules);

            if($validator->fails()){

                return view('terapis.cek-saldo')->withErrors($validator)->with('success', '')->with('nama', '')->with('saldo', '');
            }

            $noGelang = Input::get('noGelang');
            $result = Gelang::checkAvailable($noGelang);
            
            if($result == 0) {
                return view('terapis.cek-saldo')->with('nama', '')->withErrors("Nomor kartu pelanggan belum dipakai")->with('success', '')->with('saldo', '');;
            } else {
                return view('terapis.saldo-pelanggan')->with('nama', $noGelang)->with('success', 'SALDO ANDA')->with('saldo', Gelang::getSaldo($noGelang));;
            }
        } else {
            return view('terapis.cek-saldo')->with('nama', '')->withErrors('Transaksi belum dibuka')->with('success', '')->with('saldo', '');;
        }          
    }

    public function historiPelanggan(){
        if(Periode::activeExist() == 1) {
            $rules = array(
                'noGelang' => 'required'
            );

            $validator = Validator::make(Input::all(), $rules);

            if($validator->fails()){
                return view('terapis.cek-histori')->withErrors($validator)->with('success', '')->with('nama', '')->with('saldo', '');
            }

            $noGelang = Input::get('noGelang');
            $result = Gelang::checkAvailable($noGelang);
            $id_periode = Periode::getActive();

            if($result == 0) {
                return view('terapis.cek-histori')->with('nama', '')->withErrors("Nomor kartu pelanggan belum dipakai")->with('success', '')->with('saldo', '');;
            } else {
                $gelang = HistoriPelanggan::where('gelang', $noGelang)
                            ->where('id_periode', $id_periode)
                            ->orderBy('tanggal', 'desc')
                            ->get();

                return view('terapis.histori-pelanggan')->with('nama', $noGelang)->with('success', 'Histori Kartu Anda')->with('saldo', Gelang::getSaldo($noGelang))->with('data', $gelang);;
            }
        } else {
            return view('terapis.cek-histori')->with('nama', '')->withErrors('Transaksi belum dibuka')->with('success', '')->with('saldo', '');;
        }
    }

    public function statusTerapis(){
        $transaksi = TransaksiMassage::all()->where('active', 1);
        
        return view('terapis.status-terapis')->with('transaksi', $transaksi);
    }

    public function statusTerapis1(){
        $transaksi = TransaksiMassage::all()->where('active', 1);
        
        return view('terapis.status-terapis-1')->with('transaksi', $transaksi);
    }
}