<h2><?php echo $title; ?></h2>

<?php echo validation_errors('<p class="alert alert-danger">'); ?>

<?php echo form_open('users/register'); ?>
<div class="form-group">
	<?php echo form_label('Name'); ?>
		<?php  
			$data = array(
				'class' => 'form-control',
				'name'  => 'name',
				'placeholder' => 'Enter Name',
				'value' => set_value('name')
			);
		?>
	<?php echo form_input($data); ?>
</div>
<div class="form-group">
	<?php echo form_label('Username'); ?>
		<?php  
			$data = array(
				'class' => 'form-control',
				'name'  => 'username',
				'placeholder' => 'Enter Username',
				'value' => set_value('username')
			);
		?>
	<?php echo form_input($data); ?>
</div>
<div class="form-group">
	<?php echo form_label('Zipcode'); ?>
		<?php  
			$data = array(
				'class' => 'form-control',
				'name'  => 'zipcode',
				'placeholder' => 'Enter Zipcode',
				'value' => set_value('zipcode')
			);
		?>
	<?php echo form_input($data); ?>
</div>
<div class="form-group">
	<?php echo form_label('Email'); ?>
		<?php  
			$data = array(
				'class' => 'form-control',
				'name'  => 'email',
				'placeholder' => 'Enter Email',
				'value' => set_value('email')
			);
		?>
	<?php echo form_input($data); ?>
</div>
<div class="form-group">
	<?php echo form_label('Password'); ?>
		<?php  
			$data = array(
				'class' => 'form-control',
				'name'  => 'password',
				'placeholder' => 'Enter Password',
				'value' => set_value('password')
			);
		?>
	<?php echo form_password($data); ?>
</div>
<div class="form-group">
	<?php echo form_label('Confirm Password'); ?>
		<?php  
			$data = array(
				'class' => 'form-control',
				'name'  => 'password2',
				'placeholder' => 'Confirm Your Password',
				'value' => set_value('password2')
			);
		?>
	<?php echo form_password($data); ?>
</div>



<div class="form-group">
		<?php  
			$data = array(
				'class' => 'btn btn-primary',
				'name'  => 'submit',
				'value' => 'Register'
			);
		?>
	<?php echo form_submit($data); ?>
</div>

<?php echo form_close(); ?>