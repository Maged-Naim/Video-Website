<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Pages\Store;
use App\Models\Page;

class Pages extends BackEndController
{
    public function __construct(Page $model)
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
    
    
    $page=new Page;
    $page->name = $request->input('name');
    $page->des = $request->input('des');    
    $page->meta_keywords = $request->input('keywords');
    $page->meta_des = $request->input('meta_des'); 
    $page->save();
     return redirect('admin/pages')->with('success','pages is Added successfully');
     
  }


  public function update($id, Store $request){
     $rows = $this->model->FindOrFail($id);
     $rows->update($request->all()); 
     
     return redirect()->route('pages.index')->with('success','Pages updated successfully');
   

   }

}
