<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("workspace",$con);
if  (isset($_POST['register']))
{
$val=mysql_query("insert into register_grievance(department,category,subject,complaint,zone,ward,address,attachment) VALUES ('".$_POST['department']."','".$_POST['category']."','".$_POST['subject']."','".$_POST['complaint']."','".$_POST['zone']."','".$_POST['ward']."','".$_POST['address']."','".$_POST['attach']."') ");
}


?>

<html>
<head>
<title> Register_Grievance </title>
<style>
#header
{
  text-align:center;
  color:white;
  padding:20px;
 background-color:black;
}

#section{
	
background-color:#D3D3D3;
	
}

#nav {
    line-height:30px;
    background-color:#eeeeee;
    height:476px;
    width:100px;
    float:left;
    padding:5px;	      
}


#footer
{
  background-color:black;
  padding:20px;
  clear:both;
}

</style>
<script>

function validate()
{
	var flag=true;
	if(document.register_grievance.subject.value=='')
  { 
    document.getElementById("subject").style.borderColor="#FF0000";  
	flag=false;
  }
  else
  {
    document.getElementById("subject").style.borderColor="#00FF00";
  }
 	if(document.register_grievance.complaint.value==' ')
  { 
    document.getElementById("complaint").style.borderColor="#FF0000";  
	flag=false;
  }
  else
  {
    document.getElementById("complaint").style.borderColor="#00FF00";
  } 
		if(document.register_grievance.address.value==' ')
  { 
    document.getElementById("address").style.borderColor="#FF0000";  
	flag=false;
  }
  else
  {
    document.getElementById("address").style.borderColor="#00FF00";
  } 
	
	return flag;
}

			function getXMLHTTP()
			{
				var xmlhttp=false;
				try
				{
					xmlhttp= new XMLHttpRequest();
				}
				catch(e)
				{
					try
					{
						xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
					}
					catch(e)
					{
						try
						{
							xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
						}
						catch(e1)
						{
							xmlhttp=false;
						}
					}
				}
				return xmlhttp;	
			}

			function menu(val1)
			{
				var strURL="category_depart.php?id="+val1; 
				var req = getXMLHTTP();
				if (req) 
				{
					req.onreadystatechange = function() 
					{
						if (req.readyState == 4) 
						{
							// only if "OK" 
							if (req.status == 200) 
							{	
								document.getElementById('cat_sel').innerHTML=req.responseText;					
							} else 
							{
								alert("There was a problem while using XMLHTTP:\n" + req.statusText);
							}
						}				
					}			
					req.open("GET", strURL, true);
					req.send(null);
				}	
			}

			
						function check(val1)
			{
				var strURL="ajax1.php?id="+val1; 
				var req = getXMLHTTP();
				if (req) 
				{
					req.onreadystatechange = function() 
					{
						if (req.readyState == 4) 
						{
							// only if "OK" 
							if (req.status == 200) 
							{	
								document.getElementById('ward_sel').innerHTML=req.responseText;					
							} else
							{
								alert("There was a problem while using XMLHTTP:\n" + req.statusText);
							}
						}				
					}			
					req.open("GET", strURL, true);
					req.send(null);
				}	
			}

</script>
</head>
<body>
<div id="header">
<h2>Grievance Management System</h2>
</div>
<div id="nav">
</div>
<div id="section" >
<form name="register_grievance" onsubmit="return validate()" method="POST">
	<table border="0"  cellspacing="10" cellpadding="5" color="blue">
	    <thead>
		<caption> <font size="20px"color="blue"> Grievance Information </font></caption>
		</thead>
		
		
		<tr>
		<td> Department</td>
		<td>  <select name="department" onChange="menu(this.value);"> 
		      <option value=""> Select department</option>
			  <?php 
			  $sql=mysql_query("select * from department");
			  while($row=mysql_fetch_assoc($sql))
			  {
			  ?><option value="<?php echo $row['id']; ?>"><?php echo $row['department'];?></option>
												<?php 
											} 
										?>
			  
			 </select>
			 </td>
		<td align="right"> Subject</td>
		<td><input type="text" name="subject" id="subject"size="40"></td>
		</tr>

		<tr>
		<td> Category</td>
		<td> <div id="cat_sel"><select name="c" id="c"> 
		      <option value=""> -Select category-</option>
			  <?php
			  $sql=mysql_query("select * from category_depart where id='".$_GET['id_depart']."'");
			  while($row=mysql_fetch_assoc($sql))
											{
												?>
												<option  value="<?php echo $row['id']; ?>"><?php  echo $row['category_name']; ?></option>
												<?php 
											} 
										?>
			 </select></div></td>
		<td align="right"> Complaint</td>
		<td> <textarea name="complaint" id="complaint" rows="7`" cols="30" > </textarea></td>
		
		</tr>
		 
		<tr>
		
			<td> Zone</td>
		  <td> 
		      <select name="zone" id="zone" onChange="check(this.value);">
										<option value=""> -Select zone- </option>
										<?php
											$sql=mysql_query("select * from zone");
											while($row=mysql_fetch_assoc($sql))
											{
												?>
												<option value="<?php echo $row['id']; ?>"><?php echo $row['zone'];?></option>
												<?php 
											} 
										?>
										</select>
			
			
			  </td>
			  <td> Ward</td>
		<td>
<div id="ward_sel"><select name="w" id="w">
										<option value=""> -Select ward- </option>
										<?php 
											$sql=mysql_query("select * from  ward where id='".$_GET['id_zone']."' ");
											//echo "select * from sub_category where categoty_main='".$_GET['sub']."'";
											while($row=mysql_fetch_assoc($sql))
											{
												?>
												<option  value="<?php echo $row['id']; ?>"><?php  echo $row['ward']; ?></option>
												<?php 
											} 
										?>
										</select>
										</div> 		
		    
			 </td>
		
		</tr>
		
		<tr>
		<td align="right"> Address</td>
		<td> <textarea name="address" id="address" rows="5" cols="30" > </textarea></td>
		<td> Attachment</td>
		<td><input type="file" name="attach" size="10"></td>
		</tr>
		
            
	    <tr>
		 <td colspan="4 "align="center"> <input type="submit" name="register" value="Submit" /> </td>
		</tr>	
				
	</table>
	
 

</form>


</div>

<div id="footer">
</div>
</body>
</html>
