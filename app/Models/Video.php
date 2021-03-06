<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Video extends Model
{
   use Likable;
   
   protected $fillable = [
    'name',
    'des',
    'user_id',
    'cat_id',
    'published',
    'video',
    'image',
    'video'
   ];

 
   public function user()
   {
      return $this->belongsTo(User::class , 'user_id');
   }

  public function cat()
  {
      return $this->belongsTo(Category::class , 'cat_id');
  }

   public function skills()
  {
     return $this->belongsToMany(Skill::class, 'skills_videos');
  }

  public function comments()
  {
     return $this->hasMany(Comment::class);
  }

  public function likes()
  {
     return $this->hasMany(Like::class);
  }
  
  public function tags()
  {
     return $this->belongsToMany(Tag::class, 'tags_videos');
  }

  public function scopePublished()
  {
   return $this->where('published' , 1);
  }


  

}
