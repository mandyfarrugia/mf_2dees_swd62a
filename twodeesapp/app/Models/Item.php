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
        /* In this case, belongsTo assumes a one-to-one/many relationship between source and target table,
           the foreign key constraint should already exist in the source table (in this case, the Item table) to link to the common attribute within the target table 
           (in our case, the attribute within the Category model). */
        return $this->belongsTo(Category::class);
    }
}