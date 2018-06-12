<div class="row text-center">
    <div class="col-12 text-center checkout-wrap">
        <ul class="checkout-bar">

            <?php
//            $file_name = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);//commented on 5-6-2018 a
            $file_name = $url_array[1];
            $step2class = '';
            $step3class = '';
            $step4class = '';
            $step5class = '';
            $step = 1;
            /* if ($file_name == 'howlong') {
              $step = 2;
              echo ' <style>
              ul.checkout-bar li:before {
              height: 25px!important;
              left: 0%;
              line-height: 25px;
              position: absolute;
              top: -7px;
              width: 25px!important;
              z-index: 99;
              }
              ul.checkout-bar li:nth-child(2):before {
              content:url('.IMG_URL.'check3.png);


              }
              ul.checkout-bar li:nth-child(3):before {
              content:"2";

              }
              ul.checkout-bar li:nth-child(4):before {
              content: "3";
              }
              ul.checkout-bar li:nth-child(5):before {
              content: "4";
              }

              </style><li class="visited">
              Select a Product
              </li><li class="active"> Your Experience</li>
              <li class="next">Share Feedback
              </li>
              <li class="next">Confirm Address
              </li>';
              } */
            if ($file_name == 'products') {
                $step = 2;
                echo ' <style>
     
    ul.checkout-bar li:nth-child(2):before {
        content:"1";
        
    }
    ul.checkout-bar li:nth-child(3):before {
        content:"2";

    }
    ul.checkout-bar li:nth-child(4):before {
        content: "3";
    }
    ul.checkout-bar li:nth-child(5):before {
        content: "4";
    }
   
        </style><li class="active">
                Select a Product
            <li class="next">Share Experience
            </li>
            <li class="next">Confirm Address
            </li>';
            }
            if ($file_name == 'experience') {
                $step = 3;
                echo ' <style>
 
ul.checkout-bar li:nth-child(2):before {
  content:url('.IMG_URL .'check3.png);
  
}

ul.checkout-bar li:nth-child(3):before {
  content: "2";
}
ul.checkout-bar li:nth-child(4):before {
  content: "3";
}

        </style><li class="visited">
                Select a Product
            <li class="active">Share Experience
            </li>
            <li class="next">Confirm Address
            </li>';
            }
            if ($file_name == '15-days-not-passed') {
                $step = 3;
                echo ' <style>
ul.checkout-bar li:before {
    height: 29px !important;
    left: 0%;
    line-height: 25px;
    position: absolute;
    top: -7px;
    width: 29px !important;
    z-index: 99;
    }
.checkout-bar li.active:after {
 background-color: red;
 }
ul.checkout-bar li:nth-child(2):before {
  content:url('. IMG_URL .'check3.png);
  
}
ul.checkout-bar li:nth-child(3):before {
    content:url('. IMG_URL .'x3.png);
    background:red!important;
    border:2px solid white;
}
ul.checkout-bar li:nth-child(4):before {
  content: "3";
}
ul.checkout-bar li:nth-child(5):before {
  content: "4";
}

        </style><li class="visited">
                Select a Product
            <li class="next">Share Experience
            </li>
            <li class="next">Confirm Address
            </li>';
            }
            if ($file_name == 'step_2_3' || $file_name == 'step2-2') {
                $step = 3;
                echo ' <style>
 .checkout-bar li.active:after {
 background-color: red;
 }
ul.checkout-bar li:nth-child(2):before {
  content:url('. IMG_URL .'check3.png);
  
}
ul.checkout-bar li:nth-child(3):before {
    content:url('. IMG_URL .'x3.png);
    background:red!important;
    border:2px solid white;
}
ul.checkout-bar li:nth-child(4):before {
  content: "3";
}
ul.checkout-bar li:nth-child(5):before {
  content: "4";
}


        </style><li class="visited">
                Select a Product
            <li class="next">Share Experience
            </li>
            <li class="next">Confirm Address
            </li>';
            }
            if ($file_name == 'search') {
                echo ' <style>
ul.checkout-bar li:nth-child(2):before {
  content:"1";
  
}
ul.checkout-bar li:nth-child(3):before {
    content:"2";
    
}
ul.checkout-bar li:nth-child(4):before {
  content: "3";
}
ul.checkout-bar li:nth-child(5):before {
  content: "4";
}


        </style><li class="next">
                Select a Product
            <li class="next">Share Experience
            </li>
            <li class="next">Confirm Address
            </li>';
            }
            if ($file_name == 'step5') {
                $step = 4;
                echo ' <style>
                    ul.checkout-bar li.visited:after{
                    left:5%!important;
                    width:104%;}
ul.checkout-bar li:nth-child(2):before {
  content:url('. IMG_URL .'check3.png);
}
ul.checkout-bar li:nth-child(3):before {
    content:url('. IMG_URL .'check3.png);

 
}
ul.checkout-bar li:nth-child(4):before {
      content:url('. IMG_URL .'check3.png);

}
ul.checkout-bar li:nth-child(5):before {
  content: "4";
}


        </style><li class="visited">
                Select a Product
            <li class="next">Share Experience
            </li>
            <li class="next">Confirm Address
            </li>';
            }
            if ($file_name == 'shipping-info') {
                $step = 5;
                echo '<style>
ul.checkout-bar li.visited:after{
                    left:5%!important;
                    width:104%;}
ul.checkout-bar li:nth-child(2):before {
  content:url('. IMG_URL .'check3.png);
}
ul.checkout-bar li:nth-child(3):before {
    content:url('. IMG_URL .'check3.png);

 
}
ul.checkout-bar li:nth-child(4):before {
      content: "3";

}
ul.checkout-bar li:nth-child(5):before {
      content: "4";

}

ul.checkout-bar li:nth-child(4):after {
left:0%!important;
width:105%;
}


        </style> <li class="visited">
                Select a Product
            <li class="visited">Share Experience
            </li>
            <li class="active">Confirm Address
            </li>';
            }
            if ($file_name == 'thankyou') {
                $step = 4;
                echo '<style>
          
ul.checkout-bar li:nth-child(2):before {
  content:url("<?= IMG_URL ?>"check3.png);
}
ul.checkout-bar li:nth-child(3):before {
    content:url("<?= IMG_URL ?>"check3.png);

 
}
ul.checkout-bar li:nth-child(4):before {
      content:url("<?= IMG_URL ?>"check3.png);

}
ul.checkout-bar li:nth-child(5):before {
       content:url("<?= IMG_URL ?>"check3.png);

}


        </style><li class="visited">
                Select a Product
            
            <li class="next">Share Experience
            </li>
            <li class="next">Confirm Address
            </li>';
            }
            ?>

            <!--<li class="">Ready to Ship</li>-->
        </ul>
    </div>
</div>