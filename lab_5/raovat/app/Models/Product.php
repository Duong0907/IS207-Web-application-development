<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'Id',
        'ProductName',
        'SalePrice',
        'CategoryName',
        'ImageLink',
        'ProductLink'
    ];
    
    use HasFactory;
}
