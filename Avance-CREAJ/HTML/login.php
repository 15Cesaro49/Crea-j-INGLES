<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../CSS/login.css" >
    <title>SaludRural</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="../php/login.php" class="sign-in-form" method="post" autocomplete="off">
            <h2 class="title">Login</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="E-mail " name="correo" required>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="contraseña"  required>
            </div>
            <input type="submit" value="INGRESAR" class="btn solid">
          </form>
          <form action="../php/registro.php" class="sign-up-form" method="post" autocomplete="off">
            <h2 class="title">Register</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Name" name="nombre" required>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Last name" name="apellidos" required>
              </div>
              <div class="input-field">
                <i class="fas fas fa-phone"></i>
                <input type="tel" placeholder="Phone" name="telefono" minlength="8" maxlength="11" required>
                </div>
                <div class="input-field">
                  <i class="fas far fa-id-card"></i>
                  <input type="tel" placeholder="DUI" name="dui" minlength="10" maxlength="12" required>
                  </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="E-mail " name="email" required>
            </div>
            <div class="input-field">
             <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="contra"  required>
                  </div>
                  <input type="submit" class="btn" value="CREAR CUENTA">
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>¿New here?</h3>
            <p>
            ¡Register now!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Register
            </button>
          </div>
          <img src="../IMAGENES/mano.png" class="image" alt="" >
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>¿You already have an account?</h3>
            <p>
              ¡Log in and make your donation now!
            </p>
            <button class="btn transparent" id="sign-in-btn">
            Login
            </button>
          </div>
          <img src="../IMAGENES/mano-login.png" class="image" alt="" >
        </div>
      </div>
    </div>

    <script src="../JS/app.js"></script>
  </body>
</html>

