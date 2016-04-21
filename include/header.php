<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>BrandMeister Dashboard</title>
    <meta name="author" content="PD0ZRY (Rudy)">
    <!-- end: Meta -->
    
    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->
    
    <!-- start: CSS -->
    <link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link id="base-style" href="css/style.css" rel="stylesheet">
    <link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
    <link href='://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap-switch.min.css" rel="stylesheet">
    <!--<link href="css/query-builder.default.min.css" rel="stylesheet">-->
    <link href="css/query-builder.dark.min.css" rel="stylesheet">

    <!-- end: CSS -->

    <link rel="icon" 
      type="image/png" 
      href="images/brandmeister.png">    

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <link id="ie-style" href="css/ie.css" rel="stylesheet">
    <![endif]-->
    
    <!--[if IE 9]>
        <link id="ie9style" href="css/ie9.css" rel="stylesheet">
    <![endif]-->
        
    <!-- start: Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- end: Favicon -->
    
    <!-- start: JavaScript-->
<?php
if ($config['XmasMode']) {
?>
    <script src="js/snowstorm.js"></script>
    <script>
      snowStorm.flakesMaxActive = 96;    // show more snow on screen at once
      snowStorm.useTwinkleEffect = true; // let the snow flicker in and out of view
    </script>
<?php } ?>
    <script>
     var servers = {};
     function setServerList(_servers) {
       for (index in _servers) {
        servers[_servers[index]['ID']] = _servers[index]['Address'];
       }
       console.log(servers);
     }
    var baseurl = "<?php echo $config['baseurl']; ?>";

    <?php
$js_array = json_encode($config);
echo "var php_config = ". $js_array . ";\n";
echo "var php_lang = ".json_encode($language).";\n";
    ?>

    </script>
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/jquery-migrate-1.0.0.min.js"></script>
    <script src="js/jquery-ui-1.10.0.custom.min.js"></script>
    <script src="js/jquery.ui.touch-punch.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/libs/bootstrap-tooltip.js"></script>
    <script src="js/libs/bootstrap-popover.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src='js/fullcalendar.min.js'></script>
    <script src='js/jquery.dataTables.min.js'></script>
    <script src="js/excanvas.js"></script>
    <script src="js/flot/jquery.flot.min.js"></script>
    <script src="js/flot/jquery.flot.pie.min.js"></script>
    <script src="js/flot/jquery.flot.stack.min.js"></script>
    <script src="js/flot/jquery.flot.resize.min.js"></script>
    <script src="js/flot/jquery.flot.categories.min.js"></script>
    <script src="js/jquery.chosen.min.js"></script>
    <script src="js/jquery.uniform.min.js"></script>
    <script src="js/jquery.cleditor.min.js"></script>
    <script src="js/jquery.noty.js"></script>
    <script src="js/jquery.elfinder.min.js"></script>
    <script src="js/jquery.raty.min.js"></script>
    <script src="js/jquery.iphone.toggle.js"></script>
    <script src="js/jquery.uploadify-3.1.min.js"></script>
    <script src="js/jquery.gritter.min.js"></script>
    <script src="js/jquery.imagesloaded.js"></script>
    <script src="js/jquery.masonry.min.js"></script>
    <!--<script src="js/jquery.knob.modified.js"></script>-->
    <script src="js/jquery.knob.min.js"></script>
    <script src="js/jquery.sparkline.min.js"></script>
    <script src="://registry.dstar.su/api/node.php?callback=setServerList"></script>
    <script src="js/socket.io-1.3.7.js"></script>
    <script src="js/json-to-table.js"></script>
    <script src="js/groups.js"></script>
    <script src="js/group_mapping.js"></script>
    <script src="js/country.js"></script>
    <script src="js/date.format.js" type="text/javascript"></script>        
    <script src="js/highcharts/highcharts.js"></script>
    <script src="js/highcharts/highcharts-3d.js"></script>
    <script src="js/highcharts/modules/exporting.js"></script>
    <script src="js/highcharts/modules/drilldown.js"></script>
    <script src="js/bootstrap-switch.js"></script>
    <script src="js/libs/query-builder.standalone.min.js"></script>
    <script src="js/libs/sql-parser.js"></script>
    <script src="js/config.js"></script>
    <script src="js/bm_common.js"></script>
    <script src="js/lh.js"></script>
    <script src="js/alert.js"></script>
    <script>Highcharts.setOptions({ lang: php_lang['HighCharts']});</script>
    <script src="lang/querybuilder/query-builder.<?php echo $config['lang'];?>.js"></script>
    <!-- end Javascript -->    
</head>
