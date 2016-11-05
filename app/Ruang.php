<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Ruang extends Model
{
    //
    protected $table = 'ruang';
    public $timestamps = false;
    
    public static function setRoomUnavailable($room) {
        DB::table('ruang')->where('id', $room)->update(['available' => 0]);;    
    }
    
    public static function setAvailable($room) {
        DB::table('ruang')->where('id', $room)->update(['available' => 1]);;    
    }
}