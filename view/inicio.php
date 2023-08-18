<?php

    session_start();
    if(isset($_SESSION['usuario'])){
        include "header.php";
        ?>

           
            <br>
           <center> <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width: 70%;">
                <div class="carousel-inner">
                    <div class="carousel-item active" >
                        <img src="../img/37699500.jpg" class="d-block w-100 " alt="img1">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/111465277.jpg" class="d-block w-100" alt="img2">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/EB-AR4654.png" class="d-block w-100" alt="img3">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div></center>
            <br>
            <center> <section class="row justify-content-around text-center" id="secService" style="width: 90%;" >
                <h2 class="col-12 display-4 text-capitalize mb-3">Contexto laboral</h2>
                <article class="col-10 col-md-10 col-lg-3 bg-white rounded shadow p-3 fw-light">
                    <img src="../img/icons/vector-pen.svg" alt="Icon Pen" class="bg-danger bg-gradient d-inline-block rounded-circle mb-3 icon-service" style="--box-size:70px; width: var(--box-size); height: var(--box-size); padding:10px;" >
                    <h3 class="text-capitalize">Misión</h3>
                    <p class="text-muted">Exceder las expectativas de nuestros propietarios, creando momentos y vivencias agradables en cada estancia, por medio de un servicio de excelencia y calidad. </p>
                </article>
                <article class="col-10 col-md-10 col-lg-3 bg-white rounded shadow p-3 fw-light">
                    <img src="../img/icons/eye.svg" alt="Icon Pen" class="bg-danger bg-gradient d-inline-block rounded-circle mb-3 icon-service" style="--box-size:70px; width: var(--box-size); height: var(--box-size); padding:10px;" >
                    <h3 class="text-capitalize">Visión</h3>
                    <p class="text-muted">Exceder siempre el standard marcado de confort y calidad, preservar las instalaciones para seguir cumpliendo las expectativas de nuestros propietarios. asegurando así el empleo de nuestros colaboradores comprometidos con el servicio y la excelencia.</p>
                </article>
                
            </section></center> 
            <br>
            

<?php 
        include "footer.php";
    } else{
        header("location:../");
    }

?>