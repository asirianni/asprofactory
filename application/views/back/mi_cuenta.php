<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LISTADO DE CUENTA</title>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

      <!-- Optional theme -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <!-- Latest compiled and minified JavaScript -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>  
  </head>
<body>
  <h1> Lista de pagos</h1>
  <div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                  <th style='width: 50px;'>NUMERO PAGO</th>
                  <th style='width: 50px;'>IMPORTE</th>
                  <th style='width: 50px;'>VENCIMIENTO</th>
                  <th style='width: 50px;'>PAGO</th>
                  <th style='width: 50px;'>ESTADO</th>
                  <th style='width: 50px;'></th>
                </tr>
            </thead>
            <tbody>
                          <?php
                        foreach($cuenta as $value)
                        {
                           
                            echo "<tr>
                                    <td> Num: ".$value["id"]."</td>
                                    <td>$ ".$value["importe"]."</td>
                                    <td>".$value["fecha_vencimiento"]."</td>
                                    <td>".$value["fecha_abonado"]."</td>
                                    <td>".$value["estado_descripcion"]."</td>
                                    <td>
                                        
                                    ";
                            if (is_null($value["fecha_abonado"])) {
                                echo "
                                    <a href='".base_url()."index.php/pagos/pagar/". $value["id"]."' class='btn btn-sm btn-warning' ><i class='fa fa-money'></i> Pagar</a>
                                    ";
                            }else{
                                echo "<label class='btn btn-sm btn-primary' ><i class='fa fa-eye'></i> Pagado</label>";
                            }
                            echo    "</td></tr>";
                        }
                    ?>
                      </tbody>
        </table>
    </div>
</div>
            

</body>
</html>