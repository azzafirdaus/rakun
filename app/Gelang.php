<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Gelang extends Model
{
    //
    protected $table = 'gelang';
    public $timestamps = false;
    
    public static function checkAvailable($noGelang)
    {
        $availability = DB::table('gelang')
                     ->where('id_gelang', '=', $noGelang)->count();
        
        return $availability;
    }
    
    public static function getSaldo($id) {
        return DB::table('gelang')->where('id_gelang', $id)->pluck('saldo');
    }  
    
    public static function addSaldo($id, $jumlah) {
        $saldo = Gelang::getSaldo($id);
        DB::table('gelang')->where('id_gelang', $id)->update(['saldo' => $saldo + $jumlah]);
    }  
    
    public static function minSaldo($id, $jumlah) {
        $saldo = Gelang::getSaldo($id);
        DB::table('gelang')->where('id_gelang', $id)->update(['saldo' => $saldo - $jumlah]);
    }

    public static function resetSaldo($id) {
        $saldo = Gelang::getSaldo($id);
        DB::table('gelang')->where('id_gelang', $id)->update(['saldo' => 0]);
        
        return $saldo;
    }
}