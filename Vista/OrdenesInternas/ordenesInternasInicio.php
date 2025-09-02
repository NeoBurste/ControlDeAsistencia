<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/ordenesInternasEstilos1.css">
    <title>Inicio</title>
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
                            <a href="#">
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
                            <a href="RegistroDeBienes.php">
                                <i class='bx  bx-home-alt-2 icons'></i>
                                <span class="text nav-text">Registro de Bienes</span>
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
                <div class="flex-grow-1">
                    <div class="container my-5">
                        <!-- Aquí va el contenido-->
                        <div id="ordenForm" class="orden-form">
                            <h6 class="text-center mb-3">SOLICITUD DE ADQUISICIONES</h6>
                            <hr>

                            <!-- Datos principales -->
                            <table class="tabla-datos">
                                <tr>
                                    <td colspan="2"><strong>N°:</strong> <input type="text"></td>
                                    <td class="text-end"><strong>Fecha:</strong> <input type="date"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Solicitante:</strong> <input type="text"></td>
                                    <td class="text-end"><strong>Correo:</strong> <input type="text"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Destinatario:</strong> <input type="text"></td>
                                    <td class="text-end"><strong>Telefono:</strong> <input type="text"></td>
                                </tr>
                                <tr>
                                    <td><strong>Tipo de Orden: <select name="" id="">
                                                <option value="Compra">Seleccione tipo de Orden de adquisicion</option>
                                                <option value="Servicio">Servicio</option>
                                                <option value="Arrendamiento">Arrendamiento</option>
                                            </select></strong></td>
                                    </select></strong></td>
                                </tr>
                            </table>
                            <hr>

                            <!-- Tabla de items -->
                            <table class="table table-bordered tabla-items" border="1">
                                <thead>
                                    <tr>
                                        <th>Cantidad</th>
                                        <th>Producto</th>
                                        <th>Descripción</th>
                                        <th>ID</th>
                                        <th>P. Unitario</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaItemsBody">
                                    <tr>
                                        <td><input type="number" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><textarea class="form-control"></textarea></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control" value="$"></td>
                                        <td><input type="text" class="form-control" value="$"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="text-end">
                                <button id="agregarFila" class="btn btn-sm btn-secondary mb-2">+ Agregar Fila</button>
                            </div>

                            <!-- Justificación -->
                            <div class="justificacion-container">
                                <p><strong>Justificación de la compra:</strong></p>
                                <textarea></textarea>
                            </div>

                            <!-- Totales -->
                            <br>
                            <table class="tabla-datos">
                                <tr>
                                    <td class="text-start"><strong>TOTAL SIN IVA:</strong> <input type="text"></td>
                                    <td class="text-end"><strong>TOTAL CON IVA:</strong> <input type="text"></td>
                                </tr>
                            </table>

                            <!-- Firmas -->
                            <div class="firmas-container mt-5">
                                <div class="firma">
                                    <div class="linea-firma"></div>
                                    <strong>Firma y timbre</strong>
                                </div>
                                <div class="firma">
                                    <div class="linea-firma"></div>
                                    <strong>Firma y timbre</strong>
                                </div>
                                <div class="firma">
                                    <div class="linea-firma"></div>
                                    <strong>Firma y timbre</strong>
                                </div>
                                <div class="firma">
                                    <div class="linea-firma"></div>
                                    <strong>Firma y timbre</strong>
                                </div>
                            </div>
                        </div>
                        <!-- Botón para exportar -->
                        <button id="exportarPDF" class="btn btn-primary mt-3">Exportar a PDF</button>
                    </div>
                </div>
            </div>
        </section>

        <script src="../js/menu.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
            crossorigin="anonymous"></script>
        <script src="../js/ordenesInternas.js"></script>
</body>

</html>