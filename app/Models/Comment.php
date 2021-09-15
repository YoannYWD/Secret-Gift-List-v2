<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'gift_id'
    ];

    //Cardinalité
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function gift() {
        return $this->belongsTo(Gift::class);
    }
}
