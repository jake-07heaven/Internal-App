<div class="container single_page">
    <div class="section-header">
        <h2><?php echo $username; ?>'s Task List!</h2>
    </div>
    <?php if($linked_tasks != null) : ?>
    <div class="table">
        <table>
            <tr class="table-titles"><td>Name</td><td>End Date</td><td>Company</td><td>Job</td></tr>
            <?php foreach($linked_tasks as $task) : ?>
            <?php $l_comp = $task->linked_company;?>
            <?php $l_job = $task->linked_job;?>
            <tr><td><?php echo $task->name; ?></td><td><?php echo $task->end_date; ?></td><td><?php foreach ($companies as $comp){if($comp->id == $l_comp){echo $comp->name;}} ?></td><td><?php foreach ($jobs as $job){if($job->id == $l_job){echo $job->name;}} ?></td></tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php else : ?>
    You Have No Current Tasks!
    <?php endif; ?>
</div>