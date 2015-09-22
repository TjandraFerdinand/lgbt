<br>&nbsp;&nbsp;<strong>-- USERS LIST PAGE --</strong><br><br>
<?php echo anchor(base_url().'admin/top','Back to Top'); ?><br><br>
<br>
USER LIST:<br>
<?php
foreach ($user_list as $key => $val)
    {
    echo $val['user_id'];?>&nbsp;&nbsp;
    
    <?php echo "<a href=\"".base_url()."admin/user/detail/".$val['user_id']."\">".$val['fullname']."</a>";?>&nbsp;&nbsp;<?php
    
    if ($val['delete_flag'] == 0)
        {
            echo "(Not Deleted)";
        } else {
            echo "(Deleted)";
        }
    
    ?>&nbsp;&nbsp;<?php
    echo anchor(base_url().'admin/user/delete/'.$val['user_id'],'Delete');
    
    echo "<br>";
    echo "<br>";
    }
?>