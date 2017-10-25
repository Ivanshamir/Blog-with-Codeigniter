<style>
.post_thumb{
	width: 100%
}

<!-- pagination -->
.pagination-links{
	margin: 30px 0;
}
.pagination-links strong{
	paddding: 8px 13px;
	margin: 5px;
	background: #f4f4f4;
	border: 1px solid #ccc;
}
a.pagination-links{
	paddding: 8px 13px;
	margin: 5px;
	background: #f4f4f4;
	border: 1px solid #ccc;
}
</style>

<h2><?php echo $title; ?></h2>

<?php  if ($this->session->flashdata('success')) { ?>
		<div class="alert alert-success">
		
<?php echo $this->session->flashdata('success'); ?>

		</div>

<?php	} ?>


<?php foreach($allposts as $post): ?>
<h3><?php echo $post->title; ?></h3>

<div class="row">
	<div class="col-md-3">
		<img class="post_thumb" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post->post_image; ?>">
	</div>
	<div class="col-md-9">
		<small class="post_date">Posted on: <?php echo $post->created_at; ?> in <strong><?php echo $post->name; ?></strong></small><br>
		<?php echo word_limiter($post->body, 50) ?><br><br>
		<p><a class="btn btn-default " href="<?php echo site_url('posts/'.$post->slug); ?>">Read More</a></p>
	</div>
	
</div>


<?php endforeach; ?>
<div class="pagination-links">
	<?php echo $this->pagination->create_links(); ?>
</div>
