<?php
if (isset($_POST['create-section'])) {

    require 'dbh.inc.php';

    $sectionname = $_POST['section-name'];
    $username = $_COOKIE['User'];
    

    $sql = "insert into usersection values (0, '$sectionname');";
    mysqli_query($conn, $sql);
    $sql = "INSERT INTO usermeetsection VALUES (0, (SELECT idUsers FROM users WHERE uidUsers = '$username'), (SELECT idsection FROM usersection WHERE sectionname= '$sectionname'));";
    
    mysqli_query($conn, $sql);

    mysqli_close($conn);  
    header("Location: ../createasection.php");
}
else {
    header("Location: ../createasection.php");
    exit();
}



