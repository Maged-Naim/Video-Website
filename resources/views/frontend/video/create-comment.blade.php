

<div class="col-md-11">
    @if(auth()->user())
        <form action="{{route('front.commentStore' , ['id' =>$video->id  ])}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <span class="badge badge-pill badge-primary" style="margin-top: 20px; margin-bottom: 20px; font-size: 20px">ADD Comment</span>
                <textarea name="comment"  class="form-control"  rows="4" cols="102"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-round" >Add Comment</button>
        </form>
    @endif
</div>

