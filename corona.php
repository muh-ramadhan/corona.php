<?php

$confirmed = getData("https://services1.arcgis.com/0MSEUqKaxRlEPj5g/arcgis/rest/services/Coronavirus_2019_nCoV_Cases/FeatureServer/1/query?f=json&where=1%3D1&returnGeometry=false&spatialRel=esriSpatialRelIntersects&outFields=*&outStatistics=%5B%7B%22statisticType%22%3A%22sum%22%2C%22onStatisticField%22%3A%22Confirmed%22%2C%22outStatisticFieldName%22%3A%22value%22%7D%5D&cacheHint=true");

$deaths = getData("https://services1.arcgis.com/0MSEUqKaxRlEPj5g/arcgis/rest/services/Coronavirus_2019_nCoV_Cases/FeatureServer/1/query?f=json&where=1%3D1&returnGeometry=false&spatialRel=esriSpatialRelIntersects&outFields=*&outStatistics=%5B%7B%22statisticType%22%3A%22sum%22%2C%22onStatisticField%22%3A%22Deaths%22%2C%22outStatisticFieldName%22%3A%22value%22%7D%5D&cacheHint=true");

$recovered = getData("https://services1.arcgis.com/0MSEUqKaxRlEPj5g/arcgis/rest/services/Coronavirus_2019_nCoV_Cases/FeatureServer/1/query?f=json&where=1%3D1&returnGeometry=false&spatialRel=esriSpatialRelIntersects&outFields=*&outStatistics=%5B%7B%22statisticType%22%3A%22sum%22%2C%22onStatisticField%22%3A%22Recovered%22%2C%22outStatisticFieldName%22%3A%22value%22%7D%5D&cacheHint=true");

echo
    "
    <div style='flex: 0 0 25%;flex-grow: 0;flex-shrink: 0;flex-basis: 25%;margin-right: -0.75rem;margin-left: -0.75rem;flex-wrap: wrap;box-sizing: border-box;'>
    
    <div style='position: relative;width: 100%;min-height: 1px;padding-right: 0.75rem;padding-left: 0.75rem;display: block;'>

    <div style='box-shadow: 0 5px 10px rgba(94, 45, 216, 0.3);position: relative;margin-bottom: 1.5rem;width: 100%;flex-direction: column;min-width: 0;word-wrap: break-word;background: #f82649!important;display: flex;flex-direction: column;min-width: 0;word-wrap: break-word;border: 1px solid transparent;border-radius: 5px;'>

    <div style='flex: 1 1 auto;margin: 0;padding: 1.5rem 1.5rem;position: relative;'>
    <div style='margin-bottom: 0;display: flex !important;'>
    <div style='color: #fff !important;'>
    <p class='text-white mb-0'>TOTAL POSITIF</p>
    <br>
    <h2 class='mb-0 number-font'>" . $confirmed->features[0]->attributes->value;
echo "
    </h2>
    <p style='color: #fff !important;margin-bottom: 0 !important;margin-top: 0;display:block;margin-block-start: 1em;margin-block-end: 1em;margin-inline-start: 0px;margin-inline-end: 0px;'>ORANG</p>
    </div>
    <div style='margin-left: auto !important;'>
    <img style='max-width: 100%;vertical-align: middle;border-style: none;' src='https://kawalcorona.com/uploads/sad-u6e.png' alt='Positif' width='50' height='50'>
    </div>
    </div>
    </div>
    </div>
    </div>

        <div style='position: relative;width: 100%;min-height: 1px;padding-right: 0.75rem;padding-left: 0.75rem;display: block;'>
        
        <div style='box-shadow: 0 5px 10px rgba(94, 45, 216, 0.3);position: relative;margin-bottom: 1.5rem;width: 100%;flex-direction: column;min-width: 0;word-wrap: break-word;background: #09ad95!important;display: flex;flex-direction: column;min-width: 0;word-wrap: break-word;border: 1px solid transparent;border-radius: 5px;'>
        
        <div style='flex: 1 1 auto;margin: 0;padding: 1.5rem 1.5rem;position: relative;'>
        <div style='margin-bottom: 0;display: flex !important;'>
        
        <div style='color: #fff !important;'>
        <p class='text-white mb-0'>TOTAL SEMBUH</p>
        <br>
        <h2 class='mb-0 number-font'>". $deaths->features[0]->attributes->value;
