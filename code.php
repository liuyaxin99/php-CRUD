<?php
session_start();
require 'dbconnection.php';

//using method POST
if (isset($_POST['save_student'])) {

    //info to be added
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    //table name
    $query = "INSERT INTO students (name,email,phone,course) VALUES 
        ('$name','$email','$phone','$course')"; //single ''

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        //set pop up message
        $_SESSION['message'] = "Student Created Successfully"; //session_start() in the start and also in student-create.php
        header("Location: student_create.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not Created";
        header("Location: student_create.php");
        exit(0);
    }
}

if (isset($_POST['update_student'])) {
    //need to add id for UPDATE
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    //check successful and get back to index.php
    if ($query_run) {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: index.php");
        exit(0);
    }
}

if (isset($_POST['delete_student'])) {
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}
