<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Twitter - wiadomość</title>
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
        <br>
        <div class="float-left">
            <div class="container">
                <table border="1">
                    <tbody>
                        <tr>
                            <td>Nadawca</td>
                            <td>Nadawca</td>
                        </tr>
                        <tr>
                            <td>Odbiorca</td>
                            <td>Odbiorca</td>
                        </tr>
                        <tr>
                            <td>Treść</td>
                            <td>Treść</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <a href="send_message.php"><!--tutaj musi znależć się GET z id--><button type="button" class="btn btn-default"><div class="glyphicon glyphicon-share-alt"></div>Odpowiedz</button></a>
                    <!--sprónuj ogarnąć żęby przycisk był mały na środku-->
                </div>
            </div>
        </div>


        <!--tabelę można wziąć od prowadzącego-->
        <!--w tabeli każdy wpis to link i przekazujesz jego id getem do tweet.php-->
    </body>
</html>