<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Signin Template · Bootstrap v5.3</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles for Admin Login -->
    <link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/admin_login.css">  <!-- Custom CSS for your form -->

    <style>
      /* Additional custom styles from the first template */
      body {
        background: #f0f2f5;
        font-family: 'Arial', sans-serif;
      }
      .container-login100 {
        width: 100%;
        background-image: url('images/bg-01.jpg');
        background-size: cover;
        background-position: center;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .wrap-login100 {
        padding: 30px;
        background: rgba(255, 255, 255, 0.8);
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
      }
      .login100-form-title {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
        font-weight: bold;
      }
      .wrap-input100 {
        position: relative;
        margin-bottom: 20px;
      }
      .input100 {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
      }
      .focus-input100 {
        position: absolute;
        top: 12px;
        left: 12px;
        color: #999;
      }
      .login100-form-btn {
        width: 100%;
        padding: 12px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      .login100-form-btn:hover {
        background-color: #45a049;
      }
    </style>

  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">

    <div class="container-login100">
      <div class="wrap-login100 p-t-30 p-b-50">
        <h1 class="login100-form-title p-b-41">
          Admin Login
        </h1>
        <form action="phpcode/log_admin_code.php" class="login100-form validate-form p-b-33 p-t-5" method="POST" id="admin_login" name="admin_login">

          <div class="wrap-input100 validate-input" data-validate="Enter email">
            <input class="input100" type="email" name="email" id="email" placeholder="Email address">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input class="input100" type="password" name="pass" id="pass" placeholder="Password">
            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
          </div>

          <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Remember me
            </label>
          </div>

          <div class="container-login100-form-btn m-t-32">
            <button class="login100-form-btn" type="submit" name="submit" id="submit">
              Sign In
            </button>
          </div>

          <p class="mt-5 mb-3 text-body-secondary text-center">
            &copy; 2023–2024
          </p>
        </form>
      </div>
    </div>

    <!-- Bootstrap 5 Scripts -->
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>
