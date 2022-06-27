<?php

namespace Electro\App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{

    use HasFactory;


    protected $table = "news";

    protected $fillable = [
        "slug",
        "title",
        "content",
        "image"
    ];


}