    <div class="modal fade" id="editarProductoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 titulo_modal">Registrar Nuevo Producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formularioProductoEdit" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <input type="hidden" name="id" id="idproducto" />
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Marca</label>
                            <input type="text" name="marca" id="marca" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Categoría</label>
                            <input type="text" name="categoria" id="categoria" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Precio</label>
                            <input type="number" name="precio" id="precio" class="form-control" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" />
                        </div>
                         <div class="mb-3 mt-4">
                            <label class="form-label">Imagen actual del producto</label>
                            <br>
                            <img src"" id="imagen_producto" style="display: block;" class="float-start" alt="Imagen del producto" width="80">
                        </div>
                        <br> <br>
                        <br> <br>
                        <div class="mb-3 mt-4">
                            <label class="form-label">Cambiar imagen del producto</label>
                            <input class="form-control form-control-sm" type="file" name="imagen_producto" accept="image/png, image/jpeg" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha creación</label>
                            <input type="date" name="fecha_creacion" id="fecha_creacion" class="form-control" />
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn_add" onclick="actualizarProducto(event)">
                                Actualizar datos del producto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>