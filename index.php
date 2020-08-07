<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- needs for bootstrap-select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.js"></script>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- bootstrap-select additional library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.17/css/bootstrap-select.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.17/js/bootstrap-select.min.js"></script>
    <title>Diana Store</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand"><strong>Diana Store</strong></a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Registro de ventas<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="busqueda.php">Consulta de producto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registro.php">Registro de producto</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <section class="mt-4">
        <div class="container-fluid">
            <h5 class="text-center text-primary">Registro de ventas</h5>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="txtproducto">producto:</label>
                        <select class="selectpicker form-control" data-live-search="true" id="txtproducto">
                            <option>Mustard</option>
                            <option>Ketchup</option>
                            <option>Barbecue</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtcantidad">Cantidad:</label>
                        <input type="number" name="" min="1" id="txtcantidad" step="1" class="form-control">
                    </div>
                    <div class="form-group">

                        <label for="txtprecio">Precio:</label>
                        <input type="number" name="" id="txtprecio" class="form-control" step="1.00">
                    </div>
                </div>
                <div class="col-12">
                </div>
            </div>
        </div>
    </section>
    <script>
        $(function() {
            $('.selectpicker').selectpicker();
        });
    </script>
</body>

</html>