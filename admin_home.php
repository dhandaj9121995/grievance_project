<html>
<head>
<title>Admin home</title>
<style>
#header {
    background-color:black;
    color:white;
    text-align:center;
    padding:10px;
}

#section {
    
 background-color:#eeeeee;
   	
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
</div>
<div id="footer">

</div>


</body>
</html>