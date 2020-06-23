<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Users\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class Users extends BackEndController
{
    public function __construct(User $model)
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
    
    $requestarray = $request->all();
    $requestarray['password'] = Hash::make($requestarray['password']);
    User::create($requestarray);
    
    return redirect('admin/users')->with('success','User is Added successfully');
    
  }

  



    





  public function update(Request $request, User $user){
    $request->validate([  
        'name' => ['required', 'string', 'max:191'],
        'email' => [ 'string', 'email', 'max:191'],
        'password' => ['required', 'string', 'min:8'], 
    ]);  
    $user->update($request->all());
    return redirect()->route('users.index')->with('success','User updated successfully');


   }



}
