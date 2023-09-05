<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LangController extends Controller
{
    public function changeLanguage(Request $request, $language)
    {
        Session::put('lang', $language);
        // back to previous page
        return redirect()->back();
    }
}
