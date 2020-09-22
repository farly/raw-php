<?php

namespace vendor\Yaml;

class YamlLoader
{
    public function __construct()
    {

    }


    public function parse($file)
    {
        try {
            $parsedFile = yaml_emit_file($file);
        } catch(Exception $exception) {
            die($exception->getMessage());
        }

        return $parsedFile;
    }
}