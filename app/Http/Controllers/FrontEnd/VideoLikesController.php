<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\FrontEnd\FrontEndController;
use App\Models\Video;



class VideoLikesController extends Controller
{
   
    public function store(Video $video, $id)
    {
        $video = Video::published()->findOrFail($id);
        $video->like($video->user);
        
        
        return view('frontend.video.index', compact('video'));

    }

    public function destroy(Video $video, $id)
    {
        $video = Video::published()->findOrFail($id);
        $video->dislike($video->user);

        return view('frontend.video.index', compact('video'));

    }
}
