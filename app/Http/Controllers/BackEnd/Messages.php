<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Messages\Store;
use App\Mail\ReplayContact;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class Messages extends BackEndController
{
    public function __construct(Message $model)
    {
        parent::__construct($model);
    }
    public function replay($id, Store $request){
        //    dd($request->message, $id);
        $message = $this->model->findOrFail($id);
        Mail::send(new ReplayContact($message, $request->message));
        alert()->success('Replay Sent Successfully', 'Done');
        return redirect()->route('messages.index', ['id'=> $message->id]);
    }
    
}
