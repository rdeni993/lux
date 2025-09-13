<?php

namespace Rdeni\Lux\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    /**
     * @return string
     */
    protected $table = 'posts';

    /**
     * @return array
     */
    protected $fillable = [
        'title', // required by user
        'slug', // auto. generated
        'body', // nullable
        'user_id' // auto. injected
    ];

    /**
     * @return belongsTo
     */
    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}