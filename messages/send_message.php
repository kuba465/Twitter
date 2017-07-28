<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Twitter - Wysyłanie wiadomości</title>
        <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>

        <div class="float-left">
            <div class="container">
                <div class="btn-group" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <a href="messages.php"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-circle-arrow-left"></div> Powrót do wiadomości</button></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <form action="" method="post" role="form">
                        <legend>Wysyłanie wiadomości</legend>
                        <div class="form-group">
                            <label for="">Nazwa użytkownika odbiorcy</label>
                            <input type="text" class="form-control" name="userName" id="userName" placeholder="Nazwa użytkownika"
                                   value="">
                        </div>
                        <div class="form-group">
                            <label for="">Treść wiadomości</label>
                            <input type="text" class="form-control" name="description" id="description"
                                   placeholder="Wpisz treśc wiadomości"
                                   value="">
                        </div>
                        <button type="submit" class="btn btn-primary">Wyślij</button>
                    </form>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

                </div>
            </div>
        </div>

    </body>
</html>