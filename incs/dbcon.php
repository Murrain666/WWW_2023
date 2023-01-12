<?php
        // Указываем кодировку
        header('Content-Type: text/html; charset=utf-8');

        $server = "localhost"; // локальный сервер localhost
        $username = "root"; // Имя пользователя БД
        $password = ""; // Пароль пользователя
        $database = "MaZna"; // Имя базы данных
        
        // Подключение к базе данных через MySQLi
        $mysqli = new mysqli($server, $username, $password, $database);

        // Проверяем, успешность соединения. 
        if ($mysqli->connect_errno) { 
            die("<p><strong>Ошибка подключения к БД</strong></p><p><strong>Код ошибки: </strong> ". $mysqli->connect_errno ." </p><p><strong>Описание ошибки:</strong> ".$mysqli->connect_error."</p>"); 
        }

        // Устанавливаем кодировку подключения
        $mysqli->set_charset('utf8');

    ?>