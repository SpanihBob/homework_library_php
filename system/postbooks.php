<?
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once "$path/system/db.php"; //подкл. к БД
    

    // if($_GET['msgid']==0) {
        $query = $dbPDO->query("SELECT * FROM `books`");
    // выводим построчно
    echo "<pre>";
    // print_r($query->fetch(PDO::FETCH_ASSOC));       //выводит одну строку таблицы
    // json_encode() - переводит массив или обьект в формат JSON тип данных строка]
        echo json_encode($query->fetchAll(PDO::FETCH_ASSOC));    //выводит всю таблицу
    echo "<pre>";

    // }
    
?>