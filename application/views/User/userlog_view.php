<?php include_once('Lib/layout/header.php');?>
	<div>
		<table class = "table" border=1px >
			<thead align = "center" bgcolor = "grey">
				<tr>
					<th>User ID</th>
					<th>Username</th>
					<th>Email</th>
					<th>Last Date & Time Login</th>
					<th>Last Date & Time Logout</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach($log as $row):?>
					<tr>
						<td><?php echo $row->userid ?></td>
						<td><?php echo $row->username ?></td>
						<td><?php echo $row->email ?></td>
						<td><?php echo $row->datetimelogin ?></td>
						<td><?php echo $row->datetimelogout ?></td>
					</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>
<?php include_once('Lib/layout/footer.php');?>