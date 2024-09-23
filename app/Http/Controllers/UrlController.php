<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    
    public function store(Request $request)
    {
        //First we validate the user's input link
        $request->validate(['original_url' => 'required|url']);
        //The str random can be any other value 
        $shortened = Str::random(6);
        
        Url::create([
            'original_url' => $request->original_url,
            'shortened_url' => $shortened
        ]);
        //return the success response to generate the shortened url
        return redirect()->back()->with('success', url($shortened));
    }

    //function to handle the redirect method in the routes 
    public function redirect($shortened)
    {
        $url = Url::where('shortened_url', $shortened)->firstOrFail();
        return redirect($url->original_url);
    }
}
