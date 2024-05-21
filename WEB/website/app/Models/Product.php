<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define the table name if it doesn't follow Laravel's naming convention
    protected $table = 'products';

    // Define the fillable fields if you are using mass assignment
    protected $fillable = ['items', 'description', 'item_icon', 'image1', 'image2'];
}
