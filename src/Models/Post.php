<?php

namespace Rdeni\Lux\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    /**
     * @var string
     */
    protected $table = 'posts';

    /**
     * @var array
     */
    protected $attributes = [
        'status' => 'draft'
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'title', // required by user
        'slug', // auto. generated
        'body', // nullable
        'status', // draft is default
        'user_id', // auto. injected
    ];

    /**
     * @return belongsTo
     */
    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}