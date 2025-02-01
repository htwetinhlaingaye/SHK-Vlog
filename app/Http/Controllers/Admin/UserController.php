<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id','Desc')->paginate(15);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $users = User::create($request->all());
        
        $file_name = time().'.'.$request->profile->extension();
        $upload = $request->profile->move(public_path('images/users/'),$file_name);
        if($upload){
            $users->profile = "/images/users/".$file_name;
        }

        $users->save();
        return redirect()->route('backend.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
         $user = User::find($id);
         $user->update($request->all());
 
         if($request->hasFile('profile')){
             $file_name = time().'.'.$request->profile->extension();
             $upload = $request->profile->move(public_path('images/users/'),$file_name);
             
             if($upload){
                 $user->profile = "/images/users/".$file_name;
             }
         }else {
             $user->profile = $request->old_image;
         }
         $user->save();
         return redirect()->route('backend.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('backend.users.index');
    }
}