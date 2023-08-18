<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add-member_styles.css">
    <title>Document</title>
</head>

<body>
    <div class="admin-container">
        <h3 class="section-title">Add Admin</h3>

        <form action="admin-signup.php" method="post">
            <h2>Hatiya Chatro Forum Sign Up</h2>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="member_id">Member ID</label>
                <input type="text" id="member_id" name="member_id" required>
            </div>
            <button type="submit">Sign Up</button>
        </form>
        <!-- Admin related form fields -->
        <!-- <button type="submit">Add Admin</button> -->
    </div>
</body>

</html>