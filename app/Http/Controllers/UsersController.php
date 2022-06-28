<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use Hash;
use DB;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $users =  DB::table(User::getTableName().' as u')
            ->join(Role::getTableName().' as r','r.user_id','=','u.id')
            ->select('u.id','u.name','u.email','u.mobile','u.birth_date')
            ->paginate(20);


            return view('users.index', compact('users'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

            return view('users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


            $validatedData = $request->validate([
                'name' => 'required:max:40',
                'email' => 'required|email|unique:users|max:190',
                'password' => 'required|min:8',
                'role' => 'required|max:40',
            ]);

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->birth_date = $request->birth_date;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->password = Hash::make($request->password);
            if($request->hasFile('image')) {
                $user->image = $request->image->store('profile_pics', 'public');
            }
            $user->save();

            $role = new Role;
            $role->user_id = $user->id;
            $role->role = $request->role;
            $role->permission = $request->permission;
            $role->save();

            return redirect('/admin-panel')->with('msg_success', 'User Created Successfully');


    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

            $user = User::findOrFail($id);
            $user_role = DB::table('roles')->where('user_id', '=', $id)->first();
            return view('users.edit', compact('user', 'user_role'));



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


            $validatedData = $request->validate([
                'name' => 'required:max:40',
                'email' => 'required|email|max:190',
                'role' => 'required|max:40',
            ]);

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->birth_date = $request->birth_date;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            if($user->password) {
                $user->password = Hash::make($request->password);
            }
            if($request->hasFile('image')) {
                $user->image = $request->image->store('profile_pics', 'public');
            }
            $user->save();

            $role = Role::where('user_id', '=', $id)->firstOrFail();
            $role->role = $request->role;
            $role->permission = $request->permission;
            $role->save();

            return redirect('/admin-panel')->with('msg_success', 'User Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

            $user = User::find($id);
            $role = Role::where('user_id', '=', $id)->firstOrFail();
            $role->delete();
            $user->delete();
            return redirect('/admin-panel')->with('msg_success', 'User Deleted Successfully');


    }


}
