<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id', 'name', 'info', 'price','quantity'];
    public function images()
    {
        return $this->morphMany(Images::class, 'imageable');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
