<!DOCTYPE html>
<?php $baseurl = base_url(); ?>
<html>
    <?php $this->load->view('head'); ?>
    <?php $this->load->view('header'); ?>
    <?php $this->load->view('navigation'); ?>
    <div class="one-col container routes">
        <?php
            if ($level == 5) : ?>
                <div class=" edit-button route-edit-button"><img src="<?php echo $baseurl; ?>/img/edit_icon.svg"></div>
            <?php endif;
            foreach ($route as $key)
            {
                echo "<table class='col-sm-4 col-xs-12 col-md-3 col-lg-3 col-xl-2'>";
                echo "<tr><td><h2>".$key->name."</h2></td></tr>";
                echo "<tr><td>".$key->leads."</td></tr>";
                echo "<tr><td>".$key->converted."</td></tr>";
                echo "<tr><td>&pound ".$key->profit."</td></tr>";
                echo "<tr><td>".$key->hours." (HRS)</td></tr>";
                echo "</table>";
            }
        ?>

    </div>
    <?php $this->load->view('footer'); ?>