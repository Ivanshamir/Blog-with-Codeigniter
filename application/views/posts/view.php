<h2><?php echo $post->title; ?></h2>
<small class="post_date">Posted on: <?php echo $post->created_at; ?> in <strong><?php echo $post->name; ?></strong></small><br>
<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post->post_image; ?>" >
<div class="post-body">
	<?php echo $post->body; ?>
</div>


<hr>
<a class="btn btn-info" href="<?php echo base_url(); ?>posts/edit/<?php echo $post->slug; ?>">Edit Post</a>
<a class="btn btn-info" href="<?php echo base_url(); ?>posts/delete/<?php echo $postid->id; ?>">Delete Post</a>


<h2>Add Comment</h2>
<?php echo validation_errors('<p class="alert alert-danger">'); ?>
<?php echo form_open('comments/create/'.$postid->id); ?>

<?php echo form_hidden('slug', $post->slug); ?>

<div class="form-group">
	<?php echo form_label('Name'); ?>
		<?php  
			$data = array(
				'class' => 'form-control',
				'name'  => 'name',
				'value' => set_value('name')
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
				'value' => set_value('email')
			);
		?>
	<?php echo form_input($data); ?>
</div>
<div class="form-group">
	<?php echo form_label('Body'); ?>
		<?php  
			$data = array(
				'class' => 'form-control',
				'name'  => 'body',
				'value' => set_value('body')
			);
		?>
	<?php echo form_textarea($data); ?>
</div>

<div class="form-group">
		<?php  
			$data = array(
				'class' => 'btn btn-primary',
				'name'  => 'submit',
				'value' => 'Add Comment'
			);
		?>
	<?php echo form_submit($data); ?>
</div>

<?php echo form_close(); ?>


<h2>Comments</h2><br>
<?php if(isset($allcomments)): ?>
	<?php foreach($allcomments as $comment): ?>
		<div class="well">
			<?php echo $comment->body; ?> by <?php echo $comment->name; ?> 
		</div>
	<?php endforeach; ?>
<?php else: ?>
	<h5>No Comments to display</h5>
<?php endif; ?>
