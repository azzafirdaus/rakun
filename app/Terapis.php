<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Terapis extends Model 
{
    protected $table = 'therapist';
    public $timestamps = false;
    
    public static function countExist($noKartu)
    {
        $exist = DB::table('therapist')->where('no_kartu', $noKartu)->count();;
        return $exist;
            
    }
    
    public static function getNoKartu($noKartu) {
        $no_kartu = DB::table('therapist')
                     ->where('no_kartu', $noKartu)->pluck('no_kartu');
        
        return $no_kartu;   
    }
    
    public static function add($noKartu, $nama) {

        $terapis = new Terapis;

        $terapis->no_kartu = $noKartu;
        $terapis->nama = $nama;

        $terapis->save();
    }

    public static function getNama($noKartu) {
        $nama = DB::table('therapist')
                     ->where('no_kartu', $noKartu)->pluck('nama');
        
        return $nama;   
    }
}