<!DOCTYPE html>
<html>
    <?php $this->load->view('head'); ?>
    <?php $this->load->view('header'); ?>
    <?php $this->load->view('navigation'); ?>
    <div class="two-col dashboard">
        <div class="left-col">
            <div class="tab_container">
			<input id="tab1" type="radio" name="tabs" checked>
			<label for="tab1"><i class="fa fa-code"></i><span>Code</span></label>

			<input id="tab2" type="radio" name="tabs">
			<label for="tab2"><i class="fa fa-pencil-square-o"></i><span>About</span></label>

			<section id="content1" class="tab-content">
                            <h3>Ongoing Jobs</h3>
                            <div class="table">
                                <table>
                                    <tr class="table-titles"><td>Name</td><td>deadline</td><td>contact name</td><td>contact number</td><td>contact email</td></tr>
                                    <?php foreach($ongoing_jobs as $key) : ?>
                                    <tr><td><?php echo $key->name; ?></td><td><?php echo $key->deadline_date; ?></td><td><?php echo $key->contact; ?></td><td><?php echo $key->number; ?></td><td><?php echo $key->email; ?></td></tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
			</section>

			<section id="content2" class="tab-content">
				<h3>Headline 2</h3>
		      	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		      	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		      	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
		      	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		      	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		      	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		      	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		      	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		      	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </section>
		</div>
        </div>
    </div>
    <?php $this->load->view('footer'); ?>