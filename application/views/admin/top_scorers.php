<?php //var_dump($tbl); 
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<?php $this->load->view("panel/head"); ?>

<body>
<br />
    <br />
    <?php $this->load->view("panel/header"); ?>

    <main>
        <div class="card">
            <div class="container-fluid mt-3">
                <div class="row mt-3">
                    
                   
                    <div class="col-md-12">
                        <h1>Tables</h1>
                        <table class="table table-dark">
                            <tr><td colspan='4' style="text-align: center; font-size:larger">
                                <?php echo "Kalgo ".$league." Goal Scorers Chart"; ?>
                            </td></tr>
                            <tr>
                            <th>Position</th>
                            <th>Player Name</th>
                            <th>Club Name</th>
                            <th>Goals Scored</th>
                          </tr>
                            <?php $i=1;
                                foreach($result as $row){?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row->fullname; ?></td>
                                        <td><?php echo $row->team_name; ?></td>
                                        <td><?php echo $row->total; ?></td>
                                        
                                    </tr>


                                <?php $i++; } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
    <?php $this->load->view("panel/footer"); ?>




</body>


</html>