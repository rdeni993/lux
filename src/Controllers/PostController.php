<?php

namespace Rdeni\Lux\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Rdeni\Lux\Data\Posts\PostDTO;
use Rdeni\Lux\Models\Post;
use Rdeni\Lux\Requests\Posts\StorePostRequest;
use Rdeni\Lux\Response\WebResponse;
use Rdeni\Lux\Services\StorePostService;

class PostController extends Controller
{
    /**
     * @param StorePostRequest
     * @param StorePostService
     *
     * @return RedirectResponse
     */
    public function store(StorePostRequest $request, StorePostService $service) : RedirectResponse
    {
        $postData = PostDTO::from($request->validated());

        $service->prepare($postData);
        $newPost = $service->store();

        if($newPost->getSuccessStatus() && ($newPost->getData() instanceof Post)) {
            return WebResponse::success(data:[
                'post' => $newPost->getData()
            ]);
        }

        return WebResponse::failed();
    }

    public function create() : View
    {
        return view('welcome');
    }
}