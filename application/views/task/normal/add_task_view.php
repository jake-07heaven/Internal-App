<html>
    <?php $baseurl = base_url(); $data['baseurl'] = $baseurl; ?>
    <?php $this->load->view('head', $data); ?>
    <?php $this->load->view('header', $data); ?>
    <?php $this->load->view('navigation', $data); ?>
    <div class="container">
        <?php echo form_open('tasks/add'); ?>
        <div class="task-page col-sm-8 no-box">
            <div class="task-section center"><h2><input readonly="readonly" name="task" id="task" class="full input_name" value=""></h2></div>
            <div class="task-section center"><textarea readonly="readonly" name="desc" id="desc" class="full task-desc"></textarea></div>
            <div class="task-section center">
                <input name="job" id="job" value="" readonly="readonly" class="half task-job">
                <input name="company" id="company" readonly="readonly" value="" class="half task-comp">
            </div>
            <div class="task-section">
                <h4>Employees</h4>
                <ol class="employees-list">
                </ol>
                <input name="employees" id="company" readonly="readonly" value="" class="hidden input_ids">
            </div>
            <div class="task-section">
                <h4>Times</h4>
                <input name="start" id="start_time" value="" readonly="readonly" class="half task-start">
                <input name="end" id="end_time" readonly="readonly" value="" class="half task-end">
            </div>
        </div>
        <div class="task-sidebar col-sm-4">
            
            <ol>
                <li class="t1">
                    <h3>1. Give the task a name!</h3>
                    <div class="task-tab task_side_content" id="slide">
                        <input class="task_input input_name" type="text">
                        <div class="task_buttons">
                        <div class="task_button task_next t2">Next</div>
                        </div>
                    </div>
                </li>
                <li class="t2">
                    <h3>2. Add a Detailed Description!</h3>
                    <div class="task-tab unextended task_side_content" id="name">
                        <textarea class="task_input task-desc"></textarea>
                        <div class="task_buttons">
                        <div class="task_button task_back t1">Back</div>
                        <div class="task_button task_next t3">Next</div>
                        </div>
                    </div>
                </li>
                <li class="t3">
                    <h3>3. Assign the Company/Job!</h3>
                    <div class="task-tab unextended task_side_content" id="name">
                        <select class="task_select task-job">
                            <?php foreach($jobs as $job) : ?>
                            <?php foreach($jobs_companies as $job_comp){if($job_comp->id == $job->id){$company_name = $job_comp->linked_companies;}} ?>
                            <option value="<?php echo $job->id; ?>"><?php echo $company_name ." - " . $job->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="task_buttons">
                        <div class="task_button task_back t2">Back</div>
                        <div class="task_button task_next t4">Next</div>
                        </div>
                    </div>
                </li>
                <li class="t4">
                    <h3>4. Assign the Employees!</h3>
                    <div class="task-tab unextended task_side_content" id="name">
                        <ol id="sortable1" class="employees_list connectedSortable added_employees">
                        </ol>
                        <ol id="sortable2" class="employees_list connectedSortable not_added_employees">
                            <?php foreach($employees as $employee) : ?>
                            <li value="<?php echo $employee->id; ?>"><?php echo $employee->name; ?></li>
                            <?php endforeach; ?>
                        </ol>
                        <div class="task_buttons">
                        <div class="task_button task_back t3">Back</div>
                        <div class="task_button task_next t5">Next</div>
                        </div>
                    </div>
                </li>
                <li class="t5">
                    <h3>5. Give some dates!</h3>
                    <div class="task-tab unextended task_side_content" id="name">
                        <input class="task_date task-start" type="date">
                        <input class="task_date task-end" type="date">
                        <div class="task_buttons">
                        <div class="task_button task_back t4">Back</div>
                        <div class="task_button task_next finish">Finished</div>
                        <input id="submit" type="submit" class="hidden">
                        </div>
                    </div>
                </li>
            </ol>
        
        </div>
    </form>
    </div>
    <?php $this->load->view('footer');