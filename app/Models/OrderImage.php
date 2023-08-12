<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getFileUrlAttribute()
    {
        return $this->imgname = Storage::url($this->imgname);
    }
}
