    <div class="modal fade" id="agregarProductoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 titulo_modal">Registrar Nuevo Producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formularioProducto" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Marca</label>
                            <input type="text" name="marca" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Categoría</label>
                            <input type="text" name="categoria" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Precio</label>
                            <input type="number" name="precio" class="form-control" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <input type="text" name="descripcion" class="form-control" />
                        </div>
                        <div class="mb-3 mt-4">
                            <label class="form-label">Imagen producto</label>
                            <input class="form-control form-control-sm" type="file" name="imagen_producto" accept="image/png, image/jpeg" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha creación</label>
                            <input type="date" name="fecha_creacion" class="form-control" />
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn_add" onclick="registrarProducto(event)">
                                Registrar nuevo producto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>