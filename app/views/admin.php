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
    <!-- NavBar -->
    <?php require_once('genericNavBar.php');?>

    <div class="container">
        
        <!-- Busqueda-->
        <div class="row mb-3">
            <div class="col-4 d-none d-md-block" style="position: relative;">
                    <img src="<?php echo URL_PATH;?>/img/logo-info.png" style="position: absolute;top: 0;bottom: 0;left: 0;right: 0;width: 85%;height: auto;margin: auto;"/>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header text-white bg-dark">
                        Refinar busqueda
                    </div>
                    <div class="card-body">
                        <form action="<?php echo URL_PATH;?>/admin" method="post" name="search_form" onsubmit="return validateForm()">
                            <div class="form-group row">
                                <label class="col-3">Titulo</label>
                                <input type="text" class="form-control col-9" name="title" placeholder="Ingrese el titulo aqui..."
                                <?php
                                    if(!empty($params['filters']) && isset($params['filters']['title']))
                                        echo " value='" . $params['filters']['title'] . "'";
                                ?>
                                >
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Autor</label>
                                <input type="text" class="form-control col-9" name="author" placeholder="Ingrese el nombre del autor aqui..."
                                <?php
                                    if(!empty($params['filters']) && isset($params['filters']['author']))
                                        echo " value='" . $params['filters']['author'] . "'";
                                ?>
                                >
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Lector</label>
                                <input type="text" class="form-control col-9" name="user" placeholder="Ingrese el lector aqui..."
                                <?php
                                    if(!empty($params['filters']) && isset($params['filters']['user']))
                                        echo " value='" . $params['filters']['user'] . "'";
                                ?>
                                >
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Fecha desde</label>
                                <input type="date" class="form-control col-9" max=<?php echo date('Y-m-d');?> name="date_from"
                                <?php
                                    if(!empty($params['filters']) && isset($params['filters']['date_from']))
                                        echo " value='" . $params['filters']['date_from'] . "'";
                                ?>
                                >
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Fecha hasta</label>
                                <input type="date" class="form-control col-9" max=<?php echo date('Y-m-d');?> name="date_until"
                                <?php
                                    if(!empty($params['filters']) && isset($params['filters']['date_until']))
                                        echo " value='" . $params['filters']['date_until'] . "'";
                                ?>
                                >
                            </div>
                            <div align="right">
                                <input type="button" class="btn btn-danger" value="Limpiar" onclick="location.href = '<?php echo URL_PATH?>/admin';">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Catalogo-->
        <div class="row">
            <div class="col">
                <h2 class="text-center">Operaciones</h2>
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Titulo</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Lector</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($params['list'] as $row){
                                echo "<tr>";
                                echo "<td>" . $row['titulo'] . "</td>";
                                echo "<td>" . $row['a_nombre'] . " " . $row['a_apellido'] ."</td>";
                                echo "<td>" . $row['u_nombre'] . " " . $row['u_apellido'] ."</td>";
                                echo "<td>" . $row['ultimo_estado'] . "</td>";                                
                                $date = date_create($row['fecha_ultima_modificacion']);
                                echo "<td>" . date_format($date, 'd-m-Y') . "</td>";
                                echo "<td>";
                                if(strcmp($row['ultimo_estado'], "RESERVADO") == 0){
                                    echo "<form method='post' action='" . URL_PATH . "/admin/prestar" . "' style='display: inline'>";
                                    echo "<input type='hidden' name='op_id' value=" . $row['id'] . ">";
                                    echo "<button type='submit' class='btn btn-success'>";
                                    echo "Prestar";
                                    echo "</button></form>";
                                }else if(strcmp($row['ultimo_estado'], "PRESTADO") == 0){
                                    echo "<form method='post' action='" . URL_PATH . "/admin/devolver" . "' style='display: inline'>";
                                    echo "<input type='hidden' name='op_id' value=" . $row['id'] . ">";
                                    echo "<button type='submit' class='btn btn-info'>";
                                    echo "Devolver";
                                    echo "</button></form>";
                                }
                                echo "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                </div>               
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            var from = document.forms["search_form"]["date_from"].value;
            var until = document.forms["search_form"]["date_until"].value;
            if(from != "" && until != ""){
                //comprobar que no se superpongan
                var date_from = new Date(from);
                var date_until = new Date(until);
                if(date_from.getTime() > date_until.getTime()){
                    alert('La fecha "desde" debe ser menor o igual "hasta"');
                    return false;
                }
            }                    
        }
        </script>

    <!-- Bootstrap -->
    <script src='<?php echo URL_PATH;?>/js/jquery.min.js' type='text/javascript'></script>
    <script src='<?php echo URL_PATH;?>/js/bootstrap.min.js' type='text/javascript'></script>
</body>