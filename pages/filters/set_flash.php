<?php
//messages alert
if(isset($_SESSION['flash'])){
    foreach($_SESSION['flash'] as $flash){
        $message = $flash['message'];
        $status = $flash['status'];

        switch($status){
            case 'success':
                $conf = "Félicitations !";
                break;
            case 'danger':
                $conf = "Désolé !"; 
        }

        echo'
        <div class="home-alert '.$status.'">'.$message.'</div>
        ';
    }
    unset($_SESSION['flash']);
}
?>