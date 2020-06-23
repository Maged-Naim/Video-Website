<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\BackEnd\BackEndController;
use App\Models\Comment;
use App\Models\User;

class Home extends BackEndController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    // public function index(){
    //     return view('backend.layout.app');
    // }

    public function index(){
        $comments = Comment::with('user' , 'video')->orderby('id' , 'desc')->paginate(20);
        return view('backend.home' , compact('comments'));
    }
}
