<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["id_usuario"])){ 
?>

	<?php require_once("../MainHead/head.php");?>
	<title>Educo : Consultar CAP "Niños"</title>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/4.1.2/papaparse.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.11/c3.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pivottable/2.14.0/pivot.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/pivottable/2.14.0/pivot.min.css">
 <link rel="stylesheet" type="text/css" href="../../node_modules/pivottable/dist/subtotal.css">
 <script type="text/javascript" src="../../node_modules/pivottable/dist/pivot.js"></script>
<script type="text/javascript" src="../../node_modules/pivottable/dist/gchart_renderers.js"></script>
<script type="text/javascript" src="../../node_modules/pivottable/dist/plotly_renderers.js"></script>
<script type="text/javascript" src="../../node_modules/pivottable/dist/export_renderers.js"></script>
<script type="text/javascript" src="../../node_modules/pivottable/dist/subtotal.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>


<body class="with-side-menu">

    <?php require_once("../MainHeader/header.php");?>

    <div class="mobile-menu-left-overlay"></div>
    
    <?php require_once("../MainNav/nav.php");?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">

			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Consultar CAP "Niños"</h3>
							<ol class="breadcrumb breadcrumb-simple">
							<li><a href="../Home/index.php">Inicio</a></li>
								<li class="active">Consultar CAP "Niños"</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<div id="output" style="margin: 50px;"></div>
                  <script type="text/javascript">
                    google.load("visualization", "1", {packages:["corechart", "charteditor"]});
                    jQuery.noConflict()(function ($) {
                    var dataClass = $.pivotUtilities.SubtotalPivotData;

                    var derivers = $.pivotUtilities.derivers;
                    var aggregators = $.extend($.pivotUtilities.subtotal_aggregators, $.pivotUtilities.aggregators)
                    var renderers = $.extend(
                            $.pivotUtilities.renderers,
                            $.pivotUtilities.gchart_renderers,
                            $.pivotUtilities.plotly_renderers,
                            $.pivotUtilities.c3_renderers,
                            $.pivotUtilities.d3_renderers,
                            $.pivotUtilities.export_renderers,
                            $.pivotUtilities.subtotal_renderers
                            );

                    Papa.parse('ninos.csv', {
                            download: true,
                            skipEmptyLines: true,
                            complete: function(parsed){
                                $("#output").pivotUI(parsed.data, {
                                    aggregators: aggregators,
                                    renderers: renderers,
                                    aggregatorName: "Count",
                                    dataClass: dataClass,
                                    vals: [""],
                                    rows: ["fecha","Sexo","nombre"], cols: ["Edad"],
                                    rendererName: "Table With Subtotal",
                                    rendererOptions: {
                                      table: {
                                          eventHandlers: {
                                              "click": function(e, value, filters, pivotData){
                                                  var names = [];
                                                  pivotData.forEachMatchingRecord(filters,
                                                      function(record){ names.push(record.Edad); });
                                                  alert(names.join("\n"));
                                              }
                                         }
                                      },
                                      plotly: {width: 500}
                                      
                                  }

                                },'es');
                            }
                        });
                     });
                    </script>
			</div>

		</div>
	</div>

</body>


                  
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>