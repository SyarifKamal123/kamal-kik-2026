<?php
session_start();

$error = "";
$success = "";

// Data login sementara
// Nanti bisa diganti dengan database MySQL
$customer_email = "customer@gmail.com";
$customer_password = "123456";

$admin_email = "admin@restoran.com";
$admin_password = "admin123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $role = $_POST["role"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Login Customer
    if ($role == "customer") {

        if ($email == $customer_email && $password == $customer_password) {

            $_SESSION["login"] = true;
            $_SESSION["role"] = "customer";
            $_SESSION["email"] = $email;

            header("Location: customer.php");
            exit();

        } else {

            $error = "Email atau password customer salah!";
        }
    }

    // Login Admin
    elseif ($role == "admin") {

        if ($email == $admin_email && $password == $admin_password) {

            $_SESSION["login"] = true;
            $_SESSION["role"] = "admin";
            $_SESSION["email"] = $email;

            header("Location: admin.php");
            exit();

        } else {

            $error = "Email atau password admin salah!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Restoran</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;

            background: linear-gradient(
                135deg,
                #4b2e1f 0%,
                #7a4b32 50%,
                #f5eee7 50%,
                #ffffff 100%
            );

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 20px;
        }

        .container {
            width: 900px;
            max-width: 100%;

            min-height: 520px;

            background: white;

            border-radius: 20px;

            overflow: hidden;

            display: flex;

            box-shadow:
                0 15px 40px rgba(0,0,0,0.25);
        }

        /* BAGIAN KIRI */

        .left {
            width: 45%;

            background: #4b2e1f;

            color: white;

            display: flex;
            flex-direction: column;

            justify-content: center;
            align-items: center;

            text-align: center;

            padding: 40px;
        }

        .logo {
            width: 110px;
            height: 110px;

            border-radius: 50%;

            background: white;

            display: flex;
            justify-content: center;
            align-items: center;

            font-size: 50px;

            margin-bottom: 25px;
        }

        .left h1 {
            font-size: 34px;

            margin-bottom: 15px;
        }

        .left p {
            color: #ead8c8;

            line-height: 1.7;

            font-size: 15px;
        }

        .restaurant {
            margin-top: 25px;

            color: #d1ad92;

            letter-spacing: 3px;

            font-size: 13px;
        }

        /* BAGIAN KANAN */

        .right {
            width: 55%;

            padding: 50px;

            display: flex;
            flex-direction: column;

            justify-content: center;
        }

        .right h2 {
            color: #4b2e1f;

            font-size: 30px;

            margin-bottom: 8px;
        }

        .subtitle {
            color: #777;

            font-size: 14px;

            margin-bottom: 25px;
        }

        /* PILIH ROLE */

        .role {
            display: flex;

            gap: 10px;

            margin-bottom: 25px;
        }

        .role label {
            flex: 1;

            cursor: pointer;

            text-align: center;

            padding: 13px;

            border: 2px solid #d7c1b1;

            border-radius: 10px;

            color: #4b2e1f;

            font-weight: bold;
        }

        .role input {
            display: none;
        }

        .role input:checked + label {
            background: #4b2e1f;

            color: white;

            border-color: #4b2e1f;
        }

        /* FORM */

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;

            color: #4b2e1f;

            font-size: 14px;

            font-weight: bold;

            margin-bottom: 7px;
        }

        .form-group input {
            width: 100%;

            padding: 14px;

            border: 1px solid #d7c1b1;

            border-radius: 9px;

            outline: none;

            font-size: 14px;
        }

        .form-group input:focus {
            border-color: #7a4b32;

            box-shadow:
                0 0 0 3px rgba(122,75,50,0.12);
        }

        /* BUTTON */

        .login-button {
            width: 100%;

            padding: 14px;

            border: none;

            border-radius: 9px;

            background: #4b2e1f;

            color: white;

            font-size: 16px;

            font-weight: bold;

            cursor: pointer;
        }

        .login-button:hover {
            background: #7a4b32;
        }

        /* ERROR */

        .error {
            background: #f8d7da;

            color: #842029;

            border: 1px solid #f1aeb5;

            padding: 12px;

            border-radius: 8px;

            margin-bottom: 20px;

            font-size: 14px;
        }

        /* REGISTER */

        .register {
            text-align: center;

            margin-top: 20px;

            font-size: 13px;

            color: #777;
        }

        .register a {
            color: #4b2e1f;

            font-weight: bold;

            text-decoration: none;
        }

        /* RESPONSIVE */

        @media (max-width: 700px) {

            .container {
                flex-direction: column;
            }

            .left,
            .right {
                width: 100%;
            }

            .left {
                padding: 35px 25px;
            }

            .left h1 {
                font-size: 28px;
            }

            .right {
                padding: 35px 25px;
            }
        }

    </style>

</head>

<body>

    <div class="container">

        <!-- BAGIAN KIRI -->

        <div class="left">

            <div class="logo">
                🍽️
            </div>

            <h1>
                Selamat Datang
            </h1>

            <p>
                Nikmati berbagai hidangan lezat
                dengan cita rasa terbaik hanya
                di restoran kami.
            </p>

            <div class="restaurant">
                RESTAURANT & CAFE
            </div>

        </div>


        <!-- BAGIAN KANAN -->

        <div class="right">

            <h2>
                Login
            </h2>

            <p class="subtitle">
                Silakan pilih akun dan masukkan
                data login Anda.
            </p>


            <?php if ($error != ""): ?>

                <div class="error">
                    <?= $error ?>
                </div>

            <?php endif; ?>


            <form method="POST" action="">

                <!-- PILIH ROLE -->

                <div class="role">

                    <input
                        type="radio"
                        name="role"
                        id="customer"
                        value="customer"
                        checked
                    >

                    <label for="customer">
                        👤 Customer
                    </label>


                    <input
                        type="radio"
                        name="role"
                        id="admin"
                        value="admin"
                    >

                    <label for="admin">
                        🔐 Admin
                    </label>

                </div>


                <!-- EMAIL -->

                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        id="email"
                        placeholder="Masukkan email"
                        required
                    >

                </div>


                <!-- PASSWORD -->

                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Masukkan password"
                        required
                    >

                </div>


                <!-- BUTTON -->

                <button
                    type="submit"
                    class="login-button">

                    Login

                </button>

            </form>


            <div class="register">

                Belum punya akun?

                <a href="register.php">
                    Daftar sekarang
                </a>

            </div>

        </div>

    </div>

</body>

</html>
