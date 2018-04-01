
<?php include ("include/header.php") ?>

<?php
    if(isset($_GET['id'])){
        $albumId = $_GET['id'];
        echo $albumId;
    }

    else{
        header ("Location:index.php");
    }

    $albumQuery = mysqli_query($con, "select * from albums WHERE id = '$albumId' ");

    $album = mysqli_fetch_array($albumQuery);

    $artistId = $album['artist'];

    $artistQuery = mysqli_query($con, "select * from artists where id = '$artistId' ");

    $artist = mysqli_fetch_array($artistQuery);

    echo $artist['name'];
?>

<?php include ("include/footer.php") ?>