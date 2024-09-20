<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class colleagues extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['government_id', 'name', 'info'];

    public function government()
    {
        return $this->belongsTo(Governments::class, 'government_id')->withTrashed();
    }
    /*public function years()
    {
        return $this->hasMany(colleagues_years::class,'college_id');
    }*/
    public function years()
    {
        return $this->belongsToMany(
            years::class,          // Related model
            colleagues_years::class, // Pivot table
            'college_id',           // Foreign key on the pivot table for the current model
            'year_id'               // Foreign key on the pivot table for the related model
        )->withPivot('updated_at')->as('middle_table');
    }

}
