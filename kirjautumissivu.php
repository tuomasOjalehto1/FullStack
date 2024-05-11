
<?php

      require_once 'header.php';
      require 'Utils/connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kirjaudu - R. Autio Oy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="Styles/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h2 class="mb-3 text-center">Kirjaudu</h2>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <main class="form-signin w-50 m-auto">
                        <form method="POST" action="Utils/kirjautuminen.php">
                            <div class="mb-3 row">
                                <div class="form-floating">
                                    <input type="text" name="sposti" class="form-control" id="floatingInput">
                                    <label for="floatingInput">Käyttäjätunnus</label>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="form-floating">
                                    <input type="password" name="salasana" class="form-control" id="floatingPassword">
                                    <label for="floatingPassword">Salasana</label>
                                </div>
                            </div>
                            <button class="w-100 btn btn-lg btn-outline-secondary" type="submit" name="submit">Kirjaudu</button>
                            <!--<h6 class="mt-3">Jos sinulla ei ole käyttäjätunnusta  <a href="register.php">Luo tunnus</a></h6>-->
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php require_once 'footer.php'; ?>
