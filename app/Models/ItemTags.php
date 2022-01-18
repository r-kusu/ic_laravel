<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTags extends Model
{
    use HasFactory;
    protected $table = 'item_tags';
    protected $fillable = [
    'item_id',
    'tag_id',
    'updated_at',
    'created_at',
    ];
}
