<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages as PageModel;

class Pages extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $allparent = PageModel::all();
        return view('pages.create', compact('allparent'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'slug' => 'required|max:255|unique:pages', 
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'parentid' => 'max:255',
         ]);  

        $pages = PageModel::create($validateData);
        if($pages){
            return redirect('/')->with('success', 'Page are created');
        } 

    }


    /** 
     * Dislay the content from pages slug.
     * @param slug 
     * @return view page
    */
    public function frontView($slug){
        $getlastslug = basename($slug);
        $current_page_data = PageModel::where('slug', $getlastslug)->first();
        if(!$current_page_data){
            abort(404);
        }
        return view('pages.view', compact('current_page_data'));
    }

}
