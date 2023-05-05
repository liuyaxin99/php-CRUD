<?php

$con = mysqli_connect("localhost", "root", "", "php-crud"); //DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE

if (!$con) {
    die('Connection Failed' . mysqli_connect_error());
}
