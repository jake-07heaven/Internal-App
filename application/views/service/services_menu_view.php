<?php $baseurl = base_url(); ?>
<html>
    <?php $this->load->view('head'); ?>
    <?php $this->load->view('sidebar/top'); ?>
    <?php $this->load->view('header'); ?>
    <?php $this->load->view('navigation'); ?>
    <div class="one-col">
        <div class="container services-buttons">
            <div class="row">
                <div class="col-sm-3">
                    <a href="<?php echo $baseurl; ?>index.php/services/service/0/profile" id="marketing">
                            <p>Marketing</p>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="<?php echo $baseurl; ?>index.php/services/service/1/profile" id="web_development">
                            <p>Web Development</p>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="<?php echo $baseurl; ?>index.php/services/service/2/profile" id="ecommerce">
                            <p>E-Commerce</p>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="<?php echo $baseurl; ?>index.php/services/service/3/profile" id="branding_and_design">
                            <p>Branding &amp; Design</p>
                    </a>
                </div> 
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <a href="<?php echo $baseurl; ?>index.php/services/service/4/profile" id="seo">
                            <p>SEO</p>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="<?php echo $baseurl; ?>index.php/services/service/5/profile" id="social_media">
                            <p>Social Media</p>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="<?php echo $baseurl; ?>index.php/services/service/6/profile" id="printing">
                            <p>Printing</p>
                    </a>  
                </div>                  
                <div class="col-sm-3">
                    <a href="<?php echo $baseurl; ?>index.php/services/service/7/profile" id="email_marketing">
                            <p>Email Marketing</p>
                    </a>
                </div>      
            </div>
            <div class="row">

                <div class="col-sm-3">
                    <a href="<?php echo $baseurl; ?>index.php/services/service/8/profile" id="shop_signage">
                            <p>Shop Signage</p>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="<?php echo $baseurl; ?>index.php/services/service/9/profile" id="photography">
                            <p>Photography</p>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="<?php echo $baseurl; ?>index.php/services/service/10/profile" id="content_creation">
                            <p>Content Creation</p>
                    </a>
                </div>
                <div class="col-sm-3">
                    <a href="<?php echo $baseurl; ?>index.php/services/service/11/profile" id="video_production">
                            <p>Video Production</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <?php $this->load->view('footer'); ?>
