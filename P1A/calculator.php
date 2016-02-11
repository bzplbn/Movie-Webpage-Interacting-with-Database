<!DOCTYPE html>
<html>
</body>

<?php
echo "<h2> Calculator </h2>";
echo "(Ver 1.3 10/07/2015 by Hanjing Fang)"."<br/>";
echo "Type an expression in the following box (e.g., 10*9.3+7.6)"."<br/>";
?>

<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
   Input Expression: <input type="text" name="input">
   <input type="submit"  value="Calculate">
</form>

<?php
echo "<h3> Note: </h3>";
echo "1.Only numbers and +,-,* and / operators are allowed in the expression."."<br/>";
echo "2.The evaluation follows the standard operator precedence."."<br/>";
echo "3.The calculator does not support parentheses."."<br/>";
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
     // collect value of input field
	$input = $_GET["input"];
	if (empty($_GET["input"])) {
         echo "<h3>Input field is empty now. Please input a valid expression.</h3>";
     }
	elseif (preg_match("/^[\-|0-9\+\-\*\/\. ]+$/", $input)){
        if (preg_match("/\+\+|\-\-\-|\*\*|\/\/|\.\.|\+\*|\*\+|\-\*|\+\/|\/\+｜\-\//", $input)){
            echo "<h3>Sorry! There is an error:</h3>";
            echo "Invalid Expression: You may include invalid operators!"."<br/>";
        }
            //echo "Invalid Expression : you may include some illegal characters!"."<br/>";
        if (preg_match("/[\+\-\*\/]$/", $input)){
            echo "<h3>Sorry! There is an error:</h3>";
            echo "Invalid Expression: your expression must start and "."<br/>";
        }
        elseif (preg_match("/\-\-/", $input)){
            $temp = preg_replace("/\-\-/","+", $input);
            eval("\$ans = $temp;");
            echo "<h2> Result </h2>";
            echo $input." = ". $ans;
        }
        elseif (preg_match("/\/0/", $input)){
            if (preg_match("/\/0\.[0-9]/", $input)) 
            {
            eval("\$ans = $input;");
            echo "<h2> Result </h2>";
            echo $input." = ". $ans;
            }
            else{
            echo "<h3>Sorry! There is an error:</h3>";
            echo "Division by zero error!"."<br/>";
            }
        }
    
        else{
            eval("\$ans = $input;");
            echo "<h2> Result </h2>";
            echo $input." = ". $ans;
        }   
     }
    else{
        echo "<h3>Sorry! There is an error:</h3>";
        echo "Invalid Expression : you may include some illegal characters!"."<br/>";
     }
    
}
?>

</body>
</html>