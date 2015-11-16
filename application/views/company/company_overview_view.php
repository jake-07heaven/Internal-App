<!DOCTYPE html>
<?php $baseurl = base_url(); ?>

<html>

    <div class="one-col">
        <?php if($level == 5) :?>
            <div class='add-button company-add-button'><img src='<?php echo $baseurl; ?>/img/add_icon.svg'></div>
	<?php endif; ?>
        <div class="table">
	    <h2>Potential Companies</h2>
	    <table class="sortable">
                <tr class="table-titles"><td>Name</td><td>ID</td><td>Join Date</td><td>Number</td><td>Contact</td><td>Spend</td><td>Hapinesss</td><td>last contact</td></tr>
                <?php foreach ($future_companies as $key) {
                if($level == 5) {
                     $button = "<div id='" . $key->id . "'class='company-edit-button edit-button'><img src='" . $baseurl . "/img/edit_icon.svg'></div>";
                }
                else
                {
                     $button = "";
                }
                echo "<tr><td class='view-button company-view-button' id='" . $key->id . "'>" . $key->name . "</td><td>" . $key->id . "</td><td>" . date('d/m/y',strtotime($key->date_joined)) . "</td><td>" . $key->number . "</td><td>" . $key->contact . "</td><td>" . $key->spend . "</td><td>" . $key->happiness . "</td><td>" . date('d/m/y',strtotime($key->last_contact)) . "</td><td>" . $button . "</td></tr>";
                 }?>
            </table>
        </div>
        <div class="table">
	    <h2>Current Companies</h2>
	    <table class="sortable">
                <tr class="table-titles"><td>Name</td><td>ID</td><td>Join Date</td><td>Number</td><td>Contact</td><td>Spend</td><td>Hapinesss</td><td>last contact</td></tr>
                <?php foreach ($current_companies as $key) {
                if($level == 5) {
                     $button = "<div id='" . $key->id . "'class='company-edit-button edit-button'><img src='" . $baseurl . "/img/edit_icon.svg'></div>";
                }
                else
                {
                     $button = "";
                }
                echo "<tr><td class='view-button company-view-button' id='" . $key->id . "'>" . $key->name . "</td><td>" . $key->id . "</td><td>" . date('d/m/y',strtotime($key->date_joined)) . "</td><td>" . $key->number . "</td><td>" . $key->contact . "</td><td>" . $key->spend . "</td><td>" . $key->happiness . "</td><td>" . date('d/m/y',strtotime($key->last_contact)) . "</td><td>" . $button . "</td></tr>";
                }?>
            </table>
        </div>
    </div>
    <?php $this->load->view('footer'); ?>