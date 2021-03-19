<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $fetchAllUsers = User::all();
        $countUsers=User::count();
        return view('users.index', compact('fetchAllUsers','countUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$data)
    {
        try{
            $this->validate($request,
        [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' =>  Hash::make(['required', 'string', 'min:8', 'confirmed']),
                        
        ]);
        //grabbing loggedin user
        // $request['create_by']=Auth::user()->name;
        User::create($request->all());
        //return back();
        return back()->with('message','User Registered Successfully');
        // dd($request->all());

        }catch (\throwable $th){
            throw $th;

        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clickedUser=User::findOrFail($id);
        $fetchAllUser=User::latest()->get();
        return view('users.edit',compact('clickedUser','fetchAllUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // find User id
        // $findUserById= User::find($id);
        //update all the request from the form
        // $findUserById->update ($request->all());
        $user= User::findOrFail($id);
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password=Hash::make($request->password);
        $user->save();

        
        return back()->with('message','User updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findUser=User::find($id);
        $findUser->delete();
        return back()->with('message','User Deleted Successfully');
    }
}
