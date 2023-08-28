<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchedKeyword extends Model {
    use HasFactory;

    protected $fillable = [
        'keyword',
        'hits',
    ];

    public $timestamps = false;
}
