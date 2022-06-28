<?php


namespace App\Http\Controllers;


use App\Category;
use App\SubCategories;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('Subcategory.create',compact('categories'));

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

        $subCategory = new SubCategories();
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;

        $subCategory->save();



        return redirect('/admin-panel')->with('msg_success', 'Sub Category Created Successfully');


    }
}
