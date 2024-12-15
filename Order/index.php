<?php

        spl_autoload_register(function($classname) {
                $filename = 'classes/'.str_replace('\\', '/', $classname).'.php';
                if (file_exists($filename)) {require_once $filename;}
        });