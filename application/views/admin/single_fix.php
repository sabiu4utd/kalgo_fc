<?php //var_dump($fix); 
?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<?php $this->load->view("panel/head"); ?>
<html>
<body>

    <main>
        <div class="card">
            <div class="container mt-3">
                <div class="row mt-3">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2> Fixtures</h2>
                            <form action="<?php echo site_url("admin/single_fix_update"); ?>" method="POST" enctype="multipart/form-data">
                                
                                <div class="form-group">
                                    <label for="">League</label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-flag"></span></span></div>
                                        <select name="leagueid" id="" class="form-control" required >
                                            <option value="">Choose Leage</option>
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
                                           <input type="text" name="homeTeam" disabled class="form-control" value="<?php echo $row->homeTeam; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Away Team</label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                        <input type="text" name="awayTeam" disabled class="form-control" value="<?php echo $row->awayTeam; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                                            <input type="date" name="date" id="" class="form-control">
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
                                <input type="hidden" name="id" value="<?php echo $row->id ?>">
                                <input type="submit" class="btn btn-block btn-info" value="Save">
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
        <a href="<?php echo site_url("welcome/home"); ?>" class="btn btn-dark"> Log Out</a>
    </main>
    <?php $this->load->view("panel/footer"); ?>




</body>


</html>