<?php


namespace App\Http\Controllers;


use App\Category;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('category.create');

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

        ]);

        $category = new Category();
        $category->name = $request->name;

        $category->save();



        return redirect('/admin-panel')->with('msg_success', 'Category Created Successfully');


    }
}
