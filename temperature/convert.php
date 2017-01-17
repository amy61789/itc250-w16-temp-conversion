<head> 
 <title>Convert Temperature</title> 
 </head> 
 <body> 
 <h2>Temperature Conversion</h2> 
 <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "GET"> 
 Degrees: 
 <input type = "text" name = "degree" size=3> 
 <select name="scale">
     <option value="celsius">Celsius</option>
     <option value="fahrenheit">Fahrenheit</option>
     <option value="kelvin">Kelvin</option>
     <option value="rankine">Rankine</option>
     </select> 
 <br/> 
 <input type = "submit" name = "Convert Temperature"/> 
 </form> 

<?php 
     
include 'temperatureclass.php';
         
 //check for input
 if (array_key_exists('degree',$_GET)){
	$scale = $_GET['scale'];
	$degree = $_GET['degree'];
	$firstLength = strlen($_GET['degree']);
	
     
	//check that input is not NULL or NaN
	if (($firstLength > 0) && (is_numeric($_GET['degree']))) {
        
        //switch statement to convert the input depending on scale and format it for output
        switch ($scale) {
            case "celsius":
                $degC = number_format($degree, 2);
                $degF = number_format((Temperature::c2f($degree)), 2);
                $degK = number_format((Temperature::c2k($degree)), 2);
                $degR = number_format((Temperature::c2r($degree)), 2);
                break;
            case "fahrenheit":
                $degC = number_format((Temperature::f2c($degree)), 2);
                $degF = number_format($degree, 2);
                $degK = number_format((Temperature::f2k($degree)), 2);
                $degR = number_format((Temperature::f2r($degree)), 2);
                break;
            case "kelvin":
                $degC = number_format((Temperature::k2c($degree)), 2);
                $degF = number_format((Temperature::k2f($degree)), 2);
                $degK = number_format($degree, 2);
                $degR = number_format((Temperature::k2r($degree)), 2);
                break;
            case "rankine":
                $degC = number_format((Temperature::r2c($degree)), 2);
                $degF = number_format((Temperature::r2f($degree)), 2);
                $degK = number_format((Temperature::r2k($degree)), 2);
                $degR = number_format($degree, 2);
                break;
            default;
                $degC = "Error";
                $degF = "Error";
                $degK = "Error";
                $degR = "Error";
                break;
        }
        
        //print a table of the conversions
        print "<table border><tr><th colspan=2> Conversion Results</th></tr>";
        print "<tr><td>$degC</td><td>Celsius</td></tr>";
        print "<tr><td>$degF</td><td>Fahrenheit</td></tr>";
        print "<tr><td>$degK</td><td>Kelvin</td></tr>";
        print "<tr><td>$degR</td><td>Rankine</td></tr>";
	  
	 } else {
		//print an error message if input is NULL or NaN
		echo "<span style = \"color:red\">*Please Enter a Valid Temperature.</span>";
    }
}
 ?> 
     
