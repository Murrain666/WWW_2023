<?php 
require_once 'kdat.php';
require_once 'functions.php';

if (!empty($_POST)) {
    //debug($_POST);
    $fields = load($fields);
      
    debug($fields);

    if($errors = validate($fields)) {
        debug($errors);
        //Останавливаем скрипт
        exit();
    }
}
?>