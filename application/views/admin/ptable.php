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
                            <tr>
                            <th>Team</th>
                            <th>MP</th>
                            <th>W</th>
                            <th>D</th>
                            <th>L</th>
                            <th>GF</th>
                            <th>GA</th>
                            <th>GD</th>
                            <th>Points</th>
                            
                            </tr>
                            <?php 
                                foreach($tbl as $row){?>
                                    <tr>
                                        <td><?php echo $row->team_name; ?></td>
                                        <td><?php echo $row->mp; ?></td>
                                        <td><?php echo $row->win; ?></td>
                                        <td><?php echo $row->draw; ?></td>
                                        <td><?php echo $row->lose; ?></td>
                                        <td><?php echo $row->gf; ?></td>
                                        <td><?php echo $row->ga; ?></td>
                                        <td><?php echo $row->gd; ?></td>
                                        <td><?php echo $row->points; ?></td>
                                        
                                    </tr>


                                <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
    <?php $this->load->view("panel/footer"); ?>




</body>


</html>