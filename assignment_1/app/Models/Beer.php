<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beer extends Model
{
    use SoftDeletes;

    protected $fillable = ['brewery_id', 'abv', 'ibu', 'name', 'style', 'ounces'];
}
