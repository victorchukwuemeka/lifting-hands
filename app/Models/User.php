<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\ReferrerLink;
use Stephenjude\Wallet\Interfaces\Wallet;
use Stephenjude\Wallet\Traits\HasWallet;


class User extends Authenticatable implements Wallet
{
    use HasApiTokens, HasFactory, Notifiable, HasWallet;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'referrer_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function set_id($id)
    {
      $this->attributes['id'] = $id;
    }
    public function get_id()
    {
      return $this->attributes['id'];
    }
    public function set_name($name)
    {
      $this->attributes['name'] = $name;
    }
    public function get_name()
    {
      return $this->attributes['name'];
    }

    public function set_referrer_code($referrer_code)
    {
      $this->attributes['referrer_code'] = $referrer_code;
    }

    public function get_referrer_code()
    {
      return $this->attributes['referrer_code'];
    }

    public function referrerLink():hasMany
    {
      return $this->hasMany(ReferrerLink::class);
    }

    public function get_role(){
      return $this->attributes['role'];
    }

    public function set_role($role){
      $this->attributes['role'] = $role;
    }

    public function get_email(){
      return $this->attributes['email'];
    }
    
    public function set_email($email){
      $this->attributes['email'] = $email;
    }

    public function get_password(){
      return $this->attributes['password'];
    }

    public function set_password($password){
      $this->attributes['password'] = $password;
    }

}
