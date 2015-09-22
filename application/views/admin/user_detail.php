USER DETAIL
<br><br>
ID:         <?php echo $user_detail['user']['0']['user_id'];?><br>
Fullname:   <?php echo $user_detail['user']['0']['fullname'];?><br>
Furigana:    <?php echo $user_detail['user']['0']['furigana'];?><br>
Date of Birth:      <?php echo $user_detail['user']['0']['date_of_birth'];?><br>
Phone:      <?php echo $user_detail['user']['0']['phone_number'];?><br>
Email:      <?php echo $user_detail['user']['0']['email'];?><br><br>


Jobs:&nbsp;
<?php 
foreach ($user_detail['job_list'] as $key => $val)
        {
            echo $val['job_list_name'];
            ?>&nbsp;|&nbsp;<?php
        }
?>
<br><br>
<?php echo anchor(base_url().'admin/user/list','Back to List');?>