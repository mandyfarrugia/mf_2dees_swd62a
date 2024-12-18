<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ["name"]; //Technique to enable mass assignment yet again, although in the case overkill since model is only made up of one attribute apart from the id and timestamps.
}
