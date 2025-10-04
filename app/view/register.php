<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <!-- Latest Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest Bootstrap JS (needed for modals, dropdowns, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <h2>Register</h2>

    <form action="index.php?route=register" method="post">
        <div>
            <label for="username">Username:</label><br>
            <input type="username" id="username" name="username" required>
        </div>
        <br>
        <!-- Email -->
        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required>
        </div>
        <br>

        <!-- Password -->
        <div>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required>
        </div>
        <br>

        <!-- Confirm Password -->
        <div>
            <label for="confirm_password">Confirm Password:</label><br>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <br>
        <div>
            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address" maxlength="255" required>
        </div>
        <br>
        <div>
            <label for="phone">Phone Number:</label><br>
            <input type="text" id="phone" name="phone" maxlength="20" required>
        </div>
        <br>

        <!-- Submit -->
        <button type="submit">Register</button>
    </form>
</body>

</html>