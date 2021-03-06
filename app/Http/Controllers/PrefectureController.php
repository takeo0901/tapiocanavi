<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prefecture;
use App\Shop;
use App\Review;

class PrefectureController extends Controller
{
    public function index()
    {
        $prefectures = Prefecture::all();
        //dd($prefectures->toArray());
        return view('pref.index', ['prefectures' => $prefectures]);
    }

    public function show($id)
    {
        $prefecture = Prefecture::findorFail($id);
        //dd($prefecture);
        return view('pref.show', compact('prefecture'));
    }

    public function shop($id, $shop_id)
    {
        $prefecture = $id;
        $shop = Shop::findorFail($shop_id);
        //dd($shop);
        return view('pref.shop', compact('shop'));
    }

    //public function review($shop_id)
    //{
        //$shop = Shop::findorFail($shop_id);
        //return view('review.create', compact('shop'));
    //}

}
