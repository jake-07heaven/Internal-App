<!DOCTYPE html>
<?php foreach ($company_level as $key) {
	$name = $key->name;
	$join_date = $key->date_joined;
	$status = $key->status;
	$number = $key->number;
	$spend = $key->spend;
	$happiness = $key->happiness;
	$last_contact = $key->last_contact;
	$contact = $key->contact;
	$id = $key->id;
}

foreach ($company_info as $key) {
	$address = $key->address;
	$email = $key->email;
	$cost = $key->email;
	$profit = $key->email;
	$potential = $key->email;
	$hours = $key->email;
	$refferals = $key->email;
	$success = $key->email;
	$amount = $key->email;
}
?>

<?php $baseurl = base_url(); ?>
<html>
    <?php $this->load->view('head'); ?>
    <?php $this->load->view('header'); ?>
    <?php $this->load->view('navigation'); ?>
    <div class="one-col">
    <?php echo form_open('companies/update_company'); ?>
                    
                    
        <div class="container">
                <div class="container">
                    <div class="col-xs-12"><div class="section-header-input">Name: <input class="text-input" type="text" name="name" id="name"></div></div>
            </div>
            <div class="table-input">
                <table>
                    <tr><td>Company Join Date: <input class="text-input" type="date" name="join_date" id="join_date" value="<?php echo $join_date; ?>"></td><td>Company Hours: <input class="text-input" type="number" name="hours" id="hours" value="<?php echo $hours; ?>"></td><td>Company Refferals: <input class="text-input" type="number" name="refferals" id="refferals" value="<?php echo $refferals; ?>" ></td></tr>
                    <tr><td>Company Success: <input class="text-input" type="number" name="success" id="success" value="<?php echo $success; ?>" ></td><td>Company Amount: <input class="text-input" type="number" name="amount" id="amount" value="<?php echo $amount; ?>" ></td><td>Contact Last Spoken: <input class="text-input" type="date" name="last_contact" id="last_contact" value="<?php echo $last_contact; ?>" ></td></tr>

                </table>
            </div> 
            <div class="table-input">
                <table>
                    <tr><td rowspan="2">AVATAR</td><td>happiness</td><td>Contact Details</td></tr>
                    <tr><td>Company Hapiness: <input class="text-input" type="text" name="happiness" id="happiness" value="<?php echo $happiness; ?>"></td><td>Contact Name: <input class="text-input" type="text" name="contact" id="contact" value="<?php echo $contact; ?>"><br>Email of Contact: <input class="text-input" type="email" name="email" id="email" value="<?php echo $email; ?>"><br>Number of Contact: <input class="text-input" type="text" name="number" id="number" value="<?php echo $number; ?>"><br>Company Address: <input class="text-input" type="text" name="address" id="address" value="<?php echo $address; ?>"></td></tr>
                    <tr><td>Company Status: <select class="text-input" name="status" id="status"><option <?php if($status == 0){echo "selected='selected'";} ?> value="0">Potential Company</option><option <?php if($status == 1){echo "selected='selected'";} ?> value="1">Current Company</option></select></td></tr>
                    <tr class="hidden"><td><input name="id" value="<?php echo $id; ?>"></td></tr>
                </table>
            </div>
            <div class="table-input">
                <table>
                    <tr><td><input class="text-input" type="submit" value="Update Company"></td></tr>
                    <tr><td><div id="<?php echo $id; ?>" class="delete-button company-delete-button">DELETE</div></td></tr>	
                </table>
            </div>
        </div>
    </form>
    <?php $this->load->view('footer'); ?>