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

    /**
     * Обработать исключение
     *
     * @param \Exception $e
     */
    public function handler(\Exception $e)
    {
        $this->logError($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    /**
     * Залогировать ошибки
     *
     * Записать в лог файл все возникшие ошибки и исключения
     *
     * @param string $message Текст сообщения об ошибке
     * @param string $file Имя файла, в котором произошла ошибка
     * @param int $line Строка кода, на которой произошла ошибка
     * @param int $type Тип записи ошибки
     */
    protected function logError($message, $file, $line, $type = 3)
    {
        $destination = ROOT . '/tmp/logs/errors.log';
        error_log("[" . date('Y-m-d H:i:s') . "] | Text: {$message} | File: {$file} | Line: {$line}\n================\n", $type, $destination);
    }

    /**
     * Отобразить ошибку
     *
     * Подключить определённый шаблон отображения ошибок
     *
     * @param int|string $code Код ошибки
     * @param string $message Текст ошибки
     * @param string $file Файл, в котором произошла ошибка
     * @param int $line Номер строки кода, на которой произошла ошибка
     * @param int $response HTTP код ответа с сервера
     */
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
