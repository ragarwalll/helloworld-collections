<?php include ( "./inc/connect.inc.php");
include ( "./monthly.php"); 
$row = (int)$_POST['row'];
$members = DB::query('SELECT * FROM members limit 6 OFFSET '.$row.';');

foreach($members as $p){
    $mem_id=$p['id'];
    $mem_name=$p['name'];
    $mem_email=$p['email_id'];
   ?>
    <tr class="dataHover item searchfunc">
            <td class="mem_name"><?php echo $mem_name; ?></td>
            <td>
                <table class="mem_month mem_monthDisplay db">
                    <tr>
                        <td><?php echo $currenMonth=month::displayMonth($mem_id,"Jan"); ?></td>
                        <td><?php echo $currenMonth=month::displayMonth($mem_id,"Feb"); ?></td>
                        <td><?php echo $currenMonth=month::displayMonth($mem_id,"Mar"); ?></td>
                        <td><?php echo $currenMonth=month::displayMonth($mem_id,"Apr"); ?></td>
                        <td><?php echo $currenMonth=month::displayMonth($mem_id,"May"); ?></td>
                        <td><?php echo $currenMonth=month::displayMonth($mem_id,"Jun"); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $currenMonth=month::displayMonth($mem_id,"Jul"); ?></td>
                        <td><?php echo $currenMonth=month::displayMonth($mem_id,"Aug"); ?></td>
                        <td><?php echo $currenMonth=month::displayMonth($mem_id,"Sep"); ?></td>
                        <td><?php echo $currenMonth=month::displayMonth($mem_id,"Oct"); ?></td>
                        <td><?php echo $currenMonth=month::displayMonth($mem_id,"Nov"); ?></td>
                        <td><?php echo $currenMonth=month::displayMonth($mem_id,"Dec"); ?></td>
                    </tr>
                </table>
            </td>
        </tr>
<?php }?>
<script src="./js/mem_click.js"></script>