<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Fasilitas extends Model
{
    //
    protected $table = 'fasilitas';
    public $timestamps = false;
    
    public static function add($nama, $price, $menit) {

        $item = new Fasilitas;

        $item->nama = $nama;
        $item->harga = $price;
        $item->menit = $menit;

        $item->save();
    }
    
    public static function getNama($id) {
        return DB::table('fasilitas')->where('id_fasilitas', $id)->pluck('nama');;
    }
    
    public static function getMenit($id) {
        return DB::table('fasilitas')->where('id_fasilitas', $id)->pluck('menit');;
    }
                                        
    public static function getHarga($nama, $durasi) {
        return DB::table('fasilitas')->where('nama', $nama)->where('menit', $durasi)->pluck('harga');;
    }
    
    
    public static function updateNama($id, $nama) {
        DB::table('fasilitas')->where('id_fasilitas', $id)->update(['nama' => $nama]);;
    }
                                        
    public static function updateHarga($id, $price) {
        DB::table('fasilitas')->where('id_fasilitas', $id)->update(['harga' => $price]);;
    }
                                        
    public static function updateMenit($id, $menit) {
        DB::table('fasilitas')->where('id_fasilitas', $id)->update(['menit' => $menit]);;
    }
                                        
    public static function deleteItem($id) {        
        DB::table('fasilitas')->where('id_fasilitas', $id)->delete();
    }
}