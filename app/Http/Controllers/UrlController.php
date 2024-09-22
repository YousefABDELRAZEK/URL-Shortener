<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['original_url' => 'required|url']);
        $shortened = Str::random(6);
        Url::create([
            'original_url' => $request->original_url,
            'shortened_url' => $shortened
        ]);
        return redirect()->back()->with('success', url($shortened));
    }

    public function redirect($shortened)
    {
        $url = Url::where('shortened_url', $shortened)->firstOrFail();
        return redirect($url->original_url);
    }
}