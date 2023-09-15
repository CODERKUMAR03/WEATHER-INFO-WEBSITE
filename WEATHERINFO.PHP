<?php
$status = "";
  if(isset($_POST['search'])){
    $City = $_POST['city'];
    $url="https://api.openweathermap.org/data/2.5/weather?q=$City&appid=97e86babb8b966a4413e10efc66c29bd";
    $ch=curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $result=json_decode($result, true);
    $status = "yes";
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Weather Website</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
  crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="grand" id="grand">
  <div class="container" id="main">
    <h1>Weather Info</h1>
    <div class="search">
    <form method="post">
			<input type="text" name="city">
      <button name="search" class="btn">
        <i class="fa-sharp fa-solid fa-magnifying-glass-location"></i>
      </button>
		</form>
  </div>
    
			
		
  <?php if($status =="yes"){?>
    <div class="weather-card">
      <div class="location"><?php echo $result['name']; ?></div>
      <div class="temperature"><?php echo  round( $result['main']['temp']-273.15); ?></div>
      <div class="conditions"><?php echo $result ['weather']['0']['description']; ?></div>
    </div>
  </div>

<!-----second column-->
  <div class="container" id="main">
    <div class="weather-card">
      <div class="details">
        <div class="detail">
          <span class="detail-label">Date :</span>
          <span class="detail-value"><?><?php echo date('d m y',$result['dt']); ?></span>
        </div>
        <div class="detail">
          <span class="detail-label">Humidity:</span>
          <span class="detail-value"><?php echo $result ['main']['humidity']; ?>%</span>
        </div>
        <div class="detail">
          <span class="detail-label">Wind Speed:</span>
          <span class="detail-value"><?php echo $result ['wind']['speed']; ?>Km/h</span>
        </div>
        <div class="detail">
          <span class="detail-label">Sunrise:</span>
          <span class="detail-value"><?php echo $result['sys']['sunrise']; ?></span>
        </div>
        <div class="detail">
          <span class="detail-label">Sunset:</span>
          <span class="detail-value"><?php echo $result ['sys']['sunset']; ?></span>
        </div>
      </div>
    </div>
  </div>
<!--third column-->

  <div class="container" id="main">
  <div class="weather-card">
    <span class="detail-label1">Sunday</span>
    <span class="detail-label1">Monday</span>
    <span class="detail-label1">Tuesday</span>
    <span class="detail-label1">Wednesday</span>
    <span class="detail-label1">Thrusday</span>
    <span class="detail-label1">Friday</span>
    <span class="detail-label1">Saturday</span>
  

      <div class="weak-value">
        <span class="weak-temp">24</span>
        <span class="weak-temp">52</span>
        <span class="weak-temp">52</span>
        <span class="weak-temp">55</span>
        <span class="weak-temp">54</span>
        <span class="weak-temp">53</span>
        <span class="weak-temp">55</span>
      </div>
    </div>
  </div>


  <?php }?>
        <div class="color-palette">
      		<button class="theme-color" onclick="tc()"></button>
      		<button class="theme-color1" onclick="tc1()"></button>
      		<button class="theme-color2" onclick="tc2()"></button>
	  			<button class="theme-color3" onclick="tc3()"></button>
	  			<button class="theme-color4" onclick="tc4()"></button>
          <button class="theme-color5" onclick="tc5()"></button>
          <button class="theme-color6" onclick="tc6()"></button>
    		</div>
</div>
</body>
<script src="script.js"></script>
</html>
