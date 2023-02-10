<?php  ?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from demo.themesberg.com/neumorphism-ui-pro/html/components/navs.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Dec 2022 16:49:08 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<?php $this->load->view("panel/head"); ?>

<body>

    <main>
        <div class="containter">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                <div class="card-body">
            <h2> Update Teams</h2>
            <form action="<?php echo site_url("admin/update_team"); ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Team Name</label>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-flag"></span></span></div>
                        <input class="form-control" name="team_name" value="<?php echo $result->team_name; ?>" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="">Coach Name</label>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-user"></span></span>
                            </div><input class="form-control" name="coach_name" value="<?php echo $result->coach_name; ?>" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Team Contact Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-phone"></span></span>
                            </div><input class="form-control" name="phone_number" value="<?php echo $result->phone_number; ?>" type="text" required>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $result->id; ?>">
                    

                </div><input type="submit" class="btn btn-block btn-info" value="Update">
            </form>
        </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        
    </main>
    <?php $this->load->view("panel/footer"); ?>




</body>


</html>