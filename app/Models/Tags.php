<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $fillable = [
        'id',
        'tag_name',
        'updated_at',
        'created_at',
    ];

    /**
     * ユーザーの保持する全アイテム
     */
    // public function tags()
    // {
    //     return $this->hasMany(Tag::class);
    // }
}
