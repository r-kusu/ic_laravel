<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'id',
        'name',
        'updated_at',
        'created_at',
    ];

    /**
     * カテゴリーを保有するユーザーの取得
     */
    public function item_id()
    {
        return $this->belongsTo(Item::class);
    }
}
