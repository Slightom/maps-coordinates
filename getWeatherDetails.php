<?php
function getIcon($icon){
  if($icon === 'clear-day'){
    $the_icon = '<i class="wi wi-day-sunny display-2"></i>';
  }
  elseif($icon === 'clear-night'){
    $the_icon = '<i class="wi wi-night-clear display-2"></i>';
  }
  elseif($icon === 'rain'){
    $the_icon = '<i class="wi wi-rain display-2"></i>';
  }
  elseif($icon === 'snow'){
    $the_icon = '<i class="wi wi-snow display-2"></i>';
  }
  elseif($icon === 'sleet'){
    $the_icon = '<i class="wi wi-sleet display-2"></i>';
  }
  elseif($icon === 'wind'){
    $the_icon = '<i class="wi wi-strong-wind display-2"></i>';
  }
  elseif($icon === 'fog'){
    $the_icon = '<i class="wi wi-fog display-2"></i>';
  }
  elseif($icon === 'cloudy'){
    $the_icon = '<i class="wi wi-cloudy display-2"></i>';
  }
  elseif($icon === 'partly-cloudy-day'){
    $the_icon = '<i class="wi wi-day-sunny-overcast display-2"></i>';
  }
  elseif($icon === 'partly-cloudy-night'){
    $the_icon = '<i class="wi wi-night-alt-partly-cloudy display-2"></i>';  
  }
  else{
    $the_icon = '<i class="wi wi-thermometer display-2"></i>';
  }
  
  return $the_icon;
}
  $apiURL = 'https://api.darksky.net/forecast/333a45e544f796b5eeed7f568ec255a7/';

  $lat = $_POST['lat'];
  $lng = $_POST['lng'];

  $uri = $apiURL.$lat.','.$lng.'?units=si';
  $forecast = json_decode(file_get_contents($uri));

  $timezone = $forecast->timezone;
  $curTemp = $forecast->currently->temperature;
  $curSummary = $forecast->currently->summary;
  $curIcon = $forecast->currently->icon;

  echo '<p id="coordinates">lat: '.$lat."<br/>lng: ".$lng."</p>"
  .$timezone.'<br/><p class="special">'.$curTemp."&#x2103;</p>"
  .getIcon($curIcon).'<br/><p class="special">'.$curSummary."</p>";


  
?>