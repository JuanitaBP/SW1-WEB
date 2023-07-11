<div id="modal_create_ciudad" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ url('administracion/ciudad') }}" method="post" id="ciudad_guardar" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="read" name="latitud" id="latitud">
                    <input type="read" name="longitud" id="longitud">
                    <div class="row">
                        <div class="mapa" style="height: 280px" id="mapa">

                        </div>
                    </div>

                    <div class="row mb-6">
                        <div class="form-group col-md-12">
                            <label class="form-label">Imagen <strong class="required" aria-required="true"></strong></label>
                            <div class="image-upload-wrap">
                                <input class="file-upload-input" type="file" name="imagen" onchange="readURL(this);" accept="image/jpg, image/jpeg,image/png" required="">
                                <div class="drag-text">
                                    <h3>Arrastra la imagen o selecciona, solo imagen menos de 500KB</h3>
                                </div>
                            </div>
                            <div class="file-upload-content">
                                <img class="file-upload-image" src="#" alt="bandera">
                                <div class="image-title-wrap">
                                    <button type="button" onclick="removeUpload()" class="remove-image">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Cancelar</button>

                    <button type="submit" data-bs-dismiss="modal" class="btn btn-primary"> Guardar </button>
                </div>
            </form>
        </div>
    </div>
</div>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  <script src="https://unpkg.com/leaflet.heat/dist/leaflet-heat.js"></script>
  <script>
    // Inicializar el mapa
    let mapa = L.map('mapa').setView([-17.782458341269383, -63.1783962838879], 15);

    // Agregar la capa base del mapa
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
      maxZoom: 18,
    }).addTo(mapa);

    let marcador;

    // Manejador de eventos al hacer clic en el mapa
    function onMapClick(e) {
  // Eliminar marcador existente, si lo hay
  if (marcador) {
    mapa.removeLayer(marcador);
  }

  // Crear un nuevo marcador en la ubicación del clic
  marcador = L.marker(e.latlng).addTo(mapa);

  // Obtener latitud y longitud del clic
  const lat = e.latlng.lat;
  const lng = e.latlng.lng;

  // Rellenar los campos ocultos con las coordenadas
  document.getElementById('latitud').value = lat;
  document.getElementById('longitud').value = lng;

  // Mostrar latitud y longitud en la consola
  console.log('Latitud:', lat);
  console.log('Longitud:', lng);
}

    // Agregar el manejador de eventos al mapa
    mapa.on('click', onMapClick);
  </script>
