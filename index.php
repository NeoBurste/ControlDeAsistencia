<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Vista/css/indexEstilos.css">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <title>Inicio</title>
</head>

<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="Vista/img/OIP.webp" alt="Logo">
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
                        <a href="Vista/Proveedores/proveedoresInicio.php">
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
    <section class="home">
        <div class="text">
            Inicio
        </div>
    </section>

    <script src="Vista/js/menu.js"></script>
</body>

</html>