<script>
	function change_colour()
	{
		var brand = $('#CoatingProductionReportBrand').val();
		//var r_paper = $('#CoatingProductionReportRPaper').val();
		$('#loadingImage').show();
		var dataString = 'brand=' + brand;
		$.ajax
		({
			type: "POST",
			url: "<?=$base_url;?>CoatingProductionReport/change_colour",
			data: dataString,
			cache: false,
			success: function (html) {
				$("#CoatingProductionReportColour").html(html);
				$('#loadingImage').hide();
			}
		});
	}
	function change_embossing()
	{
		var brand = $('#CoatingProductionReportBrand').val();
		var colour = $('#CoatingProductionReportColour').val();
		$('#loadingImage').show();
		var dataString = 'brand=' + brand+'&colour='+colour;
		$.ajax
		({
			type: "POST",
			url: "<?=$base_url;?>CoatingProductionReport/change_embossing",
			data: dataString,
			cache: false,
			success: function (html) {
				$("#CoatingProductionReportEmbossing").html(html);
				$('#loadingImage').hide();
			}
		});
	}
	function change_r_paper(that)
	{
		var brand = $('#CoatingProductionReportBrand').val();
		var colour = $('#CoatingProductionReportColour').val();
		var embossing = $('#CoatingProductionReportEmbossing').val();

		$('#loadingImage').show();
		var dataString = 'brand=' + brand+'&colour='+colour+'&embossing='+embossing;
		$.ajax
		({
			type: "POST",
			url: "<?=$base_url;?>CoatingProductionReport/change_r_paper",
			data: dataString,
			cache: false,
			success: function (html) {
				$("#CoatingProductionReportRPaper").html(html);
				$('#loadingImage').hide();
			}
		});
	}
	function change_fabric()
	{
		var brand = $('#CoatingProductionReportBrand').val();
		var colour = $('#CoatingProductionReportColour').val();
		var embossing = $('#CoatingProductionReportEmbossing').val();
		var r_paper = $('#CoatingProductionReportRPaper').val();

		$('#loadingImage').show();
		var dataString = 'brand=' + brand+'&r_paper='+r_paper+'&colour='+colour+'&embossing='+embossing;
		$.ajax
		({
			type: "POST",
			url: "<?=$base_url;?>CoatingProductionReport/change_fabric",
			data: dataString,
			cache: false,
			success: function (html) {
				$("#CoatingProductionReportFabric").html(html);
				$('#loadingImage').hide();
			}
		});
	}

	function change_thickness()
	{
		var brand = $('#CoatingProductionReportBrand').val();
		var r_paper = $('#CoatingProductionReportRPaper').val();
		var colour = $('#CoatingProductionReportColour').val();
		var fabric = $('#CoatingProductionReportFabric').val();
		var embossing = $('#CoatingProductionReportEmbossing').val();

		$('#loadingImage').show();
		var dataString = 'brand=' + brand+'&r_paper='+r_paper+'&colour='+colour+'&fabric='+fabric+'&embossing='+embossing;
		$.ajax
		({
			type: "POST",
			url: "<?=$base_url;?>CoatingProductionReport/change_thickness",
			data: dataString,
			cache: false,
			success: function (html) {
				$("#CoatingProductionReportThickness").html(html);
				$('#loadingImage').hide();
			}
		});
	}
</script>

<div class="products form col-md-12">
	<?php echo $this->Html->link(__('List Coating Production Reports'), array('action' => 'index'),['class'=>'btn btn-primary pull-right']); ?>
	<img id="loadingImage" src="http://coding.smashingmagazine.com/wp-content/uploads/2011/11/loading.gif" class="img img-responsive pull-right" style="max-height:50px;max-width:50px;display: none;">
	<br />
	<?php echo $this->Form->create('CoatingProductionReport'); ?>
	<fieldset>
		<legend><?php echo __('Add Coating Production Report'); ?></legend>
		<table class="table">
			<tr>
				<td>Shift</td>
				<td><?=$this->Form->input('shift', ['options'=>['A'=>'A','B'=>'B'],'empty'=>'--choose--','required'=>'required' ,'label'=>false]);?></td>
			</tr>
			<tr>
				<td>Date</td>
				<td><?=$this->Form->input('date', ['required'=>'required' ,'label'=>false,'id'=>'datepicker']);?></td>
			</tr>
			<tr>
				<td>Brand</td>
				<td><?=$this->Form->input('brand', ['options'=>$brands, 'empty'=>'--choose one--','required'=>'required' ,'label'=>false, 'onchange'=>'return change_colour(this);']);?></td>
			</tr>

			<tr>
				<td>Colour</td>
				<td><?=$this->Form->input('colour', ['options'=>[], 'empty'=>'--choose one--','required'=>'required' ,'label'=>false, 'onchange'=>'return change_embossing();']);?></td>
			</tr>

			<tr>
				<td>Embossing</td>
				<td><?=$this->Form->input('embossing', ['options'=>[], 'empty'=>'--choose one--','required'=>'required' ,'label'=>false , 'onchange'=>'return change_r_paper();']);?></td>
			</tr>

			<tr>
				<td>R. Paper</td>
				<td><?=$this->Form->input('r_paper', ['options'=>[], 'empty'=>'--choose one--','required'=>'required' ,'label'=>false, 'onchange'=>'return change_fabric();']);?></td>
			</tr>

			<tr>
				<td>Fabric</td>
				<td><?=$this->Form->input('fabric', ['options'=>[], 'empty'=>'--choose one--','required'=>'required' ,'label'=>false , 'onchange'=>'return change_thickness();']);?></td>
			</tr>
			<tr>
				<td>Thickness</td>
				<td><?=$this->Form->input('thickness', ['options'=>[], 'empty'=>'--choose one--','required'=>'required' ,'label'=>false]);?></td>
			</tr>
			<tr>
				<td>Width</td>
				<td><?=$this->Form->input('width', ['required'=>'required' ,'label'=>false]);?></td>
			</tr>
			<tr>
				<td>Production</td>
				<td><?=$this->Form->input('production', ['required'=>'required' ,'label'=>false]);?></td>
			</tr>
			<tr>
				<td>Top Coat</td>
				<td><?=$this->Form->input('top_coat', ['required'=>'required' ,'label'=>false]);?></td>
			</tr>
			<tr>
				<td>Foam Coat</td>
				<td><?=$this->Form->input('foam_coat', ['required'=>'required' ,'label'=>false]);?></td>
			</tr>
			<tr>
				<td>Adhesive Coat</td>
				<td><?=$this->Form->input('adhesive_coat', ['required'=>'required' ,'label'=>false]);?></td>
			</tr>
			<tr>
				<td>Net WT</td>
				<td><?=$this->Form->input('net_wt', ['required'=>'required' ,'label'=>false]);?></td>
			</tr>

		</table>
	</fieldset>
<?php echo $this->Form->end(__('Submit'), array('action' => 'index/sort:date/direction:desc')); ?>

</div>
