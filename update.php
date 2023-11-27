<?php
include "configure.php";

// Initialize variables
$id = $name = $email = $phone = $title = $created = '';

// Check if the form is submitted for update
if (isset($_POST['update'])) {
    // Retrieve values from the form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $title = $_POST['title'];
    $created = $_POST['created'];

    // Update the record in the database
    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone', title='$title', created='$created' WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "Updated record successfully!";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Fetch data from the database for the specified ID
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
?>

<!DOCTYPE html>
<html>

<body>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        header {
            background-color: rgb(121, 118, 194);
            color: white;
            padding: 10px;
            text-align: center;
        }

        form {
            margin: 20px auto; /* Updated to center the form */
            width: 50%;
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

        button {
            background-color: rgb(121, 118, 194);
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: rgb(230, 236, 255);
            color: rgb(121, 118, 194);
        }
    </style>
    <center><h2>User Update Form</h2></center>
    <form action="" method="POST">
        <fieldset>
            <legend>User Information:</legend>

            ID:<br>
            <input type="text" name="id" value="<?php echo $id; ?>" readonly><br>

            Name:<br>
            <input type="text" name="name" value="<?php echo $name; ?>"><br>

            Email:<br>
            <input type="text" name="email" value="<?php echo $email; ?>"><br>

            Phone:<br>
            <input type="text" name="phone" value="<?php echo $phone; ?>"><br>

            Title:<br>
            <input type="text" name="title" value="<?php echo $title; ?>"><br>

            Created:<br>
            <input type="date" name="created" value="<?php echo $created; ?>"><br>

            <input style="background-color: rgb(121, 118, 194); color: white;" type="submit" value="Update" name="update">
            <input style="background-color: rgb(121, 118, 194); color: white;" type="button" value="Home" onclick="goToIndex()">
        </fieldset>
    </form>
    <script>
        function goToIndex() {
            window.location.href = 'index.html';
        }
    </script>
</body>

</html>
