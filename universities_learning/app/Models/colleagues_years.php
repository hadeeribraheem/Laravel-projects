<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colleagues_years extends Model
{
    use HasFactory;

    protected $fillable = ['college_id','year_id'];

    public function year()
    {
        return $this->belongsTo(years::class,'year_id');
    }
    public function collage()
    {
        return $this->belongsTo(colleagues::class, 'college_id');
    }
}
