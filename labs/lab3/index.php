<?php
    $backgroundImage = "img/sea.jpg";
    $showSlideShow = false;
    
    if (isset($_GET['keyword']) && $_GET['keyword'] != "" || isset($_GET['catagory']) && $_GET['catagory'] != "") {
        $showSlideShow = true;
        include 'api/pixabayAPI.php';
        $catagory =  $_GET['catagory'];
        $keyword = $_GET['keyword'];
        if($catagory != ""){
            $searchFieldKeyword = $catagory;
        }
        else{
            $searchFieldKeyword = $keyword;
        }
        $imageURLs = getImageURLs($searchFieldKeyword, $GET_['layout']);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            @import url("css/styles.css");
            body { 
                background-image: url('<?=$backgroundImage ?>');
            }
        </style>
    </head>
    <body>
        <br>
        <?php 
            if(!isset($imageURLs)) {
                echo "<h2> Type a keyword to display a slideshow <br /> with random images
                from Pixaybay.com </h2>";
            } else {
        ?>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                  <?php 
                    for($i=0; $i < 7; $i++){
                        echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                        echo ($i == 0) ? "class='active'" : "";
                        echo"></li>";
                    }
                  ?>
              </ol>
            <div class="carousel-inner" role="listbox">
                <?php 
                    if($showSlideShow){
                        for($i = 0; $i < 5; $i++){
                            do {
                                $randomIndex = rand(0, count($imageURLs));
                            } while (!isset ($imageURLs[$randomIndex]));
                            
                            echo '<div class ="item ';
                            echo ($i == 0) ? "active" : "";
                            echo '">';
                            echo '<img src="' . $imageURLs[$randomIndex] . '">';
                            echo '</div>';
                            unset($imageURLs[$randomIndex]);
                        }
                    }
                ?>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <?php
            }//endElse
        ?>
        <br>
        <form>
            <input type="text" name="keyword" placeholder"Keyword"/>
            <br>
            <input type="radio" id="lhorizontal" name="layout" value="horizontal">
            <label for="Horizontal"></label><lablel for="lhorizontal">Horizontal</lablel>
            <input type = "radio" id="lvertical" name="layout" value="vertical">
            <label for="Vertical"></label><label for="lvertical">Vertical</label>
            <select name ="catagory">
                <option value ="">Select One</option>
                <option value="ocean">Sea</option>
                <option value="forest">Forest</option>
                <option value="mountain">Mountain</option>
                <option value="snow">Snow</option>
            </select>
            <input type="submit" value="Submit" />
        </form>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>