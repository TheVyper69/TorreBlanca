<?php

    session_start();
    if(isset($_SESSION['usuario'])){
        require_once "../../clases/Conexion.php";
        $conexion = Conectar::conexion();
        $iduser = $_SESSION['usuario'];
        $sql = "SELECT count(*) as existeUsuario FROM t_usuarios WHERE username = '$iduser' AND id_user=1";
        $result = mysqli_query($conexion,$sql);
        $respuesta = mysqli_fetch_array($result)['existeUsuario'];
        if($respuesta==true){
        include "header.php";
        ?>
            <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Categorías</h1><br>
                <div class="row">
                    <div class="col-sm-4">
                        <span class="btn btn-dark" data-toggle="modal" data-target="#agregaCategoria">
                            <span class="fas fa-plus" ></span> Agregar nueva categoría
                        </span>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive" id="tablaCategorias">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="agregaCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar nueva categoría</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <form action="" id="frmCategorias">
                        <label for="">Nombre de la categoría</label>
                        <input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control" required>
                    </form>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="btnGuardarCategoria">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalActualizarCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="frmActualizaCategoria">
                    <input type="text" name="idCategoria" id="idCategoria" hidden="">
                    <label for="">Categoria</label>
                    <input type="text" name="categoriaU" id="categoriaU" class="form-control">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrarUpdateCategoria">Cerrar</button>
                <button type="button" class="btn btn-primary" id="actualizaCategoria">Actualizar</button>
            </div>
            </div>
        </div>
        </div>



        <?php include "footer.php";?>

        <script src="../../js/categorias.js"></script>

        <script>
            $(document).ready(function () {
                $('#tablaCategorias').load("categorias/tablaCategorias.php");

                $('#btnGuardarCategoria').click(function(){
                    agregarCategoria();
                });

                $('#actualizaCategoria').click(function(){
                    actualizaCategoria();
                });
            });
        </script>

        <?php
        
        }else{
            ?>
                <script type="text/javascript">
                    alert("ACCESO DENEGADO");    
                    window.location.href="../inicio.php";
                </script>
            <?php
        }
    } else{
        header("location:../../");
    }



    
    

?>