echo "
    </h2>
    <p class='text-white mb-0'>ORANG</p>
    </div>
    <div style='margin-left: auto !important;'>
    <img style='max-width: 100%;vertical-align: middle;border-style: none;'src='https://kawalcorona.com/uploads/happy-ipM.png' alt='Positif' width='50' height='50'>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    <div style='position: relative;width: 100%;min-height: 1px;padding-right: 0.75rem;padding-left: 0.75rem;display: block;'>
    
    <div style='box-shadow: 0 5px 10px rgba(94, 45, 216, 0.3);position: relative;margin-bottom: 1.5rem;width: 100%;flex-direction: column;min-width: 0;word-wrap: break-word;background: #d43f8d !important;display: flex;flex-direction: column;min-width: 0;word-wrap: break-word;border: 1px solid transparent;border-radius: 5px;'>
    
    <div style='flex: 1 1 auto;margin: 0;padding: 1.5rem 1.5rem;position: relative;'>
    <div style='margin-bottom: 0;display: flex !important;'>
    <div style='color: #fff !important;'>
    <p class='text-white mb-0'>TOTAL MENINGGAL</p>
    <br>
    <h2 class='mb-0 number-font'>". $recovered->features[0]->attributes->value;
echo "
    </h2>
    <p class='text-white mb-0'>ORANG</p>
    </div>
    <div style='margin-left: auto !important;'>
    <img style='max-width: 100%;vertical-align: middle;border-style: none;' src='https://kawalcorona.com/uploads/emoji-LWx.png' alt='Positif' width='50' height='50'>
    </div>
    </div>
    </div>
    </div>
    </div>";
function getData($url)
{

    $client = curl_init($url);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);

    return json_decode($response);
};
?>
  
<?php
$url = "https://services1.arcgis.com/0MSEUqKaxRlEPj5g/arcgis/rest/services/Coronavirus_2019_nCoV_Cases/FeatureServer/1/query?where=UPPER(Country_Region)%20like%20%27%25INDONESIA%25%27&outFields=Last_Update,Recovered,Deaths,Confirmed&returnGeometry=false&outSR=4326&f=json";

$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
$result = json_decode($response);
$Cfm = $result->features[0]->attributes->Confirmed;
$Dth = $result->features[0]->attributes->Deaths;
$Rcv = $result->features[0]->attributes->Recovered;

echo
    "
    <div style='position: relative;width: 100%;min-height: 1px;padding-right: 0.75rem;padding-left: 0.75rem;display: block;'>
    
    <div style='box-shadow: 0 5px 10px rgba(94, 45, 216, 0.3);position: relative;margin-bottom: 1.5rem;width: 100%;flex-direction: column;min-width: 0;word-wrap: break-word;background: #fc7303!important;display: flex;flex-direction: column;min-width: 0;word-wrap: break-word;border: 1px solid transparent;border-radius: 5px;'>
    
    <div style='flex: 1 1 auto;margin: 0;padding: 1.5rem 1.5rem;position: relative;'>
    <div style='margin-bottom: 0;display: flex !important;'>
    <div style='color: #fff !important;'>
    <h2 class='mb-0 number-font'>INDONESIA</h2>
    <p class='text-white mb-0'>
    <b>$Cfm</b> POSITIF
    <br>
    <b>$Rcv</b> SEMBUH
    <br>
    <b>$Dth</b> MENINGGAL</p>
    </div>
    <div style='margin-left: auto !important;'>
    <img style='max-width: 100%;vertical-align: middle;border-style: none;' src='https://kawalcorona.com/uploads/indonesia-PZq.png' alt='Positif' width='50' height='50'>
    </div>
    </div>
    </div>
    </div>
    </div>";
echo "
    </div>
";
?>

<!--
    NATIVE PHP CURL COVID-19 SID V20.04
    https://github.com/muh-ramadhan
-->
