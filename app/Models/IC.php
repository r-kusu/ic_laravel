<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IC extends Model
{
    use HasFactory;
    protected $table = 'ICs';
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'updated_at',
        'created_at',
        ];
}
