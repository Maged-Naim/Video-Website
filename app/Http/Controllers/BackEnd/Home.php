<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\BackEnd\BackEndController;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Home extends BackEndController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

  

    public function index(){
        $comments = Comment::with('user' , 'video')->orderby('id' , 'desc')->paginate(10);
      
        // $videos = DB::table('videos')
        //                 ->where('videos.id', 'comments.video_id')
        //                 ->get();
        
        return view('backend.home' , compact('comments'));
    }
}
 