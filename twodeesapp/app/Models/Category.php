<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ["name"]; //Technique to enable mass assignment yet again, although in the case overkill since model is only made up of one attribute apart from the id and timestamps.

    //Establishing a relationship between Item and Category model (one-to-many relationship whereby one category can be assigned to many items).
    public function items() {
        /* Assume a one-to-one/many relationship between Category and Item. 
           The foreign key attribute must exist within the target table, in this case Item. */
        return $this->hasMany(Item::class);
    }
}