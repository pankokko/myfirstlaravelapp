<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\itemsRequest;
use App\Services\ItemsService;
use App\Item;
use App\user;
use Intervention\Image\Facades\Image;

class ItemsController extends Controller
{

    protected $itemService;

    public function __construct(ItemsService $itemService)
    {
        $this->middleware('auth')
        ->except(['index','show','search','new']);
        $this->ItemsService = $itemService;
    }

    public function index(request $request)
    {
        $items =  $this->ItemsService->getAllItems();
        if (!is_null($items)) {
            $randoms = $items->random(1);
            return view("items/index", compact("items", "randoms"));
        } else {
            return view("items/index");
        }
    }
     
    public function show($id)
    {
        list($item, $items, $user_like, $comments) = $this->ItemsService->getItemById($id);
        return view("items/show", compact("item", "items", "comments", "user_like"));
    }

    public function destroy($id)
    {
        $item = $this->ItemsService->deleteItem($id);
    
        if (!is_null($item)) {
            return redirect('items/index')->with('created', '画像を削除しました');
        }
    }

    public function new(Request $request)
    {
        if (Auth::check()) {
            return view("items/new");
        } else {
            return redirect("/register")->with('flash', "*投稿するにはログインか新規登録が必要です*");
        }
    }

    public function create(itemsRequest $request) {

        $item = $this->ItemsService->storePicture($request);

        if (is_null($item)) {
            return redirect()->back()->with('failed', '画像の投稿に失敗しました');
        }
        return redirect('items/index')->with('success', '写真を投稿しました');
    }

    public function search(request $request)
    {
        $keyword                 = $request->input("keyword");
        list($query,$collection) = $this->ItemsService->searchItems($keyword);
        
        return view("items/search", compact("query", "keyword"));
    }
}
