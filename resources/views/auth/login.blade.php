<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!--icons script link-->
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    @section('content_header')
    <script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.1.1/firebase-storage.js"></script>
    
    @stop
    
    <!--stylesheet link-->
  
    <link rel="stylesheet" href="{{ asset('archivo/login/signup.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/subir.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/custom.css') }}" /> --}}

    <!--title-->

  </head>
  
  <body>

    <!--container start-->
    <div class="container">
      <!--form container start-->
      <div class="forms-container">
        <div class="signin-signup">
          <div class="loader"></div>
          <!--Iniciar Seccion form start-->
          <form method="POST" class="sign-up-form" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <h2 class="title">Registrate</h2>

            <script src="{{ asset('js/jquery.facedetection.min.js') }}"></script>
            <script src="{{ asset('js/face-api.js') }}"></script>
            <script src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
            <script src="{{ asset('js/edad-ia.js') }}"></script>

               <div class="custom-input-file3">
                <i class="fas fa-camera" style="font-size: 20px;  position: absolute;left: 50%;top: 50%;transform: translate(-50%, -50%);"></i>
                  <img id="preview-imagen" class="imgcircle" src="" style="display:block;">
                  <canvas id="overlayCanvas" width="80" height="80">
                    <img hidden width="80" height="80" id="imgViewer">
                  </canvas>
                  <div class="loader"></div>
                  <input hidden id="imgInput" type="file" accept=".jpg, .jpeg, .png">
                  @error('foto')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                  

                  {{-- <input id="foto" type="file" class="input-file3 @error('foto') is-invalid @enderror" name="foto[]" accept="image/*" multiple> --}}
                  {{-- <input id="foto" type="file" class="input-file3 @error('foto.*') is-invalid @enderror" name="foto[]" accept="image/*" multiple> --}}

                   <input id="foto" type="file" class="input-file3 @error('foto') is-invalid @enderror" name="foto" accept="image/*">
                    <button hidden type="button" class="back-button">edad foto ia</button>
                    <progress id="upload-progress" value="0%" max="100"></progress>
                    @error('foto')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>                 
  
      

<script>
  const inputImagen = document.getElementById('foto');
  const previewImagen = document.getElementById('preview-imagen');
  const loader = document.querySelector('.loader');

  inputImagen.addEventListener('change', () => {
    const archivo = inputImagen.files[0];
    if (archivo) {
      const lector = new FileReader();
      lector.readAsDataURL(archivo);
      lector.addEventListener('load', () => {
        loader.style.display = 'block';
        previewImagen.src = lector.result;
        previewImagen.addEventListener('load', () => {
          loader.style.display = 'none';
        });
      });
    } else {
      previewImagen.src = '';
    }
  });

  const input = document.getElementById('foto');
  const progress = document.getElementById('upload-progress');

  input.addEventListener('change', (event) => {
    const file = event.target.files[0];
    const formData = new FormData();

    formData.append('file', file);

    const xhr = new XMLHttpRequest();

    xhr.upload.addEventListener('progress', (event) => {
      if (event.lengthComputable) {
        const percent = (event.loaded / event.total) * 100;
        progress.value = percent;
      }
    });

    //xhr.open('POST', '');
    xhr.send(formData);
  });
</script>


<select name="tipo" id="tipo" placeholder="tipo" class="input-field">
  <i class="fas fa-user"></i>
    <option value="">Seleccione el tipo de usuario</option>
    <option value="Fotografo"><i class="fas fa-user"></i> Fotografo</option>
    <option value="Usuario">Usuario</option>
    <option value="Organizador">Organizador</option>
</select>


@error('tipo')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror



 
            <!--input for username-->
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="nombre completo" />
            </div>

          
        

            <!--input for email address-->
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="correo@gmail.com" />
            </div>
            <!--input for password-->
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="contraseña" />
            </div>

            <!--input for password2-->
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="contraseña confirmar"/>
              </div>


            <!--Registrate button-->
            <input onclick="subirFoto()" type="submit" class="btn" value="Registrate" />
            <p class="social-text">O Regístrese en las plataformas sociales</p>
            <!--social media icons list start-->
            <div class="social-media">
              <!--facebook link-->
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <!--twitter link-->
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <!--google account link-->
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <!--linkedin link-->
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          <!--Registrate form end-->
          
           
          <!--Iniciar Seccion form end-->
        
          
          <!--Registrate form start-->
          <form method="POST" class="sign-in-form" action="{{ route('login') }}">
            @csrf
        <h2 class="title">Iniciar Seccion</h2>
        <!--input for username-->
        <div class="input-field">
          <i class="fas fa-user"></i>
          <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email" />
          @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
        </div>
        <!--input for password-->
        <div class="input-field">
          <i class="fas fa-lock"></i>
          <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password" />
          @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
         @enderror
        </div>

        <div class="row mb-3">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <!--log in button-->
        <input type="submit" value="Login" class="btn solid" />
        @if (Route::has('password.request'))
        <a class="" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        @endif
        
        <p class="social-text">O Regístrese en las plataformas sociales</p>
        <!--social media icons list start-->
        <div class="social-media">
          <!--facebook link-->
          <a href="{{ url('auth/facebook') }}" action="{{ route('login') }}" class="social-icon">
            <i class="fab fa-facebook-f"></i>
          </a>
          <!--twitter link-->
          <a href="#" class="social-icon">
            <i class="fab fa-twitter"></i>
          </a>
          <!--google account link-->
          <a href="#" class="social-icon">
            <i class="fab fa-google"></i>
          </a>
          <!--linkedin link-->
          <a href="#" class="social-icon">
            <i class="fab fa-linkedin-in"></i>
          </a>
        </div>
        <!--social media icons list end-->
      </form>
          <!--Registrate form end-->
        </div>
      </div>
      <!--form container end-->


      <!--panel container start-->
      <div class="panels-container">
        <!--left panel for Iniciar Seccion form start-->
        <div class="panel left-panel">
          <div class="content">
            <h3>IA-Denuncia</h3>
            <p>
              "Denunciar no solo es un derecho, sino también una responsabilidad ciudadana."
            </p>
            <!--Registrate button-->
            <button class="btn transparent" id="sign-up-btn">
              Registrate
            </button>
            
          </div>
          <!--image tag for svg file-->
          <img src="{{ asset('img/log.svg') }}" class="image" alt="" />
        </div>
        <!--left panel for Iniciar Seccion form start-->
        
        <!--right panel for Registrate form start-->
        <div class="panel right-panel">
          <div class="content">
            <h3>IA-Denuncia</h3>
            <p>
              "Denunciar es contribuir a construir un mundo más justo y equitativo."
            </p>
            <!--Iniciar Seccion button-->
            <button class="btn transparent" id="sign-in-btn">
              Iniciar Seccion
            </button>

          </div>
          <!--image tag for svg file-->
          <img src="{{ asset('img/register.svg') }}" class="image" alt="" />
        </div>
         <!--right panel for Registrate form end-->
      </div>
     <!--panel container end-->
    </div>
    <!--container end-->

    <!--script file javascript-->
    <script src="{{ asset('archivo/login/app.js') }}"></script>
  </body>
</html>
