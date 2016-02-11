<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("workspace",$con);
	if(isset($_GET['id']))
	{
		?>
		<tr>
		<td>
		<select name="ward" id="ward">
			<div id="ward_sel">
				<option value=""> -Select ward- </option>
				<?php
					$sql=mysql_query("select * from ward where id_zone='".$_GET['id']."'");
				
					while($row=mysql_fetch_assoc($sql))
					{
						?>
						<option  value="<?php echo $row['id']; ?>"><?php  echo $row['ward']; ?></option>
						<?php 
					} 
				?>
			</div>
		</select>
		<?php
	} 
	?>
