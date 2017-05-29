<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie ie9" lang="en" class="no-js"> <![endif]-->
<!--[if !(IE)]><!-->
<html lang="en">
    <head>
        <?php include 'model/header.php'; ?>
    </head>
    <body>        
        <div id="wrapper">                        
            <?php
            $main = new Main();
            $main->getNavHead();
            ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <?php $main->getPage(); ?>                    
                </div>                                
            </div>                    
            <footer>
                <span class="text-capitalize">
                    CA-IT Dev. &COPY; <?= date('Y') ?>

                </span>    
            </footer>        
        </div>
    </body>
</html>