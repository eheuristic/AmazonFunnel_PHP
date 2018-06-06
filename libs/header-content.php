<style>
    .hw_head_left{
        padding-left: 15px!important;
        padding-right: 15px!important;
    }	a:hover{		color:rgb(182,224,0);	}
    @media screen and (max-width: 991px) {
        #img-head-mob {
            display: block;
        }

        #img-head-desk {
            display: none;
        }
        .hw_head_left{text-align: center !important;margin-top: 10px;}
    }
    @media screen and (min-width: 992px) {
        #img-head-mob {
            display: none;
        }

        .hw_head_left{text-align: left !important;margin-top: 10px;}

    }
    .img-responsive {
        margin: 0 auto;
    }

    .row{margin:0px !important;}
    /*    *{padding-right: 0px; padding-left:  0px;}*/
    @media (max-width: 576px){
        .hw_head_left{
            margin-top:0px;
        }
    }
	body{
		background-color:#F7F7F7;
	}
	.contact{
		font-weight:bold;
	}

</style>
<?php
if (basename($_SERVER['PHP_SELF']) != 'index.php') {
    ?>
    <div class="row text-center" style="background-color:white">
        <div class="col-lg-4 col-md-6 col-sm-12 col-lg-offset-1">
            <img class="img-responsive" id="img-head-desk" src="logo-header-01.png"/>
            <img class="img-responsive" id="img-head-mob" src="logo-header-02.png"/>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 col-lg-offset-3 hw_head_left">
            <div class="row">
                <div class="col-12">
                    <img src="phone.png" class="img-responsive1"/>
                    <span class="h4 contact"><a href="tel:+1844-987-FREE" style="text-decoration:none;">844-987-FREE</a></span>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <img src="email.png" class="img-responsive1"/>
                    <span class="h4 contact"><a href="mailto:free@potentorganics.com" style="text-decoration:none;/*color:#462F28!important;*/">free@potentorganics.com</a></span>
                </div>
            </div>
        </div>
    </div>

    <?php
}
?>
