<?php include_once('Lib/layout/header.php');?>


</head>
	<body>
		<div class="quiz-background">
		<!-- Progress Indicator -->
		<div class = "container">
			<div class="row">
	       		<?php include_once('Lib/layout/progress.php');?>
	       	</div>
	    </div>
		<!-- End of Progress Indicator -->

		<!-- ================================Container================================ -->
		<div class="container content">
			<div class="row">
				<div class="col-lg-12 content1-custom form-group">
					
					<div class="row header-blueP"><!-- This div is for the header -->
						<div class="col-lg-12">
							<h1>
								<span class = "glyphicon glyphicon-scale"></span>
								Welcome to the Body Mass Index Calculator
								<a href="<?php echo site_url('Assessment') ?>">
									<button class = "btn btn-md btn-success" type = "button" style="float:right">Proceed
		       				 		<span class = "glyphicon glyphicon-chevron-right"></span>
		       						</button>
		       					</a><br>
							</h1>	
	       				</div>
	       			</div>

					<div class="row"><!-- This div must be for the forms or chart for the user's view -->
						
						<div class="col-lg-5 form-group">
							<form class="bmiForm" method="post" action="<?php echo base_url('index.php/Assessment/post_bmi'); ?>">
								<h3>Forms Goes Here!</h3>
								<dir class="row">
									<input class="form-control" type="number" min="0" name="weight" placeholder="How much do you weigh? " value="<?php echo $weight ?>"><!-- values must like be in docu -->
									<select name="weightType" step="0.01" class="form-control scaleWeight">
		 							    <option value="kg">(kg) Kilogram</option>
		                                <option value="lb">(lb) Pound</option>
	  								</select>
  								</dir>
								<br>
								<dir class="row">
								<input class="form-control" step="0.01"  type="number" min="0" name="height" placeholder="How Tall are you? " value="<?php echo $height ?>"><!-- values must be like in docu -->
									<select name="heightType" class="form-control scaleWeight">
		 							    <option value="cm">(cm) Centimeter</option>
		                                <option value="ft">(ft) Feet</option>
		  							</select>
								</dir>
								<br>
								<div class="row calculate">
									<input onclick="alert('BMI Saved');"  type="Submit" name="calculate" value="Calculate" class="btn btn-md btn-success form-control calculate">
								</div>
	       					</form>
						</div>

						<div class="col-lg-7  bmi-container form-group"><!-- This div must be for the interpretations and result -->
							<form class="bmiForm" method="post" action="<?php echo base_url('index.php/Assessment/post_bmi'); ?>">
								<h3>Result</h3>
								<input class="form-control" type="text" name="bmiScore" placeholder="Score" value="<?php echo round($result_bmi,2); ?> Body Mass Index" readonly="">
								<br>
								<input class="form-control" type="text" name="bmiIpt" placeholder="Score Interpretation" value="<?php echo $bmi_eval[1] ?>" readonly="">
								<br>

								<!-- ================================BMI CHART================================ -->
								<div class="row">
									<div class="col-lg-12">
										  <script type="text/javascript">
											window.onload = function () {

											var chart = new CanvasJS.Chart("chartContainer", {
												theme: "light1", // "light2", "dark1", "dark2"
												animationEnabled: true, // change to true		
												title:{
													text: "Body Mass Index Result"
												},
												toolTip:{   
													content: "{name}: {y}"      
												},
												axisY:{
											       	maximum: 50,
											       	crosshair: {
														enabled: true
													} //comment this to show numeric values
											    },
											    axisX:{
											       title: " ",
											       tickLength: 0,
											       margin:0,
											       lineThickness:0,
											       valueFormatString:"" //comment this to show numeric values
											    },
												data: [
												{
													// Change type to "bar", "area", "spline", "pie",etc.
													type: "bar",
													color: "<?php echo $bmi_eval[0] ?>",
													name: "<?php echo $bmi_eval[1] ?>",
													dataPoints: [
														{ label: " ",  y: <?php echo round($result_bmi,2) ?> }
													]
												}
												]
											});
											chart.render();

											}
											</script>

											<div id="chartContainer" style="width: 100%; height: 175px;"></div>
									</div>
								</div>
								<!-- ================================END of BMI  	 Chart================================ -->
								<br>

								<!-- Scales -->
							       	<div class="progress">
									  <div class="progress-bar" role="progressbar" style="width:25%; background:#12e5d6; color: black;">
									    UnderWeight
									  </div>
									  <div class="progress-bar" role="progressbar" style="width:25% ; background:#12e551;color: black;">
									    Normal
									  </div>
									  <div class="progress-bar" role="progressbar" style="width:25% ; background:#e0dd3c;color: black;">
									    Overweight
									  </div>
									  <div class="progress-bar" role="progressbar" style="width:25% ; background:#f71616;color: black;">
									    Obese
									  </div>
									</div>
								<!-- Scales -->		
							</form>
						</div>

					</div>

				</div>

			</div>
		</div>
		<!-- ================================END of Container================================ -->
		</div>
<!-- ====================================FOOTER HERE=================================================== -->
	<?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->