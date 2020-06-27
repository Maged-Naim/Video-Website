<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Videos\Update;
use App\Http\Requests\BackEnd\Videos\Store;
use App\Models\Category;
use App\Models\Video;
use App\Models\Skill;
use App\Models\Tag;



class Videos extends BackEndController
{
   
    use CommentTrait;

    public function __construct(Video $model){
        parent::__construct($model);
    }

    public function filter($rows){
        if(request()->has('name') && request()->get( 'name') != ""){
            $rows = $rows->where('name', request()->get('name') );
        }
          return $rows;
    }
    

    
       public function with()
       {
           return ['cat', 'user'];
       }
   
       public function append()
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


   
    
    public function store(Store $request){
        $fileName = $this->uploadImage($request);
        $videoName = $this->uploadVideo($request);
        $requestArray =  ['user_id' => auth()->user()->id , 'image' => $fileName, 'video' => $videoName] + $request->all();
        $row = $this->model->create($requestArray);
        $this->syncTagsSkills($row , $requestArray);
        
        alert()->success('Video has been added', 'Done');
        return redirect()->route('videos.index')->with('success','video is Added successfully');
     
  }


  public function update($id, Update $request){
      $requestArray = $request->all();
     $row = $this->model->FindOrFail($id);
     $row->update($requestArray); 
     $this->syncTagsSkills($row , $requestArray);

     return redirect()->route('videos.index')->with('success','video updated successfully');
   

   }


   protected function syncTagsSkills($row , $requestArray){
    if (isset($requestArray['skills']) && !empty($requestArray['skills'])) {
        $row->skills()->sync($requestArray['skills']);
    }
    if (isset($requestArray['tags']) && !empty($requestArray['tags'])) {
        $row->tags()->sync($requestArray['tags']);
    }
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

}
