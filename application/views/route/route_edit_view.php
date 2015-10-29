<!DOCTYPE html>
<?php $baseurl = base_url(); ?>
<html>
    <?php $this->load->view('head'); ?>
    <?php $this->load->view('header'); ?>
    <?php $this->load->view('navigation'); ?>
    <div class="one-col container">
        <?php echo form_open('routes/update_route'); ?>
                <?php foreach ($routes as $key) : ?>
                <div class="col-md-4 text-input">
                    <table class="float-left">
                        <tr><td><input class="text-input" name="<?php echo $key->id; ?>-name" value="<?php echo $key->name;?>"></td></tr>
                        <tr><td><input class="text-input" name="<?php echo $key->id; ?>-leads" value="<?php echo $key->leads;?>"></td></tr>
                        <tr><td><input class="text-input" name="<?php echo $key->id; ?>-converted" value="<?php echo $key->converted;?>"></td></tr>
                        <tr><td><input class="text-input" name="<?php echo $key->id; ?>-profit" value="<?php echo $key->profit;?>"></td></tr>
                        <tr><td><input class="text-input" name="<?php echo $key->id; ?>-hours" value="<?php echo $key->hours;?>"></td></tr>
                    </table>
                </div>
                <?php endforeach;?>
                <input class="text-input" type="submit" value="Update Routes">
        </form>
    </div>
	 	<?php $this->load->view('footer'); ?>



