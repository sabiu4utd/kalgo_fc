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
            <div class="row justify-content-center">


               <div class="col-md-2">

               </div>
               <div class="col-md-8" style="text-align: center;" >
                  <a href="<?php echo site_url("admin/get_winners/3"); ?>" class="btn btn-success">
                     Champions League Records
                  </a>|
                  <a href="<?php echo site_url("admin/get_winners/1"); ?>" class="btn btn-success">
                     Premier Records</a>|
                  <a href="<?php echo site_url("admin/get_winners/2"); ?>" class="btn btn-success">
                     Fa Cup Records
                  </a>
               </div>

               <div class="col-md-2">  

               </div>


            </div>
            <a href="<?php echo site_url("welcome"); ?>" class="btn btn-dark">
               Back <span class="fas fa-arrow-left"></span>
            </a>
         </div>
      </div>

   </main>
   <?php $this->load->view("panel/footer"); ?>




</body>


</html>