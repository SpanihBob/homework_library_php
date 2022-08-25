<?
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once "$path/system/db.php";
    
    $_POST['searchName'] = trim($_POST['searchName']);                                //Удаляет пробелы (или другие символы) из начала и конца строки
    $_POST['searchName'] = htmlspecialchars($_POST['searchName']);                    //Преобразует специальные символы в HTML-сущности

    $_POST['searchLastName'] = trim($_POST['searchLastName']);                                
    $_POST['searchLastName'] = htmlspecialchars($_POST['searchLastName']);                    

    $_POST['searchDate'] = trim($_POST['searchDate']);                                
    $_POST['searchDate'] = htmlspecialchars($_POST['searchDate']);                    

    $_POST['searchEmail'] = trim($_POST['searchEmail']);                              
    $_POST['searchEmail'] = htmlspecialchars($_POST['searchEmail']);                  

    $_POST['searchLogin'] = trim($_POST['searchLogin']);                              
    $_POST['searchLogin'] = htmlspecialchars($_POST['searchLogin']);                  

    $_POST['searchPassword'] = trim($_POST['searchPassword']);                              
    $_POST['searchPassword'] = htmlspecialchars($_POST['searchPassword']);

    $_POST['searchPassword2'] = trim($_POST['searchPassword2']);                              
    $_POST['searchPassword2'] = htmlspecialchars($_POST['searchPassword2']);
    
    $regesName = "/[A-Za-zА-ЯЁа-яё]/ui";
    $regesDate = "/\b((19[0-9][0-9])|(20[0-9][0-9]))-((0[1-9])|(1[0-2]))-(0[1-9]|[1-2][0-9]|3[0-1])\b/u";
    $regesEmail = "/\b[A-Za-zА-ЯЁа-яё]+@[A-Za-zА-ЯЁа-яё]+\.[A-Za-zА-ЯЁа-яё]+\b/ui";
    $regesLogin = "/[^#<>*+=;]/ui";

    $time=time();

    if($_POST['searchName']=="") {
        $errors[]="введите имя";
    }
    if($_POST['searchLastName']=="") {
        $errors[]="введите фамилию";
    }
    if($_POST['searchDate']=="") {
        $errors[]="введите дату рождения";
    }
    if($_POST['searchLogin']=="") {
        $errors[]="введите login";
    }
    if($_POST['searchPassword']=="") {
        $errors[]="введите пароль";
    }
    if($_POST['searchPassword']!==$_POST['searchPassword']) {
        $errors[]="пароли не совпадают";
    } 
    

    $searchData=$dbPDO->query("SELECT `id` FROM `users` WHERE 
                                                `visitor_name`='$_POST[searchName]'
                                                AND `visitor_last_name`='$_POST[searchLastName]'
                                                AND `visitor_date`='$_POST[searchDate]'
    ");

    if($searchData -> rowCount() > 0) {                          //если колличество строк > 0
        if(empty($errors)) {            
        echo "<span style='color:red'>Такой посетитель уже зарегистрирован!</span>";
    }}
    else {
        $_POST['searchPassword']=password_hash($_POST['searchPassword'],PASSWORD_DEFAULT); //хэшируем(шифруем) пароль 
    
        if (
                preg_match($regesName, $_POST['searchName']) 
                && preg_match($regesName, $_POST['searchLastName'])
                && preg_match($regesDate, $_POST['searchDate'])
                && preg_match($regesEmail, $_POST['searchEmail'])
                && preg_match($regesLogin, $_POST['searchLogin']) ) {
        $dbPDO->query("INSERT INTO `users`(`visitor_name`, 
                                `visitor_last_name`, 
                                `visitor_date`, 
                                `visitor_email`,
                                `login`, 
                                `password`, 
                                `time_signup`
                                ) 
        VALUES ('$_POST[searchName]',
                '$_POST[searchLastName]',
                '$_POST[searchDate]',
                '$_POST[searchEmail]',
                '$_POST[searchLogin]', 
                '$_POST[searchPassword]',
                '$time'
                )");
        $_SESSION['signup']=true;
     }        
        echo "<span style='color:green'>Все в порядке!</span>";
    }
?>
