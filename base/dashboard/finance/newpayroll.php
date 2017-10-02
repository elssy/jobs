
<?php
session_start();

if(!isset($_SESSION['GuyJob3']))
{
  header('location:../index.php');
}

require_once '../core.php';

$result = mysql_query('SELECT * FROM `users`');



?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <title>New Payroll | Finance Dashboard </title>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
    // Hide textarea using its div
    $('#txt').hide();

    $('input[type=radio]').change(function() {       
        if(this.value == "send_to_production"){
           $('#txt').show(); 
        }else{
            $('#txt').hide();
        }
    });
  });

  </script>
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
<?php require_once'nav.php'; ?>
  <!-- Page -->
  <div class="page">

    <div class="page-content">
      <!-- Panel Table Tools -->
      <div class="panel" style="width: 75%; padding-left: 50px;padding-right: 50px;">
        <header class="panel-heading">
          <h3 class="panel-title" style="padding-left: 12px;">Add a New Payroll</h3>
          <hr>
        </header>
        <div class="panel-body" >
          <div class="row row-lg">
            <form class="" style="width: 100%;">
                    <div class="row">
                      <div class="form-group col-sm-12 ">
                        <label>Select Employee</label>
                          <select class='form-control' id="user" style='height: 35px;'>";

                           <?php while ($row = mysql_fetch_array($result)) { ?>

                              <option value="<?php echo $row['1']?>"><?php echo $row['1']?></option>";

                            <?php }?>

                          </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-sm-6">
                          <input type="number" class="form-control" name="grosspay" id="grosspay" placeholder="Gross Pay" autocomplete="off">
                      </div>
                      <div class="form-group col-sm-6">
                          <input type="number" class="form-control" name="commission" id="commission" placeholder="Commission" autocomplete="off">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-sm-6">
                          <input type="number" class="form-control" name="sacco" id="sacco" placeholder="SACCO" autocomplete="off">
                      </div>
                      
                      <div class="form-group col-sm-6">
                          <input type="number" class="form-control" name="loan" id="loan" placeholder="Loan" autocomplete="off">
                      </div>
                    </div>
                    
                    
                    <div class="form-group">
                      <div id="responsesection"></div>
                       <a href="#" type="submit" id="payroll" class="btn btn-primary">Submit Payroll</a>
                    </div>
          </form>

          </div>

      </div>
      <!-- End Panel Table Tools -->
      </div>
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
    $('#payroll').click(function()
    {
      $('#payroll').html('<i class="fa fa-refresh fa-spin"></i> Please wait');

      var user         =  $('#user').val();
      var grosspay     =  $('#grosspay').val();
      var commission   =  $('#commission').val();
      var sacco        =  $('#sacco').val();
      var loan         =  $('#loan').val();
      
      $.post("submitpayroll.php",
        {
          user:user,
          grosspay:grosspay,
          commission:commission,
          sacco:sacco,
          loan:loan,
          
        },function(ajaxresponse){

          $('#responsesection').html(ajaxresponse);
          $('#payroll').html('Submit Payroll');

          if (ajaxresponse == "<h5 style='color:green'><i class='fa fa-check-circle'>Payroll has been submitted.</h5>") 
          { 
            location.reload();
          }
        });
    });
  });
</script>
  
  
</body>
</html>