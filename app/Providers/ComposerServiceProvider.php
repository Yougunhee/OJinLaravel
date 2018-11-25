<?php
/**
 * Created by IntelliJ IDEA.
 * User: pc
 * Date: 2018-09-30
 * Time: 오후 2:28
 */

namespace App\Providers;


use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*','App\Http\ViewComposers\NavbarComposer');
    }
    public function register(){

    }
}
