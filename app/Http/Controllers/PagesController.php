<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Request;

class PagesController extends Controller
{
    public function root()
    {
        return view('pages.root');
    }


    public function emailVerifyNotice(Request $request)
    {
        return view('pages.email_verify_notice');
    }
}
