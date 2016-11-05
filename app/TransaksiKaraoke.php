<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Periode;

class TransaksiKaraoke extends Model
{
    //
    protected $table = 'transaksi_karaoke';
    public $timestamps = false;
    
    public static function start($noGelang, $noRuang, $durasi, $harga)
    {

        $transaksi = new TransaksiKaraoke;
        
        $ldate = date('Y-m-d H:i:s');
        
        $periode = Periode::getActive();
        
        $transaksi->no_gelang = $noGelang;
        $transaksi->start_time = $ldate;
        $transaksi->id_periode = $periode;
        $transaksi->ruang = $noRuang;
        $transaksi->durasi = $durasi;
        $transaksi->harga = $harga;
        $transaksi->active = 1;
        
        $transaksi->save();
    }
    
    public static function stop($noGelang, $ldate, $duration, $harga)
    {
        
        DB::table('transaksi_karaoke')->where('no_gelang', $noGelang)->where('end_time', NULL)
            ->update(['end_time' => $ldate]);;
        DB::table('transaksi_karaoke')->where('no_gelang', $noGelang)->where('end_time', $ldate) 
            ->update(['durasi' => $duration]);;
        DB::table('transaksi_karaoke')->where('no_gelang', $noGelang)->where('end_time', $ldate)    
            ->update(['harga' => $harga]);;
    }
    
    public static function getRoom($noGelang)
    {        
        return DB::table('transaksi_karaoke')->where('no_gelang', $noGelang)->where('end_time', NULL)->pluck('ruang');;
    }
    
    public static function getStart($noGelang)
    {        
        return DB::table('transaksi_karaoke')->where('no_gelang', $noGelang)->where('end_time', NULL)->pluck('start_time');;
    }
    
    public static function getTransaksi($noGelang) {
     
        return DB::table('transaksi_karaoke')->where('no_gelang', $noGelang)->where('active', 1)->get();
    }
    
    public static function getTotalTransaksiOn($periode) {
     
        return DB::table('transaksi_karaoke')->where('id_periode', $periode)->sum('harga');
    }
    
    
    public static function setInactive($noGelang) {
        DB::table('transaksi_karaoke')->where('no_gelang', $noGelang)->update(['active' => false]);
    }
    
    
    
    public static function getTotalLastPeriod() {
        return DB::table('transaksi_karaoke')->where('id_periode', Periode::getLastId())->count(); 
    }
    
    
    
    public static function clear() {
        DB::table('transaksi_karaoke')->truncate();
    }
}