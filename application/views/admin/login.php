<br>&nbsp;&nbsp;<strong>-- ADMIN LOGIN PAGE --</strong><br><br>

<?php echo form_open(base_url().'admin/login_action'); ?>
Admin Name: <?php echo form_input('admin_name', ''); ?><br><br>
Password:  <?php echo form_input('admin_password', ''); ?><br><br>

<?php echo form_submit('submit', 'Login'); ?><br><br>
<?php echo form_close(); ?>
