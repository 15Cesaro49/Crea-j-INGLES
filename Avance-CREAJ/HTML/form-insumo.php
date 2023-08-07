<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Donacion monetaria</title>
    <link rel="stylesheet" href="../CSS/form-donaciones.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
<body>

    <div class="container">
      <header>Donation of supplies</header>
      <div class="progress-bar">
        <div class="step">
          <p>Step 1</p>
          <div class="bullet">
            <span>1</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p>Step 2</p>
          <div class="bullet">
            <span>2</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p>Step 3</p>
          <div class="bullet">
            <span>3</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p>End</p>
          <div class="bullet">
            <span>4</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
      </div>
      <div class="form-outer">
        <form action="../PHP/registrar_donacion_2.php" method="post">
          <div class="page slide-page">
            <div class="field">
              <div class="label">Full Name</div>
              <input type="text" name="nombre" required>
            </div>
            <div class="field">
              <div class="label">E-mail</div>
              <input type="text" name="correo" required>
            </div>
            <div class="field">
              <button class="firstNext next">Next</button>
            </div>
          </div>

          <div class="page">
            <div class="title">Contact Information</div>
            <div class="field">
              <div class="label">Telephone Number</div>
              <input type="Number" name="telefono" required>
            </div>
            <div class="field">
              <div class="label">Date of donation</div>
              <input type="datetime-local" name="fecha" required>
            </div>
            <div class="field btns">
              <button class="prev-1 prev">Back</button>
              <button class="next-1 next">Next</button>
            </div>
          </div>

          <div class="page">
            <div class="field">
              <div class="label">Name of medical supply</div>
              <input type="text" name="insumo" required>
            </div>
            <div class="field">
              <div class="label">Quantity of medical supplies</div>
              <input type="number"name="cantidad" required>
            </div>
            <div class="field btns">
              <button class="prev-2 prev">Back</button>
              <button class="next-2 next">Next</button>
            </div>
          </div>

          <div class="page">
            <div class="field">
              <div class="label" >Name of hospital </div>
              <input type="text" placeholder="Donde sera entregada la donacion" name="hospital" required>
            </div>
            <div class="field">
              <div class="label">Description of the input</div>
              <input type="text" placeholder="Informacion del insumo" name="descripcion" required>
            </div>
            <div class="field btns">
              <button class="prev-3 prev">Back</button>
              <button class="submit">Sent</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script src="../JS/donaciones.JS"></script>
  </body>
</html>
