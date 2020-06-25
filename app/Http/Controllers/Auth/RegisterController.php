<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Users\Store;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;



    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image'=> ['required', 'image']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    // public function uploadImage($request , $key)
    // {
    //     //image upload 
    //     if($request->hasFile($key)){
    //                 // Get file name with the extension
    //             $fileNameWithExt = $request->file($key)->getClientOriginalName();
    //                 // Get just file name
    //             $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
    //                 // Get just Ext
    //             $extension = $request->file($key)->getClientOriginalExtension();
    //                 // File name to store
    //             $fileNameToStore =  $fileName.'_'.time().'.'.$extension;
    //                 // upload image
    //             // $path = $request->file('image')->storeAs('image', $fileNameToStore);
    //             $file = $request->$key;
    //             $file->move('uploads/images', $fileNameToStore);

    //             return $fileNameToStore;

    //     }
       
    // }
    

    protected function create(array $data )
    {      
       
      
       
       
        $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'group' => 'user',
                    'image'=> $data['image']
                      
                 ]);
                 
        if(request()->hasFile('image')){
            $fileNameWithExt = request()->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = request()->file('image')->extension();
            $fileNameToStore =  $fileName.'_'.time().'.'.$extension;
            $path = request()->file('image')->storeAs('images', $fileNameToStore);
            $file = request()->file('image');
            $file->move('uploads/images', $fileNameToStore);
            $user->update(['image' => $fileNameToStore]);
        }
    
        return $user;

    }
























    // public function store(Request $request)
    // {
    

    //     // Handle File upload
    //     if($request->hasFile('image')){
            
    //         // get filename with the extention
    //         $fileNameWithExt = $request->file('image')->hashName();

    //         // get just filename 
    //         $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

    //         // get just Ext
    //         $extention = $request->file('image')->extension();

    //         // Filename to store
    //         $fileNameToStore = $fileName.'_'.time().'.'.$extention;

    //         // upload image
    //         $path = $request->file('image')->storeAs('uploads/images',$fileNameToStore);
    //         dd($path);
    //     }else{
    //         $fileNameStore='noimage.jpg';
    //     } 
        
        
    //     $user = new User;
    //     $user->name = $request->input('name');
    //     $user->email = $request->input('email');
    //     $user->password = Hash::make($request->input('password'));
    //     $user->group = 'user';
    //     $user->image = $fileNameToStore;
    //     $user->save();

    //     return redirect('/home');
    // }

}
