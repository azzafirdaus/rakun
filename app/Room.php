<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Room extends Model
{
    //
    protected $table = 'room';
    public $timestamps = false;
    
    public static function setRoomUnavailable($room) {
        DB::table('room')->where('id', $room)->update(['available' => 0]);;    
    }
    
    public static function setAvailable($room) {
        DB::table('room')->where('id', $room)->update(['available' => 1]);;    
    }
}