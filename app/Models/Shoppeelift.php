<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoppeelift extends Model
{
    //
    use HasFactory;
    // Define the fillable fields
    protected $table = 'shoppeelifts';

    # Define the fillable  attributes for mass assignment
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
    ];
}
