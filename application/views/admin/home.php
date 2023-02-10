 <?php
    $option = "";
    foreach ($teams as $team) {
        $option .= "<option value=" . $team->id . " >" . $team->team_name . "</option>";
    }
    $options = "";
    foreach ($teams as $t) {
        $options .= "<option value=" . $t->id . "-" . $t->team_name . " >" . $t->team_name . "</option>";
    }

    $seasons = "";
    foreach ($result as $t) {
        $seasons .= "<option value=" . $t->id .  " >" . $t->season . "</option>";
    }
    
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

 <?php $this->load->view("panel/head"); ?>

 <body>

     <main>
         <h1 style="text-align:center; margin-top:20px">KYS CONTROL PANEL</h1>

         <div class="section section-lg mt-1">
             <?php if ($this->session->userdata("msg") == "") {
                } else { ?>
                 <div class="alert alert-success shadow-soft mb-4 mb-lg-5" role="alert"><span class="alert-inner--icon icon-lg"><span class="far fa-thumbs-up"></span></span>
                     <span class="alert-heading">Great!</span>
                     <p><?php echo $this->session->userdata("msg"); ?></p>

                 </div>
             <?php } ?>
             <div class="container">

                 <div class="row">
                     <div class="col-md-4"><span class="h5">Well come Mr. <?php echo $this->session->userdata("fullname"); ?></span></div>
                 </div>
                 <div class="row">

                     <div class="col-md-12">
                         <div class="nav-wrapper position-relative">
                             <ul class="nav nav-pills nav-fill flex-column flex-md-row">
                                 <li class="nav-item"><a class="nav-link mb-sm-3 mb-md-0" href="#" data-toggle="modal" data-target="#manage-seasons"><span class="icon-success"><span class="fas fa-tachometer-alt mr-2"></span>Manage Seasons</span></a></li>
                                 <li class="nav-item"><a class="nav-link mb-sm-3 mb-md-0" href="#" data-toggle="modal" data-target="#register"><span class="icon-secondary"><span class="far fa-user-circle mr-2"></span>Register Teams</span></a></li>
                                 <li class="nav-item"><a class="nav-link mb-sm-3 mb-md-0" href="#" data-toggle="modal" data-target="#teams"><span class="icon-tertiary"><span class="far fa-sun mr-2"></span>Manage Teams</span></a></li>
                                 <li class="nav-item"><a class="nav-link mb-sm-3 mb-md-0" href="#" data-toggle="modal" data-target="#add_to_league"><span class="icon-info"><span class="far fa-comments mr-2"></span>Add Team to Leagues</span></a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-12">
                         <div class="nav-wrapper position-relative">
                             <ul class="nav nav-pills nav-fill flex-column flex-md-row">
                                 <li class="nav-item"><a class="nav-link mb-sm-3 mb-md-0" href="#" data-toggle="modal" data-target="#fix"><span class="icon-success"><span class="fas fa-tachometer-alt mr-2"></span>Register Fixtures</span></a></li>
                                 <li class="nav-item"><a class="nav-link mb-sm-3 mb-md-0" href="<?php echo site_url("admin/fixture_management"); ?>"><span class="icon-secondary"><span class="far fa-user-circle mr-2"></span>Results & Fixtures</span></a></li>
                                 <li class="nav-item"><a class="nav-link mb-sm-3 mb-md-0" href="#" data-toggle="modal" data-target="#players"><span class="icon-tertiary"><span class="far fa-sun mr-2"></span>Register Players</span></a></li>
                                 <li class="nav-item"><a class="nav-link mb-sm-3 mb-md-0" href="#" data-toggle="modal" data-target="#manage_players"><span class="icon-info"><span class="far fa-comments mr-2"></span>Manage Players</span></a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-12">
                         <div class="nav-wrapper position-relative">
                             <ul class="nav nav-pills nav-fill flex-column flex-md-row">
                                 <li class="nav-item"><a class="nav-link mb-sm-3 mb-md-0" href="#" data-toggle="modal" data-target="#winners"><span class="icon-success"><span class="fas fa-tachometer-alt mr-2"></span>Register Winners</span></a></li>
                                 <li class="nav-item"><a class="nav-link mb-sm-3 mb-md-0" href="<?php echo site_url("admin/fixture_management"); ?>"><span class="icon-secondary"><span class="far fa-user-circle mr-2"></span>Register Top Scorer</span></a></li>
                                 <!-- <li class="nav-item"><a class="nav-link mb-sm-3 mb-md-0" href="#" data-toggle="modal" data-target="#players"><span class="icon-tertiary"><span class="far fa-sun mr-2"></span>Register Players</span></a></li>
                                 <li class="nav-item"><a class="nav-link mb-sm-3 mb-md-0" href="#" data-toggle="modal" data-target="#manage_players"><span class="icon-info"><span class="far fa-comments mr-2"></span>Manage Players</span></a></li>-->
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-12">
                         <a href="<?php echo site_url("auth/logout"); ?>" class="btn btn-info btn-block">Sign Out</a>
                     </div>
                 </div>


             </div>

         </div>
         </div>
         </div>
     </main>
     <?php $this->load->view("panel/footer"); ?>


     <!-- Manage seasons Modal starts here -->
     <div class="modal fade" id="manage-seasons" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-body p-0">
                     <div class="card bg-primary shadow-soft border-light p-4"><button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                         <div class="card-header text-center pb-0">
                             <div class="card-body">
                                 <h2 class="h4">Seasons</h2>
                                 <table class="table">
                                     <th>#</th>
                                     <th>Session</th>
                                     <th>Status</th>
                                     <?php
                                        $i = 1;
                                        foreach ($result as $row) { ?>
                                         <tr>
                                             <td><?php echo $i; ?></td>
                                             <td><?php echo $row->season; ?></td>
                                             <td><a href="<?php echo site_url('admin/activate_season/' . $row->id); ?>" class="btn btn-<?php echo $row->status == 'inactive' ? 'info' : 'danger'; ?>"><?php echo strtoupper($row->status); ?></a></td>
                                         </tr>

                                     <?php $i++;
                                        } ?>
                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Manage seasons Modal End here -->

     <!-- Team Registration Modal starts here -->
     <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="register" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-body p-0">
                     <div class="card bg-primary shadow-soft border-light p-4"><button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                         <div class="card-header text-center pb-0">
                             <div class="card-body">
                                 <h2> Register Teams</h2>
                                 <form action="<?php echo site_url("admin/reg_team"); ?>" method="POST" enctype="multipart/form-data">
                                     <div class="form-group">
                                         <label for="">Team Name</label>
                                         <div class="input-group mb-4">
                                             <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-flag"></span></span></div>
                                             <input class="form-control" name="team_name" placeholder="e.g. Manchester United" type="text">
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <div class="form-group">
                                             <label for="">Coach Name</label>
                                             <div class="input-group mb-4">
                                                 <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                                 </div><input class="form-control" name="coach_name" placeholder="e.g. Ten Hag" type="text" required>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label for="">Team Contact Number</label>
                                             <div class="input-group">
                                                 <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-phone"></span></span>
                                                 </div><input class="form-control" name="phone_number" placeholder="e.g. 07067555836" type="text" required>
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label for="">Team Logo or Coach Passport</label>
                                             <div class="input-group">
                                                 <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                                 </div><input class="form-control" name="team_logo" title="Team Logo" type="file" required>
                                             </div>
                                         </div>

                                     </div><input type="submit" class="btn btn-block btn-info" value="Save">
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Team Registration Modal End here -->

     <!-- Manage Teams Teams -->
     <div class="modal fade" id="teams" tabindex="-1" role="dialog" aria-labelledby="teams" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-body p-0">
                     <div class="card bg-primary shadow-soft border-light p-4"><button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                         <div class="card-header text-center pb-0">
                             <div class="card-body">
                                 <h2 class="h4">Teams</h2>
                                 <table class="table">
                                     <th>#</th>
                                     <th>Team</th>
                                     <th>Coach</th>
                                     <th>Contact</th>
                                     <th>Update</th>

                                     <?php
                                        $i = 1;
                                        foreach ($teams as $row) { ?>
                                         <tr>
                                             <td><?php echo $i; ?></td>
                                             <td><?php echo $row->team_name; ?></td>
                                             <td><?php echo $row->coach_name; ?></td>
                                             <td><?php echo $row->phone_number; ?></td>
                                             <td><a href="<?php echo site_url('admin/get_team_info/' . $row->id); ?>" class="btn btn-dark">Update</a></td>

                                         </tr>

                                     <?php $i++;
                                        } ?>
                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Manage Teams end here  -->

     <!-- Add team to League starts here -->
     <div class="modal fade" id="add_to_league" tabindex="-1" role="dialog" aria-labelledby="add_to_league" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-body p-0">
                     <div class="card bg-primary shadow-soft border-light p-4"><button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                         <div class="card-header text-center pb-0">
                             <div class="card-body">
                                 <h2> Register Teams</h2>
                                 <form action="<?php echo site_url("admin/reg_to_league"); ?>" method="POST" enctype="multipart/form-data">
                                     <div class="form-group">
                                         <label for="">League</label>
                                         <div class="input-group mb-4">
                                             <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-flag"></span></span></div>
                                             <select name="leagueid" id="" class="form-control" required>
                                                 <option selected disabled>[Choose League]</option>
                                                 <option value="1">Premier League</option>
                                                 <option value="3A">Champions League[Group A]</option>
                                                 <option value="3B">Champions League[Group B]</option>

                                             </select>
                                         </div>
                                     </div>
                             </div>

                             <div class="form-group">
                                 <label for="">Team</label>
                                 <div class="input-group mb-4">
                                     <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                         <select name="teamid" id="" class="form-control" required>
                                             <option selected disabled>[Choose Team]</option>
                                             <?php echo $option; ?>
                                         </select>
                                     </div>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="">Season</label>
                                 <div class="input-group">
                                     <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-phone"></span></span>
                                         <select name="seasonid" id="" class="form-control" required>

                                             <option selected disabled>[Choose Season]</option>
                                             <option value="<?php echo $this->session->userdata("season"); ?>">
                                                 <?php echo $this->session->userdata("session"); ?>
                                             </option>
                                         </select>
                                     </div>
                                 </div>


                             </div><input type="submit" class="btn btn-block btn-info" value="Save">
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     </div>

     <!-- Add Team to league Modal End here -->

     <div class="modal fade" id="fix" tabindex="-1" role="dialog" aria-labelledby="fix" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-body p-0">
                     <div class="card bg-primary shadow-soft border-light p-4"><button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                         <div class="card-header text-center pb-0">
                             <div class="card-body">
                                 <h2> Fixtures</h2>
                                 <form action="<?php echo site_url("admin/saveFixture"); ?>" method="POST" enctype="multipart/form-data">
                                     <div class="form-group">
                                         <label for="">Season</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-phone"></span></span>
                                                 <select name="seasonid" id="" class="form-control" required>
                                                     <option value="">[Choose Season]</option>
                                                     <option value="<?php echo $this->session->userdata("season"); ?>">
                                                         <?php echo $this->session->userdata("session"); ?>
                                                     </option>
                                                 </select>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label for="">Round</label>
                                         <div class="input-group mb-4">
                                             <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-flag"></span></span></div>
                                             <select name="round" id="" class="form-control" required>
                                                 <option value="">[Choose Round]</option>
                                                 <option>Premier</option>
                                                 <option>Champion</option>
                                                 <option>First Round</option>
                                                 <option>Second Round</option>
                                                 <option>Third Round</option>
                                                 <option>Fourth Round</option>
                                                 <option>Fifth Round</option>
                                                 <option>Quater Final</option>
                                                 <option>Semi Final</option>
                                                 <option>Final</option>

                                             </select>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label for="">League</label>
                                         <div class="input-group mb-4">
                                             <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-flag"></span></span></div>
                                             <select name="leagueid" id="" class="form-control" required>
                                                 <option value="">[Choose League]</option>
                                                 <option value="1">Premier League</option>
                                                 <option value="2">FA Cup</option>
                                                 <option value="3">Champions League</option>

                                             </select>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label for="">Home Team</label>
                                         <div class="input-group mb-4">
                                             <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                                 <select name="homeTeamId" id="" class="form-control" required>
                                                     <option value="">[Choose Team]</option>
                                                     <?php echo $options; ?>
                                                 </select>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label for="">Away Team</label>
                                         <div class="input-group mb-4">
                                             <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                                 <select name="awayTeamId" id="" class="form-control" required>
                                                     <option value="">[Choose Team]</option>
                                                     <?php echo $options; ?>
                                                 </select>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label for="">Date</label>
                                         <div class="input-group mb-4">
                                             <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                                 <input type="date" name="date" class="form-control" required />
                                             </div>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label for="">Venue</label>
                                         <div class="input-group mb-4">
                                             <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                                 <input type="text" name="venue" placeholder="Filin Sarki" class="form-control" required />
                                             </div>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label for="">time</label>
                                         <div class="input-group mb-4">
                                             <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                                 <input type="time" name="time" id="" class="form-control" required />
                                             </div>
                                         </div>
                                     </div>

                                     <input type="submit" class="btn btn-block btn-info" value="Save">
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Add Fixtures Modal End here -->

     <!-- Players Registration Modal starts here -->
     <div class="modal fade" id="players" tabindex="-1" role="dialog" aria-labelledby="players" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-body p-0">
                     <div class="card bg-primary shadow-soft border-light p-4"><button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>

                     <div class="card-body">
                         <h2> Register Player</h2>
                         <form action="<?php echo site_url("admin/reg_player"); ?>" method="POST" enctype="multipart/form-data">
                             <div class="form-group">
                                 <label for="">Player Fullname</label>
                                 <div class="input-group mb-4">
                                     <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-flag"></span></span></div>
                                     <input class="form-control" name="fullname" type="text" required />
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="">Player Club</label>
                                 <div class="input-group mb-4">
                                     <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                         <select name="teamid" id="" class="form-control" required>
                                             <option value="">[Choose Team]</option>
                                             <?php echo $options; ?>
                                         </select>
                                     </div>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <div class="form-group">
                                     <label for="">Jersey Number</label>
                                     <div class="input-group mb-4">
                                         <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                         </div><input class="form-control" name="jersey_number" type="text" required />
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label for="">Position</label>
                                     <div class="input-group">
                                         <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-phone"></span></span>
                                             <select name="position" class="form-control" required>
                                                 <option value="">Choose Position</option>
                                                 <option value="Goal Keeper">Goal Keeper</option>
                                                 <option value="Right Back">Right Back</option>
                                                 <option value="Central Depender">Central Depender</option>
                                                 <option value="Left Back">Left Back</option>
                                                 <option value="Mid Fielder">Mid Fielder</option>
                                                 <option value="Left Winger">Left Winger</option>
                                                 <option value="Right Winger">Right Winger</option>
                                                 <option value="Striker">Striker</option>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label for="">Date Of Birth</label>
                                         <div class="input-group mb-4">
                                             <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-flag"></span></span></div>
                                             <input class="form-control" name="dob" type="date" required />
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label for="">Player Passport</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                             </div><input class="form-control" name="passport" title="Team Logo" type="file" required>
                                         </div>
                                     </div>

                                 </div><input type="submit" class="btn btn-block btn-info" value="Save">
                         </form>
                     </div>
                 </div>

             </div>
         </div>
     </div>
     </div>
     <!-- Players Registration Modal End here -->

     <!--Manage Players  Modal starts here -->
     <div class="modal fade" id="manage_players" tabindex="-1" role="dialog" aria-labelledby="players" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-body p-0">
                     <div class="card bg-primary shadow-soft border-light p-4"><button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                         <div class="card-body">
                             <table class="table table-dark">
                                 <?php $i = 1;
                                    foreach ($teams as $t) { ?>
                                     <tr>
                                         <td><?php echo $i; ?></td>
                                         <td><?php echo $t->team_name; ?></td>
                                         <td><a class="btn btn-success" href="<?php echo site_url('admin/view_players/' . $t->id);  ?>">View Players </a></td>
                                     </tr>


                                 <?php $i++;
                                    } ?>
                             </table>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!--Manage Players  Modal End here -->

     <!-- Winners League starts here -->
     <div class="modal fade" id="winners" tabindex="-1" role="dialog" aria-labelledby="add_to_league" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-body p-0">
                     <div class="card bg-primary shadow-soft border-light p-4"><button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                         <div class="card-header text-center pb-0">
                             <div class="card-body">
                                 <h2> Winners</h2>
                                 <form action="<?php echo site_url("admin/save_winner"); ?>" method="POST" enctype="multipart/form-data">
                                     <div class="form-group">
                                         <label for="">League</label>
                                         <div class="input-group mb-4">
                                             <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-flag"></span></span></div>
                                             <select name="leagueid" id="" class="form-control" required>
                                                 <option value="">[Choose League]</option>
                                                 <option value="1">Premier League</option>
                                                 <option value="2">FA Cup</option>
                                                 <option value="3">Champions League</option>

                                             </select>
                                         </div>
                                     </div>
                             </div>
                             <div class="form-group">
                                 <label for="">Season</label>
                                 <div class="input-group mb-4">
                                     <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                         <select name="seasonid" id="" class="form-control" required>
                                             <option value="" >[Choose Season]</option>
                                             <?php echo $seasons; ?>
                                         </select>
                                     </div>
                                 </div>
                             </div>

                             <div class="form-group">
                                 <label for="">Team</label>
                                 <div class="input-group mb-4">
                                     <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                         <select name="teamid" id="" class="form-control" required>
                                             <option selected disabled>[Choose Team]</option>
                                             <?php echo $option; ?>
                                         </select>
                                     </div>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="">Total Goal Scored</label>
                                 <div class="input-group mb-4">
                                     <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                        <input type="text" name="goal_scored" class="form-control">
                                     </div>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="">Total Goal Concede</label>
                                 <div class="input-group mb-4">
                                     <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                        <input type="text" name="goal_concede" class="form-control">
                                     </div>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="">Total Point Won</label>
                                 <div class="input-group mb-4">
                                     <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                        <input type="text" name="points" class="form-control">
                                     </div>
                                 </div>
                             </div>
                             


                             </div><input type="submit" class="btn btn-block btn-info" value="Save">
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     </div>

     <!-- Winners  Modal End here -->


 </body>


 </html>