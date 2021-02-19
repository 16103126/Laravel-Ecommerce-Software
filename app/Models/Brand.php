<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Brand extends Model
{
    public $fillabe=[
        'name',
        'image',
        'description'
    ];
    
    public function products()
    {
        return $this->hasMany(Brand::class);
    }
}
