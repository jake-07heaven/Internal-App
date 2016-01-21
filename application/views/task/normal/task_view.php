<div class="container">
    <div class="task-page col-sm-12 no-box">
        <?php foreach ($task as $details) : ?>
        <div class="task-section center"><h2><input readonly="readonly" name="task" id="task" class="full input_name" value="<?php echo $details->name; ?>"></h2></div>
        <div class="task-section center"><textarea readonly="readonly" name="desc" id="desc" class="full task-desc"><?php echo $details->description; ?></textarea></div>
        <div class="task-section center">
            <input name="job" id="job" readonly="readonly" class="half" value="<?php echo $details->linked_company;  ?>">
            <input name="company" id="company" readonly="readonly" class="half" value="<?php echo $details->linked_job;  ?>">
        </div>
        <div class="task-section">
            <h4>Employees</h4>
            <input name="employees" id="company" readonly="readonly" value="" class="hidden input_ids">
        </div>
        <div class="task-section">
            <h4>Times</h4>
            <input name="start" id="start_time" value="<?php echo $details->start_date; ?>" readonly="readonly" class="half task-start">
            <input name="end" id="end_time" readonly="readonly" value="<?php echo $details->end_date; ?>" class="half task-end">
        </div>
        <?php endforeach; ?>
    </div>
</div>