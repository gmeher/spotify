
<?php include ("include/header.php") ?>

<h1 class = "pageHeadingBig"> You might also like </h1>

<div class="gridViewContainer">

    <?php 
        $albumQuery = mysqli_query($con,"select * from albums Order By rand() LIMIT 4");

        while($row = mysqli_fetch_array($albumQuery)){
            echo "
                    <div class = 'gridViewItem'  >

                        <a href='album.php?id=" . $row['id'] . " '>
                            <img src = '". $row['artworkPath'] . "'>

                            <div class = 'gridViewInfo'>
                                " . $row['title'] . "
                            </div>
                        </a>
            
                    </div>
                
            ";
        }

    ?>

</div>


<?php include ("include/footer.php") ?>