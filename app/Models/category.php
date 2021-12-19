<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'id',
        'item_id',
        'key',
        'value',
        'updated_at',
        'created_at',
        ];
}
