
<?php

echo date('d.m.Y');
$name = 'vladislav';
$surname = 'kalinin';
echo $name. ' ' . $surname;
/*Задание к четвергу (22.11.2018):
1. Выбрать 6-7 наиболее важных на Ваш взгляд функций для работы с массивами и разобрать их.*/

/*2 . Дан массив [3, 1, 6, 0, 4, 5].
С помощью цикла foreach найдите сумму квадратов элементов этого массива.*/

$number = array(3, 1, 6, 0, 4, 5);
$sum = 0;
foreach ($number as $num) {
    $num *= $num;
    $sum += $num;
    var_dump($num);
        };
var_dump("$sum <br><br>");




/*3. Нарисуйте треугольник (или ромб) из символов *.
Высота треугольника равна 15. */
$a=30;
for ($i = 0; $i <= $a; $i++) {
    for ($j = $a; $j >= $a-$i; $j--){
        if($j < $i+1){
            continue;
        }
        echo'&nbsp * ';
    }
 echo "<br>";
};

/*4. Создать массив из дней недели. С помощью цикла foreach выведите все дни недели, а текущий день выведите жирным.
Текущий день можно получить с помощью функции date.
Название дней выводить по-русски */
/*$week = array ('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
$today = date(D);
foreach ($week as $see){
    echo "$see <br><br>";
    if($see=== $today){
        echo '<b>' . $see . '<b>';
    } else
}

if ($today === 'Mon'){
    array_search('Mon',$week);
    echo "<b>Mon</b>";
} else if ($today === 'Tue'){
    array_search('Tue',$week);
    echo "<b>Mon</b>";
}  else if ($today === 'Wed'){
    array_search('Wed',$week);
    echo "<b>Mon</b>";
}else if ($today === 'Thu'){
    array_search('Thu',$week);
    echo "<b>Tue</b>";
} else if ($today === 'Fri'){
    array_search('Fri',$week);
    echo "<b>Mon</b>";
} else if ($today === 'Sat'){
    array_search('Sat',$week);
    echo "<b>Mon</b>";
}else if ($today === 'Sun'){
    array_search('Sun',$week);
    echo "<b>Mon</b>";
}*/



/*5. Отсортировать массив по 'price'*/
$arr = array(
    array (
        'price' => 10,
        'count' => 2
    ),
    array ('price' => 5,
        'count' => 5),

    array (
        'price' => 8,
        'count' => 5
    ),
    array (
        'price' => 12,
        'count' => 4
    ),
    array (
        'price' => 8,
        'count' => 4
    ),
);
function cmp_function($a, $b){
    return ($a['price'] > $b['price']);
}

usort($arr, 'cmp_function');
var_dump($arr);
