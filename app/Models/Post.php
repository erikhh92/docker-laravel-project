<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\PostCreated;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'email', 'iban', 'text'];

    protected $appends = ['author'];

    protected $dispatchesEvents = [
        'created' => PostCreated::class
    ];

    public function getAuthorAttribute()
    {
        return $this->user->name;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
