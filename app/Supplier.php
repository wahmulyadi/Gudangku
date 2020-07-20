<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $fillable = ['nama', 'alamat', 'email', 'telepon'];

    protected $hidden = ['created_at', 'updated_at'];
    public function product_masuk()
    {
        return $this->hasMany('App\Product_Masuk','supplier_id');
    }
}
