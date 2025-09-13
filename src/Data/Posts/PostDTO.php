<?php

namespace Rdeni\Lux\Data\Posts;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Spatie\LaravelData\Data;
use Illuminate\Support\Str;
use Rdeni\Lux\Models\Post;

class PostDTO extends Data
{
    /**
     * @var string
     */
    public string $title;

    /**
     * @var string
     */
    public string $body = '';

    /**
     * @var string
     */
    public string $slug;

    /**
     * @var int
     */
    public int $user_id;

    public function __construct(
        string $title = '',
        string $body = '',
    )
    {
        $this->title = $title;
        $this->body = $body;

        // Generate unique slug
        $this->slug = $this->generateUniqueSlug($title);

        // Inject author
        $this->injectAuthor();
    }

    /**
     * @param string
     * @param mixed
     */
    protected function generateUniqueSlug(string $title, $suffix = '')
    {
        // Slug draft
        $slug = Str::slug($title . ($suffix ? '-' . $suffix : ''));

        // Check is slug exists
        if (Post::where('slug', $slug)->exists()) {
            $nextSuffix = $suffix === '' ? 1 : $suffix + 1;
            return $this->generateUniqueSlug($title, $nextSuffix);
        }

        // Return new slug
        return $slug;
    }

    /**
     * @return void
     */
    protected function injectAuthor() : void
    {
        if(Auth::check()) {
            $this->user_id = Auth::id();
        } else {
            throw new AuthenticationException();
        }
    }
}
