<?php
session_start();
require_once 'Session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautiful Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6b8de3, #b5c7f2);
            font-family: 'Arial', sans-serif;
        }
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
        }
        .btn-custom {
            background-color: #6b8de3;
            color: white;
            border: none;
        }
        .btn-custom:hover {
            background-color: #556ec8;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="form-container">
        <h2 class="text-center mb-4">Registration Form</h2>

        <!-- Display Errors -->
        <?php if (Session::get('errors')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (Session::get('errors') as $error): ?>
                        <li><?=  Session::print($error);?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php Session::flash('errors'); // Clear errors after displaying ?>
        <?php endif; ?>
        <!-- Display Success -->
        <?php if (Session::get('success')): ?>
            <div class="alert alert-success">
                <ul>
                    <?php foreach (Session::get('success') as $success): ?>
                        <li><?=  Session::print($success);?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php Session::flash('success'); // Clear  ?>
        <?php endif; ?>
        <!-- Registration Form -->
        <form action="action.php" method="POST">
            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" class="form-control" name="name" placeholder="Enter your full name"
                       value="<?= htmlspecialchars(Session::get('name', '')); ?>">
            </div>

            <!-- Phone -->
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" id="phone" class="form-control" name="phone" placeholder="Enter your phone number"
                       value="<?= htmlspecialchars(Session::get('phone', '')); ?>">
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" name="email" placeholder="Enter your email address"
                       value="<?= htmlspecialchars(Session::get('email', '')); ?>">
            </div>

            <!-- URL -->
            <div class="mb-3">
                <label for="url" class="form-label">Website</label>
                <input type="url" id="url" class="form-control" name="url" placeholder="Enter your website URL (optional)"
                       value="<?= htmlspecialchars(Session::get('url', '')); ?>">
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password">
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" id="confirmPassword" class="form-control" name="confirmPassword" placeholder="Re-enter your password">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-custom w-100">Submit</button>
        </form>
    </div>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
