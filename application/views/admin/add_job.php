<?php echo form_open(base_url().'admin/job/confirm_job'); ?>

<br>&nbsp;&nbsp;Job Category:
            <?php 
            foreach ($job_category as $key => $val)
                {
                $values[$val['job_category_id']] = $val['job_category_name'];
                }
            
            echo form_dropdown ('input_job_category', $values);
            ?>
            
            </select>
&nbsp;&nbsp;Job Name: <?php echo form_input('job_name', ''); ?>   <?php echo form_error('job_name'); ?> <br><br>


&nbsp;&nbsp;<?php echo form_submit('', 'Add'); ?><br><br>
<?php echo form_close(); ?>