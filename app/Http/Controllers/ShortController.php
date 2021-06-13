<?php

namespace App\Http\Controllers;
use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class ShortController extends Controller
{
    public function index(Request $request)
    {
        $shortLinks = ShortLink::all();
        return view('dashboard',compact('shortLinks'));
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $request->validate([
           'url' => 'required|url'
        ]);
        $shortlink= new ShortLink();
        $shortlink->user_name=Auth::user()->name;
        $shortlink->url = $request->post('url');
        $shortlink->short_url=Str::random(5);
        $shortlink->save();
        return redirect('dashboard')->with('success',' Done!');
    }

    public function shortlink($code)
    {
        $shortlink = ShortLink::where('short_url', $code)->first();
        $click = $shortlink->clicks;
        $click = $shortlink->increment('clicks');
        $shortlink->update();
        return redirect($shortlink->url);
        
    }

    public function destroy($id)
    {
        ShortLink::destroy($id);
        return redirect('dashboard');
    }
   

}
