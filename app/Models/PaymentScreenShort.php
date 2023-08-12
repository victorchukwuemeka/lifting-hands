<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentScreenShort extends Model
{
    use HasFactory;

    protected $table = 'payment_screen_short';

    public function get_id(){
      return $this->attributes['id'];
    }

    public function set_id($id){
      $this->attributes['id'] = $id;
    }

    public function get_receiver_id(){
      return $this->attributes['receiver_id'];
    }

    public function set_receiver_id($receiver_id){
      $this->attributes['receiver_id'] = $receiver_id;
    }

    public function get_donor_id(){
      return $this->attributes['donor_id'];
    }

    public function set_donor_id($donor_id){
      $this->attributes['donor_id'] = $donor_id;
    }

    public function get_image(){
      return $this->attributes['image'];
    }

    public function set_image($image){
      $this->attributes['image'] = $image;
    }


}
