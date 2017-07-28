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
        <div class="container">
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <a href="register_edit/register_user.php"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-asterisk"></div>Zarejestuj się!</button></a>
                </div>
            </div>
        </div>
        <?php
        include 'config.php';

        include 'src/User.php';
        ?>

        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <form action="" method="post" role="form">
                        <legend>Logowanie użytkownika</legend>
                        <div class="form-group">
                            <label for="">E-mail użytkownika</label>
                            <input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="E-mail użytkownika"
                                   value="">
                        </div>
                        <div class="form-group">
                            <label for="">Hasło użytkownika</label>
                            <input type="password" class="form-control" name="userPassword" id="userPassword"
                                   placeholder="Hasło użytkownika"
                                   value="">
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