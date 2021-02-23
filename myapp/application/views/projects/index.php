

<p class="bg-success">
	

<?php if($this->session->flashdata('project_created')): ?>

<?php echo $this->session->flashdata('project_created'); ?>

<?php endif; ?>

<?php if($this->session->flashdata('project_updated')): ?>

<?php echo $this->session->flashdata('project_updated'); ?>

<?php endif; ?>



<?php if($this->session->flashdata('project_deleted')): ?>

<?php echo $this->session->flashdata('project_deleted'); ?>

<?php endif; ?>


<?php if($this->session->flashdata('task_updated')): ?>

<?php echo $this->session->flashdata('task_updated'); ?>

<?php endif; ?>


<?php if($this->session->flashdata('task_created')): ?>

<?php echo $this->session->flashdata('task_created'); ?>

<?php endif; ?>



<?php if($this->session->flashdata('task_deleted')): ?>

<?php echo $this->session->flashdata('task_deleted'); ?>

<?php endif; ?>


<?php if($this->session->flashdata('task_failed')): ?>

<?php echo $this->session->flashdata('task_failed'); ?>

<?php endif; ?>


<?php if($this->session->flashdata('task_edited')): ?>

<?php echo $this->session->flashdata('task_edited'); ?>

<?php endif; ?>









</p>






		

<div class="col-xs-9">


	<div class="panel-heading"><h3>Projects</h3></div>

	<div class="panel-body">

	<ul class="list-group">
	
		<?php foreach($projects as $project): ?>

		<li class='list-group-item'>

		<div class=''>


		<?php echo "<a  href='". base_url() ."projects/display/". $project->id ."'>" . $project->project_name . "</a>"; ?>

		</div>

		<!-- <div class="">

			<a class="btn btn-danger " href="<?php echo base_url();?>projects/delete/<?php echo $project->id; ?>"><span class="glyphicon glyphicon-remove"></span></a>
			

		</div> -->

		</li>




	   <?php endforeach; ?>

	
	
	</ul>

<a class="btn btn-primary pull-right" href="<?php echo base_url();?>projects/create">Create Project</a>

</div>

</div> <!-- ENd of panel-->






