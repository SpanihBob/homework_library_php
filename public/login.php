<?php 
   if( isset( $_POST['loginSend'] )) {

        $_POST['login'] = trim($_POST['login']);                              
        $_POST['login'] = htmlspecialchars($_POST['login']);                  
    
        $_POST['password'] = trim($_POST['password']);                              
        $_POST['password'] = htmlspecialchars($_POST['password']);

        $searchLogin = $dbPDO -> query("SELECT * FROM `users` WHERE `login`='$_POST[login]'");
        if( $searchLogin -> rowCount() > 0 ) {
            $seLogin = $searchLogin -> fetch(PDO::FETCH_ASSOC);
            if( password_verify( $_POST['password'], $seLogin['password'] )) {
                $_SESSION['auth']=true;
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['id'] = $seLogin['id'];
                $_SESSION['avatar'] = "$path/download/$seLogin[avatar]";
                

                header("Location: /main");//производим переход на страницу
            }
            else {
                $_SESSION['loginError']='error';
            }
        }
        else {
            echo "неверное имя пользователя или пароль2";
        }
    }
    include_once "$path/private/head.php";  //                          #########   head  #########        
?>

<body>
    <div class="container">                        
        <header class="header">
            <?
                include_once "$path/private/header.php"; //               #########   header  ######### 
            ?> 
        </header> 
        <main>
            <div class="signup">
                <div class="signupWindow">
                    <h3>Log In</h3>
                    <form action="" method="POST" id="signupForm">
                        <div>    
                            <span>Ведите login: </span><input type="text" name="login" id="login" placeholder="login" autocomplete="off" <?if(isset($_POST['login'])) echo "value='$_POST[login]'"?>>         <!-- вводим проверку на login, если есть оставляем его в значении -->    
                            <span>Ведите пароль: </span><input type="password" name="password" id="password" placeholder="password">
                        </div> 
                        <input type="submit" id="loginSend" value="Log In" name="loginSend" >
                    </form>
                    <span id="searchLogin">
                        <?
                            if(isset($_SESSION['signup'])) {
                                echo "<span style='color:green'> Регистрация успешная </span>";
                                $_SESSION['signup']=NULL;
                            }
                            if(isset($_SESSION['loginError'])) {
                                echo "<span style='color:red'> Неверное имя пользователя или пароль </span>";
                                $_SESSION['loginError']=NULL;
                            }
                        ?>
                    </span>          
                </div>
            </div>
            <script>

            </script>
        </main>
        <footer class="footer">
            <? include_once "$path/private/footer.php"?>
        </footer>
    </div>	
</body>
</html> 