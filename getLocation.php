<?php
if(!empty($_POST['latitude']) && !empty($_POST['longitude'])){
    //Send request and receive json data by latitude and longitude
    $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($_POST['latitude']).','.trim($_POST['longitude']).'&sensor=false';
    $json = @file_get_contents($url);
    $data = json_decode($json);
    $status = $data->status;
    //echo "<pre>";print_r($status);exit;
    if($status=="OK"){
        //Get address from json data
                //$location = $data->results[0]->formatted_address;
                
                $country_batman = ($data->results[0]->address_components[7].long_name);
				$countrycode_batman = ($data->results[0]->address_components[7].short_name);
				$state_batman = ($data->results[0]->address_components[6].long_name);
				$statecode_batman = ($data->results[0]->address_components[6].short_name);
				$city_batman = ($data->results[0]->address_components[5].short_name);
				$street_number_batman = ($data->results[0]->address_components[0].short_name);
				$route_batman = ($data->results[0]->address_components[1].short_name);
				$sublocality1_batman = ($data->results[0]->address_components[3].short_name);
				$sublocality2_batman = ($data->results[0]->address_components[4].short_name);
				$postalcode_batman = ($data->results[0]->address_components[8].short_name);
				$lat_batman = ($_POST['latitude']);
				$lng_batman = ($_POST['longitude']);
        
                $response = array(
                    'logged' => false,
                    'latitude' => $lat_batman,
                    'longitude' => $lng_batman,
                    'country_batman' => $country_batman,
                    'countrycode_batman' => $countrycode_batman,
                    'state_batman' => $state_batman,
                    'city_batman' => $city_batman,
                    'street_number_batman' => $street_number_batman,
                    'route_batman' => $route_batman,
                    'sublocality1_batman' => $sublocality1_batman,
                    'sublocality2_batman' => $sublocality2_batman,
                    'postalcode_batman' => $postalcode_batman,

                );
                echo json_encode($response);
      
        
    }else{
        $response = array(
            'logged' => false,
            'message' => 'Could not got data'
        );
        echo json_encode($response);
    }
}
else
{
    header("Location: http://phoenixpeth.com/");
}
?>