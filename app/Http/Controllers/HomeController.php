<?php

namespace App\Http\Controllers;

use App\Http\Requests\BackEnd\Videos\Store as VideosStore;
use App\Http\Requests\FrontEnd\Comments\Store;
use App\Http\Requests\FrontEnd\Messages\Store as MessagesStore;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Message;
use App\Models\Page;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Categories;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use SweetAlert;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use UxWeb\SweetAlert\SweetAlert as SweetAlertSweetAlert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    


    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('auth')->only([
            'tags','category','skills','video','commentUpdate', 'commentStore'
        ]);
    }

    public function index()
    {
        
        $videos = Video::published()->orderBy('id', 'desc');
        if(request()->has('search') && request()->get('search') != ''){
        $videos = $videos->where('name' , 'like' , "%".request()->get('search')."%");
        }
        $videos = $videos->paginate(30);
        return view('home', compact('videos'));
    }


    public function category($id){
        $cat = Category::findOrFail($id);
        $videos = Video::published()->where('cat_id' , $id)->orderBy('id' , 'desc')->paginate(30);
        return view('frontend.category.index' , compact('videos' , 'cat'));
    }

    public function skills($id){
        $skill = Skill::findOrFail($id);
        $videos = Video::published()->whereHas('skills' , function ($query) use ($id){
            $query->where('skill_id' , $id);
        })->orderBy('id' , 'desc')->paginate(30);
        return view('frontend.skill.index' , compact('videos' , 'skill'));
    }

    public function video($id){
        $video = Video::published()->with('skills','likes' ,'tags' , 'cat' , 'user' , 'comments.user')->withLikes()->findOrFail($id);
        
        return view('frontend.video.index' , compact('video'));
    }

    public function tags($id){
        $tag = Tag::findOrFail($id);
        $videos = Video::published()->whereHas('tags' , function ($query) use ($id){
            $query->where('tag_id' , $id);
        })->orderBy('id' , 'desc')->paginate(30);
        return view('frontend.tag.index' , compact('videos' , 'tag'));
    }

    public function profile($id , $slug = null){
        $user = User::findOrFail($id);
        $tags = Tag::get();
        return view('frontend.profile.index' , compact('user', 'tags'));
    }

    public function commentUpdate($id , Store $request){
        $comment = Comment::findOrFail($id);
        if(($comment->user_id == auth()->user()->id) || auth()->user()->group == 'admin'){
            $comment->update(['comment' => $request->comment]);
            
        }
        
        return redirect()->route('frontend.video' , ['id' => $comment->video_id , '#commnets']);
    }

    public function commentStore($id , Store $request){
        $video = Video::published()->findOrFail($id);
        Comment::create([
            'user_id' => auth()->user()->id,
            'video_id' => $video->id,
            'comment' => $request->comment
        ]);
        
        return redirect()->route('frontend.video' , ['id' => $video->id , '#commnets']);
    }
    

    public function messageStore(MessagesStore $request){
        Message::create($request->all());
        alert()->success('You message have been saved , we will replay you in 24 hour' , 'Done');
        return redirect()->route('frontend.landing');

    }
    public function welcome(){
         $videos = Video::published()->orderBy('id' , 'desc')->paginate(9);
         $videos_count = Video::published()->count();
         $cat_count = Category::count();
         $skills_count = Skill::count();
        return view('welcome',  compact('videos' , 'cat_count' , 'skills_count' , 'videos_count'));
    }
    
    public function page($id , $slug = null){
        $pages = Page::findOrFail($id);
        return view('frontend.page.index' , compact('pages'));
    }



    public function profileUpdate(\App\Http\Requests\FrontEnd\Users\Store $request){
        $user = User::findOrFail(auth()->user()->id);
        $array = [];
        if($request->email != $user->email){
            $email = User::where('email' , $request->email)->first();
            if($email == null){
                $array['email'] =  $request->email;
            }
        }
        if($request->name != $user->name){
            $array['name'] =  $request->name;
        }
        if($request->password != ''){
            $array['password'] =  Hash::make($request->password);
        }
      
        if($request->hasFile('image')){
            $fileNameWithExt = request()->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = request()->file('image')->extension();
            $fileNameToStore =  $fileName.'_'.time().'.'.$extension;
            $path = request()->file('image')->storeAs('images', $fileNameToStore);
            $file = request()->file('image');
            $file->move('uploads/images', $fileNameToStore);
            $user->update(['image' => $fileNameToStore]);
        }
        if(!empty($array)){
            $user->update($array);
        }
        alert()->success('your profile has been updated', 'Done');
        return redirect()->route('front.profile' , ['id' => $user->id , 'slug' =>slug($user->name)]);
    }


    protected function append()
    {

        $array = [
            'categories' => Category::get(),
            'skills' => Skill::get(),
            'tags' => Tag::get(),
            'selectedSkills' => [],
            'selectedTags' => [],
            'comments' => []
        ];
        if(request()->route()->parameter('video')){
         $array['selectedSkills']  = $this->model->find(request()->route()->parameter('video'))
             ->skills()->pluck('skills.id')->toArray();
        
        $array['selectedTags']  = $this->model->find(request()->route()->parameter('video'))
        ->tags()->pluck('tags.id')->toArray();

        $array['comments']  = $this->model->find(request()->route()->parameter('video'))
        ->comments()->orderBy('id','desc')->with('user')->get();
        }   
     return $array;
    }
    // public function addVideo()
    // {
    //     $tags = Tag::get();

    //     $skills = Skill::get();
    //     $categories = category::get();
    //     dd($tags);
    //     return view('frontend.profile.add-video', compact('tags', 'skills', 'categories'));
    // }

    public function uploadVideoUser(VideosStore $request)
    {
        
        $fileName = $this->uploadImage($request);
        $videoName = $this->uploadVideo($request);
        $requestArray =  ['user_id' => auth()->user()->id , 'image' => $fileName, 'video' => $videoName] + $request->all();
        $row = Video::create($requestArray);
        $this->syncTagsSkills($row , $requestArray);
        
        alert()->success('Video has been added', 'Done');
        return redirect()->route('front.profile')->with('success','video is Added successfully');

    } 

    protected function uploadImage($request){
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads') , $fileName);
            return $fileName;
        }
        
    }

    protected function uploadVideo($request){
        if($request->hasFile('video')){
            $file = $request->file('video');
            $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/videos') , $fileName);
            return $fileName;
        }
    }
    protected function syncTagsSkills($row , $requestArray){
        if (isset($requestArray['skills']) && !empty($requestArray['skills'])) {
            $row->skills()->sync($requestArray['skills']);
        }
        if (isset($requestArray['tags']) && !empty($requestArray['tags'])) {
            $row->tags()->sync($requestArray['tags']);
        }
    }

}
