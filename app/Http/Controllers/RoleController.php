<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class RoleController extends Controller
{
    
    public function index()
    {
        // $users = User::where('deleted_at',null)->where('id','<>',auth()->user()->id)->with('Roles')->get();
        $roles = \Spatie\Permission\Models\Role::all();
        return view('roles.index',compact('roles'));
    }
    public function create()
    {
        return view('roles.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255','unique:'.\Spatie\Permission\Models\Role::class],
        ]);
            $role = \Spatie\Permission\Models\Role::create([
                'name' => $request->name
            ]);
        return redirect('/roles')->with('success', 'Role successfully created');   
        
    }
    public function edit($id){

        $roles = \Spatie\Permission\Models\Role::all();
        $role = \Spatie\Permission\Models\Role::where('id',$id)->first();
        return view('roles.edit',compact('roles','role'));
    }
    public function update(Request $request, \Spatie\Permission\Models\Role $role){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        
            $role->name = $request->name;
            $role->update();

            // if($request->role > 0 ) {
            //     $adminRole = \Spatie\Permission\Models\Role::where('id', $request->role)->first();
            //     $user->assignRole($adminRole);
            // }       
            return redirect('/roles')->with('success', 'Role successfully updated');
        
    }
    public function delete(User $user)
    {
        $user->deleted_at = now();
        $user->update();
        return redirect('/users')->with('success', 'User successfully Delete');


    }
}
