<?php

namespace App\Exceptions;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
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

    public function render($request, Throwable $exception)
    {
        // Custom render.
        if ($exception instanceof QueryException) {
//            return response()->view('errors.query', [], 500);
            return redirect()->back()->with('error', "อัพเดตข้อมูลเรียบร้อย");
        }

        // Add extra custom render.
        if ($exception instanceof ModelNotFoundException) {
            return response()->view('errors.not_found', [], 500);
        }

        // Default render.
        return parent::render($request, $exception);
    }
}
