<?php
include "configure.php";

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $title = $_POST['title'];
    $created = $_POST['created'];

    $sql = "INSERT INTO users (`name`, `email`, `phone`, `title`, `created`) VALUES ('$name', '$email', '$phone', '$title', '$created')";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "New record created successfully!!!";
    } else {
        echo "ERROR!!!" . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Your HTML form remains unchanged
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Contact</title>
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
    <form action="" method="POST">
        <h2>Create Contact</h2>
        <fieldset>
            <legend>Personal Information:</legend>

            Name:<br>
            <input type="text" name="name" required>

            <br>

            Email:<br>
            <input type="text" name="email" required>

            <br>

            Phone:<br>
            <input type="text" name="phone" required>

            <br>

            Title:<br>
            <input type="text" name="title" required>

            <br>

            Created:<br>
            <input type="date" name="created" required>

            <br>

            <input type="submit" value="Submit" name="submit">
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
