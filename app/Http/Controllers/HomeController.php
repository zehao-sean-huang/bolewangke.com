<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateContactRequest;
use App\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicVideos = Video::all()->where('public', true);
        return view('home.index', compact('publicVideos'));
    }

    public function editContact()
    {
        return view('home.contact');
    }

    public function updateContact(UpdateContactRequest $request)
    {
        $data = $request->validated();
        \Auth::user()->update($data);
        return redirect()->route('home')->with([
            'title' => '您已成功更新您的联系信息',
            'status' => 'success',
            'detail' => '您现在可以购买我们平台任意一本笔记。',
        ]);
    }
}
