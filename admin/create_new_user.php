<?php

session_start();

// initializing variables


$username = "";
$email    = "";
$phone = "";
$location = "";
$errors = array();

// connect to the database
$db = mysqli_connect('191.96.56.52', 'u982986596_everly_admin', 'Ilov3th@t', 'u982986596_everly_admin');



// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $location = mysqli_real_escape_string($db, $_POST['location']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);




    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($phone)) {
        array_push($errors, "Phone number is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($location)) {
        array_push($errors, "Location is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username'  LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database

        echo $password;

        $query = "INSERT INTO users(username, shop_name, password) 
  			  VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);

        $query1 = "INSERT INTO clients(name, email, phone, location) 
  			  VALUES('$username', '$email', '$phone', '$location')";
        mysqli_query($db, $query1);
    }
}

// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password' and status=1";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['success'] = true;
            $_SESSION['username'] = $username;

            header('location: index.php');
        } else {
            include 'phpalert.php';
            $alert = new PHPAlert();
            //array_push($errors, "Wrong username/password combination");
            $alert->error('Unauthorized access. please contact Admin ');
        }
    }
}
