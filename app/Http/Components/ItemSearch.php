<?php

namespace App\Http\Components;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\Tags;
use App\Models\ItemTags;
use App\Models\User;

class ItemSearch
{
    public static function itemserch($keyword_name, $keyword_category, $keyword_tag, $keyword_place)
    {
        $query = Item::query();
        // キーワードのみ入力
        if (!empty($keyword_name) && empty($keyword_category) && empty($keyword_tag) && empty($keyword_place)) {
            $items = $query->where('name', 'like', '%' . $keyword_name . '%')->get();
            $message = "検索条件　キーワード:" . $keyword_name;
            // カテゴリーのみ入力
        } elseif (empty($keyword_name) && !empty($keyword_category) && empty($keyword_tag) && $keyword_place) {
            $items = $query->where('category')->get();
            $message = "検索条件　カテゴリー:" . $keyword_category;
            // タグのみ入力
        } elseif (empty($keyword_name) && empty($keyword_category) && !empty($keyword_tag) && $keyword_place) {
            $items = $query->where('tag')->get();
            $message = "検索条件　タグ:" . $keyword_tag;
            // 保管場所のみ入力
        } elseif (empty($keyword_name) && empty($keyword_category) && !empty($keyword_tag) && $keyword_place) {
            $items = $query->where('place')->get();
            $message = "検索条件　保管場所:" . $keyword_place;
        } else {
            $items = null;
            $message = "検索結果はありません。";
        }

        return  [$items, $message];
    }
}
