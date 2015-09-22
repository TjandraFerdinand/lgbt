<?php echo form_open(base_url().'admin/job/confirm_job_category'); ?>

<br>&nbsp;&nbsp;Job Category Name: <?php echo form_input('job_category_name', ''); ?>   <?php echo form_error('job_category_name'); ?> <br><br>

&nbsp;&nbsp;<?php echo form_submit('', 'Add'); ?><br><br>
<?php echo form_close();?>