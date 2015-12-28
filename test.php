<html>
<head>
  <title>TestWork</title>
</head>
<body>
<?php
    mkdir("images");
    if($_FILES["filename"]["size"] > 1024*3*1024){
        echo ("Размер файла превышает три мегабайта");
        exit;
    } 
    if(is_uploaded_file($_FILES["filename"]["tmp_name"])) {
    move_uploaded_file($_FILES["filename"]["tmp_name"], "images/".$_FILES["filename"]["name"]);
    include('classSimpleImage.php');
    $image = new SimpleImage();
    $image->load("images/".$_FILES["filename"]["name"]);
    $image->resize(2, 2);
    $image->save('image.jpg');
    $image_resize = imageCreateFromJpeg('image.jpg');
    $color = imagecolorat($image_resize, 1, 1);
    $r = ($color >> 16) & 0xFF;
    $g = ($color >> 8) & 0xFF;
    $b = $color & 0xFF;
    // echo $r."<br />";
    // echo $g."<br />";
    // echo $b."<br />";
    echo "<img src = 'images/".$_FILES["filename"]["name"]."' >" . "<br />";
    $color_echo = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;
    if ($color_echo <= 125){
        echo "<span style='width: 400px; height: 400px; background-color: #323232; color: #fff;'> . Black text " . $color_echo . "</span>";
    } else {
        echo "White text $color_echo";
    }   
} else {
    echo("Ошибка загрузки файла");
   }
?>
</body>
</html>
