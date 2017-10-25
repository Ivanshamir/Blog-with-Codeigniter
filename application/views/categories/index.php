<h2><?php echo $title; ?></h2>

<?php  if ($this->session->flashdata('success')) { ?>
		<div class="alert alert-success">
		
<?php echo $this->session->flashdata('success'); ?>

		</div>

<?php	} ?>
<div class="col-md-9">
	<ul class="list-group">
		<?php foreach($allcategories as $cat): ?>

		<li class="list-group-item">
			<a href="<?php echo base_url(); ?>categories/<?php echo $cat->id; ?>"><?php echo $cat->name; ?></a>
		</li>

		<?php endforeach; ?>
	</ul>
</div>