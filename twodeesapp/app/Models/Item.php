<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ["name", "release_date", "category_id"]; //Technique to enable mass assignment.

    //Establishing a relationship between Item and Category model (one-to-many relationship whereby one category can be assigned to many items).
    public function categories() {
        return $this->hasMany(Category::class);
    }
}