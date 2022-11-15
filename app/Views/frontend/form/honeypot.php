<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="jumbotron">
        <h1>HoneyPot Kullanımı</h1>
    </div>

    <form method="post" >
        <div class="form-group">
            <label for="email">Email adresi:</label>
            <input type="email" class="form-control" name="email">
        </div>

        <label for="comment">Yorumunuz:</label>
        <textarea class="form-control" rows="5" name="comment"></textarea>
        <div class="checkbox">
            <label><input type="checkbox"> Hatırla</label>
        </div>
        <button type="submit" class="btn btn-default">Gönder</button>

</div>
</form>
</body>
</html>