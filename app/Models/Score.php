<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    /**
     * The $fillable array specifies which fields are allowed for mass assignment.
     * If a field is not included,
     * Laravel will throw a MassAssignmentException for security reasons.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'score',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
