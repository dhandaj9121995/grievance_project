<html>
<head><title>Admin home</title>
<style>
#header {
    background-color:black;
    color:white;
    text-align:center;
    padding:10px;
}

#section 
         {
    
               background-color:#eeeeee;
               padding:10px
         }




#footer {
    background-color:black;
    clear:both;
	padding:20px;	 	 
}

#nav {
    line-height:30px;
    background-color:#D3D3D3;
    height:350px;
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
    <li><a href="admin_home.php">Home</a></li>
	   <li>
      <a href="#">Grievance option</a>
      <ul>
        <li><a href="new_department.php">Create Department</a></li>
		<li><a href="new_category.php">Create Categories</a></li>
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
<?php
$query=mysql_connect("localhost","root","");
mysql_select_db("grievance_project",$query);
if(isset($_GET['id']))
{
$id=$_GET['id'];
if(isset($_POST['submit']))
{
$name=$_POST['name'];

$query3=mysql_query("update tb_status set add_status='$name' where id='$id'");
if($query3)
{
$query1=mysql_query("select add_status from tb_status");
}
}
$query1=mysql_query("select * from tb_status where id='$id'");
$query2=mysql_fetch_array($query1);
?>
<div id="section">
<form method="post" action="">
status-Name:<input type="text" name="name" value="<?php echo $query2['add_status']; ?>" /><br />
 
<br />
<input type="submit" name="submit" value="update" />
</form>
<?php
}
?>
<h2>Status:</h2>
<table border="1"  cellspacing="10" cellpadding="5">
          <tr>
		  <td> status id</td> 
		  <td> status name</td>
		  
		  </tr>
          <?php
           $sql=mysql_query("select * from tb_status") ;
           while($row=mysql_fetch_assoc($sql))		   
		   { ?>
	        <tr>
			<td> <?php echo $row['id'] ?> </td>
			<td> <?php echo $row['add_status'] ?> </td>
<?php 
		} 
?>		 
</div>
</body>
</html>