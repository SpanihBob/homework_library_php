<?
    if(isset($_GET['reg'])) $_SESSION['reg_in']=1;

    if(isset($_GET['in'])) $_SESSION['reg_in']=2;

    if(isset($_GET['logo'])) $_SESSION['reg_in']=3;

    if(isset($_GET['profile'])) $_SESSION['reg_in']=4;

    if(isset($_GET['debt'])) $_SESSION['reg_in']=5;
    
?>

    <form class="header_cont">
        <button class="logo" name="logo">Библиотека ДЗ</button>
        <div action="" method="get" name="searchBook" class="searchBook" >
            <input type="search" name="searchBookInput" id="searchBookInput">
        </div>
        <div id="reg_in">
            <button name="reg">Регистрация </button>
            <span>/</span>
            <button name="in"> Вход</button>
        </div>
        <button name="profile">Профиль</button>
        <button name="debt">Задолжности</button>
    </form>