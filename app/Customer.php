<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = ['nama', 'alamat', 'email', 'telepon'];

    protected $hidden = ['created_at', 'updated_at'];
    public function product_keluar()
    {
        return $this->hasMany('App\Product_Keluar','customer_id');
    }
}
