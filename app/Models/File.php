<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file_name',
        'file_path',
        'file_size',
        'file_type',
        'description',
        'fileable_type',
        'fileable_id'
    ];


}
