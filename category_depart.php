<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("workspace",$con);
	if(isset($_GET['id']))
	{
		?>
		<tr>
		<td>
		<select name="category" id="category">
			<div id="cat_sel">
				<option value=""> -Select category- </option>
				<?php
					$sql=mysql_query("select * from category_depart where id_depart='".$_GET['id']."'");
				
					while($row=mysql_fetch_assoc($sql))
					{
						?>
						<option  value="<?php echo $row['id']; ?>"><?php  echo $row['category_name']; ?></option>
						<?php 
					} 
				?>
			</div>
		</select>
		<?php
	} 
	?>
