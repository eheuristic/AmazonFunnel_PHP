<?php

class ErrorsController {

    public $title = "Potent Organics";
    public $is_mobile;

    public function __construct($is_mobile) {
        $this->is_mobile = $is_mobile;
    }

    public function index() {
        $is_mobile = $this->is_mobile;
         include BASE_PATH . "/libs/hotjar.php";
        ?>
        <script type="text/javascript">
            function MM_swapImgRestore() { //v3.0
              var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
            }
            function MM_preloadImages() { //v3.0
              var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
                var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
                if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
            }

            function MM_findObj(n, d) { //v4.01
              var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
                d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
              if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
              for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
              if(!x && d.getElementById) x=d.getElementById(n); return x;
            }

            function MM_swapImage() { //v3.0
              var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
               if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
            }
        </script>
        <?php
                if(!isset($_SESSION)){  session_start();  }
                $url_array = explode("/", $_SERVER['REQUEST_URI']);

            if(isset($url_array[3])):
                if(isset($url_array[3])){
                        if($url_array[3] == 1){
                            $msg = 'Try after 2 Minutes.';
                            unset($url_array[3]);
                        }elseif ($url_array[3] == 2){
                            $msg = 'You already get bottle for this Product.';
                            unset($url_array[3]);
                        }elseif ($url_array[3]== 3){
                            $msg = 'Getting incorrect data.';
                            unset($url_array[3]);
                        }else{ $msg = 'Have been actively using our product for 15 days or more.'; }
                }else{ $msg = 'Have been actively using our product for 15 days or more.'; }
            else:
                if(isset($_SESSION['error'])){
                        if($_SESSION['error'] == 1){
                            $msg = 'Try after 2 Minutes.';
                            unset($_SESSION['error']);
                        }elseif ($_SESSION['error'] == 2){
                            $msg = 'You already get bottle for this Product.';
                            unset($_SESSION['error']);
                        }elseif ($_SESSION['error'] == 3){
                            $msg = 'Getting incorrect data.';
                            unset($_SESSION['error']);
                        }else{ $msg = 'Have been actively using our product for 15 days or more.'; }
                }else{ $msg = 'Have been actively using our product for 15 days or more.'; }
            endif;
            ?>

        <?php 
        
        require_once 'pages/errors/index.php';
        return $this->title;
    }

}
