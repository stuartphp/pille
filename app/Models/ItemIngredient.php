<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemIngredient extends Model
{
    use HasFactory;
    protected $table ='item_ingredients';
    protected $fillable =[
        'item_id',
        'name',
        'unit',
        'strength'
    ];
}
