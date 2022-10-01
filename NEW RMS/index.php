<!DOCTYPE html>
<html>
<head>
	<title>RECORD MANAGEMENT SYSTEM</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#myInput').on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#myTable tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
	</script>
</head>
<script>
</script>
<body style="background-image: url(img/background.jpg); background: auto;">
<div class="container">
	<div style="height:50px;"></div>
	<div class="well" style="margin:auto; padding:auto; width:90%;">
	<span style="font-size:25px; color:#66b3ff"><center><strong>TRANSACTION MANAGEMENT SYSTEM</strong><br><small>For CICT Transactions only!</small></small></center></span>	
		<span class="pull-left"><a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></span>
		<div style="height:50px;"></div>
		<form action="index.php" method="POST">
			<input type="text" name="search" placeholder="Search" class="form-control" id='myInput'>
		</form>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<th>#</th>
				<th>Date</th>
				<th>Firstname</th>
                <th>Lastname</th>
                <th>Item</th>
                <th>Claim Status</th>
                <th>Paid Status</th>
                <th>Year and Section</th>
				<th>Action</th>
			</thead>
			<tbody id="myTable">
			<?php
				include('conn.php');

				if(isset($_GET['page_no']) && $_GET['page_no']!=""){
					$page_no = $_GET['page_no'];
				}else{
					$page_no = 1;
				}

				$total_records_per_page = 10;
				$offset = ($page_no-1) * $total_records_per_page;
				$previous_page = $page_no - 1;
				$next_page = $page_no + 1;
				$adjacents = '2';

				$result_count=mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `user`");
				$total_records = mysqli_fetch_array($result_count);
				$total_records = $total_records['total_records'];
				$total_no_of_pages = ceil($total_records / $total_records_per_page);
				$second_last = $total_no_of_pages - 1; // total page minus 1

				$query=mysqli_query($conn,"select * from `user` ORDER by date LIMIT $offset, $total_records_per_page");
				while($row=mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo ucwords($row['reciept']); ?></td>
                        <td><?php echo ucwords($row['date']); ?></td>
						<td><?php echo ucwords($row['lastname']); ?></td>
						<td><?php echo ucwords($row['firstname']); ?></td>
                        <td><?php echo ucwords($row['item']); ?></td>
                        <td><?php echo ucwords($row['claimstatus']); ?></td>
                        <td><?php echo ucwords($row['paidstatus']); ?></td>
                        <td><?php echo ucwords($row['yearsection']); ?></td>
						<td>
							<a href="#edit<?php echo $row['reciept']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>
							<a href="#del<?php echo $row['reciept']; ?>" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
							<?php include('button.php'); ?>
						</td>
					</tr>
					<?php
				}
 
			?>
			</tbody>
		</table>
		<ul class='pagination pull-right'>
			<li class='pull-left btn btn-defult disabled'>Showing page <?php echo $page_no. " of ". $total_no_of_pages;?></li>
			<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
			<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
			</li>
			<?php
			if ($total_no_of_pages <= 10){  	 
				for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
					if ($counter == $page_no) {
						echo "<li class='active'><a>$counter</a></li>";	
					}else{
						echo "<li><a href='?page_no=$counter'>$counter</a></li>";
					}
				}
			}elseif($total_no_of_pages > 10) {
				if($page_no <= 4) {			
					for ($counter = 1; $counter < 8; $counter++){		 
						if ($counter == $page_no) {
							echo "<li class='active'><a>$counter</a></li>";	
						}else{
							echo "<li><a href='?page_no=$counter'>$counter</a></li>";
						}
					}
					echo "<li><a>...</a></li>";
					echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
					echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
			}elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
				echo "<li><a href='?page_no=1'>1</a></li>";
				echo "<li><a href='?page_no=2'>2</a></li>";
				echo "<li><a>...</a></li>";
				for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
					if ($counter == $page_no) {
						echo "<li class='active'><a>$counter</a></li>";	
					}else{
						echo "<li><a href='?page_no=$counter'>$counter</a></li>";
					}                  
			   }
			   echo "<li><a>...</a></li>";
			   echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
			   echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
			
		}else{
			echo"<li><a href='?page_no=1'>1</a></li>";
			echo"<li><a href='?page_no=2'>2</a></li>";
			echo"<li><a>...</a></li>";
			for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
				if ($counter == $page_no) {
					echo "<li class='active'><a>$counter</a></li>";	
				}else{
					echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                   
			}
		}
			}
	
			?>
			<li>
				<?php if($page_no >= $total_no_of_pages){
					echo "<li class='disabled'><a>Next</a></li>";
				} else {
					echo "<li><a href='?page_no=$next_page'>Next</a></li>";
				} ?>
			</li>
			<?php if($page_no < $total_no_of_pages){
				echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
			} ?>
		</ul>
	</div>
	<?php include('add_modal.php'); ?>
</div>
</body>
</html>