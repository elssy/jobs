<?php
session_start();

if(!isset($_SESSION['GuyJob6']))
{
  header('location:../index.php');
}

require_once '../core.php';

$query = mysql_query("SELECT * FROM `jobs` WHERE `user`='{$_SESSION["GuyJob6"]}' order by id DESC");

?>

<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <title>Designers Dashboard </title>
  <link rel="apple-touch-icon" href="../../assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="../../assets/images/favicon.ico">
  <!-- Stylesheets -->
  <link rel="stylesheet" href="../../../global/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../../global/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="../../assets/css/site.min.css">
  <!-- Plugins -->
  <link rel="stylesheet" href="../../../global/vendor/animsition/animsition.css">
  <link rel="stylesheet" href="../../../global/vendor/asscrollable/asScrollable.css">
  <link rel="stylesheet" href="../../../global/vendor/switchery/switchery.css">
  <link rel="stylesheet" href="../../../global/vendor/intro-js/introjs.css">
  <link rel="stylesheet" href="../../../global/vendor/slidepanel/slidePanel.css">
  <link rel="stylesheet" href="../../../global/vendor/flag-icon-css/flag-icon.css">
  <link rel="stylesheet" href="../../../global/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../../../global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css">
  <link rel="stylesheet" href="../../../global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css">
  <link rel="stylesheet" href="../../../global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css">
  <link rel="stylesheet" href="../../../global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css">
  <link rel="stylesheet" href="../../../global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css">
  <link rel="stylesheet" href="../../../global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css">
  <link rel="stylesheet" href="../../../global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css">
  <link rel="stylesheet" href="../../assets/examples/css/tables/datatable.css">
  <!-- Fonts -->
  <link rel="stylesheet" href="../../../global/fonts/font-awesome/font-awesome.css">
  <link rel="stylesheet" href="../../../global/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="../../../global/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
  <!--[if lt IE 9]>
    <script src="../../../global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
  <!--[if lt IE 10]>
    <script src="../../../global/vendor/media-match/media.match.min.js"></script>
    <script src="../../../global/vendor/respond/respond.min.js"></script>
    <![endif]-->
  <!-- Scripts -->
  <script src="../../../global/vendor/breakpoints/breakpoints.js"></script>
  <script>
  Breakpoints();
  </script>

    <style type="text/css">
  .notes {
    background-image: -webkit-linear-gradient(white, white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-image: -moz-linear-gradient(white, white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-image: -ms-linear-gradient(white, white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-image: -o-linear-gradient(white, white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-image: linear-gradient(white, white 30px, #ccc 30px, #ccc 31px, white 31px);
    background-size: 100% 31px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    line-height: 31px;
    font-family: Arial, Helvetica, Sans-serif;
    padding: 8px;
}


</style>
</head>
<body class="animsition">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
  <?php require_once 'nav.php'; ?>
  
  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Assigned Jobs</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Jobs</a></li>
        <li class="breadcrumb-item active">Jobs status</li>
      </ol>
      <input type="button" class="btn btn-sm btn-danger" style="margin-top: 10px;" value="Add Job" onclick="window.location.href='addnewjob.php'" />
      
    </div>
    <div class="page-content">
      <!-- Panel Table Tools -->
      <div class="panel">
        <header class="panel-heading">
          <h3 class="panel-title">Action</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped w-full" id="exampleTableTools">
            <thead>
              <tr>
                <th>Date</th>
                <th>Client</th>
                <th>Job Title</th>
                <th>Expected Output</th>
                <th>Status</th>
                <th>Action</th>
                
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Date</th>
                <th>Client</th>
                <th>Job Title</th>
                <th>Expected Output</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </tfoot>
             <tbody>
               
                  <?php
                     while($rdata     = mysql_fetch_array($query)){
                      $id             = $rdata['id'];
                      $date           = $rdata['date'];
                      $client         = $rdata['client'];
                      $job            = $rdata['job'];
                      $expected       = $rdata['expected_output'];
                      $status         = $rdata['status'];


                                               
                  ?>  
                    <tr>
                      <td>
                        <?php echo $date; ?>
                      </td>
                      <td>
                        <?php echo $client; ?>
                      </td>
                      <td>
                        <?php echo $job; ?>
                      </td>
                      <td>
                        <?php echo $expected; ?>
                      </td>
                     
                      <td>
                           <?php 
                          if ($status == 'Completed') {
                            echo "<span class='badge badge-success'>".$status."</span>";
                          } 
                         
                          else if ($status == 'Ongoing')
                          {
                            echo "<span class='badge badge-info'>".$status."</span>";
                          } 
                          else if ($status == 'Onhold')
                          {
                            echo "<span class='badge badge-warning'>".$status."</span>";
                          }

                          else if ($status == 'Cancelled')
                          {
                            echo "<span class='badge badge-danger'>".$status."</span>";
                          }
                           else if ($status == 'Assigned')
                          {
                            echo "<span class='badge badge-dark'>".$status."</span>";
                          }
                        ?>
                      </td> 
                         <td>
                           <?php 

                            if ($status == 'Cancelled') {
                              echo '<button type="button" class="btn btn-default btn-sm" data-toggle="modal"  data-target="#hold'.$id.'">Put On Hold <i class="fa fa-hand-paper-o"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                           <a  class="btn btn-default btn-sm" href="acceptjob.php?id=' . $id . '">Accept Job <i class="fa fa-edit"></i></a>';
                            }
                            else if ($status == 'Assigned' || $status == 'Onhold') {
                              echo '<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#cancel'.$id.'">Cancel Job <i class="fa fa-close"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                           <a  class="btn btn-default btn-sm" href="acceptjob.php?id=' . $id . '">Accept Job <i class="fa fa-edit"></i></a>';
                            }
                            else if ($status == 'Ongoing') {
                              echo '<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#cancel'.$id.'">Cancel Job <i class="fa fa-close"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                              <button type="button" class="btn btn-default btn-sm" data-toggle="modal"  data-target="#hold'.$id.'">Put On Hold <i class="fa fa-hand-paper-o"></i></button>
                           <a  class="btn btn-default btn-sm" href="completejob.php?id=' . $id . '">Complete Job <i class="fa fa-check-circle"></i></a>';

                            } else if ($status == 'Completed') {
                              echo "<span class='badge badge-success'>".$status."</span>";
                            }
                           
                          ?>
                          </td>                         
                    </tr>
                      <!--modal cancel-->
                        <div id="cancel<?php echo $id;?>" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <br><br>
                                <h3 class="modal-title">Cancelling a Job</h3>
                                
                              </div>
                              <hr>
                              <div class="modal-body">
                                <input type="hidden" name="id" id="id<?php echo $id; ?>" value="<?php echo $id; ?>">
                                <textarea cols="60" rows="5" class="notes" id="reason<?php echo $id;?>" placeholder="Enter Reason for cancelling"></textarea>
                              </div>
                            <hr>
                              <div class="modal-footer" id="listen">
                                      <div id="responsesection<?php echo $id; ?>"></div>
                                      <a href="#" type="submit" id="canceljob<?php echo $id; ?>" value="<?php echo $id;?>" class="btn btn-primary">Cancel Job</a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>

                          </div>
                        </div>


                        <!--modal hold-->
                        <div id="hold<?php echo $id; ?>" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                           <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <br><br>
                                    <h3 class="modal-title">Putting  job on hold</h3>
                                    
                                  </div>
                                  <hr>
                                  <div class="modal-body">
                                    <input type="text" name="id" id="id<?php echo $id;?>" value="<?php echo $id; ?>">
                                    <textarea cols="60" rows="5" class="notes" id="reas<?php echo $id;?>" placeholder="Enter Reason"></textarea>
                                  </div>
                                <hr>
                                  <div class="modal-footer" id="listen2">
                                          <div id="responsesection1<?php echo $id;?>"></div>
                                          <a href="#" type="submit" id="onholdjob<?php echo $id;?>" value="<?php echo $id;?>" class="btn btn-primary">Put on Hold</a>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                          </div>
                        </div>

                  <?php } ?>                                            
              
            </tbody>
          </table>
        
                    
        </div>
      </div>
      <!-- End Panel Table Tools -->
      
    </div>
  </div>
  <!-- End Page -->
  <!-- Footer -->
  <footer class="site-footer">
    <div class="site-footer-legal">Dots & Graphics © 2017. 
    </div>
    
  </footer>
  <!-- Core  -->
  <script src="../../../global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
  <script src="../../../global/vendor/jquery/jquery.js"></script>
  <script src="../../../global/vendor/tether/tether.js"></script>
  <script src="../../../global/vendor/bootstrap/bootstrap.js"></script>
  <script src="../../../global/vendor/animsition/animsition.js"></script>
  <script src="../../../global/vendor/mousewheel/jquery.mousewheel.js"></script>
  <script src="../../../global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
  <script src="../../../global/vendor/asscrollable/jquery-asScrollable.js"></script>
  <script src="../../../global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
  <!-- Plugins -->
  <script src="../../../global/vendor/switchery/switchery.min.js"></script>
  <script src="../../../global/vendor/intro-js/intro.js"></script>
  <script src="../../../global/vendor/screenfull/screenfull.js"></script>
  <script src="../../../global/vendor/slidepanel/jquery-slidePanel.js"></script>
  <script src="../../../global/vendor/datatables.net/jquery.dataTables.js"></script>
  <script src="../../../global/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../../../global/vendor/datatables.net-fixedheader/dataTables.fixedHeader.js"></script>
  <script src="../../../global/vendor/datatables.net-fixedcolumns/dataTables.fixedColumns.js"></script>
  <script src="../../../global/vendor/datatables.net-rowgroup/dataTables.rowGroup.js"></script>
  <script src="../../../global/vendor/datatables.net-scroller/dataTables.scroller.js"></script>
  <script src="../../../global/vendor/datatables.net-select-bs4/dataTables.select.js"></script>
  <script src="../../../global/vendor/datatables.net-responsive/dataTables.responsive.js"></script>
  <script src="../../../global/vendor/datatables.net-responsive-bs4/responsive.bootstrap4.js"></script>
  <script src="../../../global/vendor/datatables.net-buttons/dataTables.buttons.js"></script>
  <script src="../../../global/vendor/datatables.net-buttons/buttons.html5.js"></script>
  <script src="../../../global/vendor/datatables.net-buttons/buttons.flash.js"></script>
  <script src="../../../global/vendor/datatables.net-buttons/buttons.print.js"></script>
  <script src="../../../global/vendor/datatables.net-buttons/buttons.colVis.js"></script>
  <script src="../../../global/vendor/datatables.net-buttons-bs4/buttons.bootstrap4.js"></script>
  <script src="../../../global/vendor/asrange/jquery-asRange.min.js"></script>
  <script src="../../../global/vendor/bootbox/bootbox.js"></script>
  <!-- Scripts -->
  <script src="../../../global/js/State.js"></script>
  <script src="../../../global/js/Component.js"></script>
  <script src="../../../global/js/Plugin.js"></script>
  <script src="../../../global/js/Base.js"></script>
  <script src="../../../global/js/Config.js"></script>
  <script src="../../assets/js/Section/Menubar.js"></script>
  <script src="../../assets/js/Section/GridMenu.js"></script>
  <script src="../../assets/js/Section/Sidebar.js"></script>
  <script src="../../assets/js/Section/PageAside.js"></script>
  <script src="../../assets/js/Plugin/menu.js"></script>
  <script src="../../../global/js/config/colors.js"></script>
  <script src="../../assets/js/config/tour.js"></script>
  <script>
  Config.set('assets', '../../assets');
  </script>
  <!-- Page -->
  <script src="../../assets/js/Site.js"></script>
  <script src="../../../global/js/Plugin/asscrollable.js"></script>
  <script src="../../../global/js/Plugin/slidepanel.js"></script>
  <script src="../../../global/js/Plugin/switchery.js"></script>
  <script src="../../../global/js/Plugin/datatables.js"></script>
  <script src="../../assets/examples/js/tables/datatable.js"></script>
  

  <script type="text/javascript">
      $(document).ready(function()
      {
        $('#listen a').click(function()
        {
          var id      = $(this).attr("value");
          var reason  = $('#reason'+id).val();


          $('#canceljob'+id).html("<i class='fa fa-circle-o-notch fa-spin'></i> Please Wait");

          $.post("cancel.php",
          {
             id:id,
             reason:reason
          },
          function(ajaxresponse)
          {
            $('#responsesection'+id).html(ajaxresponse);
            if (ajaxresponse == "<h5 style='color:green'><i class='fa fa-check-circle'>Job cancelled</h5>") 
            {
              location.reload();
            }
          });
        });
        
      });
      

</script>

 <script type="text/javascript">
      $(document).ready(function()
      {
        $('#listen2 a').click(function()
        {
          var id      = $(this).attr("value");
          var reason  = $('#reas'+id).val();


          $('#onholdjob'+id).html("<i class='fa fa-circle-o-notch fa-spin'></i> Please Wait");

          $.post("on-hold.php",
          {
             id:id,
             reason:reason
          },
          function(ajaxresponse)
          {
            $('#responsesection1'+id).html(ajaxresponse);
            if (ajaxresponse == "<h5 style='color:green'><i class='fa fa-check-circle'>Job Onhold</h5>") 
            {
              location.reload();
            }
          });
        });
        
      });
      

</script>

</body>
</html>