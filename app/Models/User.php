<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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

    // 保管場所取得
    public function placesearch()
    {
        $placesearch = $this->select('items.id', 'items.place')
            ->join('items', 'users.id', '=', 'items.user_id')
            ->where('user.id', $this->id)
            ->distinct()
            ->get();
        return $placesearch;
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
}