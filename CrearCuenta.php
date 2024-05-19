<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleusuarios.css">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8bb30fbb6a.js" crossorigin="anonymous"></script>
    <style>
        /* Estilos personalizados adicionales */
        body {
            background-image: url('img/sesion.png');
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1000px;
        }

        h1 {
            color: white;
        }

        .form-label {
            font-weight: bold;
        }

        .btn {
            margin-top: 10px;
        }

        .btn-salir {
            background-color: red;
            border-color: red;
        }

        .btn-salir:hover {
            background-color: darkred;
            /* Color al pasar el mouse */
            border-color: darkred;
        }
    </style>



    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center p-3">REGISTRO</h1>
        <div class="row justify-content-center">
            <form class="col-md-6 col-lg-4 p-4 shadow-sm rounded" action="procesar_formulario.php" method="post">
                <h3 class="text-center text-secondary mb-4">Registro de usuarios</h3>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre de la persona</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido de la persona</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>
                <div class="mb-3">
                    <label for="cedula" class="form-label">Cédula</label>
                    <input type="text" class="form-control" id="cedula" name="cedula" required>
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary me-md-2" name="btnregistrar" value="ok">Registrar</button>
                    <a href="index.html" class="btn btn-secondary btn-salir">Salir</a>

                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>