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

        return view('index');
    }
    public function create()
    {

        $user = Auth::user()->name;
        $shortLinks = ShortLink::where('user_name',$user)->get();
        $count_all =count($shortLinks);
        $month_1 = ShortLink::whereYear('created_at', '=', 2021)->whereMonth('created_at', '=', 1)->where('user_name',$user)->get();
        $count1 =count($month_1);
        $month_2 = ShortLink::whereYear('created_at', '=', 2021)->whereMonth('created_at', '=', 2)->where('user_name',$user)->get();
        $count2 =count($month_2);
        $month_3 = ShortLink::whereYear('created_at', '=', 2021)->whereMonth('created_at', '=', 3)->where('user_name',$user)->get();
        $count3 =count($month_3);
        $month_4 = ShortLink::whereYear('created_at', '=', 2021)->whereMonth('created_at', '=', 4)->where('user_name',$user)->get();
        $count4 =count($month_4);
        $month_5 = ShortLink::whereYear('created_at', '=', 2021)->whereMonth('created_at', '=', 5)->where('user_name',$user)->get();
        $count5 =count($month_5);
        $month_6 = ShortLink::whereYear('created_at', '=', 2021)->whereMonth('created_at', '=', 6)->where('user_name',$user)->get();
        $count6 =count($month_6);
        $month_7 = ShortLink::whereYear('created_at', '=', 2021)->whereMonth('created_at', '=', 7)->where('user_name',$user)->get();
        $count7 =count($month_7);
        $month_8 = ShortLink::whereYear('created_at', '=', 2021)->whereMonth('created_at', '=', 8)->where('user_name',$user)->get();
        $count8 =count($month_8);
        $month_9 = ShortLink::whereYear('created_at', '=', 2021)->whereMonth('created_at', '=', 9)->where('user_name',$user)->get();
        $count9 =count($month_9);
        $month_10 = ShortLink::whereYear('created_at', '=', 2021)->whereMonth('created_at', '=', 10)->where('user_name',$user)->get();
        $count10 =count($month_10);
        $month_11 = ShortLink::whereYear('created_at', '=', 2021)->whereMonth('created_at', '=', 11)->where('user_name',$user)->get();
        $count11 =count($month_11);
        $month_12 = ShortLink::whereYear('created_at', '=', 2021)->whereMonth('created_at', '=', 12)->where('user_name',$user)->get();
        $count12 =count($month_12);
        return view('dash' ,compact('shortLinks','count_all','count1','count2',
         'count3','count4','count5','count6','count7','count8','count9',
         'count10','count11','count12'));
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
        return redirect('/dashboard')->with('success',' Done!');
    }

    public function shortlink($code)
    {
       
        $shortlink = ShortLink::where('short_url', $code)->first();
      /* $click= $shortlink->clicks;
        $shortlink->clicks = $click + 1;
        $shortlink->update();*/
      
        $shortlink->increment('clicks');
        return redirect($shortlink->url);
        
    }

    public function destroy($id)
    {
        ShortLink::destroy($id);
        return redirect('/dashboard');
    }

}
