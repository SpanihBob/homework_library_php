<?
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once "$path/system/db.php";
    
    $_POST['searchName'] = trim($_POST['searchName']);                                //Удаляет пробелы (или другие символы) из начала и конца строки
    $_POST['searchName'] = htmlspecialchars($_POST['searchName']);                    //Преобразует специальные символы в HTML-сущности

    $_POST['searchLastName'] = trim($_POST['searchLastName']);                                //Удаляет пробелы (или другие символы) из начала и конца строки
    $_POST['searchLastName'] = htmlspecialchars($_POST['searchLastName']);                    //Преобразует специальные символы в HTML-сущности

    $_POST['searchDate'] = trim($_POST['searchDate']);                                //Удаляет пробелы (или другие символы) из начала и конца строки
    $_POST['searchDate'] = htmlspecialchars($_POST['searchDate']);                    //Преобразует специальные символы в HTML-сущности

    $_POST['searchEmail'] = trim($_POST['searchEmail']);                                //Удаляет пробелы (или другие символы) из начала и конца строки
    $_POST['searchEmail'] = htmlspecialchars($_POST['searchEmail']);                    //Преобразует специальные символы в HTML-сущности

    $_POST['searchLogin'] = trim($_POST['searchLogin']);                                //Удаляет пробелы (или другие символы) из начала и конца строки
    $_POST['searchLogin'] = htmlspecialchars($_POST['searchLogin']);                    //Преобразует специальные символы в HTML-сущности

    
    // if()
    $searchData=$dbPDO->query("SELECT `id` FROM `users` WHERE 
                                                `visitor_name`='$_POST[searchName]'
                                                AND `visitor_last_name`='$_POST[searchLastName]'
                                                AND `visitor_date`='$_POST[searchDate]'
                                                -- AND `visitor_email`='$_POST[searchEmail]'
                                                -- AND `login`='$_POST[searchLogin]'
    ");

    if($searchData -> rowCount() > 0) {                          //если колличество строк > 0
        echo "<span style='color:red'>Такой посетитель уже зарегистрирован!</span>";
    }
    else {
        echo "<span style='color:green'>Все в порядке!</span>";
    }
?>
