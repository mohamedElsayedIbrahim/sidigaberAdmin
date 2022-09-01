<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function ar()
    {
        Session::put('lang','ar');
        App::setLocale('ar');
        return back();
    }

    public function en()
    {
        Session::put('lang','en');
        App::setLocale('en');
        return back();
    }
}
