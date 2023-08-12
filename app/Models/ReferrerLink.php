<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ReferrerLink extends Model
{
    use HasFactory;

    protected $table = 'referrer_link';

    public function get_id(){
      return $this->attributes['id'];
    }

    public function set_id($id){
      $this->attributes['id'] = $id;
    }

    public function get_referrer_id(){
      return $this->attributes['referrer_id'];
    }

    public function set_referrer_id($referrer_id){
      $this->attributes['referrer_id'] = $referrer_id;
    }

    public function get_referred_id(){
      return $this->attributes['referred_id'];
    }

    public function set_referred_id($referred_id){
      $this->attributes['referred_id'] = $referred_id;
    }

    public function get_code(){
      return $this->attributes['code'];
    }

    public function set_code($code){
      $this->attributes['code'] = $code;
    }


    public function user():belongsTo
    {
      return $this->belongsTo(User::class);
    }


}
