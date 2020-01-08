<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
class CategoriesController extends Controller
{

    public function index(request $request)
    {
       $landscape = Category::find(1)->items->count();
       $city = Category::find(2)->items->count();
       $person= Category::find(3)->items->count();
       $creature= Category::find(4)->items->count();

    //  eval(\Psy\sh());
    return view("categories/index",compact("landscape","city","person","creature"));
    }
       
    
   

}
