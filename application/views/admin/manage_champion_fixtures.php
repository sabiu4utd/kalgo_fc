<?php //var_dump($tbl); 
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<?php $this->load->view("panel/head"); ?>

<body>

    <main>
        <div class="card">
            <div class="container-fluid mt-3">
                <div class="row mt-3">
                    
                    <div class="col-md-6">
                        <table class="table table-dark">
                            <th>#</th>
                            <th>Group A</th>

                            <th>Manage Fixtures</th>
                            <th>Upload Result</th>
                            <a href="<?php echo site_url("welcome/home"); ?>" class="btn btn-dark"> Back </a>
                            <?php $i = 1;
                            foreach ($fix as $row) { ?>
                                <tr>
                                    <td>
                                        <?php echo $i; ?>
                                    </td>
                                    <td style="text-align:center">
                                        <?php
                                        echo $row->date . "<br />";
                                        echo $row->time . "<br />";
                                        echo $row->homeTeam . " VS " . $row->awayTeam . "<br />";
                                        echo $row->venue . "<br />";
                                        echo $row->type . "<br />";

                                        ?>
                                    </td>
                                    <td> <a href="<?php echo site_url("admin/update_fixtures/" . $row->id); ?>" class="btn btn-dark">Update Fixtures</a> </td>
                                    <td> <a href="#" data-toggle="modal" data-target="#<?php echo 'fix'.$row->id ?>" class="btn btn-dark">Update Result</a> </td>

                                </tr>
                                <div class="modal fade" id="<?php echo "fix".$row->id ?>" tabindex="-1" role="dialog" aria-labelledby="fix" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <div class="card bg-primary shadow-soft border-light p-4"><button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    <div class="card-header text-center pb-0">
                                                        <div class="card-body">
                                                            <h2> Result Update</h2>
                                                            <form action="<?php echo site_url("admin/update_champion_result"); ?>" method="POST" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label for="">Home Team</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                                                            <input type="text" class="form-control" name="homeTeam" id="" disabled  value="<?php echo $row->homeTeam; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Home Team Goals</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                                                            <input type="number" class="form-control" name="homeTeamGoals" id="" required />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Away Team</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                                                        <input type="text" name="AwayTeam"  class="form-control" id="" disabled  value="<?php echo $row->awayTeam; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Away Team Goals</label>
                                                                    <div class="input-group mb-4">
                                                                        <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                                                            <input type="number" class="form-control" name="awayTeamGoals" id="" required />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="homeTeamId" value="<?php echo $row->homeTeamId; ?>">
                                                                <input type="hidden" name="awayTeamId" value="<?php echo $row->awayTeamId; ?>">
                                                                <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                                                                <input type="submit" class="btn btn-block btn-info" value="Save">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php $i++;
                            } ?>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h1>Group A</h1>
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

                        <h1>Group B</h1>
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
                                foreach($tbl2 as $row){?>
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