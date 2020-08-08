<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once("header.php");
    ?>
    <title>Diana Store</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#"><strong>Diana Store</strong></a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="bodega.php">Registro de ventas<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="busquedabodega.php">Consulta de ventas</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="registrobodega.php">Registro de producto</a>
                </li>
            </ul>
            <div class="flex my-2 my-lg-0">
                <a href="logout.php" style="text-decoration: none;">
                    <span class="text-white m-2">Salir</span>
                    <i class="fa fa-sign-out m-2 text-white" aria-hidden="true" id="salir"></i>
                </a>
            </div>
        </div>
    </nav>
    <section class="mt-2">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-12 ">
                    <div class="card shadow border-dark">
                        <div class="card-header bg-dark text-white">
                            <span style="font-weight: 700 !important; font-size:18px">Registro de producto.</span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-8 col-lg-8">
                                    <div class="form-group">
                                        <label for="txtdescripcion">Producto:</label>
                                        <input type="text" name="" id="txtdescripcion" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="txtcantidad">Cantidad:</label>
                                        <input type="number" name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="ddlundmedida">Medida:</label>
                                        <select class="form-control" id="ddlundmedida">
                                            <option value='1'>UND</option>
                                            <option value='2'>KL</option>
                                            <option value='2'>MT</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="ddlcategoria">Categoría:</label>
                                        <select class="form-control" id="ddlcategoria">
                                            <option value='1'>Categoria 1</option>
                                            <option value='2'>Categoria 2</option>
                                            <option value='2'>Categoria 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="txtpreciocompra">S/ Compra:</label>
                                        <input type="number" name="" id="txtpreciocompra" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="txtpreciocosto">S/ Costo:</label>
                                        <input type="number" name="" id="txtpreciocosto" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="txtprecioventa">S/ Venta:</label>
                                        <input type="number" name="" id="txtprecioventa" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="btn-group">
                                        <input type="button" value="Guardar" class="btn btn-success ">
                                        <input type="button" value="Cancelar" class="btn btn-danger">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>