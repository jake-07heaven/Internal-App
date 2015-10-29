<!DOCTYPE html>
<?php $baseurl = base_url(); ?>
<html>
    <?php $this->load->view('head'); ?>
    <?php $this->load->view('header'); ?>
    <?php $this->load->view('navigation'); ?>
    <div class="one-col">
        <?php if($level == 5) :?>
          <div class='add-button hr-add-button'><img src='<?php echo $baseurl; ?>/img/add_icon.svg'></div>
	<?php endif; ?>
        <div class="table">
            <h2>Discipline</h2>
            <table>
                <tr class="table-titles"><td>Name</td><td>date</td><td>level</td><td>issue</td><td>meeting</td><td>letter</td><td>followed up</td></tr>
                   <?php foreach ($hr_dis as $key) {
                        echo "<tr><td>" . $key->name . "</td><td>" . date('s/m/Y',strtotime($key->date)) . "</td><td>" . $key->level . "</td><td>" . $key->issue . "</td><td>" . $key->meeting . "</td><td>" . $key->letter . "</td><td>" . $key->followed_up . "</td><td><div id='" . $key->id . "'class='hr-edit-button edit-button'><img src='" . $baseurl . "/img/edit_icon.svg'></div></td></tr>";
                   }?>
            </table>
        </div>
        <div class="table">
            <h2>Grievance</h2>
            <table>
                <tr class="table-titles"><td>Name</td><td>date</td><td>level</td><td>issue</td><td>meeting</td><td>letter</td><td>followed up</td></tr>
                    <?php foreach ($hr_gri as $key) {
                        echo "<tr><td>" . $key->name . "</td><td>" . date('s/m/Y',strtotime($key->date)) . "</td><td>" . $key->level . "</td><td>" . $key->issue . "</td><td>" . $key->meeting . "</td><td>" . $key->letter . "</td><td>" . $key->followed_up . "</td><td><div id='" . $key->id . "'class='hr-edit-button edit-button'><img src='" . $baseurl . "/img/edit_icon.svg'></div></td></tr>";
                   }?>
            </table>
        </div>
    </div>
    <?php $this->load->view('footer');