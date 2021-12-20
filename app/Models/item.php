<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'image_name',
        'stock',
        'threshold',
        'updated_at',
        'created_at',
        ];
}
