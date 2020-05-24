<?php

namespace App\Services;

use App\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ItemsService
{
    public function getAllItems()
    {
        $items = Item::wherenull('status')->orderBy('id')->get();
        return $items->sortByDesc("created_at")->take(16);
    }

    public function getItemById($itemId)
    {
        $item = Item::find($itemId);
        $user_like = $item->likes()->where('user_id', Auth::id())->first();
        $filteredNull =  $this->removeStatusOnlyAlbum($itemId);
        $items = $filteredNull->reject($item)->take(3);
        $comments = Item::find($itemId)->comments;
        return [$item, $items, $user_like, $comments];
    }

    public function removeStatusOnlyAlbum($id)
    {
        $filteredItems = Item::find($id)->user->items->reject(function ($values, $key) {
            return ($values['status'] == "onlyalbum");   //アルバム用の画像はアルバム内以外で表示したくないため
        });
        return $filteredItems;
    }

    public function deleteItem($itemId)
    {
        $item = Item::findOrFail($itemId);
        if (is_null($item)) {
            return false;
        }
        if (Auth::id()  == $item->user_id) {
            Storage::delete('public/temp/'.$item->path);
            $item->delete();
        }
        return true;
    }

    public function storePicture($attributes)
    {
        if (Auth::check()) {
            $image =  $attributes->file('path');
            $filename = time() . '.' . $image->getClientOriginalName();  //アップロードファイルを元々の名前と同じものに変更
            $thumbnail = public_path('/storage/thumbnail/'.$filename);
            $path = public_path('/storage/temp/'.$filename);
            Image::make($image)->resize(350, 220)->save($thumbnail);  //index一覧用の画像
            Image::make($image)->resize(1000, 600)->save($path);      //詳細画面で表示される用の綺麗な画像
            $item = Item::create(['path' => basename($path),
                          'title' => $attributes->title,
                          'user_id' =>  Auth::id(),
                          'category_id' => $attributes->category_id,
                          "status" => $attributes->status]);
        }
        return $item;
    }

    public function searchItems($keyword)
    {
        $collection = Item::where('title', 'LIKE', "%{$keyword}%")->get();
        $query = $collection->where('status', null);
        return [$query, $keyword];
    }
}