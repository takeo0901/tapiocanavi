<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    // getでreview/にアクセスした時
    public function index()
    {
        $reviews = Review::all()->paginate(10);
        return view('review.index', ['reviews' => $reviews]);
    }

    //getでreview/createにアクセスした時
    public function create()
    {
        return view('review.create');
    }

    // postでhello/にアクセスされた場合
    //public function store()
    //{
        
    //}

    // getでhello/messageにアクセスされた場合
    //public function show($message)
    //{
        
    //}

    // getでhello/message/editにアクセスされた場合
    //public function edit($message)
    //{
        
    //}

    // putまたはpatchでhello/messageにアクセスされた場合
    //public function update($message)
    //{
        
    //}

    // deleteでhello/messageにアクセスされた場合
    //public function destroy($message)
    //{
        
    //}
}