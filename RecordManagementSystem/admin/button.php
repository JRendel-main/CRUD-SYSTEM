<!-- Delete -->
<div class="modal fade" id="del<?php echo $row['reciept']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$del=mysqli_query($conn,"select * from user where reciept='".$row['reciept']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center>Are you sure to delete <strong><?php echo ucwords($drow['firstname'].' '.$row['lastname']); ?></strong> from the list? This method cannot be undone.</center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="delete.php?reciept=<?php echo $row['reciept']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
 
            </div>
        </div>
    </div>
<!-- /.modal -->
 
<!-- Edit -->
    <div class="modal fade" id="edit<?php echo $row['reciept']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($conn,"select * from user where reciept='".$row['reciept']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				<form method="POST" action="edit.php?reciept=<?php echo $erow['reciept']; ?>">
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Date:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="date" class="form-control" value="<?php echo $erow['date']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Firstname:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="firstname" class="form-control" value="<?php echo $erow['firstname']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Lastname:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="lastname" class="form-control" value="<?php echo $erow['lastname']; ?>">
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Item:</label>
						</div>
						<div class="col-lg-10">
							<select class="form-control" class='form-control' name='item' value='<?php echo $erow['item']; ?>'>
							<option <?php if($erow['item']=="ID Lace") echo 'selected="selected"'; ?>>ID Lace</option>
							<option <?php if($erow['item']=="Departmental Shirt") echo 'selected="selected"'; ?>>Departmental Shirt</option>
    					</select>
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Claim Status:</label>
						</div>
						<div class="col-lg-10">
							<select class="form-control" class='form-control' name='claimstatus' value='<?php echo $erow['claimstatus']; ?>'>
							<option <?php if($erow['claimstatus']=="Claimed") echo 'selected="selected"'; ?>>Claimed</option>
							<option <?php if($erow['claimstatus']=="Not Claimed") echo 'selected="selected"'; ?>>Not Claimed</option>
							</select>
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Paid Status:</label>
						</div>
						<div class="col-lg-10">
						<select class="form-control" class='form-control' name='paidstatus' value='<?php echo $erow['paidstatus']; ?>'>
							<option <?php if($erow['paidstatus']=="Paid") echo 'selected="selected"'; ?>>Paid</option>
							<option <?php if($erow['paidstatus']=="Not Paid") echo 'selected="selected"'; ?>>Not Paid</option>
						</select>
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Year and Section:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="yearsection" class="form-control" value="<?php echo $erow['yearsection']; ?>">
						</div>
					</div>
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                </div>
				</form>
            </div>
        </div>
    </div>
<!-- /.modal -->