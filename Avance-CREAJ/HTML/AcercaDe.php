<?php
session_start();
error_reporting(0);

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['correo']) || empty($_SESSION['correo'])) {
    echo '<script language="javascript">alert("Por favor inicie sesión o regístrese");window.location.href="../HTML/login.php"</script>';
    die();
} else {
    include("../PHP/conex.php");

    // Consulta SQL para obtener el ID del usuario según el correo electrónico
    $correo = $_SESSION['correo'];
    $query = "SELECT id FROM registro WHERE correo = '$correo'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['usuario_id'] = $row['id'];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <link rel="shortcut icon" href="../Imagenes/favicon.png" />
        <title>Acerca De</title>
        <link rel="stylesheet" href="../CSS/AcercaDe.css">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    </head>
    <nav class="bg-white p-4">
      <div class="flex justify-between items-center">
          <!-- Logo o nombre del sitio -->
          <div class="logo"><img src="../Imagenes/logo.png" width="150" height="90"></div>

          <!-- Menú de navegación -->
          <ul class="flex space-x-4">
              <li><a href="Index.php" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Inicio</a></li>
              <li class="relative">
                  <!-- Enlace con menú desplegable -->
                  <a href="#" class="text-black hover:bg-green-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium" id="donaciones-menu">
                      <span>Donations</span>
                      <i class="fas fa-chevron-down ml-1"></i> <!-- Flecha hacia abajo -->
                  </a>

                  <!-- Menú desplegable -->
                  <ul class="absolute top-10 left-1/2 transform -translate-x-1/2 bg-white shadow-md rounded-md hidden" id="donaciones-menu-items">
                      <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Medications</a></li>
                      <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Medical equipment</a></li>
                      <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Medical supplies</a></li>
                      <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Monetary</a></li>
                      <li><a href="donaciones-reali.php" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Performed</a></li>
                  </ul>
              </li>
              <li><a href="#" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Blog</a></li>
              <li><a href="#" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium">About us</a></li>
              <li class="relative">
                  <!-- Enlace con menú desplegable -->
                  <a href="#" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium" id="hospitales-menu">
                      <span>Hospitals</span>
                      <i class="fas fa-chevron-down ml-1"></i> <!-- Flecha hacia abajo -->
                  </a>

                  <!-- Menú desplegable -->
                  <ul class="absolute top-10 left-1/2 transform -translate-x-1/2 bg-white shadow-md rounded-md hidden" id="hospitales-menu-items">
                      <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Current needs</a></li>
                      <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Success Stories</a></li>
                  </ul>
              </li>
          </ul>

          <div class="relative">
              <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">Open user menu</span>
                  <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              </button>
              <!-- Menú desplegable del usuario -->
              <ul class="absolute right-0 mt-2 py-2 w-50 bg-white rounded-lg shadow-md hidden" id="user-menu">
              <?php
              // Mostrar nombre del usuario si está disponible en la sesión
              if (isset($_SESSION['correo']) && !empty($_SESSION['correo'])) {
                  echo '<li><a href="#" class="block px-1 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">' . $_SESSION['correo'] . '</a></li>';
              }
              ?>
              <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Configuration</a></li>
              <li><a href="../PHP/cerrar.php" class="block px-4 py-2 text-red-600 hover:bg-red-600 hover:text-white">Close Session</a></li>
          </ul>
          </div>
  </nav>

    <body>
      <!-- Código del slider carrusel -->
      <!--<div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active c-item">
            <img src="../Imagenes/Fondo1.jpeg" class="d-block w-100 c-img" alt="...">
          </div>
          <div class="carousel-item c-item">
            <img src="../Imagenes/Imagen2.png" class="d-block w-100 c-img" alt="...">
          </div>
          <div class="carousel-item c-item">
            <img src="../Imagenes/Fondo3.jpeg" class="d-block w-100 c-img" alt="...">
          </div>
        </div>
      </div>-->

      <!-- Código de la info Sobre Nosotros -->
      <div class="container1">
        <div class="text">
          <h2 class="subtitle">
            <strong>About Us</strong>
          </h2>
          <p>We are an organization that seeks to help the neediest society in our country. <span class="bolded1">"El Salvador"</span>, through donations to hospitals and medical centers located in rural areas of the country, i.e., the marginalized and abandoned communities that exist throughout the country.</p>
        </div>
        <div class="image">
          <img class="donativoimg" src="../Imagenes/CajaDonativos.png" width="330" height="250" alt="imagen">
        </div>
      </div>
      
      <div class="container">
        <div class="paragraph">
          <p>Our team is made up of passionate professionals committed to public health and equity in healthcare. We work closely with hospitals and medical centers in rural areas to understand their needs and provide the necessary support. We value transparency and accountability in our work. We strive to maintain clear communication with our donors and partners, providing them with updates on how their contributions are being used and the impact they are making.</p>
        </div>
        <div class="paragraph">
          <p>At <span class="bolded">Rural Heat</span>, we strongly believe in the power of solidarity and generosity. Through our platform, we enable individuals and organizations to donate securely and directly to specific projects and needs of rural hospitals and medical centers. We facilitate the connection between donors and recipients, ensuring that every donation has a meaningful and positive impact on people's lives. We are excited to be a part of change and progress in rural healthcare. <a href="../HTML/login.php"><span class="negra">Join us at RuralHeat</span></a>and together let's make a difference in the health and well-being of our country's rural communities.</p>
        </div>
      </div>

      <div class="targets-container">
        <div class="target">
          <h3><strong>Mission</strong></h3>
          <p>To be an organization that promotes and facilitates donations to hospitals and medical centers located in rural areas of the country. <strong class="strongT">RuralHeat</strong> is committed to effectively connect donors with these institutions, providing a secure and transparent platform to channel resources and support medical care in the most remote and marginalized communities throughout the country. Finally, to drive meaningful change in healthcare, promoting equity and improving the quality of life for those who need it most.</p>
        </div>
        <div class="target">
          <h3><strong>Visión</strong></h3>
          <p>We want to be a leading organization in the field of donations to hospitals and medical centers in rural areas of the country. We strive to be the main reference for those who wish to contribute to the welfare of rural communities through meaningful and impactful donations. We seek to establish solid alliances with hospitals and medical centers, as well as with committed donors, to build a culture of equity in the future, and to make access to medical care a reality for all, regardless of their geographic location. We aspire to be recognized as an agent of change in rural health care, improving people's quality of life and generating a lasting impact on the health of the Salvadoran population.</p>
        </div>
      </div>
 
      <h2><strong>History of RuralHeat</strong></h2>
      <p><strong>RuralHeat</strong> was born as a joint idea of 5 students of the <a href="https://www.cdb.edu.sv/"><strong>Don Bosco School</strong></a>, these students are: Xavier Zañas, Carlos López, David Murgas, César Serrano and Julio Jacinto. These young men shared a common passion for helping others and were always looking for ways to make a positive difference in society.</p>
      <p>One day, as they were meeting in the school library to work on a joint project, an idea came to their minds. They realized that many nearby rural communities lacked adequate access to health services, and this troubled them deeply. They decided to join forces and create a solution that could make a difference in the lives of people in these areas.</p>
      <p>Thus was born <strong>RuralHeat</strong>, a non-profit organization with a clear vision: to facilitate donations to hospitals and medical centers in rural areas through a web platform. The five students dedicated themselves entirely to this project, investing their time, effort and knowledge in its development.</p>
      <p>They worked hard to design and build an intuitive and secure platform where people could donate easily and transparently. They knew that donor trust was critical, so they made sure to put robust security measures in place to protect the privacy and integrity of transactions.</p>
      <p>The story of SaludRural became an example of how a simple idea, driven by passion and a desire to help, can become a powerful force for change. The five students demonstrated that no matter how young they are, if they have a vision and work together, they can make a significant difference in society..</p>
      <p>To this day, SaludRural continues its work, growing and expanding to bring hope and improve the quality of life of rural communities through the solidarity and generosity of those who believe in its mission.</p>
    </body>

    <!-- Código del footer -->
    <footer>
      <!--<section class="footer">
        <div class="social">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-whatsapp"></i></a>
        </div>

        <ul class="list">
          <li>
            <a href="#">Inicio</a>
          </li>
          <li>
            <a href="#">Donaciones</a>
          </li>
          <li>
            <a href="#">Blog</a>
          </li>
          <li>
            <a href="#">Acerca de</a>
          </li>
        </ul>

        <hr class="line1">

        <p class="copyright">
          <small id="26">&copy; 2023 <b>SaludRural</b> - Todos los Derechos Reservados.</small>
        </p>
      </section>-->

      <div class="footer-content">
        <h3>RuralHeat</h3>
        <p>If you want to know more information.</p>

        <!-- Íconos de las redes sociales -->
        <ul class="socials">
          <li><a href="" class="fab fa-facebook"></a></li>
          <li><a href="" class="fab fa-instagram"></a></li>
          <li><a href="" class="fab fa-twitter"></a></li>
          <li><a href="" class="fab fa-whatsapp"></a></li>
        </ul>
        <!-- Menú en el footer -->
        <div class="footer-menu">
          <ul class="f-menu">
            <li><a href=""><strong>Home</strong></a></li>
            <li><a href="">Donations</a></li>
            <li><a href="">Blog</a></li>
            <li><a href="">About us</a></li>
          </ul>
        </div>
      </div>

      <!-- Footer sub-alterno -->
      <div class="footer-bottom">
        <p><small id="26">&copy; 2023 <b>RuralHeat</b> - All rights reserved.</small></p>
      </div>
    </footer>
    
    <script>
    // Script para mostrar/ocultar el menú desplegable del usuario al hacer clic en el botón del usuario
    const userMenuButton = document.getElementById('user-menu-button');
    const userMenu = document.getElementById('user-menu');
    userMenuButton.addEventListener('click', () => {
        userMenu.classList.toggle('hidden');
    });

    // Script para mostrar/ocultar el menú desplegable de donaciones al hacer clic en el botón de donaciones
    const donacionesMenuButton = document.getElementById('donaciones-menu');
    const donacionesMenuItems = document.getElementById('donaciones-menu-items');
    donacionesMenuButton.addEventListener('click', () => {
        donacionesMenuItems.classList.toggle('hidden');
    });
    // Script para mostrar/ocultar el menú desplegable de donaciones al hacer clic en el botón de donaciones
    const hospitalesMenuButton = document.getElementById('hospitales-menu');
    const hospitalesMenuItems = document.getElementById('hospitales-menu-items');
    hospitalesMenuButton.addEventListener('click', () => {
        hospitalesMenuItems.classList.toggle('hidden');
    });
</script>
</html>