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
                    
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                       <a href="<?php echo site_url("admin/manage_fixtures"); ?>" class="btn btn-dark">Manage Premier League </a>
                       <a href="<?php echo site_url("admin/manage_fa_fixture"); ?>" class="btn btn-dark" >Manage FA Cup Fixtures</a>
                       <a href="<?php echo site_url("admin/manage_champion_fixture"); ?>" class="btn btn-dark" >Manage Champions League </a>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
        
    </main>
    <?php $this->load->view("panel/footer"); ?>




</body>


</html>