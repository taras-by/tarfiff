<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($request->wantsJson() || $request->isJson()) {

            $status = Response::HTTP_BAD_REQUEST;

            if ($exception instanceof ValidationException && $exception->errors()) {
                $response = $exception->errors();
                $status = $exception->status;
            }else{
                $response = [
                    'errors' => 'Sorry, something went wrong.'
                ];
                if (config('app.debug')) {
                    $response = array_merge($response,[
                        'exception' => get_class($exception),
                        'message' => $exception->getMessage(),
                        'trace' => $exception->getTrace(),
                    ]);
                }

                if ($this->isHttpException($exception)) {
                    $status = $exception->getStatusCode();
                }
            }

            return response()->json($response, $status);
        }

        return parent::render($request, $exception);
    }
}
