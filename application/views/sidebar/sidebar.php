<?php $baseurl = base_url();?>       
<div class="st-menu st-effect-7" id="menu-7">
            <div class="content">
                <h2 style="text-transform: capitalize; color:white;"class="icon icon-lab"><a href="<?php echo $baseurl; ?>tasks"><?php echo $username; ?>'s Tasks</a></h2>
                <ul class="task-side">
                <?php if($linked_tasks != null) : ?>
                <?php foreach($linked_tasks as $task) : ?>
                <li><h6><?php echo $task->name; ?></h6><h6><?php echo $task->end_date; ?></h6></li>
                <?php endforeach; ?>
                <?php else : ?>
                <li>You Have No Current Tasks!</li>
                <?php endif; ?>
            </ul>
            </div>
</div>