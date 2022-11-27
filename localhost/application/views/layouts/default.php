<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> <?php echo $title ?></title>
        <link rel="stylesheet" href="/public/bootstrap/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="/public/styles/style.css" type="text/css">
        <link rel="preconnect" href="https://fonts.gstatic.com/%22%3E">
        <link href="https://fonts.googleapis.com/css2?family=Convergence&family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
        <script src="/public/scripts/jquery.js"></script>
        <script src="/public/bootstrap/js/bootstrap.min.js"></script>
        <script src="/public/scripts/form.js"></script>
    </head>
    <body>
        <div class="navbar bg-dark navbar-dark">
            <div class="container-fluid ">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">Conferences</a>
                </div>
            </div>
        </div>
        <div class="container pt-3 pb-3 text-light">
            <?php echo $content; ?>
        </div>
        <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXyfeDZFhTGNgekaBsX1W1ZKqbKzguloc&callback=initMap">
        </script>
    </body>
</html>