<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class DataController extends Controller
{
    //
    public function index()
    {
        $data = User::all();
        // dd($data);
        return view('app.data.index', compact(['data']));
    }

    public function create()
    {   
        $data = null;
        return view('app.data.form', compact(['data']));
    }

    public function store(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email, 
            'password' => $request->password,
            'role_id' => $request->role,
        ]);

        return redirect('/users/data');
    }

    public function edit($id)
    {
        $data = User::find($id);
        // dd($data);
        return view('app.data.form', compact('data'));
    }

    public function update(Request $request, $id){
        $user = User::where('id', '=', $id)->update([
            'name' => $request->name,
            'email' => $request->email, 
            'password' => $request->password,
            'role_id' => $request->role,
        ]);

        return redirect('/users/data');
    }

    public function destroy($id)
    {
        $user= User::findOrFail($id);
        $user->delete();
        
        return redirect('/users/data');
    }

    public function trash()
    {
        $data = User::onlyTrashed()->get();
        return view('app.trash.index', ['data' => $data]);
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        if($user->trashed()){
            
            $user->restore();
            
            return redirect()->route('trash');
        }
       
    } 

    public function deletePermanent($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        if(!$user->trashed())
        {
            return redirect()->route('trash');
        } else {
            $user->forceDelete();
            return redirect()->route('trash');
        }
    }  
}
