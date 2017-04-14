<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ResetKartu extends Model
{
    protected $table = 'reset_kartu';
    public $timestamps = false;

    public static function getTotal($id_periode) {
        return DB::table('reset_kartu')->where('id_periode', $id_periode)->sum('saldo');
    }

    public static function clear() {
        DB::table('reset_kartu')->truncate();
    }
}