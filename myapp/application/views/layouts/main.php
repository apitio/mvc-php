<?php 

$home = "";
$projects = "";
$register = "";

if($this->uri->segment(1) == 'projects') {
    $projects = "active";
} else if($this->uri->segment(2) == 'register') {
    $register = "active";
} else {
    $home = "active";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js-webshim/minified/polyfiller.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>">CI App</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
            <ul class="nav navbar-nav">
                <li class="<?php echo $home; ?>"><a href="<?php echo base_url();?>">Home<span class="sr-only">(current)</span></a></li>

                <!-- if logged in display extra 'Projects' navbar item -->    
                <?php if($this->session->userdata('logged_in')): ?>
                <li class="<?php echo $projects; ?>" ><a href="<?php echo base_url();?>projects">Projects<span class="sr-only">(current)</span></a></li>
                <?php endif; ?>

                <li class="<?php echo $register; ?>" ><a href="<?php echo base_url();?>users/register">Register<span class="sr-only">(current)</span></a></li>
            </ul>

            <!-- if logged in display extra 'Logout' navbar item -->
            <?php if($this->session->userdata('logged_in')): ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url();?>users/logout">Logout</a></li>
            </ul>    
            <?php endif; ?>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container">
	
    <div class="col-xs-3">
    <?php $this->load->view('users/login_view'); ?>
    </div>

    <div class="col-xs-9">	
    <?php $this->load->view($main_view); ?>
    </div>
	
</div>
	
</body>
</html>