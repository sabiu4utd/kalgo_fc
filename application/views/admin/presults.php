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
                    
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <table class="table table" style="font-size:20pt; font-weight:bolder">
                         
                            
                           
                           <?php foreach ($fix as $row) { ?>
                                <tr>
                                    
                                    <td style="text-align:center">
                                        <?php
                                        echo $row->date . "<br />";
                                        echo $row->time . "<br />";
                                        echo $row->homeTeam ." <span style='color:red'>".$row->homeGoal."</span> VS <span style='color:red'> " .$row->awayGoal."</span> ". $row->awayTeam . "<br />";
                                        echo $row->venue . "<br />";
                                        echo $row->type . "<br />";

                                        ?>
                                    </td>
                                   

                                </tr>
                               
                            <?php 
                            } ?>
                        </table>
                       
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
        
    </main>
    <?php $this->load->view("panel/footer"); ?>




</body>


</html>