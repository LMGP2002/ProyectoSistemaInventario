
<?php
include("../../controlador/validarSesion.php");
include("layout/header.php");
?>

<section class="inicio">
            <div class="inicio-text">
                <h1>
                    Sistema de Inventario
                </h1>
                <p>Villa Monguí Café Arte</p>
                <p id="nomUser"></p>
                <a href="./inventario.php" class="btn">Ver inventario</a>

            </div>
    
            <div class="inicio-img">
                <img src="../assets/main.png" alt="Café Arte">
            </div>
        
</section>
<a href="#" class="logoutBtn"></a>
</main>
<script src="../js/estilos.js"></script>
<script src="../js/validarSesion.js"></script>

</body>
</html>
