<script>
    $(document).ready(function () {
        $('.nepalidatepicker').nepaliDatePicker();
    });

    $(document).ready(function () {
        $("#nepalidatepicker").focus(function (e) {
            //$("span").css("display", "inline").fadeOut(2000);
            console.log("focus");
            showCalendarBox('nepalidatepicker');
        });
        $("#type").change(function () {
            var dep = document.getElementById('department').value;
            var type = $(this).val();
            //var dep = 'calender';

            $.post("fetchreason", {id: type, departmentid: dep}, function (response) {
                $(".reason").html(response);
            })

        });
    });
</script>


<div class="mixingMaterials form">
<?php echo $this->Form->create('ScrapMixing'); ?>
	<fieldset>
		<legend><?php echo __('Add Scrap Sent to Mixing'); ?></legend>
	<?php
		//echo $this->Form->input('department');


		$arr = ['Printed Scrap'=>'Printed Scrap','Unprinted Scrap'=>'Unprinted Scrap'];
		echo $this->Form->input('date',array('id' => 'nepalidatepicker', 'type' => 'text', 'class' => 'nepalidatepicker form-control input-md','required'=>'required'));
		echo $this->Form->input('scrap_sent',['options'=>$arr, 'label'=>'Category', 'empty'=>'No-Category','required'=>'required']);
		echo $this->Form->input('weight',['required'=>'required']);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Scrap Sent to Mixing'), array('action' => 'index/sort:date/direction:desc')); ?></li>
	</ul>
</div>