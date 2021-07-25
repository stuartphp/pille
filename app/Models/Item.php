<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $fillable =[
        'nappi_code',
        'regno',
        'schedule',
        'name',
        'description',
        'category',
        'dosage_form',
        'pack_size',
        'num_packs',
        'cost_price',
        'cost_per_unit',
        'dispensing_fee',
        'add_on_fee',
        'image',
        'is_generic',
    ];
}

