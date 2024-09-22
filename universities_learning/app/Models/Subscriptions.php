<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriptions extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'subject_id',
        'price',
        'islocked',
        'discount',
        'note'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

    public function subject()
    {
        return $this->belongsTo(Subjects::class, 'subject_id')->withTrashed();
    }
}
