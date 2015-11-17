<?php $baseurl = base_url(); ?>
<html>

    <div class="employee-main-table">
        <?php echo form_open('hrs/add_hr'); ?>
        <div class="container">
                <div class="container">
                    <div class="col-xs-12"><div class="section-header-input">Type: <select class="text-input" name="status"><option value="0">Discipline</option><option value="1">Grievance</option></select><br>issue: <input class="text-input" type="text" name="issue" id="issue"></div></div>
            </div>
            <div class="table-input">
                <table>
                    <tr><td>date: <input class="text-input" type="date" name="date" id="date"></td><td>level: <input class="text-input" type="text" name="level" id="level"></td><td>meeting:<input class="text-input" type="text" name="meeting" id="meeting"></td><td>letter: <input class="text-input" type="text" name="letter" id="letter"></td><td>followed_up: <input class="text-input" type="text" name="followed_up" id="followed_up"></td></tr>
                </table>
            </div> 
            <div class="table-input">
                <table>
                    <tr><td>linked employee: <select name="name" class="text-input">
	 			<?php 
	 				foreach ($employees as $key) {
	 						echo "<option value='" . $key->name . "'>".$key->name."</option>";
	 				}
	 			 ?>
                        </select></td></tr>
                </table>
            </div>
            <div class="table-input">
                <table>
                    <tr><td><input class="text-input" type="submit" value="Add HR"></td></tr>
                </table>
            </div>
        </div>
        </form>
    </div>