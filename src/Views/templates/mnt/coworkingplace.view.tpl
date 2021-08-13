<section class="container-m row depth-1 px-4 py-4">
  <h1>{{ModalTitle}}</h1>
</section>
<section class="container-m row depth-1 px-4 py-4">
  <form action="index.php?page=mnt_coworkingplace" method="POST" class="col-12 col-m-8 offset-m-2">
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="cwp_id">Código</label>
      <input class="col-12 col-m-9" readonly disabled type="text" name="cwp_id" id="cwp_id" placehoder="Código" value="{{cwp_id}}" />
      <input type="hidden" name="mode" value="{{mode}}" />
      <input type="hidden" name="cwp_id" value="{{cwp_id}}" />
      
    </div>
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="cwp_name">Nombre: </label>
      <input class="col-12 col-m-9" {{readonly}} type="text" name="cwp_name" id="cwp_name" placehoder="nombre" value="{{cwp_name}}" />
    </div>
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="cwp_email">Email</label>
      <input class="col-12 col-m-9" {{readonly}} type="" name="cwp_email" id="cwp_email" placehoder="Email" value="{{cwp_email}}" />
    </div>
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="cwp_phone">Telefono</label>
      <input class="col-12 col-m-9" {{readonly}} type="text" name="cwp_phone" id="cwp_phone" placehoder="" value="{{cwp_phone}}" />
    </div>
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="cwp_type"> Tipo</label>
      <input class="col-12 col-m-9" {{readonly}} type="text" name="cwp_type" id="cwp_type" placehoder="" value="{{cwp_type}}" />
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="cwp_status">Estado</label>
      <select name="cwp_status" id="cwp_status" class="col-12 col-m-9" {{if readonly}} readonly disabled {{endif readonly}}>
        <option value="ACT" {{if cwp_status_act}}selected{{endif cwp_status_act}}>Mostrar</option>
        <option value="INA" {{if cwp_status_ina}}selected{{endif cwp_status_ina}}>Ocultar</option>
      </select>
    </div>
    <div class="row my-4 align-center flex-end">
      {{if showCommitBtn}}
      <button class="primary col-12 col-m-2" type="submit" name="btnConfirmar">Confirmar</button>
      &nbsp;
      {{endif showCommitBtn}}
      <button class="col-12 col-m-2"type="button" id="btnCancelar">
        {{if showCommitBtn}}
        Cancelar
        {{endif showCommitBtn}}
        {{ifnot showCommitBtn}}
        Regresar
        {{endifnot showCommitBtn}}
      </button>
    </div>
    </div>
  </form>
</section>


<script>
  document.addEventListener("DOMContentLoaded", ()=>{
    const btnCancelar = document.getElementById("btnCancelar");
    btnCancelar.addEventListener("click", (e)=>{
      e.preventDefault();
      e.stopPropagation();
      window.location.assign("index.php?page=mnt_coworkingplaces");
    });
  });
</script>
