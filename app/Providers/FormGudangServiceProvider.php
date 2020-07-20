<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Product;
use App\Supplier;
use App\Customer;
class FormGudangServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
        view()->composer('product_masuk.form', function($view) {
            $view->with('list_product', Product::pluck('nama', 'id'));
        });
        view()->composer('product_masuk.form', function($view) {
            $view->with('list_supplier', Supplier::pluck('nama', 'id'));
        });
        
        view()->composer('product_keluar.form', function($view) {
            $view->with('list_product', Product::pluck('nama', 'id'));
        });
        view()->composer('product_keluar.form', function($view) {
            $view->with('list_customer', Customer::pluck('nama', 'id'));
        });
        view()->composer('products.form', function($view) {
            $view->with('list_category', Category::pluck('name', 'id'));
        });

        view()->composer('products.form_pencarian', function($view) {
             $view->with('list_posisi', Category::pluck('name', 'id'));
        });
    }
}
