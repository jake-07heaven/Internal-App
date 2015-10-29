<html>
	<?php $this->load->view('head'); ?>
		<?php $this->load->view('header'); ?>
		<div class="container">
			<div class="login">
				<h1>07 Heaven Login</h1>
				<?php echo validation_errors(); ?>
				<?php echo form_open('verifylogin'); ?>
					<input type="text" size="20" id="username" name="username" placeholder="Username"/>
					<br>
					<input type="password" size="20" id="password" name="password" placeholder="Password"/>
					<br>
					<input type="submit" value="Login"/>
				</form>
			</div>
		</div>
	</body>
</html>