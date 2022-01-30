<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $fillable = [
        'id',
        // 'user_id',
        'name',
        'image_name',
        'place',
        'stock',
        'threshold',
        'updated_at',
        'created_at',
        ];

        /*
        * アイテムを保有するユーザーの取得
        */
        public function user()
        {
            return $this->belongsTo(User::class);
        }
}
