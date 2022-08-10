<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;

class Dashboard extends Controller
{
    //
    /*
        get main page
    */      
    public function index (){
     
        $allpages = Pages::all();
        return view('dashboard', compact('allpages')); 
   
    }



}
