<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("grievance_project",$con);
if  (isset($_POST['register']))
{
 $query=mysql_query("insert into user_register(first_name,last_name,username,password,retype_password,mobile_number,email,address,property_tax_no,water_connection_no,zone,ward,assessment_no,landline_no) VALUES ('".$_POST['first_name']."','".$_POST['last_name']."','".$_POST['user_name']."','".$_POST['pass_word']."','".$_POST['re_password']."','".$_POST['mobile_no']."','".$_POST['e_mail']."','".$_POST['address']."','".$_POST['property_no']."','".$_POST['water_no']."','".$_POST['zone']."','".$_POST['ward_no']."','".$_POST['asses_no']."','".$_POST['landline_no']."')");
}

?>


<html>
<head>
<style>
#header {
    background-color:black;
    color:white;
    text-align:center;
    padding:10px;
}

#section {
    width:1245px;
    padding:10px;
	
background-color:#D3D3D3;	
}


#nav {
    line-height:30px;
    background-color:#eeeeee;
    height:515px;
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
<script type="text/javascript">
function validate()
{
		 
		 
	     var emid=document.getElementById('e_mail').value; 
		 var at = emid.indexOf("@");
         var dot = emid.lastIndexOf(".");
		 var p1=document.user_register.pass_word.value;
		 var p2=document.user_register.re_password.value;
		 var flag=true;
		 var phoneno1 = /^\d{10}$/;
 if(!isNaN(document.user_register.first_name.value) || document.user_register.first_name.value=='')
  { 
    document.getElementById("first_name").style.borderColor="#FF0000";
    document.getElementById("l_fn").innerHTML="";
	flag=false;
  }
  else
  {
    document.getElementById("first_name").style.borderColor="#00FF00";
	document.getElementById("l_fn").innerHTML="";
  }
  
   if(!isNaN(document.user_register.last_name.value) || document.user_register.last_name.value=='')
  { 
    document.getElementById("last_name").style.borderColor="#FF0000";
    document.getElementById("l_ln").innerHTML="";
	flag=false;
  }
  else
  {
    document.getElementById("last_name").style.borderColor="#00FF00";
	document.getElementById("l_ln").innerHTML="";
  }
  
   if(!isNaN(document.user_register.user_name.value) || document.user_register.user_name.value=='')
  { 
    document.getElementById("user_name").style.borderColor="#FF0000";
    document.getElementById("l_un").innerHTML="";
	flag=false;
  }
  else
  {
    document.getElementById("user_name").style.borderColor="#00FF00";
	document.getElementById("l_un").innerHTML="";
  }
   
  if(document.user_register.pass_word.value.length < 8 || document.user_register.pass_word.value=='')
  {
    document.getElementById("pass_word").style.borderColor="#FF0000";
    document.getElementById("l_pwd").innerHTML="";
	flag=false;
  }
  else
  {
    document.getElementById("pass_word").style.borderColor="#00FF00";
	 document.getElementById("l_pwd").innerHTML=" ";
  }
 if(document.user_register.pass_word.value=='' && document.user_register.re_password.value=='')
  {
    document.getElementById("re_password").style.borderColor="#FF0000";
    document.getElementById("l_rpwd").innerHTML="";
	flag=false;
  }
  else
  {
    document.getElementById("re_password").style.borderColor="#00FF00";
	 document.getElementById("l_rpwd").innerHTML=" ";
  }
   
   if(p1!=p2)
   {
	document.getElementById("re_password").style.borderColor="black";
	document.getElementById("pass_word").style.borderColor="black";
	   flag=false;
   }
   
   if(document.user_register.mobile_no.value.match(phoneno1))
   {
	document.getElementById("mobile_no").style.borderColor="#00FF00";
	   
   }
   
  else
  {
    document.getElementById("mobile_no").style.borderColor="#FF0000";
	document.getElementById("l_mn").innerHTML="";
  }

 
  
  if (at<1 || dot<at+2 || dot+2 >= emid.length) 
    {
        document.getElementById("e_mail").style.borderColor="#FF0000";
        document.getElementById("l_em").innerHTML="";
  	    flag=false;
 
    }

 else
  {
    document.getElementById("e_mail").style.borderColor="#00FF00";
	document.getElementById("l_em").innerHTML="";
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
<h1>Grievance Management System</h1>
</div>
<div id="nav">
</div>


<div id="section" align="center">


<form name="user_register" method="POST" action="user_register.php" onsubmit="return validate()">
	<table border="0"  cellspacing="8" cellpadding="5" color="blue">
	    <thead>
		<caption> <font size="20px"color="blue"> Registration </font></caption>
		</thead>
		<tr>
		<td colspan="2" align="left"><font size="5px" color="purple"> Mandatory Information:</font> </td>
		<td colspan="2" align="left"><font size="5px" color="purple"> Other Information :</font> </td>
		</tr>
			
		<tr>
		<td align="right"> <font color="red">*</font>First-name:</td>
		<td><label id="l_fn"></label> <input type="text" name="first_name" id="first_name" ></td>
		<td align="right"> Address</td>
		<td> <textarea name="address" rows="3" cols="30" > </textarea></td>
		</tr>

		<tr>
		<td align="right"> <font color="red">*</font>Last-name</td>
		<td><input type="text" name="last_name" id="last_name"><label id="l_ln"></label></td>
		<td align="right"> Property-Tax no</td>
		<td><input type="text" name="property_no" id="property_no"></td>
		
		</tr>
		 
		<tr>
		<td align="right"><font color="red">*</font> Username</td>
		<td><input type="text" name="user_name" id="user_name"><label id="l_un"></label></td>
		<td align="right"> Water Connection no</td>
		<td><input type="text" name="water_no" id="water_no"></td>
		
		</tr>
		
		<tr>
		<td align="right"> <font color="red">*</font>Password</td>
		<td><input type="password" name="pass_word" id="pass_word" ><label id="l_pwd"></label></td>
		<td align="right"> Zone</td>
		<td> 
		     <select name="zone" id="zone_id" onChange="menu(this.value);" required>
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
		</tr>
		<tr>
		<td align="right"><font color="red">*</font> Re-type Password</td>
		<td><input type="password" name="re_password" id="re_password"><label id="l_rpwd"></label></td>
		<td align="right"> Ward</td>
		<td> <div id="ward_sel"><select name="ward" id="ward_id" required>
										<option value=""> -Select ward- </option>
										<?php 
											$sql=mysql_query("select * from  ward where id ='".$_GET['id_zone']."' ");
											//echo "select * from sub_category where categoty_main='".$_GET['sub']."'";
											while($row=mysql_fetch_assoc($sql))
											{
												?>
												<option  value="<?php echo $row['id']; ?>"><?php  echo $row['ward']; ?></option>
												<?php 
											} 
										?>
										</select>
										</div> </td>
		</tr>
		<tr>
		<td align="right"> <font color="red">*</font>Mobile number</td>
		<td><input type="text" name="mobile_no" id="mobile_no"><label id="l_mn"></label></td>
		<td align="right"> Assessment no</td>
		<td><input type="text" name="asses_no" id="asses_no"></td>
		
		</tr>
		<tr>
		<td align="right"><font color="red">*</font> Email-id</td>
		<td><input type="text" name="e_mail" id="e_mail"><label id="l_em"></label></td>
		<td align="right"> Landline</td>
		<td><input type="text" name="landline_no" id="landline_no"></td>
		</tr>
            
	    <tr>
		 <td colspan="4 "align="center"> <input type="submit" name="register" value="Submit"> </td>
		</tr>	
				
	</table>
	
 

</form>

</div>
<div id="footer">
</div>

</body>
</html>
