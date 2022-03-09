<?php

require 'loader/autoloader.php';
 $dollar = new  Dollar();
 $db = new Database();
$conn = $db->conn;
$dollar->doss();
$insert = new Inser();
$update = new Upd();
$sel = new Sel();
$mym = new mail();

// function users($conn)
// {
//     $sql = 'SELECT * FROM users';
//     $result = mysqli_query($conn, $sql);
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo $row['name'].'<br>';
//     }
// }

    // $sel = mysqli_query($conn, 'SELECT * FROM users');
if (isset($_POST['btn'])) {
    // $mm = $insert->insert('users', [
    //     // 'database filed'=>'your post values',
    //     'name' => 'Dolar',
    //     'email' => 'kpin2hfd',
    //     'phone' => '0056r65',
    //     'password' => 'kingstit',
    //     ], $_FILES);
    // var_dump($_FILES);
    // $uu = $update->update('users', [
    // 'name' => 'Dollar',
    // 'email' => 'kpin2hfd',
    // 'phone' => '0056r65',
    // 'password' => 'mana',
    // ], 'id=1');
    // echo $uu;
    // var_dump($uu);
    $log = $sel->select('users', [
    ['email', '=', 'kpin2hfd'],

    ['password', '=', 'kingstit'],
], 'AND');
    var_dump($log);
    foreach ($log as $row) {
        echo $row['name'].'<br>';
    }
}

var_dump($mym->mm());
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form action="" method="post" enctype="multipart/form-data">

   <input type="file" name="image" src="" alt="">
   <input type="submit" value="Send" name="btn">
   </form>


</body>
</html>