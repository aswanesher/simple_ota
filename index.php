<?php 
include "config/db_config.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Travel Booking Form ( Hotel, Flight, Car, Cruises)</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Travel Booking Form ( Hotel, Flight, Car, Cruises)"/>
<meta name="author" content="">
<link rel="stylesheet" type="text/css" href="style.css" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
    $( "#datepicker2" ).datepicker({ dateFormat: 'dd/mm/yy' });
  });
</script>
</head>
<body>
<p class="links"><a href="index.php" class="selected">Main Form</a> | <a href="detail.php">Detail Form</a> |<a href="account.php">Account Form</a> | <a href="payment.php">Payment Form</a></p>
<div class="tabbed-area">
  <ul class="tabs group">
    <li><a href="#box-one">Flight</a></li>
    <!--<li><a href="#box-two">Hotel</a></li>
    <li><a href="#box-three">Car</a></li>
    <li><a href="#box-four">Cruises</a></li>-->
  </ul>
  <div class="box-wrap">
    <div id="box-one">
      <p class="line"></p>
      <h3>Search for Cheap Flights</h3>
      <form  method="post">
        <p class="select_flight"> <span>
          <input type="radio" name="radio" class="radio" />
          Round trip</span> <span>
          <input type="radio" name="radio" class="radio" />
          One-way</span></p>
         <p class="pull-left">
          <label>From<small>( City name or airport )</small></label>
          <select class="pull-left">
              <?php 
              $url = "http://ws.demo.awan.sqiva.com/?rqid=5EB9FE68-8915-11E0-BEA0-C9892766ECF2&airline_code=W2&app=data&action=get_org";
$jsonUrl = file_get_contents($url, False);
$json_idr = json_decode($jsonUrl, true);
echo "<option value=''>Origin</option>";
foreach ($json_idr['origin'] as $myd) {
    echo "<option value='$myd[0]'>$myd[1] ($myd[0])</option>";
}
              ?>
            
          </select>
        </p>
        <p class="pull-right">
          <label>To<small>( City name or airport )</small></label>
          <select>
            <option value="">Destination</option>
            <?php 
 $url = "http://ws.demo.awan.sqiva.com/?rqid=5EB9FE68-8915-11E0-BEA0-C9892766ECF2&airline_code=W2&app=data&action=get_des";
