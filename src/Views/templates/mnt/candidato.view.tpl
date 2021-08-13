<section class="container-m row depth-1 px-4 py-4">
  <h1>{{ModalTitle}}</h1>
</section>
<section class="container-m row depth-1 px-4 py-4">
  <form action="index.php?page=mnt_candidato" method="POST" class="col-12 col-m-8 offset-m-2">
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="idCandidatos">Código</label>
      <input class="col-12 col-m-9" readonly disabled type="text" name="idCandidatos" id="idCandidatos" placehoder="Código" value="{{idCandidatos}}" />
      <input type="hidden" name="mode" value="{{mode}}" />
      <input type="hidden" name="idCandidatos" value="{{idCandidatos}}" />
      <input type="hidden" name="token" value="{{candidatos_xss_token}}" />
    </div>
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="NombreCandidato">Nombre Candidato: </label>
      <input class="col-12 col-m-9" {{readonly}} type="text" name="NombreCandidato" id="NombreCandidato" placehoder="Panel" value="{{NombreCandidato}}" />
    </div>
    <div class="row my-2 align-center">
      <label class="col-12 col-m-3" for="edad">Edad: </label>
      <input class="col-12 col-m-9" {{readonly}} type="" name="edad" id="edad" placehoder="edad" value="{{edad}}" />
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
      window.location.assign("index.php?page=mnt_candidatos");
    });
  });
</script>
