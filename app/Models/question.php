<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_title',
        'question_description',
        'user_id',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
