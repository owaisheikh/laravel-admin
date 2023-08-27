<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;



class UserController extends Controller
{
    public function index()
    {
        $users = User::where('deleted_at',null)->where('id','<>',auth()->user()->id)->with('Roles')->get();
        return view('Users.index',compact('users'));
    }
    public function create()
    {
        $roles = \Spatie\Permission\Models\Role::all();
        return view('users.create',compact('roles'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_number' => 'required',
            'role' => 'required',
            'status' => 'required'
        ]);
        $status = ($request->status == 'on') ? 1 : 0;
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'status' => $status,
                'password' => Hash::make($request->password),
            ]);

        if($request->role > 0 ) {
            $adminRole = \Spatie\Permission\Models\Role::where('id', $request->role)->first();
            $user->assignRole($adminRole);
        }
        return redirect('/users')->with('success', 'User successfully created');   
        
    }
    public function edit($id){
        $roles = \Spatie\Permission\Models\Role::all();
        $user = User::where('id',$id)->with('Roles')->first();
        return view('users.edit',compact('roles','user'));
    }
    public function update(Request $request, User $user){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_number' => 'required',
            'role' => 'required',
            'status' => 'required'
        ]);
        
        $status = ($request->status == 'on') ? 1 : 0;

            $user->name = $request->name;
            $user->phone_number = $request->phone_number;
            $user->status = $status;
            $user->password = Hash::make($request->password);
            $user->update();

            if($request->role > 0 ) {
                $adminRole = \Spatie\Permission\Models\Role::where('id', $request->role)->first();
                $user->assignRole($adminRole);
            }       
            return redirect('/users')->with('success', 'User successfully updated');
        
    }
    public function delete(User $user)
    {
        $user->deleted_at = now();
        $user->update();
        return redirect('/users')->with('success', 'User successfully Delete');


    }
}
