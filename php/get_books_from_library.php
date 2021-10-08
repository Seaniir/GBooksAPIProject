<?php
    $name = $_COOKIE["ID"];
    $tbl = "tbl";
    $tbl .= $name;
    $mysqli = new mysqli("localhost", "root", "");
    $db = mysqli_select_db($mysqli, "libraries");

    $query = mysqli_query($mysqli, "select * from ".$tbl." ORDER BY titles");

    $i = 0;
    $titleArray = array ();
    $authorsArray = array ();
    $genreArray = array ();
    $imgArray = array ();
    while ($row = mysqli_fetch_array($query))
    {
    ?>
      
      <?php $titleArray[$i] = $row["titles"]; 
       $authorsArray[$i] = $row["authors"]; 
       $genreArray[$i] = $row["genre"]; 
       $imgArray[$i] = $row["img"]; 

            $i++;
        }

        $jTitleArray['json'] = json_encode($titleArray);
        $jAuthorsArray['json'] = json_encode($authorsArray);
        $jGenreArray['json'] = json_encode($genreArray);
        $jImgArray['json'] = json_encode($imgArray);
        
        echo json_encode($jTitleArray);
        echo json_encode($jAuthorsArray);
        echo json_encode($jGenreArray);
        echo json_encode($jImgArray);
        ?>