<?
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once "$path/system/db.php"; //подкл. к БД
    session_start();                    //вкл. сессию
    
    $addToFavor = $dbPDO -> query("SELECT favorites FROM users WHERE login = $_SESSION[login]");

    if($addToFavor->rowCount()>0) {
        $addToObjectFavor = $addToFavor->fetch(PDO::FETCH_ASSOC);

        if(!$addToObjectFavor['favorites']) {
            $dataObject = $addToObjectFavor['favorites'];
        }
        else {
            $dataObject = $addToObjectFavor['favorites'].",";
        }
        
        $newObject = $_POST['favorites'];
        if(stripos($dataObject, $newObject)===false) {      //делаем поиск подстроки в строке в избранных, если совпадений нет, то добавляем новую запись   
            $dataObject .= $newObject;
       
        echo "<pre>";
            print_r($dataObject);
        echo "</pre>";
        
        $dbPDO -> query("UPDATE `users` SET `favorites`='$dataObject' WHERE login = '$_SESSION[login]'");//если товар в корзине есть, то добавляем запись в таблицу
        }
    }
?> 