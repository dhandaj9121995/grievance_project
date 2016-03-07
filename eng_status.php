<?php

$con=mysql_connect("localhost","root","");
mysql_select_db("grievance_project",$con);
?>
<html>
<head>
<title>Invistigator verification</title>
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
    height:400px;
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
	<a href="eng_home.php.php">Home</a>
	</li>
	<li>
      <a href="eng_status.php">Grievances To check</a>
      
	 </li>
	 
	 <li><a href="eng_login.php">Logout</a>
    </li>
	</ul>
</div>
<div id="nav">
</div>
<div id="section">
<form method="POST">
<table border="1" cellspacing="10px" cellpadding="5px">
<tr><td align="center">S.No</td><td align="center">Department</td>
    <td align="center">Category</td><td align="center">Subject</td><td align="center">Complaint Id</td>
    <td align="center">Complaint</td><td align="center">Complaint type</td><td align="center">Support count</td><td align="center">Complaints staus</td>
</tr>
<?php
$i=0;
 $sql=mysql_query("select * from register_grievance ,eng_register where register_grievance.department=eng_register.department ORDER BY support_count DESC") ;
           while($row=mysql_fetch_assoc($sql))		   
		   { $i++;?>
	              
				  <input type="hidden" value="<?php echo $row['id'] ?>" name="id<?php echo "$i"; ?>"  />
	        <tr><td align="center"><?php echo $i?></td>
			
			<td align="center"> <?php echo $row['department'] ?> </td>
			<td align="center"> <?php echo $row['category'] ?> </td>
			<td align="center"> <?php echo $row['subject'] ?> </td>
			<td align="center"> <?php echo $row['id'] ?> </td>
		    <td align="center"> <?php echo $row['complaint'] ?> </td>
			<td align="center"> <?php echo $row['complaint_type'] ?> </td>
			<td align="center"> <?php echo $row['support_count'] ?> </td>
			<td align="center"> <input type="radio" name="num<?php echo "$i"; ?>" value="1" >Inprogress</input>
			<input type="radio" name="num<?php echo "$i"; ?>" value="0">Closed</input></td>
<?php					
		   }
		   
		   $loop=$i;
		   
		   ?>
			</tr>
	<tr><td align="center" colspan="12"><input type="submit" value="sumit" name="submit" />
		  </td><tr>
			</table></form>
			

			
</div>
<div id="footer">

</div>


</body>
</html>
<?php
if(isset($_POST['submit']))
{
	for($i=0;$i<=$loop;$i++)
	{
		if(isset($_POST['num'. 	$i]) && ($_POST['id'.$i]))
		{
			$name =$_POST['num'.$i];
			$id =$_POST['id'.$i];
			echo"$name";
			echo"$id";
			$sql=mysql_query("update register_grievance SET eng_status=$name WHERE  id=$id ");
		
		}
		
	}
}
?>