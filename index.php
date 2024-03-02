<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicio de sesión</title>
  <link href="./assets/bootstrap-5.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="./assets/bootstrap-5.3/css/sign-in.css" rel="stylesheet">
  <link href="./assets/custom/css/style.css" rel="stylesheet">
  <script src="./assets/bootstrap-5.3/js/color-modes.js"></script>
  <script src="./assets/bootstrap-5.3/js/bootstrap.bundle.min.js"></script>
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
  <main class="form-signin w-100 m-auto">
    <form action="./scripts/login_manager.php" method="post">
      <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
      <h1 class="title-login-register">Inicia Sesión</h1>

      <div class="form-floating">
        <input type="username" class="form-control" name="username" id="username">
        <label for="username">Usuario</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" name="password" id="password">
        <label for="password">Contraseña</label>
      </div>

      <div class="form-check text-start my-3">
        <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Mantener sesión iniciada
        </label>
      </div>
      <button class="btn btn-primary w-100 py-2" style="margin-bottom: 5px;" type="submit">Iniciar sesión</button>
      <a class="btn btn-secondary w-100 py-2" type="submit" href="./pages/sign_up.php">Regístrate</a>
      <p class="mt-5 mb-3 text-body-secondary">&copy; 2024</p>
    </form>
  </main>
</body>

</html>