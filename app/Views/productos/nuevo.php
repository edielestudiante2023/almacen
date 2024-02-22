<?php echo $this->extend('plantilla/layout'); ?>

<?php echo $this->section('contenido') ?>

<h2 class="mb-4">Nuevo producto</h2>

<?php echo validation_list_errors() ;?>

<form action="<?php echo base_url('productos/guarda') ?>" method="post" autocomplete="off">

    <div class="mb-3 row">
        <label for="codigo" class="col-sm-2 form-label">Código</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="codigo" id="codigo">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nombre" class="col-sm-2 form-label">Nombre</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="nombre" id="nombre">
        </div>
    </div>
    
    <div class="mb-3 row">
        <label for="precio" class="col-sm-2 form-label">Precio</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="precio" id="precio">
        </div>
    </div>
    
    <div class="mb-3 row">
        <label for="stock" class="col-sm-2 form-label">Stock</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="stock" id="stock">
        </div>
   </div>

   <div class="mb-3 row">
        <div class="col-sm-6 offset-md-2">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
   </div>

