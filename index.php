<?php
include "db.php";

// Search functionality
$search = "";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

$sql = "SELECT * FROM persons 
        WHERE name LIKE '%$search%'";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Personal Information System</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
        }

        .container {
            width: 90%;
            margin: auto;
            background: white;
            padding: 20px;
        }

        .add-btn {
            display: inline-block;
            padding: 10px 15px;
            background-color: green;
            color: white;
            text-decoration: none;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #333;
            color: white;
        }

        .edit {
            color: blue;
        }

        .delete {
            color: red;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Personal Information System</h1>

    <a href="add.php" class="add-btn">Add Person</a>
    <form method="GET" style="margin-bottom: 20px;">

    <input type="text"
           name="search"
           placeholder="Search by name..."
           value="<?php echo $search; ?>"
           style="padding: 10px; width: 250px;">

    <button type="submit"
            style="padding: 10px 20px;">
        Search
    </button>

    <a href="index.php" style="margin-left: 10px;">
        Clear
    </a>

</form>

    <table>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Action</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['address']; ?></td>

            <td>
                <a class="edit" href="edit.php?id=<?php echo $row['id']; ?>">
                    Edit
                </a>

                |

                <a class="delete" 
                   href="delete.php?id=<?php echo $row['id']; ?>"
                   onclick="return confirm('Are you sure you want to delete this record?');">
                    Delete
                </a>
            </td>
        </tr>

        <?php
        }
        ?>

    </table>

</div>

</body>
</html>