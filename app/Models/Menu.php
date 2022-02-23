<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_name',
        'price',
        'description',
        'stock',
    ];

    // public function transaction()
    // {
    //     return $this->hasMany(Transaction::class);
    // }
}
