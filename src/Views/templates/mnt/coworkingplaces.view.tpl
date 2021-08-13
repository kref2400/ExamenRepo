<h1>Listado de coworkingplaces</h1>
<section class="WWList container-m">

<style>
  table, tr,thead,td,th{
    border: 1px solid black;
  } 
</style>

<table>
  <thead>
    <tr>
          <th>#</th>
          <th class="hidden-s">Descripción</th>
          <th class="hidden-s">nombre </th>
          <th class="hidden-s">email</th>
          <th class="hidden-s">telefono</th>
          <th class="hidden-s">tipo</th>
          <th class="hidden-s">Estado</th>
        
           <th><a href="index.php?page=mnt_coworkingplace&mode=INS" class="button">+</a></th>
    </tr>
  </thead>
  <tbody>
    {{foreach coworkingplaces}}
    <tr>
      <td>{{rownum}}</td>
       <td><a href="index.php?page=mnt_coworkingplace&mode=DSP&id={{cwp_id}}">{{cwp_name}}</a></td>
      <td class = "hidden-s">{{cwp_email}}</td>
      <td class = "hidden-s">{{cwp_phone}}</td>
      <td class = "hidden-s">{{cwp_type}}</td>
      <td>{{cwp_status}}</td>
      <td class="center">
         <a href="index.php?page=mnt_coworkingplace&mode=UPD&id={{cwp_id}}">Editar</a>
        &nbsp;
        <a href="index.php?page=mnt_coworkingplace&mode=DEL&id={{cwp_id}}">Eliminar</a>
      </td>
    </tr>
{{endfor coworkingplaces}}

  </tbody>
</table>
</section>