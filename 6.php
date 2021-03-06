<?php 

$username = "sidgupta";                       // Use your username
$password = "Iamaverygoodboy1998";                      // and your password
$database = "oracle.cise.ufl.edu/orcl"; 

$query = "SELECT X1.year, X1.average_world_population, X1.highest_Population_density, X2.lowest_population_density FROM(
        SELECT X.year, average_world_population, Y.Highest_Population_density  FROM (
            SELECT year, World_Population_density/NUMBER_OF_COUNTRIES AS average_world_population FROM (
                SELECT SUM(P.Midyear_population/ A.Area) AS world_population_density, year
                FROM ISWARYA.Population P, ISWARYA.Area A
                WHERE P.country_name = A.country_name
                GROUP BY P.year
                ORDER BY year), 
            
           (SELECT DISTINCT COUNT(COUNTRY_NAME) AS NUMBER_OF_COUNTRIES FROM ISWARYA.Area)) X,
        (SELECT MAX(P.Midyear_population/ A.Area) AS highest_population_density, year
        FROM ISWARYA.Population P, ISWARYA.Area A
        WHERE P.country_name = A.country_name
        GROUP BY P.year
        ORDER BY year) Y
        WHERE X.year = Y.year) X1,

        (SELECT MIN(P.Midyear_population/ A.Area) AS lowest_population_density, year
        FROM ISWARYA.Population P, ISWARYA.Area A
        WHERE P.country_name = A.country_name
        GROUP BY P.year
        ORDER BY year)X2
    WHERE X1.year= X2.year
    AND X1.YEAR BETWEEN 2000 AND 2020

";

$c = oci_connect($username, $password, $database);
if (!$c) {
    $m = oci_error();
    trigger_error('Could not connect to database: '. $m['message'], E_USER_ERROR);
}
$s = oci_parse($c, $query);
if (!$s) {
    $m = oci_error($c);
    trigger_error('Could not parse statement: '. $m['message'], E_USER_ERROR);
}
$r = oci_execute($s);
if (!$r) {
    $m = oci_error($s);
    trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
}

$chart_data = " ";
while(($row = oci_fetch_array($s, OCI_BOTH))!= false){
  //$data[] = $row;
  //'" < These quotes + Double quotes below on year represent X-Axis > "'
     $chart_data .= "{ year:'".$row["YEAR"]."', highest_population_density:".$row["HIGHEST_POPULATION_DENSITY"]."}, ";
 // $chart_data .= "{ year: '".$row["YEAR"]."', a: ".$row["AVERAGE_LIFE_EXPECTANCY"].",b: ".$row["AVERAGE_LIFE_EXPECTANCY_FEMALE"].",c: ".$row["AVERAGE_LIFE_EXPECTANCY_MALE"]."}, ";
}
//To remove last comma from $chart_data
$chart_data = substr($chart_data, 0, -2);
//echo $chart_data;

?>


<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | How to use Morris.js chart with PHP & Mysql</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<style>

  .text1{
        text-align: right;
        }
  .text2{
        text-align: right;
        color: Darkcyan;
         }

  .text3{
         text-align: right;
         padding-top: 8px;
         color: white;
         background-color: blue;
         }

  .ddown1{
        padding-top: 20px;
        }

  .ddown2{
        width: 250px;
        height: 35px;
        border: solid 0.5px black;
        font-weight: 600;
        color: DarkCyan;
        font-family: ;
        }                                             
     
    #rectangle{
               height: 100px;
               border-radius: 2px;
               border: solid 0.5px #d4d4d4;
               }
    
  </style>
  
 </head>
 <body>
    <div class="container">
  <div class="row">
    <ul class="nav nav-tabs ">
  <li><a href="home.php"><h4 id="home">Home<h4></a></li>
  <li><a href="5.php"><h4 id="naturalincrease">Population </h4></a></li>
  <li><a href="6.php"><h4 id="populationdensity">Population Density</h4></a></li>
  <li><a href="7.php"><h4 id="sexratio">Sex Ratio</h4></a></li>
  <li><a href="3.php"><h4 id="mortality">Mortality</h4></a></li>
  <li><a href="2.php"><h4 id="childbearingyears">Childbearing Years</h4></a></li>
  <li><a href="1.php"><h4 id="agedependency">Age Dependency</h4></a></li>
  <li><a href="4.php"><h4 id="lifeexpectancy">Life Expectancy</h4></a></li>
    </ul>
  </div>
</div>
  <center>
  <br /><br />
  <div class="container">
   <!--<h2 align="center">Morris.js chart with PHP & Mysql</h2>-->
   <h1 align="center">Population Density</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
</center>
 </body>
</html>

<script>
Morris.Line({
 element:'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'year',
 ykeys:['highest_population_density'],
 labels:['density'],
 hideHover:'auto',
 stacked:false
});
</script>