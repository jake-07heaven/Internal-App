<!DOCTYPE html>
<?php $baseurl = base_url(); ?>
<html>

    <div class="one-col">
        <?php if($level == 5) :?>
        <div class='add-button issue-add-button'><img src='<?php echo $baseurl; ?>/img/add_icon.svg'></div>
	<?php endif; ?>
        <div class="table">
            <h2>Open</h2>
            <table class="sortable">
                <tr class="table-titles"><td>Company</td><td>Service</td><td>Issue</td><td>Date</td><td>Priority</td><td>resolved</td><td>cause</td><td>client feeling</td></tr>
                <?php foreach ($current_issues as $key) {
                    if($level == 5) {
                        $button = "<div id='" . $key->id . "'class='issue-edit-button edit-button'><img src='" . $baseurl . "/img/edit_icon.svg'></div>";
                   }
                   else
                   {
                        $button = "";
                   }
                    echo "<tr><td class='view-button issue-view-button' id='" . $key->id . "'>" . $key->company . "</td><td>" . $key->service . "</td><td>" . $key->issue . "</td><td>" . date('d/m/y',strtotime($key->date)) . "</td><td>" . $key->priority . "</td><td>" . $key->resolved . "</td><td>" . $key->cause . "</td><td>" . $key->client_feeling . "</td><td>" . $button . "</td></tr>";
                }?>
            </table>
        </div>
        <div class="table">
            <h2>Resolved</h2>
            <table class="sortable">
                <tr class="table-titles"><td>Company</td><td>Service</td><td>Issue</td><td>Date</td><td>Priority</td><td>resolved</td><td>cause</td><td>client feeling</td></tr>
                <?php foreach ($completed_issues as $key) {
                   if($level == 5) {
                        $button = "<div id='" . $key->id . "'class='issue-edit-button edit-button'><img src='" . $baseurl . "/img/edit_icon.svg'></div>";
                   }
                   else
                   {
                        $button = "";
                   }
                    echo "<tr><td class='view-button issue-view-button' id='" . $key->id . "'>" . $key->company . "</td><td>" . $key->service . "</td><td>" . $key->issue . "</td><td>" . date('d/m/y',strtotime($key->date)) . "</td><td>" . $key->priority . "</td><td>" . $key->resolved . "</td><td>" . $key->cause . "</td><td>" . $key->client_feeling . "</td><td>".$button."</td></tr>";
                }?>
            </table>
        </div>
    </div>
    