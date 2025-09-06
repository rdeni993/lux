<?php

namespace Rdeni\Lux\Response;

use Illuminate\Http\RedirectResponse;

class WebResponse
{
    /**
     * @param string
     * @param string
     * @param array
     *
     * @return RedirectResponse
     */
    public static function success(string $message = '', string $redirectTo = '', array $data = []) : RedirectResponse
    {
        // Set response on proper way
        $response = [
            'success' => true,
            'message' => $message,
            'data' => $data
        ];

        // Response
        return (! empty($redirectTo)) ?
            redirect($redirectTo)->with($response) :
            back()->with($response);
    }

    /**
     * @param string
     * @param string
     * @param array
     *
     * @return RedirectResponse
     */
    public static function failed(string $message = '', string $redirectTo = '', array $errors = [] ) : RedirectResponse
    {
        // Prepare response
        $response = [
            'success' => false,
            'message' => $message,
        ];

        // Respond
        if(! empty($redirectTo)) {
            return redirect($redirectTo)
                    ->withErrors($errors)
                    ->with($response);
        } else {
            return back()
                    ->withErrors($errors)
                    ->with($response);
        }
    }
}