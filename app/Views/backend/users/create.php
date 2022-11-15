<!DOCTYPE html>
<html lang="en">
<head>
    <title>Yeni Kullanıcı Ekleme</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <?php if (isset($success)) { ?>

        <div class="alert alert-success">
            <strong> Başarılı!</strong>
            <?php echo $success ?>
        </div>
    <?php } ?>

    <?php if (isset($error)) { ?>
        <?php foreach ($error as $key => $value) { ?>
            <div class="alert alert-danger">
                <?php echo $value ?>
            </div>
        <?php } ?>
    <?php } ?>

    <h2>Yeni Kullanıcı Ekleme</h2>
    <form method="POST" ACTION="http://localhost/blogapp/admin/users/create">
        <div class="form-group">
            <label>Ad Soyad:</label>
            <input type="text" class="form-control" placeholder="Ad Soyad giriniz" name="name">
        </div>
        <div class="form-group">
            <label>Eposta Adresi:</label>
            <input type="text" class="form-control" placeholder="email giriniz" name="email">
        </div>
        <div class="form-group">
            <label>Kullanıcı Adı:</label>
            <input type="text" class="form-control" placeholder="Username giriniz" name="username">
        </div>
        <div class="form-group">
            <label>Telefon Numarası:</label>
            <input type="text" class="form-control" placeholder="telefon Numarası giriniz" name="phone">
        </div>
        <button type="submit" class="btn btn-default">Kaydet</button>
    </form>
</div>

</body>
</html>
