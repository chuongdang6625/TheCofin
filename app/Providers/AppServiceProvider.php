<?php

namespace App\Providers;

use App\ProductType;
use Illuminate\Support\ServiceProvider;
use App\Product;
use App\User;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('user/user-navbar', function($view){
            $TypeUSer = ProductType::with('getParent')->whereNull('parent_id')->get();
            $loaisp = ProductType::all();

            if(Session::has('logined')){
                $id = Session::get('logined');
                $data = User::where('id', $id)->first();
                $view->with('data', $data);
            }

            $view->with('TypeUser', $TypeUSer);
            $view->with('loaisp', $loaisp);
        });

        view()->composer('admin/second-sidebar', function($view){
            if(Session::has('ql')){
                $ql = Session::get('ql');
                $view->with('ql', $ql);
            }

            if(Session::has('qlsp')){
                $qlsp = Session::get('qlsp');
                $view->with('qlsp', $qlsp);
            }

            if(Session::has('qlcskh')){
                $qlcskh = Session::get('qlcskh');
                $view->with('qlcskh', $qlcskh);
            }

        });

        view()->composer('admin/admin-sidebar', function($view){
            if(Session::has('ql')){
                $ql = Session::get('ql');
                $idql = User::where('id', $ql)->first();
                $view->with('idql', $idql);
            }

            if(Session::has('qlsp')){
                $qlsp = Session::get('qlsp');
                $idqlsp = User::where('id', $qlsp)->first();
                $view->with('idqlsp', $idqlsp);
            }

            if(Session::has('qlcskh')){
                $qlcskh = Session::get('qlcskh');
                $idqlcskh = User::where('id', $qlcskh)->first();
                $view->with('idqlcskh', $idqlcskh);
            }
        });
    }
}
