<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Logis Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"><link rel="stylesheet" href="../../css/style.css">
  <!-- Favicons -->
  <link href="assets-principal/img/favicon.png" rel="icon">
  <link href="assets-principal/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets-principal/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets-principal/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets-principal/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets-principal/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets-principal/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets-principal/vendor/aos/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.1/dist/leaflet.css" />
  <link href="{{ asset('assets/css/chat.css') }}" rel="stylesheet">
  <style>
    #map {
      height: 550px;
    }

    #map-container {
      position: relative;
      top: 50px;
    }

    .header {
      /* Estilos para el encabezado */
    }

    .footer {
      /* Estilos para el pie de página */
    }
  </style>

  <!-- Template Main CSS File -->
  <link href="assets-principal/css/main.css" rel="stylesheet">



  <!-- =======================================================
  * Template Name: Logis
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header class="header">
    <div id="header-container">
      @include('layout.header')
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  {{-- @include('layout.HeroSection') --}}
  <!-- End Hero Section -->

  <div id="map-container">
    <main id="main">
    </head>
    <body>








      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
      <!-- CSS only -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
      <style>
.chat-container {
    max-width: 600px;
    margin: 0 auto;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
}

/* Estilos del encabezado */
.chat-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-bottom: 10px;
    border-bottom: 1px solid #ccc;
}

.logo {
    font-weight: bold;
}

.online-status {
    background-color: #00ff00;
    color: white;
    padding: 5px 10px;
    border-radius: 10px;
}

/* Estilos de los mensajes */
.chat-content {
    margin-top: 10px;
}

.message {
    display: flex;
    margin-bottom: 10px;
}

.user-avatar img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 10px;
}

.message-content {
    background-color: #f0f0f0;
    padding: 10px;
    border-radius: 10px;
}

.message-text {
    margin: 0;
}

.message-time {
    font-size: 12px;
    color: #888;
}

/* Estilos del campo de entrada */
.chat-input {
    display: flex;
    margin-top: 10px;
}

.chat-input input {
    flex-grow: 1;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px 0 0 5px;
}

