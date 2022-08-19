<?
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once "$path/system/db.php"; 

    $_POST['searchLogin'] = trim($_POST['searchLogin']);                                //Удаляет пробелы (или другие символы) из начала и конца строки
    $_POST['searchLogin'] = htmlspecialchars($_POST['searchLogin']);                    //Преобразует специальные символы в HTML-сущности

    $query=$db->query("SELECT `id` FROM `users` WHERE `login` = '$_POST[searchLogin]'");
    // print_r($db);
    if($query->num_rows>0) {//если колличество строк > 0
        echo "login занят";
    }
    else {
        echo "login свободен";
    }
?>