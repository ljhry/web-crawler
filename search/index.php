<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .mydiv{
            
            font-family: 微软雅黑;
            font-size: 18px;
            margin-top:15px
        }
        a{
            text-decoration: none;
            color: #286090
        }
    </style>
</head>
<body>
</body>

</html>
<?php
$title = $_GET['title'];
if(empty($title)){
    exit;
}
$conn = mysqli_connect('localhost','root','12345678','test');
if (!$conn){
    die('Could not connect: '.mysqli_error($con));
}
mysqli_set_charset($conn, "utf8");
 
$sql = "select * from imut where title like '%" .$title. "%'"; 
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) != 0){
    while ($row=mysqli_fetch_assoc($result)) {
        echo "<ul class='mydiv'>";
        echo "<a href='{$row['url']}'><li>{$row['title']}</li></a>";
        echo "</ul>";     
    }
}else{
    echo "<h2>没有录入你所要找的信息!!!</h2>";
}

mysqli_free_result($result);
mysqli_close($conn);