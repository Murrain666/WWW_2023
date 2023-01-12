<?php

function debug($data) {
    echo '<pre>' . print_r($data, true) . '</pre>';
}

function load($data) {
    foreach ($_POST as $k => $v) {
        if(array_key_exists($k, $data)) {
            $data[$k]['value'] = trim($v);
        }
    }
    return $data;
}

function validate($data){
    $errors = '';
    foreach ($data as $k => $v) {
        if($data[$k]['required'] && empty($data[$k]['value'])) {
            $errors .= "<li>Не заполнено обязательное поле {$data[$k]['field_name']} </li>";
        }
    }
    return $errors;
}

function IsChecked($chkname,$value)
    {
        if(!empty($_POST[$chkname]))
        {
            foreach($_POST[$chkname] as $chkval)
            {
                if($chkval == $value)
                {
                    return true;
                }
            }
        }
        return false;
    }