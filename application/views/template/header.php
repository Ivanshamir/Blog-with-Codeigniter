<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
  <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
	<title>ciBLOG</title>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">ciBLOG</a>
    </div>
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="<?php echo base_url(); ?>about">About</a></li>
        <li><a href="<?php echo base_url(); ?>posts">Blog</a></li>
        <li><a href="<?php echo base_url(); ?>categories">Categories</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo base_url(); ?>users/register">Register</a></li>
      <li><a href="<?php echo base_url(); ?>categories/create">Create Category</a></li>
      <li><a href="<?php echo base_url(); ?>posts/create">Create Posts</a></li>

      </ul>
    </div>
   </div>
 </nav>


<div class="container">	
