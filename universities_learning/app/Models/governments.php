<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class governments extends Model
{
    use HasFactory;
    use SoftDeletes;
   // protected $primaryKey = 'government_id'; // Update with your new column name

    protected $fillable = ['name', 'info'];

}
