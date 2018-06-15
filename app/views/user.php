<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Biblioteca Info-UNLP</title>
    <!-- Bootstrap -->
    <link href='<?php echo URL_PATH;?>/css/bootstrap/bootstrap.min.css' type='text/css' rel="stylesheet">
    <link href='<?php echo URL_PATH;?>/css/my_styles.css' type='text/css' rel="stylesheet">
    <!-- Font Awesome-->
    <link href='<?php echo URL_PATH;?>/css/fontawesome/css/fontawesome-all.css' rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-dark bg-dark navbar-expand-sm mb-3">
        <a class="navbar-brand" href='<?php echo URL_PATH;?>'>Biblioteca UNLP</a>
        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
            aria-controls="navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse justify-content-end" id="navbar">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a href="<?php echo URL_PATH?>/user/logout" class="nav-link">
                        <i class="far fa-times-circle"></i> Salir</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-header text-white bg-secondary">
                        <h3>Mi perfil</h3>
                    </div>
                    <div class="card-body">
                        <div class=row>
                        <div class="col-4" style="text-align: center; ">
                            <img src="<?php echo URL_PATH;?>/user/photo/<?php echo $params['id']?>" style="width: 80%; height: auto;margin: auto; border-radius: 25%; border: 3px solid grey"/>
                        </div>
                            <div class='col-8'>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="text-left">Nombre:</td>
                                            <td class="text-left"><?php echo $params['name']?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Apellido:</td>
                                            <td class="text-left"><?php echo $params['lastname']?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Email:</td>
                                            <td class="text-left"><?php echo $params['email']?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Operaciones-->
        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Portada</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // foreach($params['books'] as $row){
                            //     echo "<tr>";
                            //     echo "<td><a href=\"" . URL_PATH . "/book/display/" . $row["id"] . "\"><img src=\"" . URL_PATH . "/book/photo/" . $row["id"] . "\" style='height: 10em'></a></td>";
                            //     echo "<td><a href=\"" . URL_PATH . "/book/display/" . $row["id"] . "\">" . $row["titulo"] ."</a></td>";
                            //     echo "<td><a href=\"" . URL_PATH . "/author/display/" . $row["autores_id"] . "\">" . $row["nombre_autor"] ."</a></td>";
                            //     echo "<td>";
                            //     echo "Total: " . $row['cantidad'] . "</br>";
                            //     echo "Prestados: " . $row['prestados'] . "</br>";
                            //     echo "Reservados: " . $row['reservados'] . "</br>";
                            //     echo "</td>";
                            //     echo "</tr>";
                            // }
                        ?>
                    </tbody>
                </table>              
            </div>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src='<?php echo URL_PATH;?>/js/jquery.min.js' type='text/javascript'></script>
    <script src='<?php echo URL_PATH;?>/js/bootstrap.min.js' type='text/javascript'></script>
</body>