$jsonUrl = file_get_contents($url, False);
$json_idr = json_decode($jsonUrl, true);
foreach ($json_idr['destination'] as $myd) {
    echo "<option value='$myd[0]'>$myd[1] ($myd[0])</option>";
}
            ?>
          </select>
        </p>
        <p class="pull-left">
          <label>Leave</label>
          <input type="text" id="datepicker" class="calender" placeholder=" dd/mm/yyy"/>
        </p>
        <p class="pull-right">
          <label>Return</label>
          <input type="text" id="datepicker2" class="calender" placeholder=" dd/mm/yyy"/>
        </p>

        
        <p class="select_age"> <span>
          <label>Adult(18-64)</label>
          <select class="first">
            <option>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
          </select>
          </span> <span>
          <label>Seniors(65+)</label>
          <select>
            <option>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
          </select>
          </span> <span class="pull-right">
          <label>Children(0-17)</label>
          <select>
            <option>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
          </span> </p>
        <p class="center_btn">
          <button type="submit" class="orange_btn">Find Flight </button>
        </p>
      </form>
    </div>
    <!--<div id="box-two">
      <p class="selected_hotel"></p>
      <h3>Find Discount &amp;Cheap Hotel Rates</h3>
      <form>
        <p class="select_flight"> <span>
          <input type="radio" name="radio" class="radio" />
          Search by city, point of interest, region, or airport</span> <span>
          <input type="radio" name="radio" class="radio" />
          Search by address</span> </p>
        <p>
          <label>Where</label>
          <input type="text" class="large">
        <p class="pull-left">
          <label>Check-in</label>
          <input type="text"  class="calender" placeholder=" dd/mm/yyy"/>
        </p>
        <p class="pull-right">
          <label>Check-out</label>
          <input type="text"  class="calender" placeholder=" dd/mm/yyy"/>
        </p>
        <p class="select_age"> <span>
          <label>Adults (18- +)</label>
          <select class="select-age">
            <option>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
          </select>
          </span> <span>
          <label>Child (0-17)</label>
          <select class="select-age">
            <option>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
          </span> <span>
          <label>Rooms</label>
          <select class="select-age">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5+</option>
          </select>
          </span> </p>
        <p class="center_btn">
          <button type="submit" class="orange_btn">Find Hotels </button>
        </p>
      </form>
    </div>
    <div id="box-three">
      <p class="selected_car"></p>
      <h3>Get Great Deals on Car Rentals</h3>
      <form action="post">
        <p class="pull-left">
          <label>Pick-up</label>
          <input type="text"  class="calender" value=" Airport"/>
        </p>
        <p class="pull-right">
          <label>Drop-off</label>
          <input type="text"  class="calender" value=" Same as pickup"/>
        </p>
        <label>City name or airport</label>
        <input type="text" class="large">
        <p class="pull-left">
          <label>Pick-up</label>
          <input type="text"  class="calender" placeholder=" dd/mm/yyy"/>
        </p>
        <p class="pull-right">
          <label>Drop-off</label>
          <input type="text"  class="calender" placeholder=" dd/mm/yyy"/>
        </p>
        <p class="center_btn">
          <button type="submit" class="orange_btn">Find Car </button>
        </p>
      </form>
    </div>
    <div id="box-four">
      <p class="downarrow_cruse"></p>
      <h3>Choose your destination, length, and cruise line</h3>
      <form action="post">
        <p class="pull-left">
          <label>Origin</label>
          <select class="pull-left">
              <?php 
              $url = "http://ws.demo.awan.sqiva.com/?rqid=5EB9FE68-8915-11E0-BEA0-C9892766ECF2&airline_code=W2&app=data&action=get_org";
$jsonUrl = file_get_contents($url, False);
$json_idr = json_decode($jsonUrl, true);
echo "<option value=''>Origin</option>";
foreach ($json_idr['origin'] as $myd) {
    echo "<option value='$myd[0]'>$myd[1] ($myd[0])</option>";
}
              ?>
            
          </select>
        </p>
        <p class="pull-right">
          <label>Destination</label>
          <select>
            <option value="">Destination</option>
            <?php 
 $url = "http://ws.demo.awan.sqiva.com/?rqid=5EB9FE68-8915-11E0-BEA0-C9892766ECF2&airline_code=W2&app=data&action=get_des";
