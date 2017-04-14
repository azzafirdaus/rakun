<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Periode;
use App\Terapis;

class TransaksiMassage extends Model
{
    //
    protected $table = 'transaksi_massage';
    public $timestamps = false;
    
    /**
     * Get the post that owns the comment.
     */
    public function terapis()
    {
        return $this->belongsTo('App\Terapis', 'no_kartu', 'no_kartu');
    }

    public static function start($noTerapis, $noGelang)
    {

        $transaksi = new TransaksiMassage;

        $ldate = date('Y-m-d H:i:s');
        
        $transaksi->start = $ldate;
        $transaksi->no_kartu = $noTerapis;
        $transaksi->no_gelang = $noGelang;
        $transaksi->durasi = 0;
        $transaksi->active = 1;
        
        $periode = Periode::getActive();
        
        $transaksi->id_periode = $periode;
        
        $transaksi->save();
    }
    
    public static function startTime($noTerapis, $noGelang, $duration)
    {

        $transaksi = new TransaksiMassage;

        $ldate = date('Y-m-d H:i:s');
        
        $transaksi->start = $ldate;
        $transaksi->no_kartu = $noTerapis;
        $transaksi->no_gelang = $noGelang;
        $transaksi->durasi = $duration;
        $transaksi->active = 1;
        
        $periode = Periode::getActive();
        
        $transaksi->id_periode = $periode;
        
        $transaksi->save();
    }
    
    public static function remove($noKartu)
    {
        DB::table('transaksi_massage')->where('no_gelang', $noKartu)->where('end', NULL)->delete();;
    }
        
    public static function stop($noTerapis, $ldate, $durasi, $harga, $refund)
    {
        $duration = DB::table('transaksi_massage')->where('no_kartu', $noTerapis)->where('end', NULL)->pluck('durasi');;
        $duration += $durasi;
        
        DB::table('transaksi_massage')->where('no_kartu', $noTerapis)->where('end', NULL)->update(['end' => $ldate]);;
        
        DB::table('transaksi_massage')->where('no_kartu', $noTerapis)->where('end', $ldate) 
            ->update(['durasi' => $duration]);;
        
        DB::table('transaksi_massage')->where('no_kartu', $noTerapis)->where('end', $ldate)    
            ->update(['harga' => $harga]);;

        DB::table('transaksi_massage')->where('no_kartu', $noTerapis)->where('end', $ldate)    
            ->update(['refund' => $refund]);;
    }
    
    public static function getStart($id)
    {        
        return DB::table('transaksi_massage')->where('no_kartu', $id)->where('end', NULL)->pluck('start');;
    }
    
    public static function getTerapis($id)
    {        
        return DB::table('transaksi_massage')->where('no_gelang', $id)->where('end', NULL)->pluck('no_kartu');;
    }
    
    public static function getTotalTransaksiOn($periode) {
     
        return DB::table('transaksi_massage')->where('id_periode', $periode)->sum('harga');
    }
    
    public static function getTransaksi($noGelang) {
     
        return DB::table('transaksi_massage')->where('no_gelang', $noGelang)->where('active', 1)->get();
    }
    
    public static function getByTerapis($terapis, $periode) {
        return DB::table('transaksi_massage')->where('no_kartu', $terapis)->where('id_periode', $periode)->where('active', 0)->get();
    }
    
    public static function setInactive($noGelang) {
        DB::table('transaksi_massage')->where('no_gelang', $noGelang)->update(['active' => false]);
    }
    
    public static function checkAvailable($id) {
        return DB::table('transaksi_massage')->where('no_kartu', $id)->where('end', NULL)->where('active', 1)->count();
    }
    
    public static function checkNotPaid($id) {
        return DB::table('transaksi_massage')->where('no_kartu', $id)->where('active', 1)->count();
    }

    public static function notPaid($id) {
        return DB::table('transaksi_massage')->where('no_gelang', $id)->where('active', 1)->count();
    }
    
    public static function getTotalLastPeriod() {
        return DB::table('transaksi_massage')->where('id_periode', Periode::getLastId())->count(); 
    }
    
    public static function clear() {
        DB::table('transaksi_massage')->truncate();
    }
    
    public static function notEnd($kartu) {
       return DB::table('transaksi_massage')->where('no_gelang', $kartu)->where('end', NULL)->count(); 
    }

    public static function getStartStatus($id)
    {        
        return DB::table('transaksi_massage')->where('no_kartu', $id)->where('active', 1)->pluck('start');;
    }

    public static function getDuration($id){
        $start = TransaksiMassage::getStartStatus($id);
        $now = date('Y-m-d H:i:s');

        list($date1, $time1) = preg_split('/[ ]/', $start);
        list($date2, $time2) = preg_split('/[ ]/', $now);
        
        list($hour1, $minute1, $second1) = preg_split('/[:]/', $time1);
        list($hour2, $minute2, $second2) = preg_split('/[:]/', $time2);
        
        if ($hour1 > $hour2) {
            $hour2 += 24;
        }

        $duration1 = 60 * $hour1 + $minute1;
        $duration2 = 60 * $hour2 + $minute2;
        $duration = $duration2 - $duration1;
            
        return $duration;
    }
}