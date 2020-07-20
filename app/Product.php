<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['category_id','nama','harga','foto','qty'];

    protected $hidden = ['created_at','updated_at'];

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }
    public function product_masuk()
    {
        return $this->hasMany('App\Product_Masuk','product_id');
    }
    public function product_keluar()
    {
        return $this->hasMany('App\Product_Keluar','customer_id');
    }
}
