<html>
<head>
    <title>CS143 Project 1B </title>
    <style>
        table{border-collapse:collapse}
        table th,table td{border:1px solid #000; padding:0}
    </style>
</head>
<body>

<p>Please do not run a complex query here. You may kill the server. </p>
Type an SQL query in the following box: <p>
Example: <tt>SELECT * FROM Actor WHERE id=10;</tt><br />
<p>
<form method="get" action="<?php echo $_SERVER["PHP_SELF"];?>">
<textarea name="query" cols="60" rows="8"></textarea><br />
<input name="submit" type="submit" value="Submit" />
</form>
</p>
<p><small>Note: tables and fields are case sensitive. All tables in Project 1B are availale.</small>
</p>

<?php
//create connection
 $db_connection = mysql_connect("localhost", "cs143", "");
//check connection
 if(!$db_connection) {
    $errmsg = mysql_error($db_connection);
    print "Connection failed: $errmsg <br/>";
    exit(1);
 } 
//Choose db

 $query=$_GET["query"];
 echo "$query"."<br/>";
 
 //if(mysql_errno($db_connection)!=0){
if (!is_NULL($query)){
 mysql_select_db("CS143", $db_connection);
 mysql_query($query, $db_connection);
 echo "<h3>Result from MySQL: </h3>". mysql_error($db_connection). "<br/>";
}
 $rs = mysql_query($query, $db_connection);


 /*if (!is_null($query) &&  !mysql_errno($db_connection) && !$rs) {
    echo '<b>Sorry! Could not run this query. </b>' ;
    exit(1);
}*/

echo "<table>";
echo "<tr>";
//$row =mysql_fetch_row($rs)
while($col= mysql_fetch_field($rs)){
    echo "<th>" ."$col->name"."</th>";
}
echo "</tr>";
while($row = mysql_fetch_row($rs)) {
    echo "<tr>";
    $count_row = count($row);
    for($i = 0; $i < $count_row; $i++){
        if(is_null($row[$i])){
            echo "<td>"."NULL"."</td>";
        }else{
            echo "<td>"."$row[$i]"."</td>";
        }
    }
    echo "</tr>";
}

echo "</table>";

 mysql_close($db_connection);
 ?>
 </body>
 </html>




