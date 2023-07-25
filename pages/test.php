<?php
if (isset($_POST['btn'])) :
?>
    <h2 style="padding-top:50%">Mon numéro de téléphone est: <?= $_POST['phone'] ?></h2>

<?php endif; ?>



<form method="$_POST" style="
position: absolute;
            left: 50% !important;
            top:50%;
            transform: translateX(-50%) !important;
">
    <!-- <h1 class="phone-label">International Telephone Input</h1> -->

    <div style="position: relative;
            display: inline-block;">
        <input type="tel" name="phone" style="
        padding-right: 6px;
            padding-left: 52px;
            margin-left: 0;

            position: relative;
            z-index: 0;
            margin-top: 0 !important;
            margin-bottom: 0 !important;
            margin-right: 0;
            border: 1px solid #CCC;
            width: 500px;
            height: 35px;
            /* padding: 6px 12px; */
            border-radius: 2px;
            font-family: inherit;
            font-size: 100%;
            color: inherit;
        ">
        <button type="submit" name="btn">valider</button>
    </div>
</form>


<hr>
<?php 

?>