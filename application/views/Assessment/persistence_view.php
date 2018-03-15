<?php include_once('Lib/layout/header.php');?>


</head>
	<body>
		<!-- Progress Indicator -->
		<div class = "container">
			<div class="row">
	       		<?php include_once('Lib/layout/progress.php');?>
	       	</div>
	    </div>

		<!-- End of Progress Indicator -->
		<div class="content container quiz-container">
			<div class="row">
				<div class="col-lg-12 content1-custom form-group">
					
					<div class="row header-blueP"><!-- This div is for the header -->
						<div class="col-lg-12">
							<h1>  								
								<span class = "glyphicon glyphicon-question-sign"></span>
								Persistence
		       				</h1>	
	       				</div>
	       			</div>

					<div class="row"><!-- This div must be for the forms or chart for the user's view -->
						
						<div class="col-lg-12">
							<form method="post" action="<?php echo base_url('index.php/Assessment/prs'); ?>">
								<h2> Are you experiencing the following symptoms for the last six months?</h2>
			       				<div class = "row">
			       					<div class="col-lg-12">
										<h4><?php foreach ($symptoms as $key => $value) {
												echo $symptoms[$key]. ",";
											} ?>
										</h4>
									</div>
									<div class="col-lg-6">
										<div class="inner-addon left-addon">
											<i class="glyphicon glyphicon-chevron-left"></i>
											<input type="submit" name="prs_button" class="btn btn-m btn-success form-control" value="No" style="float:right">
										</div>
									</div>

									<div class="col-lg-6">
				       					<div class="inner-addon right-addon">
											<i class="glyphicon glyphicon-chevron-right"></i>
											<input type="submit" name="prs_button" class="btn btn-md btn-success form-control" value="Yes" style="float:right">
										</div>	
									</div>
								</div>
		       				</form>	
	       				</div>

					</div>
					<br>
				</div>

			</div>
		</div>

<!-- ====================================FOOTER HERE=================================================== -->
	<?php include_once('Lib/layout/footer.php');?>
<!-- ====================================FOOTER HERE=================================================== -->