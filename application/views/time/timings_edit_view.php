<!DOCTYPE html>
<?php $baseurl = base_url(); ?>
<html>

    <div class="one-col container">
        <?php echo form_open('timings/update_time'); ?>
                <?php foreach ($timings_info as $key) : ?>
                <div class="col-md-4 text-input">
                    <table class="float-left">
                        <tr><td>year to date<input class="text-input" name="year_to_date" value="<?php echo $key->year_to_date;?>"></td></tr>
                        <tr><td>this month<input class="text-input" name="this_month" value="<?php echo $key->this_month;?>"></td></tr>
                        <tr><td>this week<input class="text-input" name="this_week" value="<?php echo $key->this_week;?>"></td></tr>
                        <tr><td>marketing<input class="text-input" name="marketing" value="<?php echo $key->marketing;?>"></td></tr>
                        <tr><td>website<input class="text-input" name="website" value="<?php echo $key->website;?>"></td></tr>
                        <tr><td>print<input class="text-input" name="print" value="<?php echo $key->print;?>"></td></tr>
                        <tr><td>design<input class="text-input" name="design" value="<?php echo $key->design;?>"></td></tr>
                        <tr><td>seo<input class="text-input" name="seo" value="<?php echo $key->seo;?>"></td></tr>
                        <tr><td>social<input class="text-input" name="social" value="<?php echo $key->social;?>"></td></tr>
                        <tr><td>video<input class="text-input" name="video" value="<?php echo $key->video;?>"></td></tr>
                        <tr><td>content<input class="text-input" name="content" value="<?php echo $key->content;?>"></td></tr>
                        <tr><td>signage<input class="text-input" name="signage" value="<?php echo $key->signage;?>"></td></tr>
                        <tr><td>photography<input class="text-input" name="photography" value="<?php echo $key->photography;?>"></td></tr>
                        <tr><td>email<input class="text-input" name="email" value="<?php echo $key->email;?>"></td></tr>
                        <tr><td>ecommerce<input class="text-input" name="ecommerce" value="<?php echo $key->ecommerce;?>"></td></tr>
                    </table>
                </div>
                <?php endforeach;?>
                <input class="text-input" type="submit" value="Update Timings">
        </form>
    </div>
    <?php $this->load->view('footer'); ?>



