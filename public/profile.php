<?    
    // $path=$_SERVER['DOCUMENT_ROOT'];
    // require_once "$path/system/db.php"; 
    
    // unlink("$path/download/soso65369.jfif");//команда удаляет файл по ссылке
    // // fopen("$path/download/text1.txt","w+");//создать файл по адресу
    // echo "<pre>";
    // echo "_POST:";
    // print_r($_POST);
    // echo "_FILES:";
    // print_r($_FILES);
    // echo "</pre>";

    // $randomSalt=mt_rand(10000, 99999);//создаем случайное число от 10000 до 99999
    // // $randomSalt1=random_int(10000, 99999);//создаем случайное число от 10000 до 99999 более надежная функция-криптостойкая функция
    // // @ - убрать вывод ошибки если будет проблема с переменной
   

    // if(isset($_POST['Save'])) {
    //     preg_match_all("/(\.png$)|(\.jpeg$)|(\.jfif$)/", $_FILES['myFile']['name'], $arrImage); 
    //     @$nameFile=$_SESSION['login'].$randomSalt.$arrImage[0][0];   
    //     move_uploaded_file(@$_FILES['myFile']['tmp_name'], "$path/download/$nameFile");

    //     $db->query("UPDATE `users` SET `avatar`='$nameFile' WHERE `login`='$_SESSION[login]'");
    // }









    include_once "$path/private/head.php";  //                      #########   head  #########        
?>

<body>
    <div class="container">                        
        <header class="header">
            <? include_once "$path/private/header.php"; ?>  <!--        #########   header  #########    -->
        </header> 
        
        <main>
            <div class="signup">
                <div class="profileWindow">
                    <h3>Личный профиль</h3>
                    <div>Login: 
                        <?
                            echo $_SESSION['login'];
                        ?>
                    </div>
                    <form action="" method="get" enctype="multipart/form-data" class="formImage">
                        <div>Изменить пароль:</div>
                        <input type="password" name="oldPassword" id="oldPassword" placeholder="Введите старый пароль"><br>
                        <input type="password" name="newPassword1" id="newPassword1" placeholder="Введите новый пароль"><br>
                        <input type="password" name="newPassword2" id="newPassword2" placeholder="Подтвердите новый пароль">                        
                        <div>Загрузить фото:</div>
                        <div CLASS="selectFileDiv">
                            <label for="myFile" class="selectFile">Выберете файл...</label>
                            <input type="file" name="myFile" id="myFile" />
                            <span id="selectFileSpan"></span>
                        </div> 
                        <div></div>   
                        <input type="submit" value="submit" name="Save">   
                    </form>
                </div>
            </div>
            <script>
                myFile.oninput = () => {
                    selectFileSpan.innerHTML = myFile.value;//.substring();
                }
                
            </script>
        </main>        
        <footer class="footer">
            <? include_once "$path/private/footer.php"?>
        </footer>
    </div>
	
</body>
</html> 



