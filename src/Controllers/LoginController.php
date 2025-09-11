<?php

namespace Rdeni\Lux\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /**
     * @return View
     */
    public function index() : View
    {
        return view('welcome');
    }

    /**
     * @return RedirectResponse
     */
    public function action() : RedirectResponse
    {
        return back();
    }
}