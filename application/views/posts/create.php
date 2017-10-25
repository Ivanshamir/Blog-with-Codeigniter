<h2><?php echo $title; ?></h2>

<?php echo validation_errors('<p class="alert alert-danger">'); ?>

<?php echo form_open_multipart('posts/create'); ?>
<div class="form-group">
	<?php echo form_label('Posts Title'); ?>
		<?php  
			$data = array(
				'class' => 'form-control',
				'name'  => 'title',
				'id'   =>  'title',
				'placeholder' => 'Enter Posts Title',
				'value' => set_value('title')
			);
		?>
	<?php echo form_input($data); ?>
</div>
<div class="form-group">
	<?php echo form_label('Posts Data'); ?>
		<?php  
			$data = array(
				'class' => 'form-control',
				'name'  => 'body',
				'id'   =>  'editor1',
				'placeholder' => 'Enter Post Details'
			);
		?>
	<?php echo form_textarea($data); ?>
</div>

<div class="form-group">
	<label>Categories</label>
	<select class="form-control" name="category_id">
		<option value="">Select any categories</option>
		<?php foreach($categories as $cat): ?>
		<option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
		<?php endforeach; ?>
	</select>
</div>

<div class="form-group">
	<label>Upload Image</label>
	<input type="file" name="userfile" size="20">
</div>

<div class="form-group">
		<?php  
			$data = array(
				'class' => 'btn btn-primary',
				'name'  => 'submit',
				'id'   =>  'submit',
				'value' => 'Create Posts'
			);
		?>
	<?php echo form_submit($data); ?>
</div>

<?php echo form_close(); ?>