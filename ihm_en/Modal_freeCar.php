<?php
session_start();?>
<head>

    <title>Your reservation</title>
    <link rel="stylesheet" type="text/css" href="css/confirm.css">  
</head>
<!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background: url(img/freeCar.png) no-repeat center fixed; " >
                            <div class="modal-dialog modal-dialog-center " style="  margin-top: 20%;" >
                                <div class="modal-content"    >
                                    <div class="modal-header"style="background-color: #f2f2f2 ">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel" style="color:#284777">Would you like to get a car from the airport to your guest house for free?</h4>
                                    </div>
                                    <div class="modal-body  ">
                                        <a href="freeCar_Formulaire.php"><button class="btn btn-primary  btn-lg" style="background-color:#284777" >Yes</button></a>
                                        <a href="customer_infos.php"><button  class="btn btn-primary btn-lg" style="background-color:#284777">No</button></a>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->