<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * ユーザーの保持する全アイテム
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
    public function search()
    {
        $search = $this->select('categories.id', 'categories.name')
            ->join('items', 'users.id', '=', 'items.user_id')
            ->join('categories', 'items.category_id', '=', 'categories.id')
            ->where('users.id', $this->id)
            ->distinct()
            ->get();
        return $search;
    }
    public function tagsearch()
    {
        $tagsearch = $this->select('tags.id', 'tags.tag_name')
            ->join('items', 'users.id', '=', 'items.user_id')
            ->join('item_tags', 'items.id', '=', 'item_tags.item_id')
            ->join('tags', 'item_tags.tag_id', '=', 'tags.id')
            ->where('users.id', $this->id)
            ->distinct()
            ->get();
        return $tagsearch;
    }

    public function shortage()
    {
        $shortage = $this->select('categories.id', 'categories.name')
            ->join('items', 'users.id', '=', 'items.user_id')
            ->where('users.id', $this->id)
            ->whereColumn('stock', '<', 'threshold')
            ->get();
        return $shortage;
    }
}
