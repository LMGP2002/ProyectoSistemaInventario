<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../css/style.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!----======== secciones ======== -->
    <link rel="stylesheet" href="../css/section.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    <title>Sistema de Inventario Villa Monguí</title> 
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../assets/cafe.png" alt="Café Arte">
                </span>

                <div class="text logo-text">
                    <span class="name">Villa Monguí</span>
                    <span class="profession">Café Arte</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="index.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Inicio</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../php/elemento.php">
                            <i class='bx bx-coffee-togo icon' ></i>
                            <span class="text nav-text">Elementos</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../php/ciudad.php">
                            <i class='bx bx-buildings icon'></i>
                            <span class="text nav-text">Ciudades</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../php/proveedor.php">
                            <i class='bx bx-package icon'></i>
                            <span class="text nav-text">Proveedores</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../php/entrada.php">
                            <i class='bx bx-log-in-circle icon'></i>
                            <span class="text nav-text">Entradas</span>
                        </a>
                    </li>

                    <li class="nav-link">
                    <a href="../php/salida.php">
                        <i class='bx bx-log-out-circle icon'></i>
                            <span class="text nav-text">Salidas</span>
                        </a>
                    </li>
                    <li class="nav-link">
                    <a href="../php/inventario.php">
                        <i class='bx bx-notepad icon'></i>
                            <span class="text nav-text">Inventario</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>

    <main class="home">