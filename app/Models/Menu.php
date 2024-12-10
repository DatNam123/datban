<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Menu extends Model
{
    use HasFactory, Searchable;
    protected $fillable = ['name', 'price', 'description', 'image'];
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
