<!-- Modal -->
<div class="modal fade"id="modalEditar{{$servicio->id_servicio}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Editar Servicio</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="/servicios/{{$servicio->id_servicio}}"   enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                  <div class="mb-3">
                    <label for="" class="form-label">Nombre</label>
                    <input  name="nombre" type="text" value="{{$servicio->nombre_servicio}}" class="form-control" tabindex="1">    
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="10">{{$servicio->descripcion_servicio}}</textarea>
                  </div>
                  <label for="exampleFormControlSelect1">Categoría</label>
                <select class="form-control" name="categoria" id="categoria">
                
                @foreach($categorias as $categoria)
                    @if($categoria->id_categoria == $servicio->id_categoria)
                        <option value="{{$categoria->id_categoria}}" selected>{{$categoria->nombre_categoria}}</option>
                    @else
                        <option value="{{$categoria->id_categoria}}">{{$categoria->nombre_categoria}}</option>
                    @endif
                @endforeach
                </select> 
                  <div class="mb-3">
                    <label for="" class="form-label">Imagen</label>
                    <input type="file" id="imagen" name="imagen" >
                  </div>

                  <div  class ="mb-3 mt-3" id="imagenPreview"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>
              </div>
            </div>
          </div>