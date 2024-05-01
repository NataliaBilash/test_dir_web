<?php
# variables
$servername = "db";
$username = "root";
$password = "123";
$dbName = "site_db";

# connect to db
$link = mysqli_connect($servername, $username, $password);

# connection error handling
if (!$link) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

# query for create db
$sql = "CREATE DATABASE IF NOT EXISTS $dbName";

# try create db w error handling
if (!mysqli_query($link, $sql)) {
    echo "Не удалось создать БД";
}

# close connection
mysqli_close($link);

# open connection to db
$link = mysqli_connect($servername, $username, $password, $dbName);

# query for create table 'users'
$sql = "CREATE TABLE IF NOT EXISTS users(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pass VARCHAR(50) NOT NULL
)";

# try create table 'users' w error handling
if (!mysqli_query($link, $sql)) {
    echo "Не удалось создать таблицу users";
}

# query for create table 'posts'
$sql = "CREATE TABLE IF NOT EXISTS posts(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(20) NOT NULL,
    main_text VARCHAR(400) NOT NULL
)";

# try create table 'posts' w error handling
if (!mysqli_query($link, $sql)) {
    echo "Не удалось создать таблицу posts";
}

# close connection
mysqli_close($link);
?>