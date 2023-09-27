<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    <?= $this->include('views/style.php') ?>
    </style>
</head>
<body>
    <!--add songs-->
    <?= $this->include('views/addsongs.php') ?>
    
    <!--create playlist-->
    <?= $this->include('views/addtoplaylist.php') ?>

    <!--mismong itsura ng music player-->
    <?= $this->include('views/mainview.php')?>


    <!--add to playlist-->
    <?= $this->include('views/playlist.php') ?>

    <!--modals-->
    <?= $this->include('views/modals.php') ?>

    <!--play musics-->
    <?= $this->include('views/playtrack.php') ?>

</body>
</html>