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

    //中間テーブルのリレーション設定

    public function item(){
        return $this->belongsToMany(item::class,'item_tags','item_id','tag_id');
    } 
    
}
