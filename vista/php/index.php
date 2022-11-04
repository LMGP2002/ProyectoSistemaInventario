
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
</main>
<div class="modal-container">
            <div class="modal">
            <div class="close-btn">&times;</div>
                    <div class="form">
                    <h2>Ingresar al sistema</h2>
                    
                        <div class="form-element">
                            <label class="label-titulo" for="usuario">Usuario:</label>
                            <input data-cant class="inputN" name="usuario" type="text" id="usuario" placeholder="Ingrese su usuario">
                        </div>
                        <div class="form-element">
                            <label class="label-titulo" for="password">Contraseña:</label>
                            <input data-prec class="inputN" name="password" type="password" id="password" placeholder="Ingrese su contraseña">
                        </div>
                        
                        
                        <div class="form-element">
                            <button id="btningresar" name="btningresar" type="button">Ingresar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
<script src="../js/estilos.js"></script>
<script src="../js/validarSesion.js"></script>

</body>
</html>
