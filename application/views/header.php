<div id="st-container" class="st-container">
    <!-- content push wrapper -->
    <div class="st-pusher">
                    <?php $baseurl = base_url();?>       
<div class="st-menu st-effect-7" id="menu-7">
            <div class="content">
                <h2 style="text-transform: capitalize; color:white;"class="icon icon-lab"><a href="<?php echo $baseurl; ?>tasks"><?php echo $username; ?>'s Tasks</a></h2><a class="add-task" href="<?php echo $baseurl; ?>tasks/new/"><img src="<?php echo $baseurl; ?>/img/add_icon.svg"></a>
                <ul class="task-side">
                <?php if($linked_tasks != null) : ?>
                <?php foreach($linked_tasks as $task) : ?>
                    <a href="<?php echo $baseurl; ?>tasks/view/<?php echo $task->id; ?>"><li><h6><?php echo $task->name; ?></h6></li></a>
                <?php endforeach; ?>
                <?php else : ?>
                <li>You Have No Current Tasks!</li>
                <?php endif; ?>
                </ul>
            </div>
</div>
        <div id="st-content" class="st-content"><!-- this is the wrapper for the content -->
            <div class="st-content-inner"><!-- extra div for emulating position:fixed of the menu -->
<header id="header">
		<div class="container">                            
			<a href="<?php echo base_url(); ?>dashboard"><img class="logo" src="http://cdn2.hubspot.net/hub/385095/file-1148947077-png/img/logo.png" alt="07 Heaven Digital Marketing"></a>
			<div class="right">
                                <a class="header-button" href="<?php echo base_url(); ?>dashboard/logout">Logout</a>
                                <a class="header-button" href="<?php echo base_url(); ?>admin"><img src="<?php echo base_url(); ?>img/admin-512.png"></a>
			</div>
		</div>
	</header>