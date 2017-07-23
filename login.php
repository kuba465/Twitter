<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Twitter - Login</title>
        <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>

        <?php
        include 'config.php';

        include 'src/User.php';
        ?>

        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <form action="zadanie1.php" method="post" role="form">
                        <legend>Logowanie użytkownika</legend>
                        <div class="form-group">
                            <label for="">Nazwa użytkownika</label>
                            <input type="text" class="form-control" name="userName" id="userName" placeholder="Nazwa użytkownika"
                                   value="<?= $name ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Hasło użytkownika</label>
                            <input type="password" class="form-control" name="userPassword" id="userPassword"
                                   placeholder="Hasło użytkownika"
                                   value="<?= $password ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Wejdź</button>
                    </form>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                </div>
            </div>
        </div>

    </body>
</html>