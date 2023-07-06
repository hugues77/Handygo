<?php
    if(isset($_SESSION['unique_id'])){  
        unset($_SESSION['ref']);
        header("Location:/abonnes");
    } 
?>