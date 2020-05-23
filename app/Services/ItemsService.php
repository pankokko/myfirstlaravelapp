<?php

namespace App\Services;

use App\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
}