<!-- Modal -->
<div class="modal fade" id="cambioClave" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="cambioClaveLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cambioClaveLabel">Cambio de Contraseña</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formCambioClave" name="formCambioClave" >
        <input type="text" class="invisible" name="opc" id="opc" value='5'/>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-10 mt-3">
                        <label for="CambioPassword0" class="form-label">Password Actual:</label>
                        <div class="input-group has-validation">						
                            <input
                                type="password"
                                class="form-control"
                                name="CambioPassword0"
                                id="CambioPassword0"
                                placeholder=""
                                required
                                autocomplete="off"
                                />
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Password es requerido</div>							
                        </div>
                    </div>
                <div class="col-12 col-sm-10 mt-3">
                        <label for="CambioPassword1" class="form-label">Nuevo Password:</label>
                        <div class="input-group has-validation">						
                            <input
                                type="password"
                                class="form-control"
                                name="CambioPassword1"
                                id="CambioPassword1"
                                placeholder=""
                                required
                                autocomplete="off"
                                />
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Nuevo Password es Requerido</div>							
                        </div>
                    </div>
                    <div class="col-12 col-sm-10 mt-3">
                        <label for="CambioPassword2" class="form-label">Confirmar Nuevo Password:</label>
                        <div class="input-group has-validation">						
                            <input
                                type="password"
                                class="form-control"
                                name="CambioPassword2"
                                id="CambioPassword2"
                                placeholder=""
                                required
                                autocomplete="off"
                                />
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Confirmar Nuevo Password es Requerido</div>
                            <div data-toggle="CambioPassword2" class="errorMensaje oculto">Password no coinciden</div>							
                        </div>
                    </div>               
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button id='btnCambioClave' type="button" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>