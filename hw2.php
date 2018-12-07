<?php
/**
Задачи к четвергу:
В четверг продолжаем тему работы с файлами
Задача 1
Написать рекурсивную функцию удаления непустого каталога:
1. написать функцию, которая будет удалять каталог и все его содержимое 
2. Осуществить рекурсивный вызов в подкаталогах 
3. Дано: path - путь к каталогу 
 */

$catalog = [
    $zapchasti = [
    'koleso' => [8,10,12,14],
    'pokrishka' => ['black','white','blue']],
    $remont = [
    'master' => ['petya','kolya','misha'],
    'adress' => ['bolshevikob','veteranov']]

    ];

var_dump($catalog);

function vizov($catalog,$feel){
    if($catalog>0){
        foreach ($catalog as $key =>$value){
            var_dump($value['master']);

}}};
var_dump($value['master']);

array_splice($catalog, 0);
var_dump($catalog);

?>

/*
Задача 2
1. создать html форму с одним текстовым полем и кнопкой submit 
2. пользователь вводит в форму ссылку (URL адрес) 
3. написать обработчик, 
который проверяет наличие такой же ссылки в файле, 
если не находит, то записывает ее в конец файла
 */
<?php
$st_search = "baza.php";
$st_strpos = $_POST["url-name"];
if(isset($_POST["done"])){
    if($_POST["url-name"]== "")echo "Введите ссылку! Это обязательно";
else { if (strpos(file_get_contents("$st_search"), "$st_strpos")) echo "Есть такая ссылка, пожалуйста измените запрос";
else {
    $fileopen=fopen("baza.php", "a+");
    $write=$_POST["url-name"];
    fwrite($fileopen,"$write<br />");
    fclose($fileopen);
}}};
    ?>
<html>
<head></head>
<body>
<form method="post">
    <label>Ссылка, которую вы хотите добавить</label>
    <input type="text" name="url-name" placeholder="Введите ссылку">
    <input type="submit" name="done" value="Готово!" >
</form>
</body>
</html>
