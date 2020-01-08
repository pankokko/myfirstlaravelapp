<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
class CategoriesController extends Controller
{

    public function index(request $request)
    {
        return view("categories/index");
    }
   
}
