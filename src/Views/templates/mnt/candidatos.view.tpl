<h1>Listado de Hero Items para el Index</h1>
<section class="WWList container-m">
<table>
  <thead>
    <tr>
          <th>#</th>
          <th class="hidden-s">Nombre Candidato</th>
          <th class="hidden-s">Edad</th>
          <th><a href="index.php?page=mnt_candidato&mode=INS" class="button">+</a></th>
    </tr>
  </thead>
  <tbody>
    {{foreach candidatos}}
    <tr>
      <td>{{idCandidatos}}</td>
      <td><a href="index.php?page=mnt_candidato&mode=DSP&id={{idCandidatos}}">{{NombreCandidato}}</a></td>
      <td class="hidden-s">{{edad}}</td>
      <td class="center">
        <a href="index.php?page=mnt_candidato&mode=UPD&id={{idCandidatos}}">Editar</a>
        &nbsp;
        <a href="index.php?page=mnt_candidato&mode=DEL&id={{idCandidatos}}">Eliminar</a>
      </td>
    </tr>
    {{endfor candidatos}}

  </tbody>
</table>
</section>
