<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <header>
            <!-- Fixed navbar -->
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <a class="navbar-brand" href="#">Customer</a>
            </nav>
        </header>
        <main role="main" style="margin-top: 6%">
            <div class="container">
                <div id="listCustomer"></div>
            </div>
        </main>

        <script>
            $(document).ready(function(){
                $("#listCustomer").load("src/listcust.php");
            });
        </script>
    </body>
</html>