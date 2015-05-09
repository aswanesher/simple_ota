<?php 
require_once("header.php");
?>
<body>
<p class="links"><a href="index.php" class="selected">Main Form</a> | <a href="detail.php">Detail Form</a> |<a href="account.php">Account Form</a> | <a href="payment.php">Payment Form</a></p>
<div class="tabbed-area">
  <div class="box-wrap">
    <div id="box-one">
      <p class="line"></p>
      <h3>Search for Cheap Flights</h3>
      <form  method="post" action="showmaskapai.php">
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
  </div>
</div>
</body>
<?php 
require_once("footer.php");
?>
