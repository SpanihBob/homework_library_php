<?    
    // print_r($_SESSION);
    $_SESSION['avatarForImg'] =  str_replace($path, "..", $_SESSION['avatar']);
    // unlink("$path/download/soso65369.jfif");//команда удаляет файл по ссылке
    // // fopen("$path/download/text1.txt","w+");//создать файл по адресу
    // echo "<pre>";
    // echo "_POST:";
    // print_r($_POST);
    // echo "_FILES:";
    // print_r($_FILES);
    // echo "</pre>";

    #########################                         добавление картинки                              #########################
    
    $randomSalt=mt_rand(10000, 99999);//создаем случайное число от 10000 до 99999
    // // $randomSalt1=random_int(10000, 99999);//создаем случайное число от 10000 до 99999 более надежная функция-криптостойкая функция
    // // @ - убрать вывод ошибки если будет проблема с переменной
    
    if(isset($_POST['Save'])) {

                            #########################           добавление картинки                   #########################

        preg_match_all("/(\.png$)|(\.jpeg$)|(\.jpg$)/", $_FILES['myFile']['name'], $arrImage); //preg_match_all - Выполняет глобальный поиск шаблона в строке
        @$nameFile=$_SESSION['login'].$randomSalt.$arrImage[0][0];   
        if(isset($_SESSION['avatar'])) {
            unlink($_SESSION['avatar']);
        }
        move_uploaded_file(@$_FILES['myFile']['tmp_name'], "$path/download/$nameFile");         //move_uploaded_file - Перемещает загруженный файл в новое место
        $_SESSION['avatar'] = "$path/download/$nameFile";
        // $_SESSION['avatarForImg'] = "../download/$nameFile";
        $_SESSION['avatarForImg'] =  str_replace($path, "..", $_SESSION['avatar']);
       
        $dbPDO->query("UPDATE `users` SET `avatar`='$nameFile' WHERE `login`='$_SESSION[login]'");

                            #########################           проверка пароля                   #########################

        $searchLogin = $dbPDO -> query("SELECT * FROM `users` WHERE `login`='$_SESSION[login]'");
        $seLogin = $searchLogin -> fetch(PDO::FETCH_ASSOC);
            if( password_verify( $_POST['oldPassword'], $seLogin['password'] )) {
                $_POST['newPassword1'] = trim($_POST['newPassword1']);                              
                $_POST['newPassword1'] = htmlspecialchars($_POST['newPassword1']);

                $_POST['newPassword2'] = trim($_POST['newPassword2']);                              
                $_POST['newPassword2'] = htmlspecialchars($_POST['newPassword2']);

                if($_POST['newPassword1']==$_POST['newPassword2']) {
                    $_POST['newPassword1']=password_hash($_POST['newPassword1'],PASSWORD_DEFAULT); //хэшируем(шифруем) пароль
                    $dbPDO->query("UPDATE `users` SET `password`='$_POST[newPassword1]' WHERE `login`='$_SESSION[login]'");
                }

                header("Location: /main");//производим переход на страницу
            }
            else {
                echo "неверное имя пользователя или пароль2";
            }               
    }

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
                    <div><img src="<?echo $_SESSION['avatarForImg']?>" alt=""> Login: 
                        <?
                            echo $_SESSION['login'];
                        ?>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data" class="formImage" id="profileForm">
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
                        <span id="profileFormSpan"></span>   
                    </form>
                </div>
            </div>
            <script>
                myFile.oninput = () => {
                    let index = myFile.value.lastIndexOf('\\');
                    selectFileSpan.innerHTML = myFile.value.substr(index);
                }

                profileForm.onsubmit = () => {
                    event.preventDefault();
                    if(newPassword1.value != newPassword2.value) {
                        profileFormSpan.innerHTML = "<b style='color:red'>Пароли не совпадают!</b>";
                    }
                    else {
                        profileFormSpan.innerHTML = "<b style='color:green'>Все ок!</b>";
                        profileForm.submit();
                    }
                }

                
            </script>
        </main>        
        <footer class="footer">
            <? include_once "$path/private/footer.php"?>
        </footer>
    </div>
	
</body>
</html> 



