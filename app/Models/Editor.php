<?php

namespace App\Models;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Editor extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'password',
    ];

    public function section(): HasMany {
        return $this->hasMany(Section::class);
    }

    public function product(): HasMany {
        return $this->hasMany(Product::class);
    }

}
