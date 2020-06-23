<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Skills\Store;
use App\Models\Skill;

class Skills extends BackEndController
{
    public function __construct(Skill $model)
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
    
    // $skill=new Skill;
    // $skill->name = $request->input('name');
    // $skill->save();
     return redirect()->route('skills.index')->with('success','Skills is Added successfully');
     
  }


  public function update($id, Store $request){
     $rows = $this->model->FindOrFail($id);
     $rows->update($request->all()); 
     
     return redirect()->route('skills.index')->with('success','Skills updated successfully');
   

   }

}
