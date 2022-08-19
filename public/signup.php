<!-- <?php
   
    //  if(isset($_POST['send'])) {
    //     //вначале делаем валидацию (правильно сделать валидацию на стороне клиента чтобы не грузить сервер
    //     //делаем валидацию на JS)
    //     $errors=[];//создаем массив ошибок

    //     //делаем валидацию данных
    //     $_POST['login']=trim($_POST['login']);//Удаляет пробелы (или другие символы) из начала и конца строки
    //     $_POST['login']=htmlspecialchars($_POST['login']);//Преобразует специальные символы в HTML-сущности

    //     if($_POST['login']=="") {
    //         $errors[]="введите login";
    //     }
    //     if($_POST['password']=="") {
    //         $errors[]="введите пароль";
    //     }
    //     if($_POST['password']!==$_POST['password2']) {
    //         $errors[]="пароли не совпадают";
    //     } 
    //     if(empty($errors)) {
    //         // в базе данных в строке password меняем колличество символов 100(было 50) чтобы сохранять зашифрованый пароль
    //         $_POST['password']=password_hash($_POST['password'],PASSWORD_DEFAULT); //хэшируем(шифруем) пароль 

    //         $db->query("INSERT INTO `users`(`login`, `password`, `time_signup`) VALUES ('$_POST[login]', '$_POST[password]', 123)");
    //         $_SESSION['signup']=true;
    //         header('Location: login.php');  //производим переход на login.php
    //      }
         
            
        
    //     function generateSalt() {
    //         $salt="";
    //         $saltlenght=8;   //длина соли
    //         for($i=1;$i<=$saltlenght;$i++) {
    //             $salt .= chr(mt_rand(33,126));//диапазон букв и символов из ASCII-table
    //         }
    //         return $salt;
    //     }

        
    //  } 
    // // echo "<pre>";   
    // // print_r($db);   //проверяем подключение к бд
    // // echo"</pre>";
    // //  $db->query("INSERT INTO `users` (`login`,`password`,`time_signup`) VALUES('vnnv','jvsjvc',123)");
?> -->

        <div class="signup">
            <div class="signupWindow">
                <h3>Sign Up</h3>
                <form action="" method="POST" id="signupForm">
                    <div>
                        <span>Ведите имя: </span><input type="text" name="visitor_name" id="visitor_name" placeholder="Имя">

                        <span>Ведите фамилию: </span><input type="text" name="visitor_last_name" id="visitor_last_name" placeholder="Фамилия">

                        <span>Ведите дату рождения: </span><input type="date" name="visitor_date" id="visitor_date" placeholder="Дата рождения">

                        <span>Ведите email: </span><input type="email" name="visitor_email" id="visitor_email" placeholder="email">

                        <span>Ведите login: </span><input type="text" name="login" id="login" placeholder="login" autocomplete="off" <?if(isset($_POST['login'])) echo "value='$_POST[login]'"?>>         <!-- вводим проверку на login, если есть оставляем его в значении -->

                        <span>Ведите пароль: </span><input type="password" name="password" id="password" placeholder="password">

                        <span>Подтвердите пароль: </span><input type="password" name="password2" id="password2" placeholder="password2">
                    </div>                    

                    <input type="submit" id="signupSend" value="Sign Up" name="send" disabled>
                </form>
                <span id="searchLogin"></span>            
            </div>
        </div>
    
    
    <script>
        //при вводе в input создаем ajax-запрос для проверки свободен или занят login
        login.oninput=()=>{
            if( login.value.length>2 ) {
                $.ajax({
                    type:"post",//$_POST['searchLogin']
                    url:"/system/searchLogin.php",
                    data: {
                        "searchLogin":login.value
                    },
                    success:data=>{
                        searchLogin.innerHTML=data;
                    }
                })
            }
            else {
                searchLogin.innerHTML=null;
            }
            valid();
        }
    
    let error=true;
    signupForm.onsubmit=()=>{
        
        if(password.value==""){
            searchLogin.innerHTML="введите пароль 1";
            return false;
        }
        if(password2.value==""){
            searchLogin.innerHTML="введите пароль 2";
            return false;
        }
        if(password.value!==password2.value){
            searchLogin.innerHTML="пароли не совпадают";
            return false;
        }
    }
// /////////////////доделать валидациюдл остальных полей
    function valid() {
        if(login.value.length<3) {
            login.style.border="1px solid red";
            searchLogin.innerHTML="login < 3 символов";
            error=true;
        }
        else {
            login.style.border="1px solid green";
            error=false;
        }
        
        if(error==false) {  //если ошибок нет, убираем disabled с кнопки отправки формы
            signupSend.disabled=false;
        }
        else {
            signupSend.disabled=true;
        }
    
    }

    
   </script>
