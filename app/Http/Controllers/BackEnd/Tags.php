<?php
 
namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Tags\Store;
use App\Models\Tag;


class Tags extends BackEndController
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }

    public function filter($rows)
    {
        if(request()->has('name') && request()->get( 'name') != ""){
            $rows = $rows->where('name', request()->get('name') );
        }
          return $rows;
    }


   public function store(Store $request){
       $this->model->create($request->all());

     return redirect()->route('tags.index')->with('success','tags is Added successfully');
     
  }


  public function update($id, Store $request){
     $rows = $this->model->FindOrFail($id);
     $rows->update($request->all()); 
     
     return redirect()->route('tags.index')->with('success','tag updated successfully');
   

   }
}
