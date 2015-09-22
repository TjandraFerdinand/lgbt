<br>&nbsp;&nbsp;<strong>-- JOB LIST PAGE --</strong><br><br>

&nbsp;&nbsp;※&nbsp;<?php echo anchor(base_url().'admin/job/add_job','Add Job');?>
&nbsp;&nbsp;※&nbsp;<?php echo anchor(base_url().'admin/job/add_job_category','Add Job Category');?>
&nbsp;&nbsp;※&nbsp;<?php echo anchor(base_url().'admin/top','Back to Top');?><br>
<br><br>
<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Job Category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Job Name<br></strong>
<?php
foreach ($job_list as $key => $val)
    {
    //echo anchor(base_url().'user/detail/'.$Val['id'], $val['name']);
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; echo $val['job_list_id']; echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; echo $val['job_category_name']; echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; echo $val['job_list_name']; 
    echo "<br>";
    echo "<br>";
    }
?>