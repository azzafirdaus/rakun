<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Customer extends Model
{
    //
    protected $table = 'customer';
    public $timestamps = false;
    
    public static function getId($nama, $tglLahir)
    {
        return DB::table('customer')->where('nama', $nama)->where('birthdate', $tglLahir)->pluck('id_customer');;
    }
    
    public static function getKartu($nama, $tglLahir)
    {
        $id = DB::table('customer')->where('nama', $nama)->where('birthdate', $tglLahir)->pluck('id_customer');;
        return DB::table('gelang_customer')->where('id_customer', $id)->pluck('id_gelang');
    }
    
    public static function getSaldoNya($id)
    {
        return DB::table('customer')->where('id_customer', $id)->pluck('saldo');;
        
    }
    
    public static function getSaldo($nama, $tglLahir)
    {
        return DB::table('customer')->where('nama', $nama)->where('birthdate', $tglLahir)->pluck('saldo');;
        
    }
    
    public static function plusSaldo($nama, $tglLahir, $saldoTambah)
    {
        $saldo = DB::table('customer')->where('nama', $nama)->where('birthdate', $tglLahir)->pluck('saldo');;
        DB::table('customer')->where('nama', $nama)->where('birthdate', $tglLahir)->update(['saldo' => $saldo+$saldoTambah]);
    }
    
    public static function minSaldo($nama, $tglLahir, $saldoKurang)
    {
        $saldo = DB::table('customer')->where('nama', $nama)->where('birthdate', $tglLahir)->pluck('saldo');;
        DB::table('customer')->where('nama', $nama)->where('birthdate', $tglLahir)->update(['saldo' => $saldo-$saldoKurang]);
    }
}