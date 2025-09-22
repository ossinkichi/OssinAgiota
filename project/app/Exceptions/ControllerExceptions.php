<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class ControllerExceptions extends Exception
{
    public static function fromMessage(Throwable $throwable, int $statusCode = 500)
    {
        return \response()->json(data: [
            'error' => 'Erro ao buscar clientes',
            'exception' => $throwable->getMessage(),
            'file' => $throwable->getFile(),
            'line' => $throwable->getLine()
        ], status: $statusCode);
    }
}
