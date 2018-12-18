<?php

interface iLogger{
    public function write($result){
    }
}


class EchoLogger implements iLogger
{
    public function write($result){

        $zapis = $_POST['zapis'];
        if(isset($zapis)){
            echo "Вы написали вот такой текст ".$zapis;
        }echo "Заполните поле текст!";
    }
}
class FileLogger implements iLogger
{
    public function write($result){
        $file = 'text_hw6';
        $zapis = $_POST['zapis'];
        if(isset($zapis)){
            file_put_contents($file, $zapis, FILE_APPEND);
            echo "Текст ".$zapis. " добавлен в файл: ".$file;
        }echo "Заполните поле текст!";
    }

}
class TimeFileLogger implements iLogger
{

    public function write($result){
        $file = 'text_hw6';
        $zapis = $_POST['zapis'];
        $Data = date('c');
        if(isset($zapis)){
            file_put_contents($file, $zapis . $Data . "\n", FILE_APPEND);
            echo "Текст ".$zapis. " добавлен в файл: ".$file. "время добавления: ".$Data;
        }echo "Заполните поле текст!";
    }
}
?>
<form action="" method="post">
    <label>Запишите на память</label>
    <input type="text" name="zapis">
    <input type="submit" value="Записать">
</form>
