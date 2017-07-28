<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Twitter - Strona główna</title>
        <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <a href="../register_edit/edit_user.php"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-pencil"></div> Edytuj profil</button></a>
                </div>
                <div class="btn-group" role="group">
                    <a href="../messages/messages.php"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-inbox"></div> Wiadomości</button></a>
                </div>
                <div class="btn-group" role="group">
                    <a href="../login.php"><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-off"></div> Wyloguj się</button></a>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <form action="" method="post" role="form">
                        <legend>Dodawanie wpisu</legend>
                        <div class="form-group">
                            <label for="">Treść wpisu</label>
                            <input type="text" class="form-control" name="userTweet" id="userTweet" maxlength="140" placeholder="Treść tweeta"
                                   value="">
                        </div>
                        <button type="submit" class="btn btn-primary">Tweetnij</button>
                    </form>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                </div>
            </div>
        </div>
        <div class="float-left">
            <h3>
                Twoje wpisy:
            </h3>
        </div>
        <!--tabelę można wziąć od prowadzącego-->
        <!--w tabeli każdy wpis to link i przekazujesz jego id getem do tweet.php-->
    </body>
</html>