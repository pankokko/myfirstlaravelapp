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
        list($item, $items, $user_like, $comments) =  $this->ItemsService->getItemById($id);
        return view("items/show", compact("item", "items", "comments", "user_like"));
    }

    public function destroy($id)
    {
        $item = $this->ItemsService->deleteItem($id);
    
        if (!is_null($item)) {
            return redirect('items/index')->with('success', '画像を削除しました');
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

    
    public function create(itemsRequest $request){
        if (Auth::check()) {
            $image =  $request->file('path');
            $filename = time() . '.' . $image->getClientOriginalName();  //アップロードファイルを元々の名前と同じものに変更
            $thumbnail = public_path('/storage/thumbnail/'.$filename);
            $path = public_path('/storage/temp/'.$filename);
            Image::make($image)->resize(350, 220)->save($thumbnail);  //index一覧用の画像
            Image::make($image)->resize(1000, 600)->save($path);      //詳細画面で表示される用の綺麗な画像
            Item::create(['path' => basename($path),'title' => $request->title, 'user_id' =>  Auth::id(), 'category_id' => $request->category_id , "status" => $request->status]);
        }
        return redirect('items/index');
    }

    public function search(request $request)
    {
        $keyword = $request->input("keyword");
        $collection = Item::where('title', 'LIKE', "%{$keyword}%")->get();
        $query = $collection->where('status', null);
      
        return view("items/search", compact("query", "keyword"));
    }
}
