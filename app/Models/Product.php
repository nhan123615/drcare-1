<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price'
    ];

    public function category() {
        $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
}
