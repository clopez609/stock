<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="./jquery/jquery-3.4.1.min.js"></script>

    <title>Final</title>
</head>
<body>
    <div class="container">
        <h4 class="text-center mt-4">
        </h4>
        <form id="form-stock" method="POST">
            <div class="form-group">
                <label for="select">Productos</label>
                <select name="id" class="form-control" id="select">
                    <option selected>Choose...</option>
                    <?php
                        require_once "dbStock.php";

                        $gateway = new Gateway();
                        $products = $gateway->loadAll('productos');

                        foreach ($products as $key => $value) {
                            echo "<option value=$value[0]> $value[1] </option>";
                        }
                    ?>
                </select>
            </div>
        </form>
        <div class="result">
            <ul class="list-group list">
            </ul>
        </div>
        <div class="alert alert-success mt-4" role="alert">
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>