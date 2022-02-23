<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'menu_name',
        'qty',
        'total',
        'employee_name',
    ];

    // public function menu()
    // {
    //     return $this->belongsTo(Menu::class);
    // }
}
