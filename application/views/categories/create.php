<h2><?php echo $title; ?></h2>

<?php echo validation_errors('<p class="alert alert-danger">'); ?>

<?php echo form_open('categories/create'); ?>
<div class="form-group">
	<?php echo form_label('Category Name'); ?>
		<?php  
			$data = array(
				'class' => 'form-control',
				'name'  => 'name',
				'id'   =>  'name',
				'placeholder' => 'Enter Category Name',
				'value' => set_value('name')
			);
		?>
	<?php echo form_input($data); ?>
</div>

<div class="form-group">
		<?php  
			$data = array(
				'class' => 'btn btn-primary',
				'name'  => 'submit',
				'id'   =>  'submit',
				'value' => 'Create Category'
			);
		?>
	<?php echo form_submit($data); ?>
</div>

<?php echo form_close(); ?>