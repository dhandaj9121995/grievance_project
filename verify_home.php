<?php

$con=mysql_connect("localhost","root","");
mysql_select_db("grievance_project",$con);
?>



<html>
<head>
<title>User home</title>
<style>
#header {
    background-color:black;
    color:white;
    text-align:center;
    padding:10px;
}

#height{
	height:auto;
	
}

#section 
{
    background-color:#eeeeee;
    height: auto;
    margin-left: 0;
    margin-top: 0;
    padding: 10px;
    width: 1314;
}
#section2 
{
    background-color:#eeeeee;
    height:auto;
    margin-left: -1px;
    margin-top: 0;
    padding: 10px;
    width: 1314px;
}



#footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
	padding:30px;	 	 
}

#nav {
    line-height:30px;
    background-color:#D3D3D3;
    height:300px;
    width:100px;
    float:left;
    padding:5px;	      
}



#c {background-color: #808080;}
div a  {
    text-decoration: none;
    color: white;
    font-size: 20px;
    padding: 15px;
    display:inline-block;
}

ul {
  display: inline;
  margin: 0;
  padding: 0;
}
ul li {display: inline-block;}
ul li:hover {background:#808080;}
ul li:hover ul {display: block;}
ul li ul {
  position: absolute;
  width: 200px;
  display: none;
}
ul li ul li { 
  background: #808080; 
  display: block; 
}
ul li ul li a {display:block !important;} 
ul li ul li:hover {background: #808080;}



h1 {color:white ;}
h2 {color:blue;}
 

</style>
</head>
<body>
<div id="header">
<h1>Grievance Management System</h1>
</div>

<div id="c">
   
   <ul>
    <li>
	<a href="verify_home.php">Home</a>
	</li>
	<li>
      <a href="verification.php">Grievances To check</a>
      
	 </li>
	 
	 <li><a href="logout.php">Logout</a>
    </li>
	</ul>
</div>
<div id="nav">
</div>
</div>
<div id="footer">

</div>


</body>
</html>