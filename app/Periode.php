<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Periode extends Model
{
    //
    protected $table = 'periode';
    public $timestamps = false;
    
    public static function start()
    {

        $periode = new Periode;

        $ldate = date('Y-m-d H:i:s');
        
        $periode->start = $ldate;

        $periode->active = true;
        
        $periode->pengunjung = 0;
        
        $periode->save();
    }
    
    public static function stop()
    {

        $ldate = date('Y-m-d H:i:s');
        
        DB::table('periode')->where('active', true)->update(['end' => $ldate]);;
        DB::table('periode')->where('active', true)->update(['active' => false]);;
        
    }
    
    public static function getPengunjung() {
        return DB::table('periode')->orderBy('id_periode', 'desc')->pluck('pengunjung');;
    }
    
        public static function getLastDate() {
        return DB::table('periode')->orderBy('id_periode', 'desc')->pluck('start');;
    }
    
    public static function getLastId() {
        return DB::table('periode')->orderBy('id_periode', 'desc')->pluck('id_periode');;
    }
    
    public static function plus()
    {

        $pengunjung = DB::table('periode')->where('active', true)->pluck('pengunjung');;
        $pengunjung++;
        DB::table('periode')->where('active', true)->update(['pengunjung' => $pengunjung]);;
        
    }
    
    
    public static function getActive() {
        $active = DB::table('periode')
                     ->where('active', '=', true)->pluck('id_periode');
        
        return $active;
    }
    
    public static function activeExist() {
        $active = DB::table('periode')
                     ->where('active', '=', true)->count();
        
        if ($active > 0) {
            return true;
        } else {
            return false;
        }
    }
}