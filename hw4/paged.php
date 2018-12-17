<?php
$POST = $_POST;
if (isset($POST['Exit'])){
    header('Location: hw4-1.php');
    exit();
}
?>
Секретная страница

<form action="secretPage.php">
    <input type="submit" name="Exit">
</form>