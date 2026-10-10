<?php

namespace App\Models;

use Database\Factories\ImageFactory;
use Illuminate\Database\Eloquent\Attributes\Appends;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[Appends(['url'])]
class Image extends Model
{
    /** @use HasFactory<ImageFactory> */
    use HasFactory;

    public function getUrlAttribute(): string
    {
        return Storage::url('images/'.$this->name);
    }
}
