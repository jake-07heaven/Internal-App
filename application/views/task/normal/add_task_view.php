<html>
    <?php $baseurl = base_url(); $data['baseurl'] = $baseurl; ?>
    <?php $this->load->view('head', $data); ?>
    <?php $this->load->view('header', $data); ?>
    <?php $this->load->view('navigation', $data); ?>
    <div class="container">
        <div class="task-page col-sm-8">

        </div>
        <div class="task-sidebar col-sm-4">
            <ol>
                <li class="t1">
                    <h3>1. Give the task a name!</h3>
                    <div class="task-tab task_side_content" id="slide">
                        <input class="task-name no-box" type="text">
                        <div class="task_buttons">
                        <div class="task_button task_next t2">Next</div>
                        </div>
                    </div>
                </li>
                <li class="t2">
                    <h3>2. Add a Detailed Description!</h3>
                    <div class="task-tab unextended task_side_content" id="name">
                        <textarea class="task-desc no-box"></textarea>
                        <div class="task_buttons">
                        <div class="task_button task_back t1">Back</div>
                        <div class="task_button task_next t3">Next</div>
                        </div>
                    </div>
                </li>
                <li class="t3">
                    <h3>3. Assign the Company/Job!</h3>
                    <div class="task-tab unextended task_side_content" id="name">
                        <select>
                            <?php foreach($companies as $company) : ?>
                            
                            <?php endforeach; ?>
                        </select>
                        <select>
                            <?php foreach($jobs as $job) : ?>
                            
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
                          <li>Employee1</li>
                          <li>Employee1</li>
                          <li>Employee1</li>
                          <li>Employee1</li>
                          <li>Employee1</li>
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
                        <input class="task-name no-box" type="text">
                        <div class="task_buttons">
                        <div class="task_button task_back t4">Back</div>
                        <div class="task_button task_next finish">Finished</div>
                        </div>
                    </div>
                </li>
            </ol>
        </div>
    </div>
    <?php $this->load->view('footer');