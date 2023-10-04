<?  
/*
 *-----------------------------COOKIE ENCRYPT AND DECRYPT
 *
 *Author| Edgar Zakaryan
 *Email| zakaryan.edgar@gmail.com
 */
include("crypt.php");

$cookie_key=1234567;//Code is used during encryption [not mor the 7 numbers and not 0]
$cookie_value="My Cookie";//determines the value of a variable (string);
$cookie_name="icookie";//Specifies the name (string) assigned to the Cookie;
$cookie_expire=array(
	"day"=>1,//live one day
	"month"=>0,
	"year"=>0
);//while "Life" variable (integer). If this parameter is not specified, the Cookie will be "live" until the end of the session, ie until you close your browser. If the time specified, when it will occur, Cookie self-destruct.
$cookie_path="";//way to the Cookie (string);
$cookie_domain="";//domain (string). The value is set the host name from which Cookie has been set;
$cookie_secure=0;//Cookie transmission over a secure HTTPS-connection. [ 0 or 1 ]

$a=new cookie;
$a->params($cookie_key,$cookie_name,$cookie_value,$cookie_expire,$cookie_path,$cookie_domain,$cookie_secure);

if($a->cookie_encrypt()){
	if($_COOKIE[$cookie_name]){
		echo "<h1>".$cookie_name." -> this cookie already exists and has been updated"."</h1><br /><br />";
	}
	
	echo $cookie_name." -> is created"."<br /><br />";	
	echo $_COOKIE[$cookie_name],"<br />";
	echo $a->cookie_decrypt($_COOKIE[$cookie_name],$cookie_key);
}else{
	echo "<h1 style='color:#F00'>Cookie not created!</h1>";	
}
?>