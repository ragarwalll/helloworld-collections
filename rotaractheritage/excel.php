<?php $carousel="no";
include ( "./inc/header.inc.php");

?>
<body>
<div class="container">
  <div class="panel">
    <div class="panel-heading">
      <h3>Export Books Data into Excel Sheet</h3>
      <div class="panel-body">
        <table border="1" class="table table-bordered table-striped">
    				<tr>
    					<th>Name</th>
    					<th>Jan</th>
    					<th>Feb</th>
						<th>Mar</th>
    				</tr>
                    <?php
                        $get = DB::query('SELECT * FROM subscription');
                        foreach($get as $p){
                            echo '
                                <tr>
                                    <td>'.$p["id"].'</td>
                                    <td>'.$p["jan"].'</td>
                                    <td>'.$p["feb"].'</td>
                                    <td>'.$p["mar"].'</td>
                                <tr>
                            ';
                        }
                    ?>
    		</table>
            
    		<a href="export-book">Export To Excel</a>
                        
      </div>
 
    </div>
 
  </div>
 
</div>


