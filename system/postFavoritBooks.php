<?
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once "$path/system/db.php"; //подкл. к БД
    session_start(); 

    $query = $dbPDO->query("SELECT favorites FROM `users` WHERE login = '$_SESSION[login]'");
    $numbersOfSelectedBooks = $query->fetch(PDO::FETCH_ASSOC);
    $numString = "({$numbersOfSelectedBooks['favorites']})";

    $queryToFavorites = $dbPDO -> query("SELECT * FROM books WHERE id IN $numString");   

    echo json_encode($queryToFavorites->fetchAll(PDO::FETCH_ASSOC));    //выводит всю таблицу
    // print_r($query->fetch(PDO::FETCH_ASSOC));       //выводит одну строку таблицы
    // json_encode() - переводит массив или обьект в формат JSON тип данных строка
    // echo json_encode($query->fetchAll(PDO::FETCH_ASSOC));    //выводит всю таблицу
    


?>