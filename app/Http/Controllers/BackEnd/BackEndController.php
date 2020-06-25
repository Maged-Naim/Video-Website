<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class BackEndController extends Controller
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function index(){
        $rows = $this-> model;
        $rows =  $this->filter($rows);
        $with = $this->with();
        if(!empty($with)){
            $rows = $rows->with($with);
        }
        $rows = $rows->paginate(3);
        return view('backend.'.$this->getClassNameFromModel().'.index', compact('rows'));
       }
     protected function getClassNameFromModel(){
       return str_plural(strtolower(class_basename($this->model)));
   }


   public function create(){
    $append = $this->append(); 
    return view('backend.'.$this->getClassNameFromModel().'.create')->with($append) ;
     
   }
   public function destroy($id){
       $this->model->FindOrFail($id)->delete();
       return redirect()->route($this->getClassNameFromModel().'.index')->with('success','Deleted Successfully');
  }

  public function edit($id){
    $rows =  $this->model->FindOrFail($id) ; 
    $append = $this->append(); 
    return view('backend.'.$this->getClassNameFromModel().'.edit', compact('rows'))->with($append);  
  }

  public function with(){
    return [];
  }

  public function append(){
    return [];
  }

  public function filter($rows){
   return $rows;
        
  }
}