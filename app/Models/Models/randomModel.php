<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class randomModel extends Model
{
    use HasFactory;
    protected $table = "random1";
    public $timestamps = false;

    protected $fillable = [
        
        'uniq',
        'value'
    ];
}
