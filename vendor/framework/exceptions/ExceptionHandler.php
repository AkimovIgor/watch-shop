<?php

namespace FW\Exceptions;

class ExceptionHandler
{
    public function __construct()
    {
        if (DEBUG) {
            ini_set("error_reporting", -1);
            ini_set("display_errors", "On");
        } else {
            ini_set("error_reporting", 0);
            ini_set("display_errors", "Off");
        }
        set_exception_handler([$this, 'handler']);
    }

    public function handler(\Exception $e)
    {
        $this->logError($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function logError($message, $file, $line, $type = 3)
    {
        $destination = ROOT . '/tmp/logs/errors.log';
        error_log("[" . date('Y-m-d H:i:s') . "] | Text: {$message} | File: {$file} | Line: {$line}\n================\n", $type, $destination);
    }

    protected function displayError($code, $message, $file, $line, $response = 404)
    {
        http_response_code($response);
        if ($response == 404 && !DEBUG) {
            require_once WEB . '/errors/404.php';
        } else {
            if (DEBUG) {
                require_once WEB . '/errors/dev.php';
            } else {
                require_once WEB . '/errors/prod.php';
            }
        }
        die;
    }
}