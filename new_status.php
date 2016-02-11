<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("grievance_project",$con);
if(isset($_POST['submit']))
{
  $sql=mysql_query("select * from tb_status")	;
  $flag=0;
  while($row=mysql_fetch_assoc($sql))	
  {
	if(($row['add_status'])==($_POST['status'])) 
	{
		$flag=1;
		break;
	}
  }

if($flag==0)
  {
     mysql_query("insert into tb_status(add_status) VALUES ('".$_POST['status']."')");
   }
  else
  {
	 echo "<script type='text/javascript'>alert('already existing')</script>";
  }
}
 if(isset($_GET['sid']))
	{
		$sql=mysql_query("delete from tb_status where id='".$_GET['sid']."' ")	;
	}

?>

<h<html>
<head>
<title>Admin</title>

<style>

#header {
    background-color: black;
    color: white;
    padding: 10px;
    text-align: center;
}
#footer {
    background-color: black;
    clear: both;
    color: white;
    padding: 30px;
    text-align: center;
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
    
    height: auto;
    margin-left: -1px;
    margin-top: 0;
    padding: 10px;
    width: 1314px;
}

#nav {
	line-height:30px;
    background-color:#D3D3D3;
    height :550px;
	width:100px;
    float:left;
    padding:5px;	
}
#menu
{
	background-color: #808080;
	}
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



h1 {
    color: white;
}
h2 {
    color: blue;
}

</style>
</head>
<body>
<div id="header">
<h1>Grievance Management System</h1>
</div>

<div id="menu">
   <ul>
    <li><a href="admin_home.php">Home</a></li>
	   <li>
      <a href="#">Grievance option</a>
      <ul>
        <li><a href="new_department.php">Create Department</a></li>
		<li><a href="new_category.php">Create Category</a></li>
		
		<li><a href="new_status.php">Create Status</a></li>
		<li><a href="new_feedback.php">Create Feedback</a></li>
       </ul>
    </li>
 
      
    <li>
      <a href="#">User Options</a>
      <ul>
        <li><a href="add_user.php">Create User</a></li>
		<li><a href="#">User Search</a></li>
       </ul>
    </li>
	 <li><a href="admin_login.php">Logout</a></li>
	 
  </ul>
  
</div>
<div id="nav">
</div>

<div id="section" >
<h2>Add New Status:</h2>
<form method="post">
<table border="0"  cellspacing="10" cellpadding="5" color="blue">
          <tr>
          <td> Add new Status  :</td> 
		  <td> <input type="text" id="status" name="status"/></td>
		  </tr>
          
		 <tr>
		 <td colspan="2 "align="center"> <input type="submit" name="submit" value="Add_new_status"> </td>
		</tr>
</table>
</form>
</div>
<div id="section2">
<h2>Status:</h2>
<table border="1"  cellspacing="10" cellpadding="5">
          <tr>
		  <td> status id</td> 
		  <td> status name</td>
		  <td> </td>
		  </tr>
          <?php
           $sql=mysql_query("select * from tb_status") ;
           while($row=mysql_fetch_assoc($sql))		   
		   { ?>
	        <tr>
			<td> <?php echo $row['id'] ?> </td>
			<td> <?php echo $row['add_status'] ?> </td>
			
			<td> <a href="new_status.php?sid=<?php echo $row['id']; ?>" style="color:red"> DELETE  </a> </td>
			<td> <a href="status_edit.php?id=<?php echo $row['id']; ?>" style="color:red"> EDIT  </a> </td>
			 </tr>  
			<?php 
			} 
			?>
		 
</table>
</div>


<div id="footer">
</div>


</body>
</html>