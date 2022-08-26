<?    
    session_start(); 

    if(isset($_POST['exitButton'])) {
        $_SESSION['auth']=NULL;
        $_SESSION['login'] = NULL;
        $_SESSION['id'] = NULL;
    }
    print_r($_SESSION);

   
?>