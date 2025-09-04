<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/productosEstilos1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <title>Inicio</title>
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
                        <a href="Vista/Proveedores/proveedoresInicio.php">
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
                        <a href="RegistroDeProductos.php">
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

            <div class="container my-5 productos-section">
                <div class="row">
                    <!-- Título y botón agregar producto -->
                    <div class="col-12 d-flex justify-content-between align-items-center mb-3">
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                            data-bs-target="#modalAgregarProducto">
                            Agregar Producto
                        </button>
                    </div>

                    <!-- Filtro por categoría -->
                    <div class="col-12 col-md-6 mb-3">
                        <select id="filtroCategoria" class="form-select">
                            <option value="">Filtrar por categoría</option>
                            <!-- Aquí se llenan las opciones desde PHP -->
                        </select>
                    </div>

                    <!-- Tabla de productos -->
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-hover tabla-estilo" id="tablaProductos">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>ID Producto</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Categoría</th>
                                        <th>ID Categoría</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once '../../Modelo/Conexion.php';

                                    $query = "SELECT idCategoria, nombreCategoria FROM categorias";
                                    $result = $mysqli->query($query);

                                    $prod_query = "SELECT p.idProducto, p.nombreProducto, p.descripcion, c.nombreCategoria, c.idCategoria
                                                    FROM productos p
                                                    INNER JOIN categorias c ON p.idCategoria = c.idCategoria";
                                    $prod_result = $mysqli->query($prod_query);
                                    ?>
                                    <?php if ($prod_result && $prod_result->num_rows > 0): ?>
                                        <?php while ($prod = $prod_result->fetch_assoc()): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($prod['idProducto']); ?></td>
                                                <td><?php echo htmlspecialchars($prod['nombreProducto']); ?></td>
                                                <td class="descripcion-columna">
                                                    <?php echo htmlspecialchars($prod['descripcion']); ?>
                                                </td>
                                                <td class="categoria-columna">
                                                    <?php echo htmlspecialchars($prod['nombreCategoria']); ?>
                                                </td>
                                                <td><?php echo htmlspecialchars($prod['idCategoria']); ?></td>
                                                <td class="td-acciones">
                                                    <div class="botones-horizontales">
                                                        <!-- Boton editar -->
                                                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                                            data-bs-target="#modalEditarProducto"
                                                            data-id="<?php echo htmlspecialchars($prod['idProducto']); ?>"
                                                            data-nombre="<?php echo htmlspecialchars($prod['nombreProducto']); ?>"
                                                            data-descripcion="<?php echo htmlspecialchars($prod['descripcion']); ?>"
                                                            data-categoria="<?php echo htmlspecialchars($prod['idCategoria']); ?>">
                                                            Editar
                                                        </button>
                                                        <!-- Boton eliminar -->
                                                        <form action="../../Controlador/Productos/eliminarProducto.php"
                                                            method="POST" style="display:inline;">
                                                            <input type="hidden" name="idProducto"
                                                                value="<?php echo htmlspecialchars($prod['idProducto']); ?>">
                                                            <button type="submit" class="btn btn-sm btn-outline-secondary"
                                                                onclick="return confirm('¿Estas seguro de eliminar este producto?');">
                                                                Eliminar
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center">No hay productos registrados.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Agregar Producto -->
            <div class="modal fade" id="modalAgregarProducto" tabindex="-1" aria-labelledby="modalAgregarProductoLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="../../Controlador/Productos/ingresarProductos.php" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAgregarProductoLabel">Agregar Producto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nombreProducto" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombreProducto" name="nombreProducto"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion"
                                        required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="idCategoriaProducto" class="form-label">Categoría</label>
                                    <select class="form-select" id="idCategoriaProducto" name="idCategoria" required>
                                        <option value="">Seleccione categoría</option>
                                        <!-- Opciones PHP -->
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="idProducto" class="form-label">ID Producto</label>
                                    <input type="text" class="form-control" id="idProducto" name="idProducto" readonly
                                        required>
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

            <!-- Modal Editar Producto (estructura similar al agregar) -->
            <div class="modal fade" id="modalEditarProducto" tabindex="-1" aria-labelledby="modalEditarProductoLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="../../Controlador/Productos/editarProducto.php" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalEditarProductoLabel">Editar Producto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="editIdProducto" name="idProducto">
                                <div class="mb-3">
                                    <label for="editNombreProducto" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="editNombreProducto"
                                        name="nombreProducto" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editDescripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="editDescripcion" name="descripcion"
                                        required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="editIdCategoria" class="form-label">Categoría</label>
                                    <select class="form-select" id="editIdCategoria" name="idCategoria" required>
                                        <option value="">Seleccione categoría</option>
                                        <!-- Opciones PHP -->
                                    </select>
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


        </div>
    </section>

    <script src="../js/menu.js"></script>
    <script src="../js/validacionesBienes.js"></script>
    <script src="../js/paginacionBienes.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>