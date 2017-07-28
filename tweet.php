<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Twitter - Wpis</title>
        <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="float-left">
            <div class="container">
                <div class="btn-group" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <a href="profiles/user_profile.php"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-circle-arrow-left"></div> Powrót do strony głównej</button></a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="float-left">
            <div class="container">
                <table border="1">
                    <tbody>
                        <tr>
                            <td>Autor</td>
                            <td>Autor</td>
                        </tr>
                        <tr>
                            <td>Treść</td>
                            <td>wpisu</td>
                        </tr>
                        <tr>
                            <td>Data</td>
                            <td>Data</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <form action="" method="post" role="form">
                        <legend>Dodawanie komentarza</legend>
                        <div class="form-group">
                            <label for="">Treść komentarza</label>
                            <input type="text" class="form-control" name="userComment" id="userComment" maxlength="60" placeholder="Treść komentarza"
                                   value="">
                        </div>
                        <button type="submit" class="btn btn-primary">Skomentuj</button>
                    </form>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                </div>
            </div>
        </div>
        <div class="container">
            <h3>
                Komentarze: 
            </h3>
        </div>
        <!--tabelę można wziąć od prowadzącego-->
        <!--w tabeli każdy wpis to link i przekazujesz jego id getem do tweet.php-->
    </body>
</html>