$jsonUrl = file_get_contents($url, False);
$json_idr = json_decode($jsonUrl, true);
foreach ($json_idr['destination'] as $myd) {
    echo "<option value='$myd[0]'>$myd[1] ($myd[0])</option>";
}
            ?>
          </select>
        </p>
                <p class="pull-left">
          <label>Check-in</label>
          <input type="text"  class="calender" placeholder=" dd/mm/yyy"/>
        </p>
        <p class="pull-left">
          <label>Cruise Departure Port</label>
          <select>
            <option>Any Departure Port</option>
            <option>Amsterdam, Netherlands</option>
            <option>Ancona, Italy</option>
            <option>Auckland, New Zealand</option>
            <option>Avignon, France</option>
            <option>Baltimore, Maryland</option>
            <option>Bamberg, Germany</option>
            <option>Baoshan, China</option>
            <option>Barcelona, Catalonia, Spain</option>
            <option>Bari, Italy</option>
            <option>Basel, Switzerland</option>
            <option>Benoa, Bali, Indonesia</option>
            <option>Bordeaux, France</option>
            <option>Boston, Massachusetts</option>
            <option>Bridgetown, Barbados</option>
            <option>Brisbane, Australia</option>
            <option>Budapest, Hungary</option>
            <option>Buenos Aires, Argentina</option>
            <option>Cagliari, Sardinia, Italy</option>
            <option>Callao, Peru</option>
            <option>Cape Liberty, Bayonne, New Jersey</option>
            <option>Cape Town, South Africa</option>
            <option>Capri, Italy</option>
            <option>Catalina Island, Dominican Republic</option>
            <option>Catania, Sicily, Italy</option>
            <option>Chalon-sur-Saone, France</option>
            <option>Charleston, South Carolina</option>
            <option>Charlotte Amalie, St. Thomas, United States Virgin Islands</option>
            <option>Chennai, India</option>
            <option>Chongqing, China</option>
            <option>Civitavecchia, Italy</option>
            <option>Colon, Panama</option>
            <option>Copenhagen, Denmark</option>
            <option>Dover, England, United Kingdom</option>
            <option>Dubai, United Arab Emirates</option>
            <option>Durban, South Africa</option>
            <option>Ensenada, Baja California, Mexico</option>
            <option>Fremantle, Australia</option>
            <option>Ft. Lauderdale, Florida</option>
            <option>Galveston, Texas</option>
            <option>Genoa, Italy</option>
            <option>Giurgiu, Romania</option>
            <option>Hamburg, Germany</option>
            <option>Harwich, England, United Kingdom</option>
            <option>Heraklion, Crete, Greece</option>
            <option>Hong Kong, China</option>
            <option >Honolulu, Oahu, Hawaii</option>
            <option>Houston, Texas, United States</option>
            <option>IJmuiden, Netherlands</option>
            <option>Isla Baltra, Galapagos Islands, Ecuador</option>
            <option>Istanbul, Turkey</option>
            <option>Jacksonville, Florida</option>
            <option>Kampong Cham, Cambodia</option>
            <option>Ketchikan, Alaska</option>
            <option>Kiel, Germany</option>
            <option>Kiev, Ukraine</option>
            <option>Kobe, Japan</option>
            <option>La Romana, Dominican Republic</option>
            <option>Laem Chabang, Thailand</option>
            <option>Lisbon, Portugal</option>
            <option>Livorno, Italy</option>
            <option>London, England, United Kingdom</option>
            <option>Long Beach, California</option>
            <option>Los Angeles, California</option>
            <option >Magdeburg, Germany</option>
            <option>Malaga, Spain</option>
            <option>Manaus, Brazil</option>
            <option>Mandalay, Myanmar</option>
            <option>Marseille, Provence, France</option>
            <option>Melbourne, Australia</option>
            <option>Messina, Sicily, Italy</option>
            <option>Miami, Florida</option>
            <option>Monte-Carlo, Monaco</option>
            <option>Montreal, Quebec, Canada</option>
            <option>Moscow, Russia</option>
            <option>Mumbai, India</option>
            <option >My Tho, Vietnam</option>
            <option>Nanjing, China</option>
            <option>Naples, Italy</option>
            <option>New Orleans, Louisiana</option>
            <option>New York, New York</option>
            <option>Nice, France</option>
            <option>Norfolk, Virginia</option>
            <option>Nurnberg, Germany</option>
            <option>Odessa, Ukraine</option>
            <option>Oranjestad, Aruba, Netherlands Antilles</option>
            <option>Oslo, Norway</option>
            <option>Otaru, Japan</option>
            <option>Palermo, Sicily, Italy</option>
            <option>Palma de Mallorca, Mallorca, Spain</option>
            <option>Papeete, Tahiti, French Polynesia</option>
            <option>Paris, France</option>
            <option>Passau, Germany</option>
            <option>Philipsburg, Sint Maarten, Netherlands Antilles</option>
            <option>Piraeus, Greece</option>
            <option>Pointe-a-Pitre, Guadeloupe, France</option>
            <option>Port Canaveral, Florida</option>
            <option>Prome, Myanmar</option>
            <option>Puerto Caldera, Costa Rica</option>
            <option>Quebec City, Quebec, Canada</option>
            <option>Rhodes, Rhodes Island, Greece</option>
            <option >Rio de Janeiro, Brazil</option>
            <option>Rotterdam, Netherlands</option>
            <option>San Diego, California</option>
            <option>San Francisco, California</option>
            <option>San Juan, Puerto Rico</option>
            <option>Santa Cruz de Tenerife, Tenerife, Canary Islands, Spain</option>
            <option >Santos, Brazil</option>
            <option>Savona, Italy</option>
            <option>Seattle, Washington</option>
            <option>Seville, Spain</option>
            <option>Seward, Alaska</option>
            <option>Shanghai, China</option>
            <option>Sharm al Sheikh, Sinai, Egypt</option>
            <option> Singapore, Singapore</option>
            <option>Southampton, England, United Kingdom</option>
            <option>St. Petersburg, Russia</option>
            <option>Stockholm, Sweden</option>
            <option>Sydney, Australia</option>
            <option>Tampa, Florida</option>
            <option>Tianjin, China</option>
            <option>Toulon, France</option>
            <option>Trier, Germany</option>
            <option>Trieste, Italy</option>
            <option>Valencia, Spain</option>
            <option>Valparaiso, Chile</option>
            <option >Vancouver, British Columbia, Canada</option>
            <option>Venice, Italy</option>
            <option>Vila Nova de Gaia, Portugal</option>
            <option>Warnemunde, Germany</option>
            <option>Whittier, Alaska</option>
            <option>Wuhan, China</option>
            <option>Yokohama, Japan</option>
          </select>
        </p>
        <p class="pull-right">
          <label>Cruise Line</label>
          <select>
            <option>All Cruise Lines</option>
            <option>Azamara Club Cruises</option>
            <option>Carnival Cruise Lines</option>
            <option>Celebrity Cruises</option>
            <option>Costa Cruises</option>
            <option>Disney Cruise Line</option>
            <option>Holland America Line</option>
            <option>MSC Cruises</option>
            <option>Norwegian Cruise Line</option>
            <option>Oceania Cruises</option>
            <option>Princess Cruises</option>
            <option>Regent Seven Seas Cruises</option>
            <option>Royal Caribbean Int'l</option>
            <option>Seabourn</option>
            <option>Viking River Cruises</option>
          </select>
        </p>
        <h3>Enter additional details</h3>
        <p class="pull-left">
          <label>Where do you live?</label>
          <select class="wd">
            <option value="">State/Province</option>
            <optgroup label="US">
            <option>AL&nbsp;-&nbsp;Alabama</option>
            <option>AK&nbsp;-&nbsp;Alaska</option>
            <option>AS&nbsp;-&nbsp;American&nbsp;Samoa</option>
            <option>AZ&nbsp;-&nbsp;Arizona</option>
            <option>AR&nbsp;-&nbsp;Arkansas</option>
            <option>AE&nbsp;-&nbsp;Armed&nbsp;Forces</option>
            <option>AA&nbsp;-&nbsp;Armed&nbsp;Forces&nbsp;Americas</option>
            <option>AP&nbsp;-&nbsp;Armed&nbsp;Forces&nbsp;Pacific</option>
            <option>CA&nbsp;-&nbsp;California</option>
            <option>CO&nbsp;-&nbsp;Colorado</option>
            <option>CT&nbsp;-&nbsp;Connecticut</option>
            <option>DE&nbsp;-&nbsp;Delaware</option>
            <option>DC&nbsp;-&nbsp;District&nbsp;of&nbsp;Columbia</option>
            <option>FM&nbsp;-&nbsp;Fed.&nbsp;States&nbsp;of&nbsp;Micronesia</option>
            <option>FL&nbsp;-&nbsp;Florida</option>
            <option>GA&nbsp;-&nbsp;Georgia</option>
            <option>GU&nbsp;-&nbsp;Guam</option>
            <option>HI&nbsp;-&nbsp;Hawaii</option>
            <option>ID&nbsp;-&nbsp;Idaho</option>
            <option>IL&nbsp;-&nbsp;Illinois</option>
            <option>IN&nbsp;-&nbsp;Indiana</option>
            <option>IA&nbsp;-&nbsp;Iowa</option>
            <option>KS&nbsp;-&nbsp;Kansas</option>
            <option>KY&nbsp;-&nbsp;Kentucky</option>
            <option>LA&nbsp;-&nbsp;Louisiana</option>
            <option>ME&nbsp;-&nbsp;Maine</option>
            <option>MH&nbsp;-&nbsp;Marshall&nbsp;Islands</option>
            <option>MD&nbsp;-&nbsp;Maryland</option>
            <option>MA&nbsp;-&nbsp;Massachusetts</option>
            <option>MI&nbsp;-&nbsp;Michigan</option>
            <option>MN&nbsp;-&nbsp;Minnesota</option>
            <option>MS&nbsp;-&nbsp;Mississippi</option>
            <option>MO&nbsp;-&nbsp;Missouri</option>
            <option>MT&nbsp;-&nbsp;Montana</option>
            <option>NE&nbsp;-&nbsp;Nebraska</option>
            <option>NV&nbsp;-&nbsp;Nevada</option>
            <option>NH&nbsp;-&nbsp;New&nbsp;Hampshire</option>
            <option>NJ&nbsp;-&nbsp;New&nbsp;Jersey</option>
            <option>NM&nbsp;-&nbsp;New&nbsp;Mexico</option>
            <option>NY&nbsp;-&nbsp;New&nbsp;York</option>
            <option>NC&nbsp;-&nbsp;North&nbsp;Carolina</option>
            <option>ND&nbsp;-&nbsp;North&nbsp;Dakota</option>
            <option>MP&nbsp;-&nbsp;Northern&nbsp;Mariana&nbsp;Islands</option>
            <option>OH&nbsp;-&nbsp;Ohio</option>
            <option>OK&nbsp;-&nbsp;Oklahoma</option>
            <option>OR&nbsp;-&nbsp;Oregon</option>
            <option>PW&nbsp;-&nbsp;Palau</option>
            <option>PA&nbsp;-&nbsp;Pennsylvania</option>
            <option>PR&nbsp;-&nbsp;Puerto&nbsp;Rico</option>
            <option>RI&nbsp;-&nbsp;Rhode&nbsp;Island</option>
            <option>SC&nbsp;-&nbsp;South&nbsp;Carolina</option>
            <option>SD&nbsp;-&nbsp;South&nbsp;Dakota</option>
            <option>TN&nbsp;-&nbsp;Tennessee</option>
            <option>TX&nbsp;-&nbsp;Texas</option>
            <option>UT&nbsp;-&nbsp;Utah</option>
            <option>VT&nbsp;-&nbsp;Vermont</option>
            <option>VI&nbsp;-&nbsp;Virgin&nbsp;Islands</option>
            <option>VA&nbsp;-&nbsp;Virginia</option>
            <option>WA&nbsp;-&nbsp;Washington</option>
            <option>WV&nbsp;-&nbsp;West&nbsp;Virginia</option>
            <option>WI&nbsp;-&nbsp;Wisconsin</option>
            <option>WY&nbsp;-&nbsp;Wyoming</option>
            </optgroup>
            <optgroup label="CA">
            <option>AB&nbsp;-&nbsp;Alberta</option>
            <option>BC&nbsp;-&nbsp;British&nbsp;Columbia</option>
            <option>MB&nbsp;-&nbsp;Manitoba</option>
            <option>NB&nbsp;-&nbsp;New&nbsp;Brunswick</option>
            <option>NF&nbsp;-&nbsp;Newfoundland</option>
            <option>NT&nbsp;-&nbsp;North&nbsp;West&nbsp;Territories</option>
            <option>NS&nbsp;-&nbsp;Nova&nbsp;Scotia</option>
            <option>ON&nbsp;-&nbsp;Ontario</option>
            <option>PE&nbsp;-&nbsp;Prince&nbsp;Edward&nbsp;Island</option>
            <option>QC&nbsp;-&nbsp;Quebec</option>
            <option>SK&nbsp;-&nbsp;Saskatchewan</option>
            <option>YT&nbsp;-&nbsp;Yukon</option>
            </optgroup>
          </select>
        </p>
        <p class="center_btn">
          <button type="submit" class="orange_btn">Find Cruises </button>
        </p>
      </form>
    </div>-->
  </div>
</div>
</body>
</html>
