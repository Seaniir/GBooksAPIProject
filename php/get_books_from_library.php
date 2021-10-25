<?php
    $name = $_COOKIE["ID"];
    $tbl = "tbl";
    $tbl .= $name;
    $mysqli = new mysqli("localhost", "root", "");
    $db = mysqli_select_db($mysqli, "libraries");

    $query = mysqli_query($mysqli, "select * from ".$tbl." ORDER BY titles");

    $i = 0;
    $jArray = array ();
    $titleArray = array ();
    $authorsArray = array ();
    $genreArray = array ();
    $imgArray = array ();
    $infoArray = array ();
    while ($row = mysqli_fetch_array($query))
    {
    ?>
      
      <?php $titleArray[$i] = $row["titles"]; 
       $authorsArray[$i] = $row["authors"]; 
       $genreArray[$i] = $row["genre"]; 
       $imgArray[$i] = $row["img"]; 
       $infoArray[$i] = $row["infoLink"]; 

            $i++;
        }

        $jTitleArray = $titleArray;
        $jAuthorsArray = $authorsArray;
        $jGenreArray = $genreArray;
        $jImgArray = $imgArray;
        $jInfoArray = $infoArray;
        
        $jArray[1] = $jTitleArray;
        $jArray[2] = $jAuthorsArray;
        $jArray[3] = $jGenreArray;
        $jArray[4] = $jImgArray;
        $jArray[5] = $jInfoArray;
        echo json_encode($jArray);
    ?>