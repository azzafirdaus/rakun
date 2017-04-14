<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'account';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama', 'username', 'password', 'role'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
                                        
    public static function add($nama, $username, $password, $role) {

        $user = new User;

        $user->nama = $nama;
        $user->username = $username;
        $user->password = $password;
        $user->role = $role;

        $user->save();
    }
                                        
    public static function getUsername($id) {
        return DB::table('account')->where('id', $id)->pluck('username');;
    }
                                        
    public static function getPassword($id) {
        return DB::table('account')->where('id', $id)->pluck('password');;
    }
                                        
    public static function getNama($id) {
        return DB::table('account')->where('id', $id)->pluck('nama');;
    }                                    
    public static function getName($username) {
        return DB::table('account')->where('username', $username)->pluck('nama');;
    }
                                        
    public static function getRoles($id) {
        return DB::table('account')->where('id', $id)->pluck('role');;
    }
                                        
    public static function getRole($username) {
        
        return DB::table('account')->where('username', $username)->pluck('role');;
        
    }
                                        
    public static function updateUsername($id, $username) {
        DB::table('account')->where('id', $id)->update(['username' => $username]);;
    }
                                        
    public static function updatePassword($id, $password) {
        DB::table('account')->where('id', $id)->update(['password' => $password]);;
    }
                                        
    public static function updateNama($id, $nama) {
        DB::table('account')->where('id', $id)->update(['nama' => $nama]);;
    }
                                        
    public static function updateRole($id, $role) {
        DB::table('account')->where('id', $id)->update(['role' => $role]);;
    }
                                        
    public static function deleteUser($id) {
        DB::table('account')->where('id', $id)->delete();
    }
}
