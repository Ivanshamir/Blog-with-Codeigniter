<h2><?php echo $title; ?></h2>

<?php echo validation_errors('<p class="alert alert-danger">'); ?>

<?php echo form_open_multipart('posts/edit/'.$post->slug); ?>

<?php echo form_hidden('id', $post->id); ?>

<div class="form-group">
	<?php echo form_label('Posts Title'); ?>
		<?php  
			$data = array(
				'class' => 'form-control',
				'name'  => 'title',
				'id'   =>  'title',
				'value' => $post->title
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
				'value' => $post->body
			);
		?>
	<?php echo form_textarea($data); ?>
</div>


<div class="form-group">
	<label>Categories</label>
	<select class="form-control" name="category_id">
		<option value="">Select any categories</option>
		<?php foreach($categories as $cat): ?>
			<?php if($cat->id == $post->category_id): ?>
		<option value="<?php echo $cat->id; ?>" selected><?php echo $cat->name; ?></option>
			<?php else: ?>
		<option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
			<?php endif; ?>
		<?php endforeach; ?>
	</select>
</div>

<div class="form-group">
	<label>Upload Image</label>
	<img style="height: 150px;width: 200px;" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post->post_image; ?>" >
	<input type="file" name="userfile" size="20">
</div>


<div class="form-group">
		<?php  
			$data = array(
				'class' => 'btn btn-primary',
				'name'  => 'submit',
				'id'   =>  'submit',
				'value' => 'Update Posts'
			);
		?>
	<?php echo form_submit($data); ?>
</div>

<?php echo form_close(); ?>