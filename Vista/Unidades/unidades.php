<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Vista/css/unidadesEstilos.css">
    <title>Unidades</title>
</head>

<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../img/OIP.webp" alt="Logo">
                </span>

                <div class="text header-text">
                    <span class="name">DESAM</span> <br>
                    <span class="profession">Inventario</span>
                </div>
            </div>

            <i class='bx  bx-caret-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <li class="search-box">
                    <i class='bx  bx-search icons'></i>
                    <input type="text" placeholder="Buscar...">
                </li>
                <ul class="menu-links">
                    <li class="nav-links">
                        <a href="../../index.php">
                            <i class='bx  bx-home-alt-2 icons'></i>
                            <span class="text nav-text">Inicio</span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="../../Vista/Proveedores/proveedoresInicio.php">
                            <i class='bx  bx-home-alt-2 icons'></i>
                            <span class="text nav-text">Proveedores</span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="unidades.php">
                            <i class='bx  bx-home-alt-2 icons'></i>
                            <span class="text nav-text">Unidades</span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="../RegistroDeBienes/RegistroDeBienes.php">
                            <i class='bx  bx-home-alt-2 icons'></i>
                            <span class="text nav-text">Registro de Bienes</span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="../Funcionarios/funcionarios.php">
                            <i class='bx  bx-home-alt-2 icons'></i>
                            <span class="text nav-text">Funcionarios</span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="../../Vista/OrdenesInternas/ordenesInternasInicio.php">
                            <i class='bx  bx-home-alt-2 icons'></i>
                            <span class="text nav-text">Ordenes Internas</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx  bx-arrow-out-left-square-half icons'></i>
                        <span class="text nav-text">Cerrar Sesión</span>
                    </a>
                </li>
                <li class="mode">
                    <div class="moon-sun">
                        <i class='bx  bx-moon icons moon'></i>
                        <i class='bx  bx-sun icons sun'></i>
                    </div>
                    <span class="mode-text text">Modo Oscuro</span>

                    <div class="toggle-switch">
                        <span class="switch">

                        </span>
                    </div>
                </li>
            </div>
        </div>

    </nav>

    <section class="home">
        <div class="text">
            <div class="flex-grow-1">
                <div class="container my-4">
                    <div class="d-flex align-items-center gap-3">
                        <button type="button" class="btn btn-outline-secondary btnAgregar" data-bs-toggle="modal"
                            data-bs-target="#unidadModal">
                            Ingresar Unidad
                        </button>
                    </div>
                </div>

                <!-- Modal agregar unidad -->
                <div class="modal fade" id="unidadModal" tabindex="-1" aria-labelledby="unidadModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="formUnidad" action="../../Controlador/Unidades/ingresarUnidad.php" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="unidadModalLabel">Nueva Unidad</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <div id="respuestaUnidad"></div>
                                    <div class="mb-3">
                                        <label for="codigo" class="form-label">Código</label>
                                        <input type="text" class="form-control" id="codigo" name="codigo" required
                                            maxlength="20" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="run" class="form-label">RUN</label>
                                        <input type="text" class="form-control" id="run" name="run" required
                                            maxlength="12" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" required
                                            maxlength="100" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="telefono" class="form-label">Teléfono</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono"
                                            maxlength="15" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                                        <input type="email" class="form-control" id="correo_electronico"
                                            name="correo_electronico" maxlength="100" autocomplete="off">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-outline-secondary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--Modal modificar unidad-->
                <div class="modal fade" id="modalModificarUnidad" tabindex="-1"
                    aria-labelledby="modalModificarUnidadLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="formModificarUnidad" action="../../Controlador/Unidades/modificarUnidad.php"
                                method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalModificarUnidadLabel">Modificar Unidad</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <div id="respuestaModificarUnidad"></div>
                                    <input type="hidden" id="mod_idUnidad" name="idUnidad">
                                    <div class="mb-3">
                                        <label for="mod_codigo" class="form-label">Código</label>
                                        <input type="text" class="form-control" id="mod_codigo" name="codigo" required
                                            maxlength="20" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="mod_run" class="form-label">RUN</label>
                                        <input type="text" class="form-control" id="mod_run" name="run" required
                                            maxlength="12" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="mod_nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="mod_nombre" name="nombre" required
                                            maxlength="100" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="mod_telefono" class="form-label">Teléfono</label>
                                        <input type="text" class="form-control" id="mod_telefono" name="telefono"
                                            maxlength="15" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="mod_correo_electronico" class="form-label">Correo
                                            Electrónico</label>
                                        <input type="email" class="form-control" id="mod_correo_electronico"
                                            name="correo_electronico" maxlength="100" autocomplete="off">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-outline-secondary">Guardar Cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Tabla de Unidades -->
                <?php
                require_once '../../Modelo/conexion.php';
                $result = $mysqli->query("SELECT idUnidad, codigo, run, nombre, telefono, correo_electronico FROM Unidad ORDER BY nombre ASC");
                ?>

                <div class="container mt-5 container-tabla">
                    <div>
                        <table class="table table align-middle tabla-estilo" id="tablaUnidades">
                            <thead class="table-secondary">
                                <tr>
                                    <th>Código</th>
                                    <th>RUN</th>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Correo Electrónico</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($result && $result->num_rows > 0): ?>
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($row['codigo']); ?></td>
                                            <td><?php echo htmlspecialchars($row['run']); ?></td>
                                            <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                                            <td><?php echo htmlspecialchars($row['telefono']); ?></td>
                                            <td><?php echo htmlspecialchars($row['correo_electronico']); ?></td>
                                            <td>
                                                <button class="btn btn-outline-secondary btn-sm btn-eliminar-unidad"
                                                    data-id="<?php echo $row['idUnidad']; ?>">
                                                    Eliminar
                                                </button>
                                                <button class="btn btn-outline-secondary btn-sm btn-modificar-unidad"
                                                    data-bs-toggle="modal" data-bs-target="#modalModificarUnidad"
                                                    data-id="<?php echo $row['idUnidad']; ?>"
                                                    data-codigo="<?php echo htmlspecialchars($row['codigo']); ?>"
                                                    data-run="<?php echo htmlspecialchars($row['run']); ?>"
                                                    data-nombre="<?php echo htmlspecialchars($row['nombre']); ?>"
                                                    data-telefono="<?php echo htmlspecialchars($row['telefono']); ?>"
                                                    data-correo="<?php echo htmlspecialchars($row['correo_electronico']); ?>">
                                                    Modificar
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No hay unidades registradas.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../js/menu.js"></script>
    <script src="../js/validacionesUnidades.js"></script>
    <script src="../js/paginacionUnidades.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>