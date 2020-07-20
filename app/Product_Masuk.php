<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Masuk extends Model
{
    //
    protected $table = 'product_masuk';

    protected $fillable = ['product_id','supplier_id','qty','tanggal'];

    protected $hidden = ['created_at','updated_at'];

    public function product()
    {
        return $this->belongsTo('App\Product','product_id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier','supplier_id');
    }
    
}
