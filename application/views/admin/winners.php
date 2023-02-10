<?php //var_dump($result); 
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<?php $this->load->view("panel/head"); ?>

<body>

    <main>
        <div class="card">

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-warning">
                        <tr><td colspan='6' style="text-align: center; font-size:larger">
                                <?php echo "KYS ". $league->type." All Time Winners"; ?>
                            </td></tr>
                            <tr> 
                                <th>#</th>
                                <th>Season/League</th>
                                <th>Club Name</th>
                                <th>Total Goal Scored</th>
                                <th>Total Goal Concede</th>
                                <th>Total Points won</th>
                            </tr>
                            <?php $i = 1;
                            foreach ($result as $row) { ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->season . " " . $row->type; ?></td>
                                    <td><?php echo $row->team_name; ?></td>
                                    <td><?php echo $row->goal_scored; ?></td>
                                    <td><?php echo $row->goal_concede; ?></td>
                                    <td><?php echo $row->points; ?></td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </table>
                    </div>
                    <div class="col-md-6">
                   
                        <table class="table table-dark">
                            <tr><td colspan='4' style="text-align: center; font-size:larger">
                            <?php echo "KYS ". $league->type." All Time Goal Scorers"; ?>
                            </td></tr>
                            <tr>
                            <th>Position</th>
                            <th>Player Name</th>
                            <th>Club Name</th>
                            <th>Goals Scored</th>
                          </tr>
                            <?php $i=1;
                                foreach($scorers as $row){?>
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





            <a href="<?php echo site_url("welcome"); ?>" class="btn btn-success">
                Back <span class="fas fa-arrow-left"></span>
            </a>

        </div>

    </main>
    <?php $this->load->view("panel/footer"); ?>




</body>


</html>