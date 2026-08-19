<?php
include "db.php";

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "INSERT INTO persons (name, age, gender, phone, email, address)
            VALUES ('$name', '$age', '$gender', '$phone', '$email', '$address')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Person</title>

    <style>
        body {
            font-family: Arial;
            background-color: #f4f4f4;
            margin: 40px;
        }

        .container {
            width: 500px;
            margin: auto;
            background: white;
            padding: 25px;
        }

        h1 {
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: green;
            color: white;
            border: none;
            cursor: pointer;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Add Person</h1>

    <form method="POST">

        <label>Name</label>
        <input type="text" name="name" required>

        <label>Age</label>
        <input type="number" name="age" required>

        <label>Gender</label>
        <input type="text" name="gender" required>

        <label>Phone</label>
        <input type="text" name="phone" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Address</label>
        <input type="text" name="address" required>

        <button type="submit" name="submit">
            Add Person
        </button>

    </form>

    <a href="index.php">Back to Home</a>

</div>

</body>
</html>