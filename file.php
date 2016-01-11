<html>

        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

</head>
<body>
<?php 
require 'connect.php';
error_reporting(E_ALL); 

$per_page=5;
// получаем номер страницы
if (isset($_GET['page'])) $page=($_GET['page']-1); else $page=0;

// вычисляем первый оператор для LIMIT
$start=abs($page*$per_page);
// составляет запрос и выводит записи
// переменную $start используем, как нумератор записей.

//echo $start;  - Выводит 0 
//echo $per_page; - Выводит 5


$result=mysql_query('SELECT * FROM `gb` order by `date` DESC LIMIT $start,$per_page'); // запрос на выборку

echo '<table class="table table-bordered">';
echo '<thead>';
echo '<tr>';
echo '<th>Дата</th>';
echo '<th>IP</th>';
echo ' <th>Браузер</th>';
echo ' <th>Имя</th>';
echo ' <th>Отзыв</th>';
echo '</tr>';
echo '</thead>';
while($row=mysql_fetch_array($result))
{

echo '<tr>';
echo '<td>';
echo htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8'); // выводим данные
echo '</td>';
echo '<td>';
echo htmlspecialchars($row['ip_adress'], ENT_QUOTES, 'UTF-8'); // выводим данные
echo '</td>';
echo '<td>';
echo htmlspecialchars($row['browser'], ENT_QUOTES, 'UTF-8'); // выводим данные
echo '</td>';
echo '<td>';
echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); // выводим данные
echo '</td>';
echo '<td>';
echo htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8'); // выводим данные
echo '</td>';
echo '</tr>';
}
echo '</table>';

$q="SELECT count(*) FROM `gb`";
$res=mysql_query($q);
$row=mysql_fetch_row($res);
$total_rows=$row[0];

$num_pages=ceil($total_rows/$per_page);

for($i=1;$i<=$num_pages;$i++) {
  if ($i-1 == $page) {
    echo $i." ";
  } else {
    echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i."</a> ";
  }
}

?>
<a href ="add_new.php">Добавить отзыв</a>

</body>
</html>
