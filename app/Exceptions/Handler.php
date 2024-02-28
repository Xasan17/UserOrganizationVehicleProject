<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * @param $request
     * @param Exception $exception
     * @throws Throwable
     */
    public function render($request, Throwable $e):JsonResponse
    {
        if ($e instanceof EnsureTokenException) {
            return $this->handleEnsureTokenException($e);
        }

        return parent::render($request, $e);
    }

    protected function handleEnsureTokenException(EnsureTokenException $e):JsonResponse
    {
        $response = [
            'error' => $e->getMessage(),
        ];

        return new JsonResponse($response, $e->getCode());
    }
}

