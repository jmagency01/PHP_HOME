<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 07.12.2018
 * Time: 21:52
 */
//3)Сверстать HTML-форму входа пользователя на сайт.
//4)Написать обработчик формы входа,
//который будет проверять существование пользователя в файле,
//сверять введенный хеш пароля и хеш из файла на равенство.
//Посмотрите функции password_hash() и password_verify()
session_start();
$POST = $_POST;

if (isset($POST['Registration'])) {
    registrationUser($POST);
}elseif (isset($POST['Singin'])){
    singInUser();
}elseif (isset($POST['Singout'])){
    singOutUser($POST);
}

deleteUserData($POST);

function singOutUser($POST){
    deleteUserData($POST);
}

function singInUser(){
    $login = getPostValue('login');
    $pathToFile = 'client.csv';
    $password = password_hash(getPostValue('password'), PASSWORD_DEFAULT);
    $fileArr = file($pathToFile);

    //необходимо для начала проверить, существует ли такой логин и пароль
    if (checkLoginUser($fileArr, $login) AND checkPwdUser($fileArr, $password)){
        echo 'Логин и пароль подошли, '.$login;
        $_SESSION['isSecretText'] = true;
        header('Location: paged.php');
        exit();
    }else {
        echo 'Вам необходимо перепроверить ваш логин';
    }
}

function registrationUser($POST){
    $login = getPostValue('login');
    $password = password_hash(getPostValue('password'), PASSWORD_DEFAULT);
    $pathToFile = 'client.csv';
    $userData = "$login;$password";
    $fileArr = file($pathToFile);

    var_dump($fileArr);

    if (checkLoginUser($fileArr, $login)){
        echo 'Пользователь c таким именем существует. Придумайте другой "Логин"';
    }else {
        addUserInFile($pathToFile, $userData);
        echo 'Пользователь успешно добавлен.';
        $_SESSION['isAuth'] = true;
    }
}

function addUserInFile($pathToFile, $userData){
    file_put_contents($pathToFile, "$userData\n", FILE_APPEND);
}

function checkLoginUser($fileArr, $login){
    foreach ($fileArr as $file) {
        $str = explode(';', $file);
        if ($str[0] == $login) {
            return true;
        }
    }
    return false;
}

function checkPwdUser($fileArr, $password){
    $pwd = getPostValue('password');
    foreach ($fileArr as $file) {
        $str = explode(';', $file);
        if ($str[1] == password_verify($pwd, $password)) {
            return true;
        }
    }
    return false;
}

function deleteUserData($POST){
    unset($POST['login']);
    unset($POST['password']);
    unset($POST['Registration']);
//    unset($_SESSION['isAuth']);
}

function getPostValue($value){
    $POST = $_POST;
    return $POST["$value"];
}

?>

<form action="hw4-1.php" method="post">
    <div>
        Login
        <input type="text" name="login" autocomplete="off">
        Password
        <input type="password" name="password">
        <input type="submit" name="Registration" value="Reg">
        <?php if ($_SESSION['isAuth']): ?>
            <div>
                <input type="submit" name="Singin" value="Sing in">
            </div>
        <?endif;?>
        <?php if ($_SESSION['isSecretText']):?>
            <div>
                <?php echo 'Добро пожаловать, '.$login?>
                <input type="submit" name="Singout" value="Singout">
            </div>
        <?endif;?>
    </div>
</form>
