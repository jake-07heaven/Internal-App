<?php $baseurl = base_url();?>    
<div class="container single_page">
    <div class="section-header">
        <h2><?php echo $username; ?>'s Task List!</h2>
    </div>
    <?php if($linked_tasks != null) : ?>
    <div class="table">
        <table>
            <tr class="table-titles"><td>Name</td><td>End Date</td><td>Company</td><td>Job</td></tr>
            <?php foreach($linked_tasks as $task) : ?>
            <?php 
            $l_comp = $task->linked_company; 
            $l_comp = explode(': ', $l_comp);
            $l_comp = array_slice($l_comp, 1);
            $l_job = $task->linked_job; 
            $l_job = explode(': ', $l_job);
            $l_job = array_slice($l_job, 1);
            ?>
            <tr class="task-row"id="<?php echo $task->id; ?>"><td><?php echo $task->name; ?></td><td><?php echo $task->end_date; ?></td><td><?php echo $l_comp[0]; ?></td><td><?php echo $l_job[0]; ?></td></tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php else : ?>
    You Have No Current Tasks!
    <?php endif; ?>
</div>