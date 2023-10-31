<?php
//droit d'accès - accès une fois connectés
if (!isset($_SESSION['unique_id'])) {
    header("Location:/");
}

$title = "Help Handygo";
//menu - Navbar
require_once "layout/partials/topbar-2.php";


?>
<div class="abonnes abonnes-2">
    <div class="">
        <div class="abonnes-content">
            <div class="topbar-4">
                <?php  require_once "layout/partials/topbar-4.php";?> 
                
                    <!-- content -- cards  -->
                    <div class="content-main">
                        <h2 class="title-heading">Help Handy Go</h2>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>