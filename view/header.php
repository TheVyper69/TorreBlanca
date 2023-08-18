
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../lib/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../lib/fontawesome/css/all.css">
    <link rel="stylesheet" href="../lib/datatable/dataTables.bootstrap4.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../img/icons/gopuram-solid.svg" type="image/x-icon">

    <title>Gestor</title>
</head>

<body style="background-color: #e9ecef;">
   
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" style=" margin-left: 20px; " href="inicio.php">TorreBlanca</a>
        <button class="navbar-toggler"  style=" margin-right: 20px;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-auto" style=" margin-right: 40px; " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="inicio.php"> <span class="fas fa-home"></span> Inicio </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gestor.php"> <span class="fas fa-folder"></span> Documentación <span class="sr-only"> (Evidencia)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Acciones
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="reportes.php">Reportar</a>
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../procesos/usuario/salir.php"> <span class="fas fa-sign-out-alt"></span> Cerrar sesión</a>
                    </div>
                </li>
               
            </ul>
            
        </div>
    </nav>
    

    <!-- Page Content -->