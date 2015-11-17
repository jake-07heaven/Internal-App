<!DOCTYPE html>
<?php foreach ($hr as $key) {
	$name = $key->name;
	$date = $key->date;
	$level = $key->level;
	$issue = $key->issue;
	$meeting = $key->meeting;
	$letter = $key->letter;
	$followed_up = $key->followed_up;
	$status = $key->status;
	$id = $key->id;
}
?>

<?php $baseurl = base_url(); ?>
<html>

	 	<div class="employee-main-table">
	 	<?php echo form_open('hrs/update_hr'); ?>
                    
                    
        <div class="container">
                <div class="container">
                    <div class="col-xs-12"><div class="section-header-input">Type: <select class="text-input" name="status"><option <?php if($status == 0){echo "selected:'selected'";} ?> value="0">Discipline</option><option <?php if($status == 1){echo "selected:'selected'";} ?> value="1">Grievance</option></select><br>issue: <input class="text-input" type="text" name="issue" id="issue" value="<?php echo $issue; ?>"></div></div>
            </div>
            <div class="table-input">
                <table>
                    <tr><td>date: <input class="text-input" type="date" name="date" id="date" value="<?php echo $date; ?>"></td><td>level: <input class="text-input" type="text" name="level" id="level" value="<?php echo $level; ?>"></td><td>meeting:<input class="text-input" type="text" name="meeting" id="meeting" value="<?php echo $meeting; ?>"></td><td>letter: <input class="text-input" type="text" name="letter" id="letter" value="<?php echo $letter; ?>"></td><td>followed_up: <input class="text-input" type="text" name="followed_up" id="followed_up" value="<?php echo $followed_up; ?>"></td></tr>
                </table>
            </div> 
            <div class="table-input">
                <table>
                    <tr><td>linked employee: <select name="name" class="text-input">
	 			<?php 
	 				foreach ($employees as $key) {
	 					if ($name == $key->name)
	 					{
	 						echo "<option selected='selected' value='" . $key->name . "'>".$key->name."</option>";
	 					}
	 					else
	 					{
	 						echo "<option value='" . $key->name . "'>".$key->name."</option>";
	 					}
	 				
	 				}
	 			 ?>
                        </select></td></tr>
                </table>
            </div>
            <div class="table-input">
                <table>
                    <tr class="hidden"><td><input class="text-input" type="id" name="id" id="date" value="<?php echo $id; ?>"></td></tr>
                    <tr><td><input class="text-input" type="submit" value="Update HR"></td></tr>
                    <tr><td><div id="<?php echo $id; ?>" class="delete-button hr-delete-button">DELETE</div></td></tr>
                </table>
            </div>
        </div>
    </form>



