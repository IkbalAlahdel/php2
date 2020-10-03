<?php 
//$_GLOBAL 
$x = 300; 
$y = 200; 
  
function multiplication(){ 
    $GLOBALS['z'] = $GLOBALS['x'] * $GLOBALS['y']; 
} 
  
multiplication(); 
echo $z; 

//$_SERVER

echo $_SERVER['PHP_SELF']; 
echo "<br>"; 
echo $_SERVER['SERVER_NAME']; 
echo "<br>"; 
echo $_SERVER['HTTP_HOST']; 
echo "<br>"; 
echo $_SERVER['HTTP_USER_AGENT']; 
echo "<br>"; 
echo $_SERVER['SCRIPT_NAME']; 
echo "<br>"


//
?>
<!DOCTYPE html> 
<html> 
<body> 
  
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
 NAME: <input type="text" name="fname"> 
 <button type="submit">SUBMIT</button> 
</form> 
<?php
//$_REQUEST
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $name = htmlspecialchars($_REQUEST['fname']); 
    if(empty($name)){ 
        echo "Name is empty"; 
    } else { 
        echo $name; 
    } 
} 
?> 
</body> 
</html>

<!DOCTYPE html> 
<html> 
<body> 
   
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
 <label for="name">Please enter your name: </label> 
 <input name="name" type="text"><br> 
 <label for="age">Please enter your age: </label> 
 <input name="age" type="text"><br> 
 <input type="submit" value="Submit"> 
 <button type="submit">SUBMIT</button> 
</form> 
<?php
//$_POST
$nm=$_POST['name']; 
$age=$_POST['age']; 
echo "<strong>".$nm." is $age years old.</strong>"; 
?> 
</body> 
</html> 


<!DOCTYPE html> 
<html> 
<head> 
<title></title> 
</head> 
<body bgcolor="cyan">     
    <?php
    //$_GET
        $name = $_GET['name']; 
        $city = $_GET['city']; 
        echo "<h1>This is ".$name." of ".$city."</h1><br>"; 
    ?> 
    <img src = "2.jpg" alt = "nanilake" height = "400" width="500" /> 
</body> 
</html> 

<?php
//$_COOKIES
echo 'Hello ' . htmlspecialchars($_COOKIE["name"]) . '!';
?>

<?php
//$_SESSION
session_start();
/*session is started if you don't write this line can't use $_Session  global variable*/
$_SESSION["newsession"]=$value;
?>

<?php
//$_ENV
echo 'My username is ' .$_ENV["USER"] . '!';
?>


<?php
//$_FILES
function incoming_files() {
    $files = $_FILES;
    $files2 = [];
    foreach ($files as $input => $infoArr) {
        $filesByInput = [];
        foreach ($infoArr as $key => $valueArr) {
            if (is_array($valueArr)) { // file input "multiple"
                foreach($valueArr as $i=>$value) {
                    $filesByInput[$i][$key] = $value;
                }
            }
            else { // -> string, normal file input
                $filesByInput[] = $infoArr;
                break;
            }
        }
        $files2 = array_merge($files2,$filesByInput);
    }
    $files3 = [];
    foreach($files2 as $file) { // let's filter empty & errors
        if (!$file['error']) $files3[] = $file;
    }
    return $files3;
}

$tmpFiles = incoming_files();

?>