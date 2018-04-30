<?php

/*
  These functions provide an abstraction of properties file-based storage
  for user information that is represented as associative array.
  Each array holds an information about a user and consists of such
  properties like "firstName", "lastName", "age", etc.
*/

declare(strict_types=1);

require_once "properties.inc.php";


// Конструирует имя файла для сохранения пользователя
function construct_file_name(array $userInfo): string {
    $firstName = $_POST['firstName'] or die("User info has no first name");
    $lastName = $_POST['lastName'] or die("User info has no last name");
    $fileName = $firstName . "_" . $lastName .".properties";

    return $fileName;
} 

function person_dir(): string {
    return isset($_SERVER['DOCUMENT_ROOT']) ? ($_SERVER['DOCUMENT_ROOT'] . '/persons/') : './persons/';
}

// Конструирует полный путь к properties файлу
function person_file(string $fileName): string {
    return person_dir() . $fileName;
}

// Возвращает список имен всех файлов с пользователями
function all_person_files(): array {
    $result = array();
    // Получаем все файлы/папки в каталоке с пользователями и
    // отфильтровываем папки с именами . и ..
    foreach (scandir(person_dir()) as $fileName) {
        if ($fileName != '.' && $fileName != '..') {
           $result[] = $fileName; 
        }
    }
    return $result;
}

// Записывает текст в файл
function write_to_file(string $fileName, string $text) {
    if (!is_dir(person_dir())) {
        mkdir(person_dir(), 0777);
    }
    $fp = fopen(person_file($fileName), 'w');
    fwrite($fp, $text);
    fclose($fp);
}

// Вычитывает пользователя из properties файла, и возвращает как ассоциативный массив
function read_from_file(string $fileName): array {
    $rawText = file_get_contents(person_file($fileName));
    $lines = array_filter(explode("\n", $rawText));

    $result = array();
    foreach ($lines as $line) {
        $prop = explode('=', $line);
        $result[trim($prop[0])] = trim($prop[1]);
    }
    return $result;
}

?>
