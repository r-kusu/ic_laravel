<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tags extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tags';
    protected $fillable = [
        'id',
        'tag_name',
        'updated_at',
        'created_at',
        ];

    //中間テーブルのリレーション設定

    public function item(){
        return $this->belongsToMany(item::class,'item_tags','item_id','tag_id');
    } 

    /**
     * ユーザーの保持する全アイテム
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }

}
