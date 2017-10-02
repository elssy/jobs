<?php
session_start();

if(!isset($_SESSION['GuyJob3']))
{
  header('location:../index.php');
}

require_once '../core.php';

$id = $_GET['id'];

$query       = mysql_query("SELECT * FROM `payroll` WHERE `id`= '$id'");

              while($rdata  = mysql_fetch_array($query)){
                      $date        = $rdata['date'];
                      $name        = $rdata['name'];
                      $grosspay    = $rdata['grosspay'];
                      $nhif        = $rdata['nhif'];
                      $nssf        = $rdata['nssf'];
                      $paye        = $rdata['paye'];
                      $sacco       = $rdata['sacco'];
                      $loan        = $rdata['loan'];
                      $commission  = $rdata['commission'];
                      $advance     = $rdata['advance'];
                      $netpay      = $rdata['netpay'];

$thismonth  = date('M Y');

$users      = mysql_query("SELECT * FROM `users` WHERE `username`= '$name'");
$info       = mysql_fetch_array($users);
$idno       = $info['idno'];
$designation= $info['designation'];

?>

<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <title>Payslip </title>
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
 
</head>
<body class="animsition">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
  <?php require_once 'nav.php'; ?>
 
  <!-- Page -->
  <div class="page" >
    <div class="page-content" style="margin-top: -50px;">
      <!-- Panel -->
      <div class="panel" style="padding-left: 100px; padding-right: 100px;">
        <div class="panel-body container-fluid">
         
              <h4 style="text-align: center;">Dots & Graphics Ltd | Monthly Payslip</h4>

          <div class="page-invoice-table table-responsive">
            <table class="table table-hover text-right" border="1" >
              <tbody>
                     
                        <tr>
                         <th>Name</th>
                         <td><?php echo $name; ?></td>
                        </tr>
                        <tr>
                         <th>ID Number</th>
                         <td><?php echo $idno; ?></td>
                        </tr>
                        <tr>
                         <th>Designation</th>
                         <td><?php echo $designation; ?></td>
                        </tr>
                        <tr>
                         <th>Month</th>
                         <td><?php echo $thismonth; ?></td>
                        </tr>
                        <tr>
                         <th>Basic Salary</th>
                         <td><?php echo $grosspay; ?></td>
                        </tr>
                        <tr>
                         <th>Other Income</th>
                         <td><?php echo $commission; ?></td>
                        </tr>
                        <tr style="height: 10px; ">
                        </tr>
                        <tr>
                         <th>Gross Pay</th>
                         <td><?php echo $grosspay+$commission; ?></td>
                        </tr>
                        <tr style="height: 10px; ">
                        </tr>
                        <tr>
                         <th>NHIF</th>
                         <td><?php echo $nhif; ?></td>
                        </tr>
                        <tr>
                         <th>NSSF</th>
                         <td><?php echo $nssf; ?></td>
                        </tr>
                        <tr>
                         <th>Paye</th>
                         <td><?php echo $paye; ?></td>
                        </tr>
                        <tr>
                         <th>Advance</th>
                         <td><?php echo $advance; ?></td>
                        </tr>
                        <tr>
                         <th>Miscellanous</th>
                         <td><?php echo $loan; ?></td>
                        </tr>
                        <tr style="height: 10px; ">
                        </tr>
                        <tr>
                         <th>Total Deduction</th>
                         <td><?php echo $nhif+$nssf+$paye+$advance+$loan; ?></td>
                        </tr>
                        <tr style="font-size: 15px;">
                         <th>Net Pay</th>
                         <td><b><?php echo ($grosspay+$commission) - ($nhif+$nssf+$paye+$advance+$loan); ?></b></td>
                        </tr>



                      <?php } ?>                                            
                  
                </tbody>
            </table>
          </div>
          <div class="text-left clearfix">

          <p style="text-align: center;">I can confirm that i have receive my pay for the above month.<br>
          Signature _______________________________________________</p>
            
          </div>
          <div class="text-right">
            <input id="printpagebutton" type="button" class="btn btn-animate btn-animate-side btn-default btn-outline" value="Print" onclick="printpage()"/>
          </div>
        </div>
      </div>
      <!-- End Panel -->
    </div>
  </div>
  <!-- End Page -->
  <!-- Footer -->
  <footer class="site-footer">
    <div class="site-footer-legal" id="hidethis">Dots & Graphics © 2017. 
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
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
    }
</script>


</body>
</html>