.chat-input button {
    padding: 5px 10px;
    border: none;
    background-color: #4caf50;
    color: white;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
}
      </style>
 


      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
      <script src="https://cdn.socket.io/4.0.1/socket.io.min.js" integrity="sha384-LzhRnpGmQP+lOvWruF/lgkcqD+WDVt9fU3H4BWmwP5u5LTmkUGafMcpZKNObVMLU" crossorigin="anonymous"></script>


      <script>
          $(function() {
              let ip_address = '127.0.0.1';
              let socket_port = '3000';
              let socket = io(ip_address + ':' + socket_port);

              let chatInput = $('#chatInput');

              chatInput.keypress(function(e) {
                  let message = $(this).html();
                  console.log(message);
                  if(e.which === 13 && !e.shiftKey) {
                      socket.emit('sendChatToServer', message);
                      chatInput.html('');
                      return false;
                  }
              });

              socket.on('sendChatToClient', (message) => {
                  $('.chat-content ul').append(`<li>${message}</li>`);
              });
          });
      </script>








    <!-- partial:index.partial.html -->
    <section class="msger">
      <header class="msger-header">
        <div class="msger-header-title">
          <i class="fas fa-comment-alt"></i> chat
        </div>
        <div class="msger-header-options">
          <span><i class="fas fa-cog"></i></span>
        </div>
      </header>




    {{-- <div class="chat-box">
            <div class="chat-input bg-primary" id="chatInput" contenteditable="">

            </div>
    </div> --}}

       

  
      <div class="chat-container">
        <div class="chat-header">
            <div class="logo">Logo del chat</div>
            <div class="online-status">En línea</div>
        </div>
        <div class="chat-content">
         


            <div class="message">
              <div class="user-avatar">
                  <img src="avatar1.jpg" alt="Avatar del usuario">
              </div>
              <div class="message-content">
                  <ul class="message-text">¡Hola! ¿Cómo estás?</ul>
                  <p class="message-time">12:30 PM</p>
              </div>
          </div>

     



          
          </div>

            <!-- Más mensajes aquí -->
        </div>

        
        {{-- <div class="chat-input">
            <input type="text" placeholder="Escribe tu mensaje...">
            <button>Enviar</button>
        </div> --}}

        <div class="chat-box">
          <div class="chat-input bg-primary" id="chatInput" contenteditable="">
          </div>
        </div>

    </div>
  


      <main class="msger-chat">
        <div class="msg left-msg">
          <div
           class="msg-img"
           style="background-image: url(https://image.flaticon.com/icons/svg/327/327779.svg)"
          ></div>

          <div class="msg-bubble">
            <div class="msg-info">
              <div class="msg-info-name">BOT</div>
              <div class="msg-info-time">12:45</div>
            </div>

            <div class="msg-text">
              ¡Hola, bienvenido al chat! Adelante, envíame un mensaje.. 😄
            </div>
            
            




         
         
         
          </div>
        </div>

        <div class="msg right-msg">
          <div
           class="msg-img"
           style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"
          ></div>

          <div class="msg-bubble">
            <div class="msg-info">
              <div class="msg-info-name">oscar</div>

              <div class="msg-info-time">12:46</div>
            </div>

            <div class="msg-text" id="chatInput" contenteditable="">
              ¡Puedes cambiar tu nombre en la sección JS!
            </div>
            
            <div class="msg-foto">
            <img src="ejemplo.png" width="100" height="80">
          </div>

          </div>
        </div>
      </main>

      <form class="msger-inputarea">
        <input type="text" class="msger-input" placeholder="Ingrese su mensaje...">
        <button type="submit" class="msger-send-btn">Enviar</button>
      </form>
    </section>
    <!-- partial -->
      <script src='https://use.fontawesome.com/releases/v5.0.13/js/all.js'></script>











    </body>

    </main>
  </div>

  <!-- ======= Footer ======= -->
  <footer class="footer">
    @include('layout.footer')
  </footer>
  <!-- End Footer -->

  {{-- <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a> --}}

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets-principal/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets-principal/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets-principal/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets-principal/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets-principal/vendor/aos/aos.js"></script>
  <script src="assets-principal/vendor/php-email-form/validate.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>

  <!-- Template Main JS File -->
  <script src="assets-principal/js/main.js"></script>
  <script>
    const msgerForm = get(".msger-inputarea");
  const msgerInput = get(".msger-input");
  const msgerChat = get(".msger-chat");

  const BOT_MSGS = [
  "¿Hola, cómo estás?",
  "Ohh... No puedo entender lo que intentas decir. ¡Lo siento!",
  "Me gusta jugar... ¡pero no sé jugar!",
  "Lo siento si mis respuestas no son relevantes. :))",
  "¡Tengo sueño! :("];


  // Icons made by Freepik from www.flaticon.com
  const BOT_IMG = "https://image.flaticon.com/icons/svg/327/327779.svg";
  const PERSON_IMG = "https://image.flaticon.com/icons/svg/145/145867.svg";
  const BOT_NAME = "BOT";
  const PERSON_NAME = "Sajad";

  msgerForm.addEventListener("submit", event => {
    event.preventDefault();

    const msgText = msgerInput.value;
    if (!msgText) return;

    appendMessage(PERSON_NAME, PERSON_IMG, "right", msgText);
    msgerInput.value = "";

    botResponse();
  });

  function appendMessage(name, img, side, text) {
    //   Simple solution for small apps
    const msgHTML = `
      <div class="msg ${side}-msg">
        <div class="msg-img" style="background-image: url(${img})"></div>

        <div class="msg-bubble">
          <div class="msg-info">
            <div class="msg-info-name">${name}</div>
            <div class="msg-info-time">${formatDate(new Date())}</div>
          </div>

          <div class="msg-text">${text}</div>
        </div>
      </div>
    `;

    msgerChat.insertAdjacentHTML("beforeend", msgHTML);
    msgerChat.scrollTop += 500;
  }

  function botResponse() {
    const r = random(0, BOT_MSGS.length - 1);
    const msgText = BOT_MSGS[r];
    const delay = msgText.split(" ").length * 100;

    setTimeout(() => {
      appendMessage(BOT_NAME, BOT_IMG, "left", msgText);
    }, delay);
  }

  // Utils
  function get(selector, root = document) {
    return root.querySelector(selector);
  }

  function formatDate(date) {
    const h = "0" + date.getHours();
    const m = "0" + date.getMinutes();

    return `${h.slice(-2)}:${m.slice(-2)}`;
  }

  function random(min, max) {
    return Math.floor(Math.random() * (max - min) + min);
  }
  </script>



</body>

</html>
