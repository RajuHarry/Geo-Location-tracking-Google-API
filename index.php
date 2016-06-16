<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Get Visitor Location using HTML5 and PHP | Phoenix Peth - Social network</title>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script src="jquery.min.js"></script>
<script>
var WEnlight = $.noConflict();   
function getLocation() {
	navigator.geolocation.getCurrentPosition(function(position) {

    }, function(positionError) {

    });
    try {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(getInfo);
			
        } else {
			
        }
    } catch (e) {
		
    }
}

function initgeolocate(country_batman,countrycode_batman,
                        state_batman,statecode_batman,
                        city_batman,street_number_batman,
                        route_batman,sublocality1_batman,
                        sublocality2_batman,
                        postalcode_batman,
                        lat_batman,lng_batman,foramttedaddress)
{
    WEnlight('#cityget').html(city_batman);  
    WEnlight('#countryget').html(country_batman+' Country Code :  '+countrycode_batman);
    WEnlight('#stateget').html(state_batman+' State Code :  '+statecode_batman);
    WEnlight('#pincodeget').html(city_batman);
    WEnlight('#addressget').html(" Root : "+ route_batman+" Street Number: "+street_number_batman+" Sub locality 1: "+sublocality1_batman+" Sub locality 2: "+sublocality2_batman);
    WEnlight('#pincodeget').html(postalcode_batman);
    
    WEnlight('#lat').html(lat_batman);
    WEnlight('#lon').html(lng_batman);
    WEnlight('#fulladdress').html(foramttedaddress);
    
    
var formdata = {country_batman:country_batman,
                countrycode_batman:countrycode_batman,
                state_batman:state_batman,
                statecode_batman:statecode_batman,
                city_batman:city_batman,
                street_number_batman:street_number_batman,
                route_batman:route_batman,
                sublocality1_batman:sublocality1_batman,
                sublocality2_batman:sublocality2_batman,
                postalcode_batman:postalcode_batman,
                lat_batman:lat_batman,
                lng_batman:lng_batman};
    
    
    
		/*WEnlight.ajax({
			url:'yoursite/storegeolocation', //Post any variable to uer file to store in db
			data:formdata,
			method:'POST',
			contentType:'application/x-www-form-urlencoded; charset=UTF-8',
			dataType:"json",
			cache:false,
			beforeSend: function() {},
			uploadProgress: function(event, position, total, percentComplete){},
			success: function(response, textStatus, jqXHR) 
			{
								
			},
			complete: function(response){},
			error: function(jqXHR, textStatus, errorThrown)
			{}
		});*/
}
function getInfo(position) {
    latlng = position.coords.latitude + ',' + position.coords.longitude;
	WEnlight.ajax({
			url:'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + latlng+'&timestamp', 
        /*It must be HTTPS For more : WWw.phoenixpeth.com*/
			method:'GET',
			contentType:'application/x-www-form-urlencoded; charset=UTF-8',
			dataType:"json",
			cache:false,
			beforeSend: function() 
			{
			},
			uploadProgress: function(event, position, total, percentComplete) 
			{
				
			},
			success: function(result, textStatus, jqXHR) 
			{
				var country_batman = (result.results[0].address_components[7].long_name);
				var countrycode_batman = (result.results[0].address_components[7].short_name);
				var state_batman = (result.results[0].address_components[6].long_name);
				var statecode_batman = (result.results[0].address_components[6].short_name);
				var city_batman = (result.results[0].address_components[5].short_name);
				var street_number_batman = (result.results[0].address_components[0].short_name);
				var route_batman = (result.results[0].address_components[1].short_name);
				var sublocality1_batman = (result.results[0].address_components[3].short_name);
				var sublocality2_batman = (result.results[0].address_components[4].short_name);
				var postalcode_batman = (result.results[0].address_components[8].short_name);
				var lat_batman = (position.coords.latitude);
				var lng_batman = (position.coords.longitude);
                var foramttedaddress = (result.results[0].formatted_address);
                
                //console.log(result);
                if(textStatus=='success')
                    {
                    initgeolocate(country_batman,countrycode_batman,state_batman,statecode_batman,city_batman,street_number_batman,
                    route_batman,sublocality1_batman,sublocality2_batman,postalcode_batman,lat_batman,lng_batman,foramttedaddress);
                    }
			},
			complete: function(response) 
			{
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
			}
		});
	
}
WEnlight(document).ready(function()
{
getLocation();
});
</script>
    </head>
    <body>
        <div class="container">
           
			<header>
				<h1>Powered by Phoenixpeth.com</span></h1>
				<h2>Join www.Phoenixpeth.com</h2>
			</header>
			<section class="ib-container" id="ib-container">
				<article>
					<header>
						<h3><a target="_blank" href="http://www.phoenixpeth.com/">Current Location</a></h3>
						<span>It is Your Device Current Location City</span>
					</header>
					<p id="cityget"></p>
				</article>
				<article>
					<header>
						<h3><a target="_blank" href="http://www.phoenixpeth.com/">Current Country</a></h3>
						<span>It is Your Device Current Country</span>
					</header>
					<p id="countryget"></p>
				</article>
                <article>
					<header>
						<h3><a target="_blank" href="http://www.phoenixpeth.com/">Current State</a></h3>
						<span>It is Your Device Current State</span>
					</header>
					<p id="stateget"></p>
				</article>
            
                <article>
					<header>
						<h3><a target="_blank" href="http://www.phoenixpeth.com/">Pincode / Zipcode</a></h3>
						<span>It is Your Device Pincode</span>
					</header>
					<p id="pincodeget"></p>
				</article>
                <article>
					<header>
						<h3><a target="_blank" href="http://www.phoenixpeth.com/">Current Address</a></h3>
						<span>It is Your Device Address</span>
					</header>
					<p id="addressget"></p>
				</article>
                <article>
					<header>
						<h3><a target="_blank" href="http://www.phoenixpeth.com/">Current Latitude</a></h3>
						<span>It is Your Device Latitude</span>
					</header>
					<p id="lat"></p>
				</article>
                <article>
					<header>
						<h3><a target="_blank" href="http://www.phoenixpeth.com/">Current Longitude</a></h3>
						<span>It is Your Device Longitude</span>
					</header>
					<p id="lon"></p>
				</article>
                <article>
					<header>
						<h3><a target="_blank" href="http://www.phoenixpeth.com/">Current Full address</a></h3>
						<span>It is Your Full address</span>
					</header>
					<p id="fulladdress"></p>
				</article>
			</section>
        </div>
		<script type="text/javascript" src="jquery.min.js"></script>
		<script type="text/javascript">
			WEnlight(function() {
				
				var WEnlightcontainer	= WEnlight('#ib-container'),
					WEnlightarticles	= WEnlightcontainer.children('article'),
					timeout;
				
				WEnlightarticles.on( 'mouseenter', function( event ) {
						
					var WEnlightarticle	= WEnlight(this);
					clearTimeout( timeout );
					timeout = setTimeout( function() {
						
						if( WEnlightarticle.hasClass('active') ) return false;
						
						WEnlightarticles.not( WEnlightarticle.removeClass('blur').addClass('active') )
								 .removeClass('active')
								 .addClass('blur');
						
					}, 65 );
					
				});
				
				WEnlightcontainer.on( 'mouseleave', function( event ) {
					
					clearTimeout( timeout );
					WEnlightarticles.removeClass('active blur');
					
				});
			
			});
		</script>
    </body>
</html>


