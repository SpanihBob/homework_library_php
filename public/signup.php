<?php
    include_once "$path/private/head.php";  //                      #########   head  #########        
?>

<body>
    <div class="container">                        
        <header class="header">
            <? include_once "$path/private/header.php"; ?>  <!--        #########   header  #########    -->
        </header> 
        <main>
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
    
                        <input type="submit" id="signupSend" value="Sign Up" name="signupSend">
                    </form>
                    <span id="searchLogin"></span>          
                </div>
            </div>
        
        
        <script>
            // ......................проверка на регулярку............................
            let regesName = /[^A-Za-zА-ЯЁа-яё]/gi;
            let regesDate = /\b((19[0-9][0-9])|(20[0-9][0-9]))-((0[1-9])|(1[0-2]))-(0[1-9]|[1-2][0-9]|3[0-1])\b/g;
            let regesEmail = /\b[A-Za-zА-ЯЁа-яё]+@[A-Za-zА-ЯЁа-яё]+\.[A-Za-zА-ЯЁа-яё]+\b/gi
            let regesLogin = /[#<>*+=;]/gi;

            let visitorName = document.getElementById("visitor_name");
            let visitorLastName = document.getElementById("visitor_last_name");
            let visitorDate = document.getElementById("visitor_date");
            let visitorEmail = document.getElementById("visitor_email");
            let visitorLogin = document.getElementById("login");
            let searchLog = document.getElementById("searchLogin2");


            visitorName.onkeyup=()=>{
                visitorName.value = visitorName.value.replace(regesName,'');
            }
            visitorLastName.onkeyup=()=>{
                visitorLastName.value = visitorLastName.value.replace(regesName,'');
            }
            visitorDate.onblur=()=>{                 //событие потеря фокуса
                visitorDate.value = visitorDate.value.match(regesDate);
            }
            visitorEmail.onblur=()=>{ 
                visitorEmail.value = visitorEmail.value.match(regesEmail);
            }
            visitorLogin.onkeyup=()=>{
                visitorLogin.value = visitorLogin.value.replace(regesLogin,'');
            }
            
            
            visitorLogin.oninput=()=>{             //при вводе в input создаем ajax-запрос для проверки свободен или занят login
                if( visitorLogin.value.length>2 ) {
                    $.ajax({
                        type:"post",//$_POST['searchLogin']
                        url:"/system/searchLogin.php",
                        data: {
                            "searchLogin":visitorLogin.value
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
        
            signupForm.onsubmit=()=>{  
                event.preventDefault();
                if(visitor_name.value=="") {
                    searchLogin.innerHTML="Введите имя";
                    return false;
                }

                if(visitor_last_name.value=="") {
                    searchLogin.innerHTML="Введите фамилию";
                    return false;
                }
                if(visitor_date.value=="") {
                    searchLogin.innerHTML="Введите дату рождения";
                    return false;
                } 
                if(visitor_email.value=="") {
                    searchLogin.innerHTML="Введите email";
                    return false;
                }
                if(visitorLogin.value=="") {
                    searchLogin.innerHTML="Введите логин";
                    return false;
                }
                if(password.value=="") {
                    searchLogin.innerHTML="Введите пароль 1";
                    return false;
                }
                if(password2.value=="") {
                    searchLogin.innerHTML="Введите пароль 2";
                    return false;
                }
                if(password.value!==password2.value) {
                    searchLogin.innerHTML="Пароли не совпадают";
                    return false;
                } 
                else {

                    if( visitorLogin.value.length>2 ) {
                        $.ajax({
                            type:"post",//$_POST['searchLogin']
                            url:"/system/searchData.php",
                            data: {
                                "searchLogin":visitorLogin.value,
                                "searchName":visitor_name.value,
                                "searchLastName":visitor_last_name.value,
                                "searchEmail":visitor_email.value,
                                "searchDate":visitor_date.value,
                                "searchPassword":password.value,
                                "searchPassword2":password2.value
                            },
                            success:data=>{
                                if(data=="<span style='color:red'>Такой посетитель уже зарегистрирован!</span>") {                                    
                                    searchLogin.innerHTML=data;
                                }
                                else window.location.href = '/login';
                            }                            
                        })                
                    }
                    else {
                        searchLogin.innerHTML=null;
                    } 
            }  
             
    }
    // /////////////////доделать валидациюдл остальных полей
    function valid() {
            if(visitorLogin.value.length<3) {
                visitorLogin.style.border="1px solid red";
                searchLogin.innerHTML="login < 3 символов";
            }
            else {
                visitorLogin.style.border="1px solid green";
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