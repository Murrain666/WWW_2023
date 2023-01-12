<?php 

require_once 'data.php';
require_once 'functions.php';
require_once 'dbcon.php';

if (!empty($_POST)) {
    //debug($_POST);
    $fields = load($fields);
      
    //debug($fields);

    if($errors = validate($fields)) {
        debug($errors);
        //Останавливаем скрипт
        exit();
    }
    
    $result_query_select = $mysqli->query("SELECT id, Famil, Imya, Epochta FROM `confuch`");
        
    echo 'В БД записаны пользователи';
    foreach ($result_query_select as $row) {
        echo '<p> id= '.$row['id'].'Фамилия '.$row['Famil'].'. Имя '.$row['Imya'].'Email '.$row['Epochta'].'</p>';
    }
    
    $fname=mysqli_real_escape_string($mysqli, $fields['famil']['value']);
    $nname=mysqli_real_escape_string($mysqli, $fields['name']['value']);
    $sname=mysqli_real_escape_string($mysqli, $fields['otch']['value']);
    $email=mysqli_real_escape_string($mysqli, $fields['email']['value']);
    $phone=mysqli_real_escape_string($mysqli, $fields['phone']['value']);
    $bdate=mysqli_real_escape_string($mysqli, $fields['bdate']['value']);
    $dsect=mysqli_real_escape_string($mysqli, $fields['Dsect']['value']);
    $dokl=0;
    $tdokl=mysqli_real_escape_string($mysqli, $fields['Csubject']['value']);

    if (isset($_POST['CheckDokl']))
    {
        $dokl = 1;
    }

    $sql = "INSERT INTO `confuch` (Famil, Imya, Otch, Epochta, Telefon, Bdate, ConfSect, Doklad, TemaDocl) VALUES
             ('$fname', '$nname', '$sname', '$email', '$phone', '$bdate', '$dsect', '$dokl', '$tdocl')";
            
    $result_query_insert = $mysqli->query($sql);
    
    if ($result_query_insert === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $result_query_select = $mysqli->query("SELECT id, Famil, Imya, Epochta FROM `confuch`");
        
    echo 'В БД записаны пользователи';
    foreach ($result_query_select as $row) {
        echo '<p> id= '.$row['id'].'Фамилия '.$row['Famil'].'. Имя '.$row['Imya'].'Email '.$row['Epochta'].'</p>';
    }

    $mysqli->close();
}
    
?>

