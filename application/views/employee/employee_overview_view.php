<!DOCTYPE html>
<?php $baseurl = base_url(); ?>
<html>
    <?php $this->load->view('head'); ?>
    <?php $this->load->view('header'); ?>
    <?php $this->load->view('navigation'); ?>
    <div class="one-col">
        <div class="table">
        <div class='add-button employee-add-button'><img src='<?php echo $baseurl; ?>/img/add_icon.svg'></div>
            <h2>Current Employees</h2>
            <table>
                <tr class="table-titles"><td>Name</td><td>Join Date</td><td>Salary</td><td>website</td><td>design</td><td>marketing</td><td>seo</td><td>social media</td><td>happiness</td></tr>
                <?php foreach ($current_employees as $key) {
                    echo "<tr><td class='view-button employee-view-button' id='" . $key->id . "'>" . $key->name . "</td><td>" . date('s/m/y',strtotime($key->join_date)) . "</td><td>" . $key->salary . "</td><td>" . $key->website . "</td><td>" . $key->design . "</td><td>" . $key->marketing . "</td><td>" . $key->seo . "</td><td>" . $key->social . "</td><td>" . $key->happiness . "</td><td><div class='employee-edit-button edit-button' id='" . $key->id . "'><img src='" . $baseurl . "/img/edit_icon.svg'></div></td></tr>";
                }?>
            </table>
        </div>
        <div class="table">
            <h2>Potential</h2>
            <table>
               <tr class="table-titles"><td>Name</td><td>Join Date</td><td>Salary</td><td>website</td><td>design</td><td>marketing</td><td>seo</td><td>social media</td><td>happiness</td></tr>
                <?php foreach ($future_employees as $key) {
                    echo "<tr><td class='view-button employee-view-button' id='" . $key->id . "'>" . $key->name . "</td><td>" . date('s/m/y',strtotime($key->join_date)) . "</td><td>" . $key->salary . "</td><td>" . $key->website . "</td><td>" . $key->design . "</td><td>" . $key->marketing . "</td><td>" . $key->seo . "</td><td>" . $key->social . "</td><td>" . $key->happiness . "</td><td><div class='employee-edit-button edit-button' id='" . $key->id . "'><img src='" . $baseurl . "/img/edit_icon.svg'></div></td></tr>";
                }?>
            </table>
        </div>
        <div class="table">
            <h2>Previous Staff</h2>
            <table>
                <tr class="table-titles"><td>Name</td><td>Join Date</td><td>Salary</td><td>website</td><td>design</td><td>marketing</td><td>seo</td><td>social media</td><td>happiness</td></tr>
                <?php foreach ($removed_employees as $key) {
                    echo "<tr><td class='view-button employee-view-button' id='" . $key->id . "'>" . $key->name . "</td><td>" . date('s/m/y',strtotime($key->join_date)) . "</td><td>" . $key->salary . "</td><td>" . $key->website . "</td><td>" . $key->design . "</td><td>" . $key->marketing . "</td><td>" . $key->seo . "</td><td>" . $key->social . "</td><td>" . $key->happiness . "</td><td><div class='employee-edit-button edit-button' id='" . $key->id . "'><img src='" . $baseurl . "/img/edit_icon.svg'></div></td></tr>";
                }?>
            </table>
        </div>
    </div>
    <?php $this->load->view('footer'); ?>