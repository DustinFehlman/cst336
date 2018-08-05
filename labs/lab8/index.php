<?php
   include 'inc/header.php';
   $picArr = getPetPics();
    function createCarouselIndicators(){
        global $picArr;
        echo "<li data-target='#myCarousel' data-slide-to='0' class='active'></li>";
        for($x=1; $x < sizeOf($picArr); $x++){
           echo "<li data-target='#myCarousel' data-slide-to='".$x."'></li>"; 
        }
    }
    
    function loadCarousel(){
        global $picArr;
        $imgHost = "/cst336/labs/lab8/img/";     
        echo "<div class='carousel-item active'><img class='pics' src='". $imgHost . $picArr[0]['pictureURL'] . "' alt='animal".$x."'></div>";
        for($x=1; $x < sizeOf($picArr); $x++){
           echo "<div class='carousel-item'><img class='pics' src='". $imgHost . $picArr[$x]['pictureURL'] . "' alt='animal".$x."'></div>"; 
        }
    }
    
    function getPetPics() {
        include 'dbConnection.php';
        $conn = getDBConnection();
        $sql = "SELECT pictureURL FROM pets";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
?>
<div id="carousel-wrappper">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
          <?php createCarouselIndicators(); ?>
      </ul>
      <div class="carousel-inner">
           <?php loadCarousel()?>
      </div>
      
      <!-- Left and right controls -->
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
</div>

    <br /><br />
    <a class="btn btn-outline-primary" href="pets.php" role="button">Adopt Now! </a>

    <br /><br />
    <hr>
<?php
    include 'inc/footer.php';
?>
