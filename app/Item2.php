<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Item2 extends Model
{
    //
    protected $table = 'item_2';
    public $timestamps = false;
    
    public static function add($nama, $price, $id, $jenis) {

        $item = new Item2;

        $item->id_item = $id;
        $item->nama = $nama;
        $item->price = $price;
        $item->jenis = $jenis;

        $item->save();
    }
    
    public static function getId($id) {
        return DB::table('item_2')->where('nama', $id)->pluck('id_item');;
    }
    
    public static function getNama($id) {
        return DB::table('item_2')->where('id_item', $id)->pluck('nama');;
    }
                                        
    public static function getPrice($id) {
        return DB::table('item_2')->where('id_item', $id)->pluck('price');;
    }
    
    public static function getJenis($id) {
        return DB::table('item_2')->where('id_item', $id)->pluck('jenis');;
    }

    public static function getPriceWithName($name) {
        return DB::table('item_2')->where('nama', $name)->pluck('price');;
    }
    
    public static function getStock($name) {
        return DB::table('item_2')->where('nama', $name)->pluck('stock');;
    }
    
    public static function getStockById($id) {
        return DB::table('item_2')->where('id_item', $id)->pluck('stock');;
    }

    public static function updateNama($id, $nama) {
        DB::table('item_2')->where('id_item', $id)->update(['nama' => $nama]);;
    }
                                        
    public static function updatePrice($id, $price) {
        DB::table('item_2')->where('id_item', $id)->update(['price' => $price]);;
    }
             
    public static function updateJenis($id, $jenis) {
        DB::table('item_2')->where('id_item', $id)->update(['jenis' => $jenis]);;
    }

    public static function deleteItem($id) {        
        DB::table('item_2')->where('id_item', $id)->delete();
    }
    
        public static function deleteItemWithNama($id) {        
        DB::table('item_2')->where('nama', $id)->delete();
    }
    
    public static function exist($nama) {
        return DB::table('item_2')->where('nama', $nama)->get();;
    }
    
    public static function exists($id) {
        return DB::table('item_2')->where('id_item', $id)->count();;
    }
    
    public static function updateStock($nama, $jumlah) {
        return DB::table('item_2')->where('nama', $nama)->update([ 'stock' => $jumlah ]);;
    }
    
    public static function addStock($nama, $jumlah) {
        $stock = DB::table('item_2')->where('nama', $nama)->pluck('stock');
        return DB::table('item_2')->where('nama', $nama)->update([ 'stock' => $jumlah + $stock ]);;
    }
    
    public static function minStock($nama, $jumlah) {
        $stock = Item2::getStock($nama);
        DB::table('item_2')->where('nama', $nama)->update(['stock' => $stock - $jumlah]);
    } 

    public static function kurangStock($id, $jumlah) {
        $stock = Item2::getStockById($id);
        DB::table('item_2')->where('id_item', $id)->update(['stock' => $stock - $jumlah]);
    }
}