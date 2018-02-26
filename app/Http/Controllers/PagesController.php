<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Displays the Homepage of the Website
     */
    public function index(){
        return view('pages.index');
    }
}
