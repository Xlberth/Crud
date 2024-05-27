<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>CRUD</title>
</head>
<body>

<div class="container">
    <h1>CRUD CI4</h1>
    <div class="row">
        <div class="col-sm-12">
            
<!-- Formulario para crear un nuevo registro -->
<!-- Se utiliza un formulario POST para enviar los datos del nuevo registro -->
            <form method="POST" action="<?php echo base_url().'/crear' ?>">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control">
                <label for="edad">Edad</label>
                <input type="text" name="edad" id="edad" class="form-control">
                <label for="sexo">Sexo</label>
                <input type="text" name="sexo" id="sexo" class="form-control">
                <br>
                <button class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
    <hr>
    <h2>Listado</h2>
    <div class="row">
        <div class="col-sm-12">
            <div class="table table-responsive">
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
<!-- Mostrar datos generales -->
                    <?php foreach ($datos as $key): ?>
<!-- Se verifica si $key es un objeto o un array y se muestra el nombre, edad y sexo -->
                    <tr>
                        <td><?php echo isset($key->nombre) ? $key->nombre : $key['nombre'] ?></td>
                        <td><?php echo isset($key->edad) ? $key->edad : $key['edad'] ?></td>
                        <td><?php echo isset($key->sexo) ? $key->sexo : $key['sexo'] ?></td>
<!-- Se verifica si $key es un objeto y tiene la propiedad 'id' para mostrar el enlace de editar -->
                        <td>
 <!-- Se verifica si $key es un objeto y tiene la propiedad 'id' para mostrar el enlace de eliminar -->
                            <?php if (is_object($key) && property_exists($key, 'id')): ?>
                            <a href="<?php echo base_url().'/obtenerNombre/'.$key->id ?>" class="btn btn-warning btn-sm">Editar</a>
                            <?php endif ?>
                        </td>
                        <td>
                            <?php if (is_object($key) && property_exists($key, 'id')): ?>
                            <a href="<?php echo base_url().'/eliminar/'.$key->id ?>" class="btn btn-danger btn-sm">Eliminar</a>
                            <?php endif ?>
                        </td>
                        </tr>
                            <?php endforeach ?>
<!-- Formulario de búsqueda -->
                        <form method="GET" action="<?php echo base_url().'/buscar' ?>">
                        <input type="text" name="query" placeholder="Buscar..." class="form-control">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </for>
<!-- Mostrar resultados de la búsqueda -->
                        <?php if (!empty($resultados)): ?>
                        <?php foreach ($resultados as $registro): ?>
                        <tr>
 <!-- Se verifica si $registro es un objeto o un array y se muestra el nombre, edad y sexo -->
                        <td><?php echo isset($registro->nombre) ? $registro->nombre : $registro['nombre'] ?></td>
                        <td><?php echo isset($registro->edad) ? $registro->edad : $registro['edad'] ?></td>
                        <td><?php echo isset($registro->sexo) ? $registro->sexo : $registro['sexo'] ?></td>
<!-- Resto de las columnas -->
                        </tr>
                        <?php endforeach ?>
                        <?php endif ?>



    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">

//Se utilizo sweet alert para mostrar mensajes de exito y error

        let mensaje = '<?php echo $mensaje ?>';
        if (mensaje == '1') {
            swal(':D','Se agrego con exito','success')
        } else if (mensaje == '0') {
            swal(':(','No se pudo agregar','error')
        } else if (mensaje == '2') {
            swal(':D','Actualizado con exito','success')
        } else if (mensaje == '3') {
            swal(':(','Fallo al actualizar','error')
        } else if (mensaje == '4') {
            swal(':D','Eliminado con exito','success')
        } else if (mensaje == '5') {
            swal(':(','Fallo al eliminar','error')
        }
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>