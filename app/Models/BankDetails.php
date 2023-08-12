<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BankDetails extends Model
{
    use HasFactory;

    public function set_id($id){
       $this->attributes['id'] = $id;
    }

    public function get_id(){
      return $this->attributes['id'];
    }

    public function set_user_id($user_id){
       $this->attributes['user_id'] = $user_id;
    }

    public function get_user_id(){
      return $this->attributes['user_id'];
    }

    public function set_first_name($first_name){
       $this->attributes['first_name'] = $first_name;
    }

    public function get_first_name(){
      return $this->attributes['first_name'];
    }

    public function set_last_name($last_name){
       $this->attributes['last_name'] = $last_name;
    }

    public function get_last_name(){
      return $this->attributes['last_name'];
    }

    public function set_bank_name($bank_name){
       $this->attributes['bank_name'] = $bank_name;
    }

    public function get_bank_name(){
      return $this->attributes['bank_name'];
    }

    public function set_account_number($account_number){
      $this->attributes['account_number'] = $account_number;
    }

    public function get_account_number(){
      return $this->attributes['account_number'];
    }

    /*validation*/
    public static function validate($request){
      $request->validate([
        'bank_name' => ['required', 'max:255'],
        'first_name' => ['required'],
        'last_name' => ['required'],
        'account_number' => ['required', 'numeric', 'min:10']
      ]);
    }
}
