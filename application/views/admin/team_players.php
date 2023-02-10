<?php $option = "";
foreach ($teams as $team) {
    $option .= "<option value=" . $team->id . " >" . $team->team_name . "</option>";
}
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<?php $this->load->view("panel/head"); ?>

<body>
    <br />
    <br />


    <main>
        <div class="card">
            <div class="container-fluid mt-3">
                <div class="row mt-3">


                    <div class="col-md-12">
                        <table class="table table" style="font-size:12pt; font-weight:bolder">



                            <?php $i = 1;
                            foreach ($players as $row) { ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->fullname; ?></td>
                                    <td><?php echo $row->position; ?></td>
                                   
                                    <td> <a class="btn btn-success" href="#" data-toggle="modal" data-target="#update<?php echo $row->player_id ?>">Update Player Goals</a> </td>
                                    <td> <a class="btn btn-success" href="#" data-toggle="modal" data-target="#id<?php echo $row->player_id ?>">Transfer</a> </td>
                                </tr>



                                <!--Manage Players  Modal starts here -->
                                <div class="modal fade" id="id<?php echo $row->player_id; ?>" tabindex="-1" role="dialog" aria-labelledby="players" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <div class="card bg-primary shadow-soft border-light p-4"><button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    <div class="card-body">

                                                        <form action="<?php echo site_url("admin/transfer"); ?>" method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                                                            <div class="form-group">
                                                                <label for="">Player Name/Position</label>
                                                                <div class="input-group mb-4">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-flag"></span></span></div>
                                                                    <input type="text" class="form-control" name="team_name" value="<?php echo $row->fullname."/".$row->position; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Old Team</label>
                                                                <div class="input-group mb-4">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-flag"></span></span></div>
                                                                    <input type="text" class="form-control" name="team_name" value="<?php echo $row->team_name; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">New Team</label>
                                                                <div class="input-group mb-4">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                                                        <select name="teamid" id="" class="form-control" required>
                                                                            <option selected disabled>[Choose New Team]</option>
                                                                            <?php echo $option; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="submit" value="Transfer" class="btn btn-success">
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Manage Players  Modal End here -->

                                 <!--Manage Players  Modal starts here -->
                                 <div class="modal fade" id="update<?php echo $row->player_id; ?>" tabindex="-1" role="dialog" aria-labelledby="players" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <div class="card bg-primary shadow-soft border-light p-4"><button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    <div class="card-body">

                                                        <form action="<?php echo site_url("admin/goals"); ?>" method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                                                            <div class="form-group">
                                                                <label for="">Player Name/Position</label>
                                                                <div class="input-group mb-4">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-flag"></span></span></div>
                                                                    <input type="text" class="form-control" name="team_name" value="<?php echo $row->fullname."/".$row->position; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Goals Scored</label>
                                                                <div class="input-group mb-4">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-flag"></span></span></div>
                                                                    <input type="number" placeholder="eg 1 " class="form-control" name="goals" required />
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Choose Leage</label>
                                                                <div class="input-group mb-4">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                                                        <select name="leagueid" id="" class="form-control" required>
                                                                            <option value="">Choose Leage</option>
                                                                            <option value="1">Premier League</option>
                                                                            <option value="2">FA Cup</option>
                                                                            <option value="3">Champions League</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Team Scored Against</label>
                                                                <div class="input-group mb-4">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                                                        <select name="team_scored_against" id="" class="form-control" required>
                                                                            <option value="" >[Choose New Team]</option>
                                                                            <?php echo $option; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="playerid" value="<?php echo $row->player_id ?>">
                                                            <input type="hidden" name="seasonid" value="<?php echo $this->session->userdata('season'); ?>">
                                                       
                                                            <input type="submit" value="Update Goal Tally" class="btn btn-success">
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Manage Players  Modal End here -->

                            <?php  $i++; } ?>

                        </table>
                        <a class="btn btn-dark" href="<?php echo site_url("welcome/home"); ?>">Back</a>
                    </div>

                </div>
            </div>
        </div>

    </main>
    <?php $this->load->view("panel/footer"); ?>




</body>


</html>