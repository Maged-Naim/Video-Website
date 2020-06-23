<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Categories\Store;

use App\Models\Category;



class Categories extends BackEndController
{
    public function __construct(Category $model)
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
    
    
    $cat=new Category;
    $cat->name = $request->input('name');
    $cat->meta_keywords = $request->input('keywords');
    $cat->meta_des = $request->input('desc'); 
    $cat->save();
     return redirect('admin/categories')->with('success','Category is Added successfully');
     
  }


  public function update($id, Store $request){
     $rows = $this->model->FindOrFail($id);
     $rows->update($request->all()); 
     
     return redirect()->route('categories.index')->with('success','Category updated successfully');
   

   }



    


}
