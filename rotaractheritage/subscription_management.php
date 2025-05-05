<?php $carousel="no"; 
include ( "./inc/header.inc.php");
include ( "./monthly.php");
if(!$userid){
    die("You must be logged in to vew this page");
}
include ( "./inc/header-logged.inc.php");
?>
<div class="head_container" style="position:fixed;">
     
</div>
<div class="load-bar" id="wait" style="position:fixed;">
  <div class="bar"></div>
  <div class="bar"></div>
  <div class="bar"></div>
</div>
<div class="mem_head" style="position:fixed;">
<p class="mem_header">Member's Subscription Area</p>
<a class="export" href="<?php print $_SERVER['MYVAR'];?>subscription_management" style="padding-left: 6px;"><i class="fas fa-sync-alt"></i></a>
<a class="export" href="export-book" download><i class="fas fa-external-link-alt"></i></a>
<div class="search_container">
    <div class="search-boxx">
        <input type="text" id="myInput" onkeyup="searchFunction();">
        <span></span>
    </div>
</div>


</div>
<a href="addmembers" style="position:fixed;">
    <div class="add_btn">
        <button class="add_mem" href="#open-modal">
            <span class="icon_plus">+</span>
        </button>
    </div>
</a>
<div style="height:140px"></div>
<table class="mem_table" id="myTable" style=>
<!--Head-->
    <tr style>
        <th class="bottom_table" id="mem_month" onclick="w3.sortHTML('#myTable', '.item', 'td:nth-child(1)')" style="cursor:pointer">Name</th>
        <th class="bottom_table">
            <table class="mem_month">
                <tbody>
                    <tr>
                        <th class="bottom_table" id="mem_month">Jan</th>
                        <th class="bottom_table" id="mem_month">Feb</th>
                        <th class="bottom_table" id="mem_month">Mar</th>
                        <th class="bottom_table" id="mem_month">Apr</th>
                        <th class="bottom_table" id="mem_month">May</th>
                        <th class="bottom_table" id="mem_month">Jun</th>
                    </tr>
                    <tr>
                        <th id="mem_month">Jul</th>
                        <th id="mem_month">Aug</th>
                        <th id="mem_month">Sept</th>
                        <th id="mem_month">Oct</th>
                        <th id="mem_month">Nov</th>
                        <th id="mem_month">Dec</th>
                    </tr>
                </tbody>
            </table>
        </th>
    </tr>
<?php
#Chnaging the values
if(isset($_GET['con'])){
    month::paymentStatus($_GET['con'],$_GET['stat']);
}
$allcount=DB::query('SELECT count(*) FROM subscription')[0]['count(*)'];
$member=DB::query('SELECT * FROM members order by id asc');
foreach($member as $p){
    $mem_id=$p['id'];
    $mem_name=$p['name'];
    $mem_email=$p['email_id'];



?>
<!--Data-->
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
    

<?php } ?>
<input type="hidden" id="row" value="0">
<input type="hidden" id="all" value="<?php echo $allcount; ?>">
</table>
<script>
function searchFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = document.querySelectorAll(".searchfunc");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  } 
}
</script>
<script src="./js/mem_click.js"></script>
<script>
$loading=$('#wait').hide()
$(document).ready(function(){
    $(document).ajaxStart(function(){
        $loading.show();
    });
    $(document).ajaxStop(function(){
        $loading.hide();
    });
});
</script>

