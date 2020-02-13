<?php

class FileWriter
{
    public $file;
    public $path;

    public function __construct($fileName)
    {
        $this->path = dirname(__DIR__) . '/';
        $this->file = fopen($this->path . $fileName, 'a+');
    }

    public function write($str)
    {
        fwrite($this->file, $str);
    }

    public function __destruct()
    {
        fclose($this->file);
    }
}