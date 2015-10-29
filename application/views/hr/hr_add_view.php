<?php $baseurl = base_url(); ?>
<html>
    <?php $this->load->view('head'); ?>
    <?php $this->load->view('header'); ?>
    <?php $this->load->view('navigation'); ?>
    <div class="employee-main-table">
        <?php echo form_open('hrs/add_hr'); ?>
            <table>
                <tr><td><select class="text-input" name="status"><option value="0">Discipline</option><option value="1">Grievance</option></select></td></tr>
                <tr><td>date: <input class="text-input" type="date" name="date" id="date" ></td></tr>
                <tr><td>level: <input class="text-input" type="text" name="level" id="level" ></td></tr>
                <tr><td>issue: <input class="text-input" type="text" name="issue" id="issue" ></td></tr>
                <tr><td>meeting:<input class="text-input" type="text" name="meeting" id="meeting" ></td></tr>
                <tr><td>letter: <input class="text-input" type="text" name="letter" id="letter"></td></tr>
                <tr><td>followed_up: <input class="text-input" type="text" name="followed_up" id="followed_up"></td></tr>
                <tr><td>linked employee: <select name="name" class="text-input">
                <?php 
                        foreach ($employees as $key) {
                                echo "<option value='" . $key->name . "'>".$key->name."</option>";
                        }
                 ?>
                </select></td></tr>
                <tr><td><input class="text-input" type="submit" value="Add HR"></td></tr>
            </table>
        </form>
    </div>
    <?php $this->load->view('footer'); ?>