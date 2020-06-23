<?php 
namespace  App\Models;
use Illuminate\Database\Eloquent\Builder;

trait Likable{

    public function scopeWithLikes(Builder $query)
    {
         $query->leftJoinSub(
        'select video_id, sum(liked) likes, sum(!liked) dislikes from likes group by video_id',
        'likes',
        'likes.video_id',
        'videos.id'
         );
    }
  
    public function likes()
    {
       return $this->hasMany(Like::class);
    }
 
    public function isLikedBy(User $user)
    {
        return (bool) $user->likes
        ->where('video_id',$this->id)
        ->where('liked', true)
         ->count();  
    }
  
    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes
        ->where('video_id',$this->id)
        ->where('liked', false)
         ->count();           
    } 
  
    
    public function dislike($user =  null)
      {
        return $this->like($user, false);
      }
    
  
 


    public function like($user = null, $liked = true)
    {
       return $this->likes()->updateOrCreate(
          [
            'user_id' => $user ? $user->id : auth()->id(),
          ],
          [
           'liked' => $liked,
          ]
      );
    }

}