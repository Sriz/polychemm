<!-- add table class to all tables -->
<script>
	$(document).ready(function(){
		$('table:visible').addClass('table table-bordered');
	})
</script>
<!-- end of add table class to all tables -->


<!-- global datepicker plugins  -->
<script>
	$(document).ready(function () {
		$('.datepicker').nepaliDatePicker();
	});
	$(document).ready(function () {
		$('#datepicker').nepaliDatePicker();
	});
</script>
<!-- end global datepicker plugins  -->

<?php if(!Configure::read('Application.maintenance')){?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<?php echo $this->Html->link(
			Configure::read('Application.name'),
			AuthComponent::user('id') ? "/home" : "/"
			, array('class' => 'navbar-brand')) ?>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">

		<?php if(AuthComponent::user('id') and AuthComponent::user('role')=='admin'){?>
			<ul class="nav navbar-nav side-nav">
				<li class="<?php echo $this->params->params['controller'] == 'pages' ? 'active' : ''?>"><a href="<?php echo $this->params->webroot?>home"><i class="fa fa-dashboard"></i> Dashboard</a>
				</li>
				<li class="dropdown <?php echo $this->params->params['controller'] == 'users' ? 'active' : ''?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i> Users <b
							class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $this->params->webroot?>users"><i class="fa fa-list"></i> List</a></li>
						<li><a href="<?php echo $this->params->webroot?>users/add"><i class="fa fa-plus"></i> Register new user</a></li>
					</ul>
				</li>
				
				<li class="dropdown <?php echo $this->params->params['controller'] == 'users' ? '' : ''?>"></li>
					<!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i> Settings<b
							class="caret"></b></a> -->


				<!--Mixing Details-->
				<li class="dropdown <?php echo $this->params->params['controller'] == 'mixing' ? 'active' : ''?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i>Calendar-Mixing <b
							class="caret"></b></a>
					<ul class="dropdown-menu">	
						<li><a href="<?php echo $this->params->webroot?>CategoryMaterials/index"><i class="fa fa-list"></i> Category</a></li>
						<li><a href="<?php echo $this->params->webroot?>MixingMaterials/index"><i class="fa fa-list"></i> Materials</a></li>
						<li><a href="<?php echo $this->params->webroot?>DimensionTarget/index"><i class="fa fa-list"></i> Dimension Target</a></li>
						<li><a href="<?php echo $this->params->webroot?>BaseEmbosses/index/sort:id/direction:desc"><i class="fa fa-list"></i> Calendar Colour</a></li>
						<li><a href="<?php echo $this->params->webroot?>CalendarBrands/index/sort:id/direction:desc"><i class="fa fa-plus"></i> Add PVC Brand</a></li>
						<li><a href="<?php echo $this->params->webroot?>CalendarDimensions/index/sort:id/direction:desc"><i class="fa fa-plus"></i> Add PVC Dimension</a></li>
						<li><a href="<?php echo $this->params->webroot?>CalendarTypes/index/sort:id/direction:desc"><i class="fa fa-plus"></i> Add PVC Type</a></li>
						<li><a href="<?php echo $this->params->webroot?>CalendarColours/index/sort:id/direction:desc"><i class="fa fa-plus"></i> Add PVC Colour</a></li>
						<li><a href="<?php echo $this->params->webroot?>CalendarEmbosses/index/sort:id/direction:desc"><i class="fa fa-plus"></i> Add PVC Emboss</a></li>
					</ul>
				</li>
				<!--Mixing Details: End-->

				<!--Printing Details-->
				<li class="dropdown <?php echo $this->params->params['controller'] == 'printing' ? 'active' : ''?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i> Printing <b
							class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $this->params->webroot?>CategoryPrinting/index"><i class="fa fa-list"></i> Category</a></li>
						<li><a href="<?php echo $this->params->webroot?>PrintingPatterns/index"><i class="fa fa-list"></i> Materials</a></li>
						<li><a href="<?php echo $this->params->webroot?>PrintDimensionTarget/index"><i class="fa fa-list"></i> Dimension Target</a></li>
						<li><a href="<?php echo $this->params->webroot?>PrintingData/index/sort:id/direction:desc"><i class="fa fa-list"></i> Printing Colour</a></li>
						<li><a href="<?php echo $this->params->webroot?>PrintingDimensions/index/sort:id/direction:desc"><i class="fa fa-plus"></i> Add Dimension</a></li>
						<li><a href="<?php echo $this->params->webroot?>PrintingColours/index/sort:id/direction:desc"><i class="fa fa-plus"></i> Add Colour</a></li>
					</ul>
				</li>
				<!--Printing Details: End-->

				<!--Rexin Details-->
				<li class="dropdown <?php echo $this->params->params['controller'] == 'rexin' ? 'active' : ''?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i> Rexin <b
							class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $this->params->webroot?>CategoryMixing/index"><i class="fa fa-list"></i> Category</a></li>
						<li><a href="<?php echo $this->params->webroot?>MixingPatterns/index"><i class="fa fa-list"></i> Materials</a></li>
						<li><a href="<?php echo $this->params->webroot?>RexinTarget/index"><i class="fa fa-list"></i> Rexin Target</a></li>
						<li><a href="<?php echo $this->params->webroot?>RexinDropdown/index/sort:id/direction:desc"><i class="fa fa-list"></i> Rexin Colour</a></li>
						<li><a href="<?php echo $this->params->webroot?>RexinBrands/index"><i class="fa fa-plus"></i> Add Brand</a></li>
						<li><a href="<?php echo $this->params->webroot?>RexinColours/index"><i class="fa fa-plus"></i> Add Colour</a></li>
						<li><a href="<?php echo $this->params->webroot?>RexinThicknesses/index"><i class="fa fa-plus"></i> Add Thickness</a></li>
						<li><a href="<?php echo $this->params->webroot?>RexinRpapers/index"><i class="fa fa-plus"></i> Add R.Paper</a></li>
						<li><a href="<?php echo $this->params->webroot?>RexinEmbossings/index"><i class="fa fa-plus"></i> Add Emboss</a></li>
						<li><a href="<?php echo $this->params->webroot?>RexinFabrics/index"><i class="fa fa-plus"></i> Add Fabric</a></li>
							
					</ul>
				</li>
				<!--Rexin Details: End-->

				<!--Lamination Details-->
				<li class="dropdown <?php echo $this->params->params['controller'] == 'laminating' ? 'active' : ''?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i> Lamination <b
							class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $this->params->webroot?>CategoryMixing/index"><i class="fa fa-list"></i>Category</a></li>
						<li><a href="<?php echo $this->params->webroot?>Products/index"><i class="fa fa-plus"></i>Lamination Colour</a></li>
						<li><a href="<?php echo $this->params->webroot?>LaminatingTarget/index"><i class="fa fa-list"></i> Lamination Target</a></li>
					</ul>
				</li>
				<!--Lamination Details: End-->

				<!--Time Loss Details-->
				<li class="dropdown <?php echo $this->params->params['controller'] == 'timelosses' ? 'active' : ''?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i> Loss Reasons <b
							class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $this->params->webroot?>TimeLossReasons"><i class="fa fa-plus"></i> Reasons for Time Loss</a></li>
						<li><a href="<?php echo $this->params->webroot?>LaminatingReasons"><i class="fa fa-plus"></i> Reasons for Print Loss</a></li>
					</ul>
				</li>
				<!--Time Loss Details: End-->

<!--

				<li><a href="<?php echo $this->params->webroot?>PrintingPatterns"><i class="fa fa-th-large"></i> Printing Raw Materials</a></li>
				<li><a href="<?php echo $this->params->webroot?>CategoryPrinting"><i class="fa fa-plus"></i> Printing Material Category</a></li>
				<li><a href="<?php echo $this->params->webroot?>MixingPatterns"><i class="fa fa-th-large"></i> Rexin Raw Materials</a></li>
				<li><a href="<?php echo $this->params->webroot?>CategoryMixing"><i class="fa fa-plus"></i> Rexin Material Category</a></li>
				<li><a href="<?php echo $this->params->webroot?>MixingMaterials"><i class="fa fa-th-large"></i> Mixing Raw Materials</a></li>

				<li><a href="<?php echo $this->params->webroot?>CategoryMaterials"><i class="fa fa-plus"></i> Mixing Material Category</a></li>

				<li><a href="<?php echo $this->params->webroot?>RexinDropdown"><i class="fa fa-plus"></i> Rexin Colour</a></li>
				<li><a href="<?php echo $this->params->webroot?>Products"><i class="fa fa-plus"></i> Lamination Colour</a></li>
				<li><a href="<?php echo $this->params->webroot?>BaseEmbosses"><i class="fa fa-plus"></i> Calendar Colour</a></li>
			
				<li><a href="<?php echo $this->params->webroot?>PrintingData"><i class="fa fa-plus"></i> Printing Colour</a></li>

				<li><a href="<?php echo $this->params->webroot?>TimeLossReasons"><i class="fa fa-plus"></i> Reasons for Time Loss</a></li>
				<li><a href="<?php echo $this->params->webroot?>LaminatingReasons"><i class="fa fa-plus"></i> Reasons for Print Loss</a></li>

				<li><a href="<?php echo $this->params->webroot?>DimensionTarget"><i class="fa fa-plus"></i> Mixing Dimension Target</a></li>

				
				<li><a href="<?php echo $this->params->webroot?>PrintDimensionTarget"><i class="fa fa-plus"></i> Print Dimension Target</a></li>

				<li><a href="<?php echo $this->params->webroot?>LaminatingTarget"><i class="fa fa-plus"></i>Lamination Target</a></li>
				<li><a href="<?php echo $this->params->webroot?>RexinTarget"><i class="fa fa-plus"></i> Rexin Target</a></li>-->


				<li class="dropdown <?php echo $this->params->params['controller'] == 'store' ? 'active' : ''?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i> Store <b
							class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $this->params->webroot?>StoreCategories/index"><i class="fa fa-list"></i> Categories</a></li>
						<li><a href="<?php echo $this->params->webroot?>StoreMaterials/index"><i class="fa fa-plus"></i>Materials</a></li>
						<li><a href="<?php echo $this->params->webroot?>StoreDealers/index"><i class="fa fa-list"></i> Dealers</a></li>
						<li><a href="<?php echo $this->params->webroot?>StoreDealerMaterials/index"><i class="fa fa-list"></i> Assign Material to Dealer</a></li>
						<li><a href="<?php echo $this->params->webroot?>StorePurchases/issue"><i class="fa fa-plus"></i>Purchase Order</a></li>
					</ul>
				</li>

				<li><a href="#"><i class=""></i></a></li>

				
			</ul>
		<?php } ?>
		
		
		
		<?php if(AuthComponent::user('id') and AuthComponent::user('role')=='store'){?>
			<ul class="nav navbar-nav side-nav">
				<li class="<?php echo $this->params->params['controller'] == 'pages' ? 'active' : ''?>"><a href="<?php echo $this->params->webroot?>home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="<?=$this->params->params['controller']=='InventoryIn'?'':'';?>"><a href="<?php echo $this->params->webroot?>InventoryIn/index/sort:date/direction:desc"><i class="fa fa-plus"></i> Inventory In</a></li>
				<li class="<?=$this->params->params['controller']=='StorePurchases'?'':'';?>"><a href="<?php echo $this->params->webroot?>StorePurchases/index/sort:date/direction:desc"><i class="fa fa-plus"></i> Purchase Order</a></li>
				<li class="<?=$this->params->params['controller']=='StorePurchaseRequests'?'':'';?>"><a href="<?php echo $this->params->webroot?>StorePurchaseRequests/issue_requests/sort:date/direction:desc"><i class="fa fa-plus"></i> Request</a></li>
				
				<li class="<?=$this->params->params['controller']=='StorePurchaseRequests'?'':'';?>"><a href="<?php echo $this->params->webroot?>StorePurchases/status/sort:date/direction:desc"><i class="fa fa-plus"></i> Material Stock</a></li>

				
			</ul>
		<?php } ?>
		
		<!--INSPECTION DEPARTMENT-->
		<?php if(AuthComponent::user('id') and AuthComponent::user('role')=='inspection'){?>
			<ul class="nav navbar-nav side-nav">
				<li class="<?php echo $this->params->params['controller'] == 'pages' ? 'active' : ''?>"><a href="<?php echo $this->params->webroot?>home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				
				<li><a href="<?php echo $this->params->webroot?>StorePurchaseRequests/index/sort:date/direction:desc"><i class="fa fa-plus"></i> Store Purchase Requests</a></li>
			</ul>
		<?php } ?>
		<!--END: INSPECTION DEPARTMENT-->
		
		
		<!--gen10kva DEPARTMENT-->
		<?php if(AuthComponent::user('id') and AuthComponent::user('role')=='gen10kva'){?>
			<ul class="nav navbar-nav side-nav">
				<li class="<?php echo $this->params->params['controller'] == 'pages' ? 'active' : ''?>"><a href="<?php echo $this->params->webroot?>home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				
				<li><a href="<?php echo $this->params->webroot?>StorePurchaseRequests/index/sort:date/direction:desc"><i class="fa fa-plus"></i> Store Purchase Requests</a></li>
			</ul>
		<?php } ?>
		<!--END: gen10kva DEPARTMENT-->


		<!--gen180kva DEPARTMENT-->
		<?php if(AuthComponent::user('id') and AuthComponent::user('role')=='gen180kva'){?>
			<ul class="nav navbar-nav side-nav">
				<li class="<?php echo $this->params->params['controller'] == 'pages' ? 'active' : ''?>"><a href="<?php echo $this->params->webroot?>home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				
				<li><a href="<?php echo $this->params->webroot?>StorePurchaseRequests/index/sort:date/direction:desc"><i class="fa fa-plus"></i> Store Purchase Requests</a></li>
			</ul>
		<?php } ?>
		<!--END: gen180kva DEPARTMENT-->

		<!--gen1250kva DEPARTMENT-->
		<?php if(AuthComponent::user('id') and AuthComponent::user('role')=='gen1250kva'){?>
			<ul class="nav navbar-nav side-nav">
				<li class="<?php echo $this->params->params['controller'] == 'pages' ? 'active' : ''?>"><a href="<?php echo $this->params->webroot?>home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				
				<li><a href="<?php echo $this->params->webroot?>StorePurchaseRequests/index/sort:date/direction:desc"><i class="fa fa-plus"></i> Store Purchase Requests</a></li>
			</ul>
		<?php } ?>
		<!--END: gen1250kva DEPARTMENT-->

		<!--boiler DEPARTMENT-->
		<?php if(AuthComponent::user('id') and AuthComponent::user('role')=='boiler'){?>
			<ul class="nav navbar-nav side-nav">
				<li class="<?php echo $this->params->params['controller'] == 'pages' ? 'active' : ''?>"><a href="<?php echo $this->params->webroot?>home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				
				<li><a href="<?php echo $this->params->webroot?>StorePurchaseRequests/index/sort:date/direction:desc"><i class="fa fa-plus"></i> Store Purchase Requests</a></li>
			</ul>
		<?php } ?>
		<!--END: boiler DEPARTMENT-->

		<!--electrical DEPARTMENT-->
		<?php if(AuthComponent::user('id') and AuthComponent::user('role')=='electrical'){?>
			<ul class="nav navbar-nav side-nav">
				<li class="<?php echo $this->params->params['controller'] == 'pages' ? 'active' : ''?>"><a href="<?php echo $this->params->webroot?>home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				
				<li><a href="<?php echo $this->params->webroot?>StorePurchaseRequests/index/sort:date/direction:desc"><i class="fa fa-plus"></i> Store Purchase Requests</a></li>
			</ul>
		<?php } ?>
		<!--END: electrical DEPARTMENT-->


		<!--mechanical DEPARTMENT-->
		<?php if(AuthComponent::user('id') and AuthComponent::user('role')=='mechanical'){?>
			<ul class="nav navbar-nav side-nav">
				<li class="<?php echo $this->params->params['controller'] == 'pages' ? 'active' : ''?>"><a href="<?php echo $this->params->webroot?>home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				
				<li><a href="<?php echo $this->params->webroot?>StorePurchaseRequests/index/sort:date/direction:desc"><i class="fa fa-plus"></i> Store Purchase Requests</a></li>
			</ul>
		<?php } ?>
		<!--END: mechanical DEPARTMENT-->

		<!--office DEPARTMENT-->
		<?php if(AuthComponent::user('id') and AuthComponent::user('role')=='office'){?>
			<ul class="nav navbar-nav side-nav">
				<li class="<?php echo $this->params->params['controller'] == 'pages' ? 'active' : ''?>"><a href="<?php echo $this->params->webroot?>home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				
				<li><a href="<?php echo $this->params->webroot?>StorePurchaseRequests/index/sort:date/direction:desc"><i class="fa fa-plus"></i> Store Purchase Requests</a></li>
			</ul>
		<?php } ?>
		<!--END: office DEPARTMENT-->

		<!--general DEPARTMENT-->
		<?php if(AuthComponent::user('id') and AuthComponent::user('role')=='general'){?>
			<ul class="nav navbar-nav side-nav">
				<li class="<?php echo $this->params->params['controller'] == 'pages' ? 'active' : ''?>"><a href="<?php echo $this->params->webroot?>home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				
				<li><a href="<?php echo $this->params->webroot?>StorePurchaseRequests/index/sort:date/direction:desc"><i class="fa fa-plus"></i> Store Purchase Requests</a></li>
			</ul>
		<?php } ?>
		<!--END: general DEPARTMENT-->


		<!--papertube DEPARTMENT-->
		<?php if(AuthComponent::user('id') and AuthComponent::user('role')=='papertube'){?>
			<ul class="nav navbar-nav side-nav">
				<li class="<?php echo $this->params->params['controller'] == 'pages' ? 'active' : ''?>"><a href="<?php echo $this->params->webroot?>home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				
				<li><a href="<?php echo $this->params->webroot?>StorePurchaseRequests/index/sort:date/direction:desc"><i class="fa fa-plus"></i> Store Purchase Requests</a></li>
			</ul>
		<?php } ?>
		<!--END: papertube DEPARTMENT-->





		<?php if(AuthComponent::user('id') and AuthComponent::user('role')=='printing'){?>
			<ul class="nav navbar-nav side-nav">
				<li class="<?php echo $this->params->params['controller'] == 'pages' ? 'active' : ''?>"><a href="<?php echo $this->params->webroot?>home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				
				<li class="<?php echo $this->params->params['controller'] == 'PrintingShiftreports' ?>"><a href="<?php echo $this->params->webroot?>PrintingShiftreports/index/sort:date/direction:desc"><i class="fa fa-dashboard"></i> Daily Printing Shift </a></li>
				<li class="<?php echo $this->params->params['controller'] == 'TimeLosses' ?>"><a href="<?php echo $this->params->webroot?>TimeLosses/index/sort:nepalidate/direction:desc"><i class="fa fa-dashboard"></i> Time Loss</a></li>
				<li class="<?php echo $this->params->params['controller'] == 'PrintingIssues' ?>"><a href="<?php echo $this->params->webroot?>TblPrintingIssues/index/sort:id/direction:desc"><i class="fa fa-dashboard"></i> Printing Mixing Report</a></li>
				<li class="<?php echo $this->params->params['controller'] == 'ScrapMixing' ?>"><a href="<?php echo $this->params->webroot?>ScrapMixing/index/sort:date/direction:desc"><i class="fa fa-dashboard"></i> Scrap Sent to Mixing</a></li>

				<li><a href="<?php echo $this->params->webroot?>StorePurchaseRequests/index/sort:date/direction:desc"><i class="fa fa-plus"></i> Store Purchase Requests</a></li>
				<li><a href="<?php echo $this->params->webroot?>StorePurchases/status/sort:date/direction:asc"><i class="fa fa-plus"></i> Material Stock</a></li>
			</ul>
		<?php } ?>
		
		<?php if(AuthComponent::user('id') and AuthComponent::user('role')=='scrap'){?>
			<ul class="nav navbar-nav side-nav">
				<li class="<?php echo $this->params->params['controller'] == 'pages' ? 'active' : ''?>"><a href="<?php echo $this->params->webroot?>home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				
				<li class="<?php echo $this->params->params['controller'] == 'ScrapMains' ?>"><a href="<?php echo $this->params->webroot?>TblScrapMains"><i class="fa fa-dashboard"></i> Scrap Report</a></li>
			
				<li><a href="<?php echo $this->params->webroot?>StorePurchaseRequests/index/sort:date/direction:desc"><i class="fa fa-plus"></i> Store Purchase Requests</a></li>
				<li><a href="<?php echo $this->params->webroot?>StorePurchases/status/sort:date/direction:asc"><i class="fa fa-plus"></i> Material Stock</a></li>
				
			</ul>
				</li>
<!--				<li><a href="tables.html"><i class="fa fa-list"></i> Activity</a></li>-->
			</ul>
		<?php } ?>
		
		<?php if(AuthComponent::user('id') and AuthComponent::user('role')=='laminating'){?>
			<ul class="nav navbar-nav side-nav">
				<li class="<?php echo $this->params->params['controller'] == 'pages' ? 'active' : ''?>"><a href="<?php echo $this->params->webroot?>home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				
				<li class="<?php echo $this->params->params['controller'] == 'ProductionShiftreports' ?>"><a href="<?php echo $this->params->webroot?>ProductionShiftreports/index/sort:date/direction:desc"><i class="fa fa-dashboard"></i> Production Shift Report</a></li>
			   <li class="<?php echo $this->params->params['controller'] == 'TimeLosses' ?>"><a href="<?php echo $this->params->webroot?>TimeLosses/index/sort:nepalidate/direction:desc"><i class="fa fa-dashboard"></i> Time Loss</a></li>
			   <li class="<?php echo $this->params->params['controller'] == 'ScrapLamMixing' ?>"><a href="<?php echo $this->params->webroot?>ScrapLamMixing/index/sort:date/direction:desc"><i class="fa fa-dashboard"></i>Scrap Sent to Mixing</a></li>
				
				<li><a href="<?php echo $this->params->webroot?>StorePurchaseRequests/index/sort:date/direction:desc"><i class="fa fa-plus"></i> Store Purchase Requests</a></li>
				<li><a href="<?php echo $this->params->webroot?>StorePurchaseRequests/status/sort:date/direction:asc"><i class="fa fa-plus"></i> Material Stock</a></li>
			</ul>
				</li>
<!--				<li><a href="tables.html"><i class="fa fa-list"></i> Activity</a></li>-->
			</ul>
		<?php } ?>
		
		<?php if(AuthComponent::user('id') and AuthComponent::user('role')=='calender'){?>
			<ul class="nav navbar-nav side-nav">
				<li class="<?php echo $this->params->params['controller'] == 'pages' ? 'active' : ''?>"><a href="<?php echo $this->params->webroot?>home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				
				<li class="<?php echo $this->params->params['controller'] == 'CalenderCprs' ?>"><a href="<?php echo $this->params->webroot?>CalenderCprs/index/sort:id/direction:desc"><i class="fa fa-dashboard"></i> Calendar Production Report</a></li>
				
				<li class="<?php echo $this->params->params['controller'] == 'TimeLosses' ?>"><a href="<?php echo $this->params->webroot?>TimeLosses/index/sort:nepalidate/direction:desc"><i class="fa fa-dashboard"></i> Time Loss</a></li>
				<li class="<?php echo $this->params->params['controller'] == 'CalenderScraps' ?>"><a href="<?php echo $this->params->webroot?>CalenderScraps/index/sort:date/direction:desc"><i class="fa fa-dashboard"></i>Scrap Details</a></li>
				<li><a href="<?php echo $this->params->webroot?>StorePurchaseRequests/index/sort:date/direction:desc"><i class="fa fa-plus"></i> Store Purchase Requests</a></li>
				<li><a href="<?php echo $this->params->webroot?>StorePurchaseRequests/status/sort:date/direction:asc"><i class="fa fa-plus"></i> Material Stock</a></li>
				

						</ul>
				</li>
<!--				<li><a href="tables.html"><i class="fa fa-list"></i> Activity</a></li>-->
			</ul>
		<?php } ?>
		
		<?php if(AuthComponent::user('id') and AuthComponent::user('role')=='mixing'){?>
			<ul class="nav navbar-nav side-nav">
				<li class="<?php echo $this->params->params['controller'] == 'pages' ? 'active' : ''?>"><a href="<?php echo $this->params->webroot?>home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="<?php echo $this->params->params['controller'] == 'ConsumptionStocks' ?>"><a href="<?php echo $this->params->webroot?>TblConsumptionStocks/index"><i class="fa fa-dashboard"> Consumption</i></a></li>
				<li><a href="<?php echo $this->params->webroot?>StorePurchaseRequests/index/sort:date/direction:desc"><i class="fa fa-plus"></i> Store Purchase Requests</a></li>
				<!-- <li><a href="<?php echo $this->params->webroot?>StoreStocks/index/sort:date/direction:desc"><i class="fa fa-plus"></i> Department Stock</a></li> -->
				<li><a href="<?php echo $this->params->webroot?>StorePurchaseRequests/status/sort:date/direction:asc"><i class="fa fa-plus"></i> Material Stock</a></li>
			</ul>
		<?php } ?>
		

		<?php if(AuthComponent::user('id') and AuthComponent::user('role')=='rexin'){?>
			<ul class="nav navbar-nav side-nav">
				<li class="<?php echo $this->params->params['controller'] == 'pages' ? 'active' : ''?>">
					<a href="<?php echo $this->params->webroot?>home"><i class="fa fa-dashboard"></i> Dashboard</a>
				</li>
				<li class="<?php echo $this->params->params['controller'] == 'ConsumptionStocks' ?>">
					<a href="<?php echo $this->params->webroot?>CoatingProductionReport/index/sort:date/direction:desc"><i class="fa fa-dashboard"> Coating Production Report</i></a>
				</li>
				<li class="<?php echo $this->params->params['controller'] == 'ConsumptionStocks' ?>">
					<a href="<?php echo $this->params->webroot?>TblMixingIssues/index"><i class="fa fa-dashboard"> Mixing Report</i></a>
				</li>
				<li class="<?php echo $this->params->params['controller'] == 'ConsumptionStocks' ?>">
					<a href="<?php echo $this->params->webroot?>TimeLosses/index"><i class="fa fa-dashboard">  Time Loss</i></a>
				</li>
				<li><a href="<?php echo $this->params->webroot?>StorePurchaseRequests/index/sort:date/direction:desc"><i class="fa fa-plus"></i> Store Purchase Requests</a></li>
				<li><a href="<?php echo $this->params->webroot?>StorePurchaseRequests/status/sort:date/direction:asc"><i class="fa fa-plus"></i> Material Stock</a></li>

			</ul>
		<?php } ?>


		
		
		
		



		<?php if(AuthComponent::user('id')){?>

		<ul class="nav navbar-nav navbar-right navbar-user">
			<li class="dropdown user-dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo AuthComponent::user('username')?> <b
						class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo $this->params->webroot?>me"><i class="fa fa-user"></i> Profile</a></li>
					<li><a href="<?php echo $this->params->webroot?>me/edit"><i class="fa fa-gear"></i> Settings</a></li>
					<li class="divider"></li>
					<li><a href="<?php echo $this->params->webroot?>logout"><i class="fa fa-power-off"></i> Log Out</a></li>
				</ul>
			</li>
		</ul>
		<?php }?>
	</div>
	<!-- /.navbar-collapse -->
</nav>
<?php } ?>



