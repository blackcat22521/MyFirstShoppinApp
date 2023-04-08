<?php
	$title = 'Adding & editing user';
	$baseUrl = '../';
	require_once('../layouts/header.php');

	$id = $msg = $fullname = $email  = $role_id = '';
	require_once('form_save.php');

	$id = getGet('id');
	if($id != '' && $id > 0) {
		$sql = "select * from _User where id = '$id'";
		$userItem = executeResult($sql, true);
		if($userItem != null) {
			$fullname = $userItem['username'];
			$email = $userItem['email'];
			$role_id = $userItem['role_id'];
		} else {
			$id = 0;
		}
	} else {
		$id = 0;
	}

	$sql = "select * from _Role";
	$roleItems = executeResult($sql);
?>

<div class="row" style="margin-top: 20px;">
	<div class="col-md-12 table-responsive">
		<h3>Adding/editing user</h3>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h5 style="color: red;"><?=$msg?></h5>
			</div>
			<div class="panel-body">
				<form method="post" onsubmit="return validateForm();">
					<div class="form-group">
					  <label for="usr">Fullname:</label>
					  <input required="true" type="text" class="form-control" id="usr" name="fullname" value="<?=$fullname?>">
					  <input type="text" name="id" value="<?=$id?>" hidden="true">
					</div>
					<div class="form-group">
					  <label for="usr">Role:</label>
					  <select class="form-control" name="role_id" id="role_id" required="true">
					  	<option value="">-- Chọn --</option>
					  	<?php
					  		foreach($roleItems as $role) {
					  			if($role['id'] == $role_id) {
					  				echo '<option selected value="'.$role['id'].'">'.$role['role_name'].'</option>';
					  			} else {
					  				echo '<option value="'.$role['id'].'">'.$role['role_name'].'</option>';
					  			}
					  		}
					  	?>
					  </select>
					</div>
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input required="true" type="email" class="form-control" id="email" name="email" value="<?=$email?>">
					</div>
					<div class="form-group">
					  <label for="pwd">Password:</label>
					  <input <?=($id > 0?'':'required="true"')?> type="password" class="form-control" id="pwd" name="password" minlength="6">
					</div>
					<div class="form-group">
					  <label for="confirmation_pwd">Re-type password:</label>
					  <input <?=($id > 0?'':'required="true"')?> type="password" class="form-control" id="confirmation_pwd" minlength="6">
					</div>

                    <?php 
                        if($id != '' && $id > 0)
                        {
                                echo '<button class="btn btn-success">Edit User</button>';
                        }
                        else{
                            echo '<button class="btn btn-success">Add User</button>';
                        }
                    
                    ?>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function validateForm() {
		$pwd = $('#pwd').val();
		$confirmPwd = $('#confirmation_pwd').val();
		if($pwd != $confirmPwd) {
			alert("Password not match, please try again")
			return false
		}
		return true
	}
</script>

<?php
	require_once('../layouts/footer.php');
?>