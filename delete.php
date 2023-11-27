<?php
include "configure.php";

// Initialize variables
$id = $name = $email = $phone = $title = $created = '';

if (isset($_POST['edit'])) {
    $editId = $_POST['edit'];
    $sql = "SELECT * FROM users WHERE id='$editId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Assign values to variables
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $title = $row['title'];
        $created = $row['created'];
    } else {
        echo "Record not found.";
        exit;
    }
}

// Check if the form is submitted
if (isset($_POST['delete'])) {
    $idToDelete = $_POST['id'];

    // Execute the deletion query
    $deleteQuery = "DELETE FROM users WHERE id='$idToDelete'";
    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>
                alert('Record deleted successfully');
                window.location.href = 'index.html';
              </script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            width: 50%;
            text-align: center;
        }

        fieldset {
            border: 1px solid #ddd;
            padding: 10px;
        }

        legend {
            font-weight: bold;
            color: rgb(121, 118, 194);
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="button"] {
            background-color: rgb(121, 118, 194);
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: rgb(230, 236, 255);
            color: rgb(121, 118, 194);
        }

        h2 {
            text-align: center;
            color: rgb(121, 118, 194);
        }
    </style>
</head>

<body>
    <form id="deleteForm" action="" method="POST">
        <h2>Delete Contact</h2>
        <fieldset>
            <legend>Personal Information:</legend>

            ID:<br>
            <input type="text" name="id" value="<?php echo $id; ?>" readonly>

            <br>

            Name:<br>
            <input type="text" name="name" value="<?php echo $name; ?>" readonly>

            <br>

            Email:<br>
            <input type="text" name="email" value="<?php echo $email; ?>" readonly>

            <br>

            Phone:<br>
            <input type="text" name="phone" value="<?php echo $phone; ?>" readonly>

            <br>

            Title:<br>
            <input type="text" name="title" value="<?php echo $title; ?>" readonly>

            <br>

            Created:<br>
            <input type="text" name="created" value="<?php echo $created; ?>" readonly>

            <br>

            <input type="submit" value="Delete" name="delete">
            <input type="button" value="Home" onclick="goToIndex()">
        </fieldset>
    </form>

    <script>
        function goToIndex() {
            window.location.href = 'index.html';
        }
    </script>
</body>

</html>
