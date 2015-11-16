<!DOCTYPE html>
<?php $baseurl = base_url(); ?>
<html>

    <div class="one-col container">
        <?php echo form_open('services/update_service'); ?>
                <?php foreach ($service_info as $key) : ?>
                <div class="col-md-4 text-input">
                    <table class="float-left">
                        <tr class="hidden"><td><input name="id" value="<?php echo $key->id;?>"</td></tr>
                        <tr><td>Name:<input class="text-input" name="name" value="<?php echo $key->name;?>"></td></tr>
                        <tr><td>Target:<input class="text-input" name="target" value="<?php echo $key->target;?>"></td></tr>
                        <tr><td>happiness:<input class="text-input" name="happiness" value="<?php echo $key->happiness;?>"></td></tr>
                    </table>
                </div>
                <?php endforeach;?>
                <input class="text-input" type="submit" value="Update Service">
        </form>
    </div>
	 	<?php $this->load->view('footer'); ?>



