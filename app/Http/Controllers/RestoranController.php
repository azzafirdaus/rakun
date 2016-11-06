<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TransaksiKaraoke;
use App\Gelang;
use App\Room;
use App\Fasilitas;
use App\Periode;
use App\Item;
use Validator, Input, Redirect, Hash, Auth; 

class RestoranController extends Controller{
    
    public function restoran(){
        if(Periode::activeExist() == 1){
            $noGelang = Input::get('noGelang');
            
            if(Gelang::checkAvailable($noGelang) != 0) {
                return view('restoran.menu')
                    ->with('noGelang', $noGelang);
            }   
            return redirect('restoran')->withErrors("Nomor kartu pelanggan belum dipakai");
        }
        return redirect('restoran')->withErrors('Transaksi belum dibuka');    
    }

    public function makanan(){
        if(Periode::activeExist() == 1){
            $noGelang = Input::get('noGelang');

            return view('restoran.makanan-list')
                    ->with('noGelang', $noGelang)
                    ->with('makananList', Item::where('jenis', 'Makanan')->get());
        }
        return redirect('restoran')->withErrors('Transaksi belum dibuka');
    }

    public function minuman(){
        if(Periode::activeExist() == 1){
            $noGelang = Input::get('noGelang');

        }
        return redirect('restoran')->withErrors('Transaksi belum dibuka');
    }

    public function rokok(){
        if(Periode::activeExist() == 1){
            $noGelang = Input::get('noGelang');

        }
        return redirect('restoran')->withErrors('Transaksi belum dibuka');
    }

    


    public function karaokeMenu(){

    	if(Auth::check()){

        if(Periode::activeExist() == 1) {
		  	return view('karaokeMenu')->with('roomList', Room::all())->with('success', '');     
        } else {
            return redirect('cashierMenu')->withErrors('Transaksi belum dibuka');
        }
            
    	}

    	return redirect('/auth/cashierLogin')->with('loginError', 'Please login first!');
    }

    public function karaokeStart() {
        $rules = array(
			'noGelang' => 'required',	
            'durasi' => 'required',		
			'room' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){

			return redirect('karaokeMenu')->withErrors($validator)->with('success', '');
		}
                
		$no_gelang = Input::get('noGelang'); 
        $duration = Input::get('durasi');
        $room = Input::get('room');
		
                
        $harga = Fasilitas::getHarga('Karaoke', '60');
        if ($duration > 60) {
            $harga = $harga + (ceil(($duration - 60)/10) * ($harga / 6));
        }
        
        if(Gelang::getSaldo($no_gelang) < $harga) {
            return redirect('karaokeMenu')->withErrors('Saldo tidak mencukupi')->with('success', '');
        }
        
        TransaksiKaraoke::start(Input::get('noGelang'), Input::get('room'), $duration, $harga);
        Gelang::minSaldo($no_gelang, $harga);
        return view('karaokeMenu-show')->with('roomList', Room::all())->with('success', '')
            ->with('noKartu', $no_gelang)
            ->with('ruang', $room)
            ->with('durasi', $duration)
            ->with('total', $harga)
            ->with('sisa', Gelang::getSaldo($no_gelang));    
    }
    
    public function karaokePrint(){
        return view('karaokeMenu')->with('success', 'Transaksi karaoke berhasil')->with('roomList', Room::all());
    }
    
    public function karaokeStop(){

    	if(Auth::check()){

    		return view('karaokeStop');
    	}

    	return redirect('/auth/cashierLogin')->with('loginError', 'Please login first!');
    }
    
    public function karaokeEnd(){
        $rules = array(
			'noGelang' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);


		if($validator->fails()){

			return redirect('karaokeStop')->withErrors($validator);
		}
        
        $id_room = TransaksiKaraoke::getRoom(Input::get('noGelang'));
        $start = TransaksiKaraoke::getStart(Input::get('noGelang'));
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
                
            $harga = Fasilitas::getHarga('Karaoke', '60');
        if ($duration > 60) {
            $harga = $harga + (ceil(($duration - 60)/10) * ($harga / 6));
        }
        
        TransaksiKaraoke::stop(Input::get('noGelang'), $end, $duration, $harga);
        Room::setAvailable($id_room);
        return view('karaokeMenu')->with('roomList', Room::all())->with('success', 'Billing karaoke customer ' . Input::get('noGelang') . ' dihentikan');
        
    }
}
