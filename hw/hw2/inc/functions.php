<?php
   class Destination{
        function Destination() {
            $this->cityName = null;
            $this->cityCountry = null;
            $this->cityImgLink = null;
            $this->countryFlagLink = null;
            $this->cityName = null;
        }
   }
    
    function createDesinationsArr(){
        $destinations = array();
        $cityNames = array("Bangkok", "Kuala Lumpur", "Taipei");
        $imgHost = "img/";
        do{
            $tempObj = new Destination();
            $tempObj ->cityName = array_pop($cityNames);
            if($tempObj->cityName == "Bangkok"){
                $tempObj->cityCountry = "Thailand";
                $tempObj->cityImgLink = $imgHost . "bangkok.jpg";
                $tempObj->countryFlagLink = $imgHost . "thailandFlag.jpg";
            }
            if($tempObj->cityName == "Kuala Lumpur"){
                $tempObj->cityCountry = "Malaysia";
                $tempObj->cityImgLink = $imgHost . "kl.jpg";
            
                $tempObj->countryFlagLink = $imgHost . "malaysiaFlag.jpg";
            }
            if($tempObj->cityName == "Taipei"){
                $tempObj->cityCountry = "Taiwan";
                $tempObj->cityImgLink = $imgHost . "taipei.jpg";
                $tempObj->countryFlagLink = $imgHost . "taiwanFlag.jpg";
            }
            array_push($destinations, $tempObj);
        } while(count($cityNames) > 0);
        for($i=0; $i< count($destinations); $i++){
            $destinations[$i]->cityFact = generateRandomCityFact($destinations[$i]->cityName);
        }
        return $destinations;
    }
    
    function load(){
        $destinations = createDesinationsArr();
        $randDestObj = $destinations[array_rand($destinations)];
        displayFlag($randDestObj);
        displayCityImg($randDestObj);
        displayLocationInfo($randDestObj);
    }
    
    function displayFlag($destObj){
            echo "<div class='imgContainer'>";
            echo "<img class='flags' id='flag$destObj->cityCountry' src='". $destObj->countryFlagLink . "' alt='Flag of $destObj->cityCountry' title='$destObj->cityCountry Flag'/>";
            echo "</div>";
        }
    function displayCityImg($destObj){
            echo "<div class='imgContainer'>";
            echo "<img class='cityPic' id='city$destObj->cityName' src='". $destObj->cityImgLink . "' alt='Pic of $destObj->cityName' title='$destObj->cityName'/>";
            echo "</div>";
    }
    
    function displayLocationInfo($destObj){ 
        echo "<div class='infoContainer'";
        echo "<p>You are going to <span class='strongWord'>$destObj->cityName, $destObj->cityCountry!</span>";
        echo "<p><span class='strongWord'>Fun Fact:</span> $destObj->cityFact</p>";
        echo "</div>";
    }
    function generateRandomCityFact($cityName){
        $cityFacts = array();
        if($cityName == "Bangkok"){
            array_push($cityFacts, "Bangkok is fondly referred to as the '
            Venice of the East' due to its active nightlife scene as 
            well as having as many canals as Venice in Italy. It is also 
            called 'City of Angles' due to its fascination with city planning.");
            
            array_push($cityFacts, "If you want to spend your day away from the 
            city's hustle and bustle without venturing out of the city, the 
            Rama IX Park and Chatuchak are the two largest parks in Bangkok 
            and will be a good place to rest.");
            
            array_push($cityFacts, "Leaving the house without underwear in 
            Bangkok can lend you in jail. It is also illegal to drive a vehicle 
            bare-chested. And be careful, do not step on Thai 
            currency as it is also against the law.");
            
            return $cityFacts[rand(0, count($cityFacts) - 1)];
        }
        if($cityName == "Kuala Lumpur"){
            array_push($cityFacts, "Kuala Lumpur is the largest and most 
            populated city in Malaysia with an estimated population of 1.8 million.");
            
            array_push($cityFacts, "Although Kuala Lumpur is one of the fastest 
            growing cities in the world, it only acquired the status of being a city in 1972.");
            
            array_push($cityFacts, "Kuala Lumpur is 94 square miles in size 
            with an average elevation of 72 feet above sea level.  The city floods during 
            periods of heavy rains.");
            
            return $cityFacts[rand(0, count($cityFacts) - 1)];
            
        }
        if($cityName == "Taipei"){
            array_push($cityFacts, "Taipei's bike share program, Youbike, which 
            began in 2008, now has 200 stations with 6538 bikes and 55.8 million 
            rentals since the program's launch. The best part? The price for a 30-minute 
            rental is a mere 15 cents.");
            
            array_push($cityFacts, "If you want to spend your day away from the 
            city's hustle and bustle without venturing out of the city, the 
            Rama IX Park and Chatuchak are the two largest parks in Bangkok 
            and will be a good place to rest.");
            
            array_push($cityFacts, "Of the 1,769,428 motor vehicles registered in 
            Taipei, 970,865 of them are motorcycles. Locals call the sea of vehicles 
            going down a ramp a “motorcycle waterfall.");
            
            return $cityFacts[rand(0, count($cityFacts) - 1)];
        }
    }
?>