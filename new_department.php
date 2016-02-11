<?php 
$con=mysql_connect("localhost","root","");
mysql_select_db("grievance_project",$con);
if(isset($_POST['add_dept']))
{
  $sql=mysql_query("select * from tb_department")	;
  $flag=0;
  while($row=mysql_fetch_assoc($sql))	
  {
	if(($row['tc_dept_name'])==($_POST['dept_name'])) 
	{
		$flag=1;
		break;
	}
  }
  if($flag==0)
  {
  
  mysql_query("insert into tb_department (tc_dept_name) VALUES ('".$_POST['dept_name']."')");
   
   }
  else
  {
	  
	echo "<script type='text/javascript'>alert('already existing')</script>";
  }
	  
}
?>
<?php
if(isset($_GET['did']))
{
 $sql=mysql_query("delete from tb_department where id='".$_GET['did']."' ")	;
}
?>



<html>
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
    height:auto;
    margin-left: -1px;
    margin-top: 0;
    padding: 10px;
    width: 1314px;
}

#menu{
	background-color:#808080;
    
}

#nav {
	
line-height:30px;
    background-color:#D3D3D3;
    height : 550px;
	width:100px;
    float:left;
    padding:5px;		
	
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
<div id="section">
<h2>Add New Department:</h2>
<form name="new_department" method="post">
<table border="0"  cellspacing="10" cellpadding="5" >
          <tr>
          <td> Add new department :</td> 
		  <td> <input type="text" id="dept_name" name="dept_name" required /></td>
		  </tr>
          
		 <tr>
		 <td colspan="2 "align="center"> <input type="submit" name="add_dept" id="add_dept" value="Add"> </td>
		</tr>
</table>
</form>
</div>

<div id="section2">
<h2>Add New Department:</h2>
<table border="1"  cellspacing="10" cellpadding="5">
          <tr>
          <td align="center"> Department id</td> 
		  <td align="center"> Department name</td>
		  
		  <td align="center">Delete </td>
		  <td align="center">Edit</td>
		  </tr>
          <?php
           $sql=mysql_query("select * from tb_department") ;
           while($row=mysql_fetch_assoc($sql))		   
		   { ?>
	        <tr>
			<td> <?php echo $row['id'] ?> </td>
			<td> <?php echo $row['tc_dept_name'] ?> </td>
			<td>  <a href="new_department.php?did=<?php echo $row['id']; ?>" style="color: red"> DELETE  </a> </td>
			<td>  <a href="department_edit.php?id=<?php echo $row['id']; ?>" style="color: red"> EDIT  </a> </td>
				
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
