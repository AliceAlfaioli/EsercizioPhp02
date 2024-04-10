<?php


echo '<pre>' . print_r($_POST, true) . '</pre>';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = $_POST['password'];

    $errors = []; 

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email non valida';
    }


    if ($age < 18) {
        $errors['age'] = 'Age must be at least 18';
    }



    if (strlen($password) < 3) {
        $errors['password'] = 'Password troppo corta';
    }

    if ($errors == []) {
        header('Location:/SETTIMANA1/Esercizio02/enter.php');
    }
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<title>Contact Us</title>
<style>
  body {
    background-color: #87cefa; 
  }
  .container {
    margin-top: 50px;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  label {
    color: #004085;
  }
  input[type="text"],
  input[type="email"],
  input[type="number"],
  input[type="password"] {
    background-color: #f8f9fa;
    border: 1px solid #ced4da;
    border-radius: 5px;
    padding: 8px;
  }
  .error {
    color: #dc3545;
    font-size: 14px;
  }
  button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
  }
  button[type="submit"]:hover {
    background-color: #0056b3;
  }
</style>
</head>
<body>

<div class="container">
  <h1>Contact Us</h1>
  <form action="" method="post" novalidate>
    <label for="username">Username</label>
    <input type="text" name="username" id="username" placeholder="Username">
    <br>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="example@email.com" value="valore precedente">
    <div class="error"><?= $errors['email'] ?? '' ?></div>
    <br>

    <label for="age">Età</label>
    <input type="number" name="age" id="age">
    <div class="error"><?= $errors['age'] ?? '' ?>></div>
    <br>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="A secure password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>">
    <div class="error"><?= $errors['password'] ?? '' ?></div>
    <br>

    <button type="submit">Invia</button>
  </form>
</div>

</body>
</html>