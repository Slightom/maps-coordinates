<?php
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];

    $apiURL = 'https://api.opencagedata.com/geocode/v1/json?q='.$lat.','.$lng.'&key=06a014349f764a27bfc95d6b13a00acc';

    $result = json_decode(file_get_contents($apiURL));
    $city='---';
    $country='---';
    $country_code = '---';
    if(isset($result->results[0]->components->city)) {$city = $result->results[0]->components->city;}
    if(isset($result->results[0]->components->country)) {$country = $result->results[0]->components->country;}
    if(isset($result->results[0]->components->country_code)) {$country_code = $result->results[0]->components->country_code;}
    if($country_code != '---'){
        $api2 = 'https://restcountries.eu/rest/v2/alpha/'.$country_code;
        $r2 = json_decode(file_get_contents($api2));
        echo 
        // '<br/><img class="flag" src="https://www.countryflags.io/'.$country_code.'/shiny/64.png">';
        '<img class="flag" src="http://www.geognos.com/api/en/countries/flag/'.strtoupper($country_code).'.png"><br/>'.
        $country.', '.$city.'<br/><span class="small"><span class="special">Capital: </span>'.
        $r2->capital.'<br/><span class="special">Language: </span>'.
        $r2->languages[0]->name.'<br/>'.
        $result->timestamp->created_http.'</span>';
    }
    else{
        echo $country.', '.$city;
    }
    
?>


<!-- {
   "documentation" : "https://opencagedata.com/api",
   "licenses" : [
      {
         "name" : "CC-BY-SA",
         "url" : "https://creativecommons.org/licenses/by-sa/3.0/"
      },
      {
         "name" : "ODbL",
         "url" : "https://opendatacommons.org/licenses/odbl/summary/"
      }
   ],
   "rate" : {
      "limit" : 2500,
      "remaining" : 2497,
      "reset" : 1545436800
   },
   "results" : [
      {
         "annotations" : {
            "DMS" : {
               "lat" : "52\u00b0 30' 58.59612'' N",
               "lng" : "13\u00b0 22' 39.72900'' E"
            },
            "MGRS" : "33UUU8991719699",
            "Maidenhead" : "JO62qm53hv",
            "Mercator" : {
               "x" : 1489199.031,
               "y" : 6860089.217
            },
            "OSM" : {
               "edit_url" : "https://www.openstreetmap.org/edit?way=518071791#map=17/52.51628/13.37770",
               "url" : "https://www.openstreetmap.org/?mlat=52.51628&mlon=13.37770#map=17/52.51628/13.37770"
            },
            "callingcode" : 49,
            "currency" : {
               "alternate_symbols" : [],
               "decimal_mark" : ",",
               "html_entity" : "&#x20AC;",
               "iso_code" : "EUR",
               "iso_numeric" : 978,
               "name" : "Euro",
               "smallest_denomination" : 1,
               "subunit" : "Cent",
               "subunit_to_unit" : 100,
               "symbol" : "\u20ac",
               "symbol_first" : 1,
               "thousands_separator" : "."
            },
            "flag" : "\ud83c\udde9\ud83c\uddea",
            "geohash" : "u33db2m37p9bznzem3pq",
            "qibla" : 136.64,
            "sun" : {
               "rise" : {
                  "apparent" : 1545376500,
                  "astronomical" : 1545368820,
                  "civil" : 1545374040,
                  "nautical" : 1545371340
               },
               "set" : {
                  "apparent" : 1545404040,
                  "astronomical" : 1545411720,
                  "civil" : 1545406560,
                  "nautical" : 1545409260
               }
            },
            "timezone" : {
               "name" : "Europe/Berlin",
               "now_in_dst" : 0,
               "offset_sec" : 3600,
               "offset_string" : 100,
               "short_name" : "CET"
            },
            "what3words" : {
               "words" : "glosses.hood.bags"
            },
            "wikidata" : "Q82425"
         },
         "bounds" : {
            "northeast" : {
               "lat" : 52.5164327,
               "lng" : 13.377825
            },
            "southwest" : {
               "lat" : 52.5161167,
               "lng" : 13.37758
            }
         },
         "components" : {
            "ISO_3166-1_alpha-2" : "DE",
            "ISO_3166-1_alpha-3" : "DEU",
            "_type" : "attraction",
            "attraction" : "Brandenburg Gate",
            "city" : "Berlin",
            "city_district" : "Mitte",
            "country" : "Germany",
            "country_code" : "de",
            "house_number" : "1",
            "political_union" : "European Union",
            "postcode" : "10117",
            "road" : "Pariser Platz",
            "state" : "Berlin",
            "state_code" : "BE",
            "suburb" : "Mitte"
         },
         "confidence" : 9,
         "formatted" : "Brandenburg Gate, Pariser Platz 1, 10117 Berlin, Germany",
         "geometry" : {
            "lat" : 52.5162767,
            "lng" : 13.3777025
         }
      }
   ],
   "status" : {
      "code" : 200,
      "message" : "OK"
   },
   "stay_informed" : {
      "blog" : "https://blog.opencagedata.com",
      "twitter" : "https://twitter.com/opencagedata"
   },
   "thanks" : "For using an OpenCage Data API",
   "timestamp" : {
      "created_http" : "Fri, 21 Dec 2018 21:40:34 GMT",
      "created_unix" : 1545428434
   },
   "total_results" : 1
} -->