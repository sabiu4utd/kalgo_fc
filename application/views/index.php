<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<?php $this->load->view("panel/head"); ?>

<body>

    <?php $this->load->view('panel/header'); ?>
    <main>

        <section class="section section-lg bg-primary mt-4">

        <?php  if($this->session->userdata("msg")== ""){ } else{?>
            <div class="alert alert-secondary shadow-soft mb-4 mb-lg-5" role="alert"><span class="alert-inner--icon icon-lg"><span class="fas fa-exclamation-circle"></span></span>
                <span class="alert-heading">Warning!</span>
                <p><?php echo $this->session->userdata("msg"); ?></p>
                
            </div>
            <?php }?>
           <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h1>KALGO YOUTH SOCCER</h1>
                </div>
                <div class="col-md-3"></div>
            </div>
           </div>
              
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-5">
                        <div class="card bg-primary shadow-soft border-light flex-lg-row align-items-center no-gutters p-4">
                            <a href="" class="col-12 col-lg-6"><img src="<?php echo base_url(); ?>assets/img/blog/players5.jpg" alt="themesberg office" class="card-img-top rounded"></a>
                            <div class="card-body d-flex flex-column justify-content-between col-auto py-4 p-lg-3 p-xl-5">
                                <a href="">
                                    <h2>A screenshot of 2020/2021 Kalgo Premier League Champions</h2>
                                </a>
                                <p>Dallatu United won the league with 35 points. with Tottenham and Sallama United occupying spot 2 and 3 respectively</p>
                                <h1>Congratulations!..</h1>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-5">
                        <div class="card bg-primary shadow-soft border-light p-4 rounded"><a href=""><img src="<?php echo base_url(); ?>assets/img/blog/players2.jpg" class="card-img-top rounded" alt="our desk"></a>
                            <div class="card-body p-0 pt-4"><a href="" class="h4">Chairman Kalgo Youth Soccer 
                                  </a>
                                <div class="d-flex align-items-center my-4"><img class="avatar avatar-sm rounded-circle" src="<?php echo base_url(); ?>assets/img/team/players2.jpg" alt="Neil avatar">
                                    <h3 class="h6 small ml-2 mb-0">Chairman</h3>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-5">
                        <div class="card bg-primary shadow-soft border-light p-4 rounded"><a href=""><img src="<?php echo base_url(); ?>assets/img/blog/players3.jpg" class="card-img-top rounded" alt="web desk"></a>
                            <div class="card-body p-0 pt-4"><a href="" class="h4">Secretary Kalgo Youth Soccer</a>
                                <div class="d-flex align-items-center my-4"><img class="avatar avatar-sm rounded-circle" src="<?php echo base_url(); ?>assets/img/team/players3.jpg" alt="David avatar">
                                    <h3 class="h6 small ml-2 mb-0"> Secretary General</h3>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-5">
                        <div class="card bg-primary shadow-soft border-light p-4 rounded"><a href=""><img src="<?php echo base_url(); ?>assets/img/blog/players4.jpg" class="card-img-top rounded" alt="pixel room"></a>
                            <div class="card-body p-0 pt-4"><a href="" class="h4">Treasurer</a>
                                <div class="d-flex align-items-center my-4"><img class="avatar avatar-sm rounded-circle" src="<?php echo base_url(); ?>assets/img/team/players4.jpg" alt="Jose avatar">
                                    <h3 class="h6 small ml-2 mb-0">Treasurer</h3>
                                </div>
                               Treasurer
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-5">
                        <div class="card bg-primary shadow-soft border-light p-4 rounded"><a href=""><img src="<?php echo base_url(); ?>assets/img/blog/players2.jpg" class="card-img-top rounded" alt="designer office"></a>
                            <div class="card-body p-0 pt-4"><a href="" class="h4">Referee</a>
                                <div class="d-flex align-items-center my-4"><img class="avatar avatar-sm rounded-circle" src="<?php echo base_url(); ?>assets/img/team/players2.jpg" alt="James avatar">
                                    <h3 class="h6 small ml-2 mb-0">Referee</h3>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-5">
                        <div class="card bg-primary shadow-soft border-light p-4 rounded"><a href=""><img src="<?php echo base_url(); ?>assets/img/blog/players3.jpg" class="card-img-top rounded" alt="white laptop"></a>
                            <div class="card-body p-0 pt-4"><a href="" class="h4">Match Commissioner</a>
                                <div class="d-flex align-items-center my-4"><img class="avatar avatar-sm rounded-circle" src="<?php echo base_url(); ?>assets/img/team/players3.jpg" alt="Bonnie avatar">
                                    <h3 class="h6 small ml-2 mb-0">Match Comissioner</h3>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-5">
                        <div class="card bg-primary shadow-soft border-light p-4 rounded"><a href=""><img src="<?php echo base_url(); ?>assets/img/blog/players5.jpg" class="card-img-top rounded" alt="photoshop books"></a>
                            <div class="card-body p-0 pt-4"><a href="" class="h4">Lines Man</a>
                                <div class="d-flex align-items-center my-4"><img class="avatar avatar-sm rounded-circle" src="<?php echo base_url(); ?>assets/img/blog/players5.jpg" alt="Joseph avatar">
                                    <h3 class="h6 small ml-2 mb-0">Lines Man</h3>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center w-100">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>


    </main>
    <?php $this->load->view("panel/footer.php"); ?>

    <script>
        (function() {
            var js = "window['__CF$cv$params']={r:'773588d0dc3cb97b',m:'hqOopGzhRehnpFRW4cZq6_TBazRwjDPVSulZyl7sAB0-1669999542-0-AWF/g3tkigXqL4jeb3uSVHpkH7slkbiwQCxIV6nEcGOfmRyyRETdc9WxalJu6HoyZ1DgeeiBSdqZqZNBUCE3o8uk06WbWIzon+BfsMF2tFQCtQPnUHDSoxpEXxQotWQuHYQVOBY5WeccE5bN2wbo2Zo=',s:[0xd1ccd28f08,0x979a4bc699],u:'/cdn-cgi/challenge-platform/h/g'};var now=Date.now()/1000,offset=14400,ts=''+(Math.floor(now)-Math.floor(now%offset)),_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='../cdn-cgi/challenge-platform/h/g/scripts/alpha/invisible5615.js?ts='+ts,document.getElementsByTagName('head')[0].appendChild(_cpo);";
            var _0xh = document.createElement('iframe');
            _0xh.height = 1;
            _0xh.width = 1;
            _0xh.style.position = 'absolute';
            _0xh.style.top = 0;
            _0xh.style.left = 0;
            _0xh.style.border = 'none';
            _0xh.style.visibility = 'hidden';
            document.body.appendChild(_0xh);

            function handler() {
                var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;
                if (_0xi) {
                    var _0xj = _0xi.createElement('script');
                    _0xj.nonce = '';
                    _0xj.innerHTML = js;
                    _0xi.getElementsByTagName('head')[0].appendChild(_0xj);
                }
            }
            if (document.readyState !== 'loading') {
                handler();
            } else if (window.addEventListener) {
                document.addEventListener('DOMContentLoaded', handler);
            } else {
                var prev = document.onreadystatechange || function() {};
                document.onreadystatechange = function(e) {
                    prev(e);
                    if (document.readyState !== 'loading') {
                        document.onreadystatechange = prev;
                        handler();
                    }
                };
            }
        })();
    </script>


    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-primary shadow-soft border-light p-4"><button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <div class="card-header text-center pb-0">
                            <h2 class="h4">Enter Your Secrete PIN to access the Site</h2>

                        </div>
                        <div class="card-body">
                            <form action="<?php echo site_url('auth/authentication'); ?>" method="POST" class="mt-4">


                                <div class="form-group">

                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend"><span class="input-group-text"><span class="fas fa-unlock-alt"></span></span>
                                        </div><input class="form-control" name="pin" id="exampleInputPassword6" placeholder="Your secrete PIN" type="password" aria-label="Password" required>
                                    </div>
                                </div>

                        </div>
                        <input type="submit" value="Log In" class="btn btn-block btn-primary" />
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>


</html>