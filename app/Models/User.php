<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use HasApiTokens, HasFactory, Notifiable;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * 日付へキャストする属性
     *
     * @var array
     */
    protected $users = ['deleted_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * ユーザーの保持する全アイテム・タグ・カテゴリー
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    public function tags()
    {
        return $this->hasMany(Tags::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // カテゴリー取得
    public function categorysearch()
    {
        $categorysearch = $this->select('categories.*')
            ->join('items', 'users.id', '=', 'items.user_id')
            ->join('categories', 'items.category_id', '=', 'categories.id')
            ->where('users.id', $this->id)
            ->distinct()
            ->get();
        return $categorysearch;
    }

    // タグ取得
    public function tagsearch()
    {
        $tagsearch = $this->select('tags.*')
            ->join('items', 'users.id', '=', 'items.user_id')
            ->join('item_tags', 'items.id', '=', 'item_tags.item_id')
            ->join('tags', 'item_tags.tag_id', '=', 'tags.id')
            ->where('users.id', $this->id)
            ->distinct()
            ->get();
        return $tagsearch;
    }

    // list画面のアイテム取得
    public function listitem($category_id)
    {
        $listitem = $this->select('items.*')
            ->join('items', 'users.id', '=', 'items.user_id')
            ->join('categories', 'items.category_id', '=', 'categories.id')
            ->where('users.id', $this->id)
            ->where('categories.id', $category_id)
            ->get();
        return $listitem;
    }

    // 在庫不足取得
    public function shortage()
    {
        // $shortage = $this->select('items.id', 'items.name','items.image_name','items.stock')
        $shortage = $this->select('items.*')
            ->join('items', 'users.id', '=', 'items.user_id')
            ->where('users.id', $this->id)
            ->whereColumn('items.stock', '<', 'items.threshold')
            ->get();
        return $shortage;
    }

        // 検索機能

        // 独自
// public function itemsearch()
// {
//     $itemsearch = $this->select('items.*')
//         ->join('items', 'users.id', '=', 'items.user_id')
//         ->join('item_tags', 'items.id', '=', 'item_tags.item_id')
//         ->join('tags', 'item_tags.tag_id', '=', 'tags.id')
//         ->where('users.id', $this->id)
        
//         ->where()
//         ->get()
// return $itemsearch;
// }






    //    Qiita 
/**
 * 絞り込み・キーワード検索
 * @param \Illuminate\Database\Eloquent\Builder
 * @param array
 * @return \Illuminate\Database\Eloquent\Builder
 */
// public function scopeSearch(Builder $query,array $params): Builder
// {
//     // カテゴリー絞り込み
//     if(!empty($params['category'])) $query->where('category',$params['category'])
// }



        
        // public function itemsearch(Request $request)
        // {
        //     $keyword_name = $request->input('keyword');
        //     $keyword_category = $request->input('category');
        //     $keyword_tag = $request->input('tag');
        //     $keyword_place = $request->input('place');
    
            
    
        //     return $itemsearch();
        // }    
}
