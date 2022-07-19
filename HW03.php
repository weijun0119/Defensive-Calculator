<?php

$alarm = '';
$result = '';

if(isset($_GET['result'])){
    $array = str_split($_GET['result']);
    $indicator = true;
	$input_type = 0;

    foreach($array as $value){
		if(ord($value) == 37 || ord($value) == 99 || ord($value) == 105 || ord($value) == 110 || ord($value) == 111 || ord($value) == 112 || ord($value) == 115){
			if(preg_match("/cos/", $_GET['result'])){
				$indicator = true;
				break;
			}
			elseif(preg_match("/sin/", $_GET['result'])){
				$indicator = true;
				break;
			}
			else{
				$indicator = false;
				break;
			}
		}
		// elseif(ord($value) == 37){
		// 	$indicator = true;
		// 	break;
        // }
		elseif(ord($value)<42 || ord($value)>57){
			$indicator = false;
			break;
        }
        elseif(ord($value) == 44){
            $indicator = false;
            break;
		}

        if(ord($value)>47){
            $input_type = 1;
        }
        elseif($input_type == 0){
            $indicator = false;
            break;
        }
        else{
            $input_type = 0;
        }
    }

    if($indicator){
        eval('$result = '.$_GET['result'].';');
    }
    else{
		$alarm = "Please check your formula again!";
    }
}

?>

<html>
<head>
	<title>Go Calculator</title>
	<style>
	input[type="text"]{
		height: 80px;
		width: 390px;
		font-size: 45px;
		border: 5px;
	}
	input[type="button"]{
		height: 70px;
		width: 90px;
		font-size: 40px;
		border: 5px;
		border-radius: 15%;
	}
	#content{
		font-size:10pt;
		font-family:Courier;
		color:white;
	}
	</style>
</head>

<body bgcolor="#4b778d">

<center><br><br><br><br>
<form action="HW03.php" method="GET">
<table>
	<tr><td colspan="4"><input type="text" name="result" id="result" value="<?php echo $result?>"></td></tr>
	<tr></tr>
	<tr>
		<td><input type="button" id="function_clear" value="AC"></td>
		<td><input type="button" id="function_sine" value="sin"></td>
		<td><input type="button" id="function_cosine" value="cos"></td>
		<td><input type="button" id="function_plus" value="+"></td>
	</tr>
	<tr>
		<td><input type="button" id="number_7" value="7"></td>
		<td><input type="button" id="number_8" value="8"></td>
		<td><input type="button" id="number_9" value="9"></td>
		<td><input type="button" id="function_minus" value="-"></td>
	</tr>
	<tr>
		<td><input type="button" id="number_4" value="4"></td>
		<td><input type="button" id="number_5" value="5"></td>
		<td><input type="button" id="number_6" value="6"></td>
		<td><input type="button" id="function_multiply" value="x"></td>
	</tr>
	<tr>
		<td><input type="button" id="number_1" value="1"></td>
		<td><input type="button" id="number_2" value="2"></td>
		<td><input type="button" id="number_3" value="3"></td>
		<td><input type="button" id="function_divide" value="÷"></td>
	</tr>
	<tr>
		<td><input type="button" id="number_0" value="0"></td>
		<td><input type="button" id="decimal_point" value="."></td>
		<td><input type="button" id="function_mod" value="%"></td>
		<td><input type="button" id="function_equal" value="="></td>
	</tr>
</table>
</form>
</center>

<script>
	result = document.getElementById("result");
	document.getElementById("number_0").onclick = function(){result.value += "0";};
	document.getElementById("number_1").onclick = function(){result.value += "1";};
	document.getElementById("number_2").onclick = function(){result.value += "2";};
	document.getElementById("number_3").onclick = function(){result.value += "3";};
	document.getElementById("number_4").onclick = function(){result.value += "4";};
	document.getElementById("number_5").onclick = function(){result.value += "5";};
	document.getElementById("number_6").onclick = function(){result.value += "6";};
	document.getElementById("number_7").onclick = function(){result.value += "7";};
	document.getElementById("number_8").onclick = function(){result.value += "8";};
	document.getElementById("number_9").onclick = function(){result.value += "9";};
	document.getElementById("function_plus").onclick = function(){result.value += "+";};
	document.getElementById("function_minus").onclick = function(){result.value += "-";};
	document.getElementById("function_multiply").onclick = function(){result.value += "*";};
	document.getElementById("function_divide").onclick = function(){result.value += "/";};
    // document.getElementById("function_mod").onclick = function(){result.value += "%";};
	document.getElementById("decimal_point").onclick = function(){result.value += ".";};
	document.getElementById("function_clear").onclick = function(){result.value = "";};
	document.getElementById("function_sine").onclick = function(){result.value += "sin()";};
	document.getElementById("function_cosine").onclick = function(){result.value += "cos()";};
	document.getElementById("function_equal").onclick = function(){result.form.submit();alarm_check();};

	var str = '<?php echo $alarm ?>';
	
	function alarm_check(){
		if(str){
			alert(str);
		}
	}

</script>

</body>
</html>