<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Item extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'items';
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'image_name',
        'place',
        'stock',
        'threshold',
        'category_id',
        'updated_at',
        'created_at',
        ];
    
    //中間テーブルのリレーション設定

    public function Tags(){
        return $this->belongsToMany(Tags::class,'item_tags','item_id','tag_id');
    }

    
}
