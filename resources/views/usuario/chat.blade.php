@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')


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


<div class="chat-input">
    <input type="text" placeholder="Escribe tu mensaje...">
    <button>Enviar</button>
</div>

<div class="chat-box">
  <div class="chat-input bg-primary" id="chatInput" contenteditable="">
  </div>
</div>

</div>



@stop

@section('css')




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
@stop

@section('js')

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
@stop