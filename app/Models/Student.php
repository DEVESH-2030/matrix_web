<?php

namespace App\Models;

use App\Models\University;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'university_id',
        'first_name',
        'last_name',
        'email',
        'mobile',
        'status',
    ];

    /**
     * Relation with university
     */
    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
