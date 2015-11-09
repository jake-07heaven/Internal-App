<html>
    <?php $baseurl = base_url(); $data['baseurl'] = $baseurl; ?>
    <?php $this->load->view('head', $data); ?>
    <?php $this->load->view('header', $data); ?>
    <?php $this->load->view('navigation', $data); ?>
    <div class="container">
        <div class="task-page col-sm-8">
            <h2><input class="task-name no-box" type="text"></h2>
            <p><textarea class="task-desc"></textarea></p>
            <ul id="sortable1" class="connectedSortable" style="padding: 5px; border: 1px black solid;">
            </ul>
        </div>
        <div class="task-side-bar col-sm-4">
            <ul id="sortable2">
              <li>Employee1</li>
              <li>Employee1</li>
              <li>Employee1</li>
              <li>Employee1</li>
              <li>Employee1</li>
            </ul>
        </div>
    </div>
    <?php $this->load->view('footer');