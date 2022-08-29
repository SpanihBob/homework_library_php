
    <div class="header_cont">
        <a class="logo" href="/main">Библиотека ДЗ</a>
        <form action="" method="get" name="searchBook" class="searchBook" >
            <input type="search" name="searchBookInput" id="searchBookInput">
        </form>
        
        <?
            if(!isset($_SESSION['login'])) {
                echo <<<html
                        <a href="/signup">Регистрация </a>
                        <a href="/login"> Вход</a>
                html;
            }

            if(isset($_SESSION['login'])) {
                echo <<<html
                    <a href="/profile">Профиль</a>
                    <a href="/debt">Задолжности</a>
                    <div id="exitBtnDiv">
                        <button id="exitBtn">Выход</span></button>
                    </div>
                html;
            }
        ?>
        
</div>

<script>
    exitBtn.onclick = () => {
        let result = confirm("Вы точно хотите выйти?");
        if(result != true) {
            return false
        } else {
            $.ajax({
                type: "post",
                url:"/system/exitprofile.php",
                data: {
                    "exitButton": "exit"
                },
                success: data => window.location.href = '/main'
            })
        }
    }

</script>