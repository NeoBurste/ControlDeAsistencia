<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Vista/css/proveedoresEstilos.css">
    <title>Proveedores</title>
</head>

<body>
    <div class="d-flex">
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
                            <a href="proveedoresInicio.php">
                                <i class='bx  bx-home-alt-2 icons'></i>
                                <span class="text nav-text">Proveedores</span>
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="#">
                                <i class='bx  bx-home-alt-2 icons'></i>
                                <span class="text nav-text">Unidades</span>
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="#">
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

        <div class="flex-grow-1">
            <div class="container my-4">
                <div class="d-flex align-items-center gap-3">
                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                        data-bs-target="#proveedorModal">
                        Ingresar Proveedor
                    </button>
                </div>
            </div>

            <!-- Modal agregar proveedor -->
            <div class="modal fade" id="proveedorModal" tabindex="-1" aria-labelledby="proveedorModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="formProveedor" action="../../Controlador/Proveedor/ingresarProveedor.php"
                            method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="proveedorModalLabel">Nuevo Proveedor</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <div id="respuesta"></div>
                                <div class="mb-3">
                                    <label for="rut" class="form-label">RUT</label>
                                    <input type="text" class="form-control" id="rut" name="rut" required
                                        autocomplete="off" maxlength="12">
                                </div>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required
                                        autocomplete="off" maxlength="50">
                                </div>
                                <div class="mb-3">
                                    <label for="razon_social" class="form-label">Razón Social</label>
                                    <input type="text" class="form-control" id="razon_social" name="razon_social"
                                        required autocomplete="off">
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

            <!-- Modal Modificar Proveedor -->
            <div class="modal fade" id="modalModificarProveedor" tabindex="-1"
                aria-labelledby="modalModificarProveedorLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="formModificarProveedor" action="../../Controlador/Proveedor/modificarProveedor.php"
                            method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalModificarProveedorLabel">Modificar Proveedor</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="mod_rut_original" name="rut_original">
                                <div class="mb-3">
                                    <label for="mod_rut" class="form-label">RUT</label>
                                    <input type="text" class="form-control" id="mod_rut" name="rut" required
                                        maxlength="12">
                                </div>
                                <div class="mb-3">
                                    <label for="mod_nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="mod_nombre" name="nombre" required
                                        maxlength="50">
                                </div>
                                <div class="mb-3">
                                    <label for="mod_razon_social" class="form-label">Razón Social</label>
                                    <input type="text" class="form-control" id="mod_razon_social" name="razon_social"
                                        required>
                                </div>
                                <div id="respuestaModificar"></div>
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

            <!-- Tabla de Proveedores -->
            <?php
            require_once '../../Modelo/conexion.php';
            $result = $mysqli->query("SELECT rut, nombre, razon_social FROM proveedores ORDER BY nombre ASC");
            ?>

            <div class="container mt-5 d-flex">
                <div class="table-responsive">
                    <table class="table table-bordered table align-middle" id="tablaProveedores">
                        <thead class="table-secondary">
                            <tr>
                                <th>RUT</th>
                                <th>Nombre</th>
                                <th>Razón Social</th>
                                <th class="col-acciones">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result && $result->num_rows > 0): ?>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['rut']); ?></td>
                                        <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                                        <td><?php echo htmlspecialchars($row['razon_social']); ?></td>
                                        <td>
                                            <!-- Botón Eliminar -->
                                            <button class="btn btn-outline-secondary btn-sm btn-eliminar"
                                                data-rut="<?php echo htmlspecialchars($row['rut']); ?>">
                                                Eliminar
                                            </button>
                                            <!-- Botón Modificar -->
                                            <button class="btn btn-outline-secondary btn-sm btn-modificar"
                                                data-bs-toggle="modal" data-bs-target="#modalModificarProveedor"
                                                data-rut="<?php echo htmlspecialchars($row['rut']); ?>"
                                                data-nombre="<?php echo htmlspecialchars($row['nombre']); ?>"
                                                data-razon="<?php echo htmlspecialchars($row['razon_social']); ?>">
                                                Modificar
                                            </button>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">No hay proveedores registrados.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/menu.js"></script>
    <script src="../../Vista/js/validacionesProveedores.js"></script>
    <script src="../../Vista/js/paginacionProveedores.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>

</body>

</html>