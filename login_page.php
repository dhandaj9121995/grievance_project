<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("grievance_project",$con);
session_start();
if(isset($_POST['submit']))
 {
   $sql=mysql_query("select * from user_register where username='".$_POST['username']."' and password = '".$_POST['password']."'");
      if(mysql_num_rows($sql) > 0)
     {
	 $_SESSION['username'] = $_POST['username'];
	 echo"Username and password are matched";
	 header('Location:user_home.php');
	 }
else 
   {
      echo "Invalid username or password";
   }	
 } 
 

?> 

<html>
<head><title>Login</title>
<style>
#header {
    background-color:black;
    color:white;
    text-align:center;
    padding:10px;
}

#section {
    width:1117px;
    float:left;
    padding:10px;
	height:280px;
background-color:#D3D3D3;	
}

#nav {
    line-height:30px;
    background-color:#eeeeee;
    height:290px;
    width:100px;
    float:left;
    padding:5px;	      
}





#footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
	padding:30px;	 	 
}


h1 {color:white ;}
h2 {color:blue;}
 

</style>
</head>
<body>

<div id="header">
<h1>Grievance Management System</h1>
</div>

<div id="nav">
</div>

<div id="section" >


<form name="login_page" onsubmit="return validate()" method="post" >
    <fieldset style="width:500px">
	 <legend> Login </legend>
	<table border="0" width="100%" >
	    <tr>
		<td align="left"> <h3> Username: </h3></td>
		<td> <label id="l_username"> </label><input type="text" name="username" id="username" required>   </td>
		</tr>

		<tr>
		<td align="left"> <h3>Password:</h3></td>
		<td><label id="l_password"> </label><input type="password" name="password" id="password" required />  </td>
		
		</tr>
		<tr>
		<td> </td>
		<td align="left"><input type="submit" name="submit" value="Submit"> </a></td>
		
		
	</table>
	</fieldset>
	<br />
</form>
<p align="left"><a href="user_register.php" target="_blank"> Register your account </a> <br />
<a href="#"> Forgot your password? <a></p>
</div>




<div id="footer">
</div>

</body>
</html>
