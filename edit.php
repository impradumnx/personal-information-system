<?php
include 'db.php';

// Get ID from URL
$id = $_GET['id'];

// Get person's existing data
$sql = "SELECT * FROM persons WHERE id = $id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

// Update data when form is submitted
if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "UPDATE persons SET
            name='$name',
            age='$age',
            gender='$gender',
            phone='$phone',
            email='$email',
            address='$address'
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Person</title>

    <style>
        body {
            font-family: Arial;
            background-color: #f2f2f2;
        }

        .container {
            width: 500px;
            margin: 50px auto;
            background: white;
            padding: 25px;
        }

        h1 {
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px 0;
            box-sizing: border-box;
        }

        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px 0;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;
        }

        .back {
            display: block;
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Edit Person</h1>

    <form method="POST">

        <label>Name</label>
        <input type="text" name="name"
               value="<?php echo $row['name']; ?>" required>

        <label>Age</label>
        <input type="number" name="age"
               value="<?php echo $row['age']; ?>" required>

        <label>Gender</label>

        <select name="gender" required>
            <option value="Male"
                <?php if($row['gender'] == 'Male') echo 'selected'; ?>>
                Male
            </option>

            <option value="Female"
                <?php if($row['gender'] == 'Female') echo 'selected'; ?>>
                Female
            </option>
        </select>

        <label>Phone</label>
        <input type="text" name="phone"
               value="<?php echo $row['phone']; ?>" required>

        <label>Email</label>
        <input type="email" name="email"
               value="<?php echo $row['email']; ?>" required>

        <label>Address</label>
        <input type="text" name="address"
               value="<?php echo $row['address']; ?>" required>

        <button type="submit" name="update">
            Update Person
        </button>

    </form>

    <a class="back" href="index.php">
        ← Back to Home
    </a>

</div>

</body>
</html>