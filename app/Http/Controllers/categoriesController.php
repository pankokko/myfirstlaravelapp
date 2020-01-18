<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Item;
class CategoriesController extends Controller
{

    public function index(request $request)
    {
       $landscape = Category::findOrFail(1)->items->where("status",null);
       $city = Category::findOrFail(2)->items->where("status",null);
       $person= Category::findOrFail(3)->items->where("status",null);
       $creature= Category::findOrFail(4)->items->where("status",null);

      return view("categories/index",compact("landscape","city","person","creature"));
    }
       
    public function list($id)
    {
        $items = Item::where("status",null)->where("category_id" ,$id)->paginate(6);
        $category_id  = $id;

        return view("categories/list",compact("items","category_id"));
    }
    
}
