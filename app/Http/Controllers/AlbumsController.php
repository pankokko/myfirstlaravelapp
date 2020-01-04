<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
require_once('/Users/teshigawararyou/projects/myfirstlaravelapp/vendor/composer/autoload_files.php');
class AlbumsController extends Controller
{
    public function index(request $request)
    {
        return view("albums/index");
    }
    public function new(request $request)
    {
        return view("albums/new");
    }

}
