<?php if ($url_array[1] == 'index' || $url_array[1] == null || $url_array[1] == 'errors'): ?>
<?php else: ?>
    <style>
        @media all and (min-width: 700px) {
            #copy_right{
                text-align:center; font-family:arial; font-size:14px; color: black; line-height:60px;
            }
        }
    </style>
    <div class="row" id="copy_right">
        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 text-center">
            Copyright &copy; 2017 Potent Organics. All Rights Reserved  
        </div>
    </div>

<?php endif; ?>

</body>
</html>