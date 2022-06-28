<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//            $users_count = User::where('admin', 0)->count();
            $users_count = DB::table(User::getTableName().' as u')
                ->join(Role::getTableName().' as r','r.user_id','=','u.id')
               ->count();
            return view('adminPanel', compact('users_count'));

    }

}
