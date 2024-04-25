<?php

namespace App\Http\Controllers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Validator;

class Controller
{
    public function redirectTo(string $path): never
    {
        header('Location: ' . $path);
        exit();
    }

    public function validate(array $data, array $rules, array $messages = []): array
    {

        $files = new Filesystem();
        $loader = new FileLoader($files, LANG_PATH);

        $translator = new Translator($loader, 'en');
        $validator = new Validator($translator, $data, $rules, $messages);

        return $validator->errors()->getMessages();
    }
}

