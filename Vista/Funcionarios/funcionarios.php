<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/funcionariosEstilos.css">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Funcionarios</title>
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
                        <a href="../Proveedores/proveedoresInicio.php">
                            <i class='bx  bx-home-alt-2 icons'></i>
                            <span class="text nav-text">Proveedores</span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="../Unidades/unidades.php">
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
                        <a href="funcionarios.php">
                            <i class='bx  bx-home-alt-2 icons'></i>
                            <span class="text nav-text">Funcionarios</span>
                        </a>
                    </li>
                    <li class="nav-links">
                        <a href="../OrdenesInternas/ordenesInternasInicio.php">
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
            <div class="funcionarios-header">
                <button type="button" class="btn btn-outline-secondary btn-funcionario" data-bs-toggle="modal"
                    data-bs-target="#modalAgregarFuncionario">
                    Agregar Funcionario
                </button>
            </div>

            <!-- Modal Agregar Funcionario -->
            <div class="modal fade" id="modalAgregarFuncionario" tabindex="-1"
                aria-labelledby="modalAgregarFuncionarioLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="formAgregarFuncionario" action="../../Controlador/Funcionarios/agregarFuncionario.php"
                            method="POST" autocomplete="off">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAgregarFuncionarioLabel">Agregar Funcionario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <div id="respuestaFuncionario"></div>
                                <div class="mb-3">
                                    <label for="run" class="form-label">RUN</label>
                                    <input type="text" class="form-control" id="run" name="run" required maxlength="12"
                                        autocomplete="off">
                                    <div class="invalid-feedback" id="runFeedback"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required
                                        maxlength="100" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="cargo" class="form-label">Cargo</label>
                                    <input type="text" class="form-control" id="cargo" name="cargo" required
                                        maxlength="50" autocomplete="off">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--- FIN MODAL--->

            <!--- MODAL EDITAR FUNCIONARIO --->
            <div class="modal fade" id="modalEditarFuncionario" tabindex="-1" aria-labelledby="modalEditarFuncionarioLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="formEditarFuncionario" action="../../Controlador/Funcionarios/editarFuncionario.php" method="POST" autocomplete="off">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalEditarFuncionarioLabel">Editar Funcionario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labelledby="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <div id="respuestaEditarFuncionario"></div>
                                <input type="hidden" id="edit_run_original" name="run_original">
                                <div class="mb-3">
                                    <label for="edit_run" class="form-label">RUN</label>
                                    <input type="text" class="form-control" id="edit_run" name="run" required maxlength="12" autocomplete="off">
                                    <div class="invalid-feedback" id="editRunFeedback"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="edit_nombre" name="nombre" required maxlength="100" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_cargo" class="form-label">Cargo</label>
                                    <input type="text" class="form-control" id="edit_cargo" name="cargo" required maxlength="50" autocomplete="off">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar Cambio</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--- FIN MODAL EDITAR --->

            <!--- TABLA FUNCIONARIOS --->
            <?php
            require_once '../../Modelo/conexion.php';
            $result = $mysqli->query("SELECT run, nombre, cargo FROM funcionarios ORDER BY nombre ASC");
            ?>
            <div class="table-funcionarios-wrapper">
                <table class="table-funcionarios" id="tablaFuncionarios">
                    <thead class="table-light">
                        <tr>
                            <th>RUN</th>
                            <th>Nombre</th>
                            <th>Cargo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result && $result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['run']); ?></td>
                                    <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                                    <td><?php echo htmlspecialchars($row['cargo']); ?></td>
                                    <td class="col-acciones">
                                        <button class="btn btn-outline-secondary btn-eliminar"
                                            data-run="<?php echo htmlspecialchars($row['run']); ?>">
                                            Eliminar
                                        </button>
                                        <button class="btn btn-outline-secondary btn-modificar"
                                            data-run="<?php echo htmlspecialchars($row['run']); ?>"
                                            data-nombre="<?php echo htmlspecialchars($row['nombre']); ?>"
                                            data-cargo="<?php echo htmlspecialchars($row['cargo']) ?>">
                                            Editar
                                        </button>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">No hay funcionarios registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <!--- Fin de tabla -->
            </div>
            <div id="paginacionTabla" class="d-flex justify-content-center mt-3"></div>
        </div>
    </section>


    <script src="../js/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
    <script src="../js/funcionarios.js"></script>
    <script src="../js/paginacionFuncionarios.js"></script>
</body>

</html>