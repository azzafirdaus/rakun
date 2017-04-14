<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Periode;

class Absen extends Model
{
    //
    protected $table = 'absen';
    public $timestamps = false;
    
    public static function absen($id_terapis)
    {

        
        $absen = new Absen;
        
        $ldate = Periode::getActive();

        if(!Absen::alreadyWork($id_terapis, $ldate)) {
        
            $absen->periode = $ldate;

            $absen->id_therapist = $id_terapis;
        
            $absen->save();
        }
    }
    
    public static function getAbsen($id) {
        return DB::table('absen')->where('periode', $id)->get();;
    }
    
    public static function alreadyWork($id, $periode) {
        $count = DB::table('absen')->where('periode', $periode)->where('id_therapist', $id)->count();
        if ($count > 0) {
            return true;
        }
        return false;
    }
}