<script>
    function store_change_cat(that) {
        var categoryId = $('#InventoryInStoreCategoryId').val();
        var strPost = 'category_id=' + categoryId;
        $.ajax({
            type: "POST",
            url: '<?=$base_url;?>StorePurchaseRequests/change_cat',
            data: strPost,
            success: function (data) {
                $('#InventoryInStoreMaterialId').html(data);
            }
        });
    }
    function store_dealer(that) {
        var dealer_id = $('#InventoryInStoreDealerId').val();
        var strPost = 'dealer_id=' + dealer_id;
        console.log(strPost)
        $.ajax({
            type: "POST",
            url: '<?=$base_url;?>StorePurchaseRequests/change_dealer',
            data: strPost,
            success: function (data) {
                // $('#labelUnit').addClass('label label-info').html(data);
                $('#InventoryInStoreMaterialId').html(data);
            }
        });
    }



    $(document).ready(function () {
        $('#nepalidate').val(getNepaliDate());
    });
</script>

<div class="storePurchases form">
    <?php echo $this->Form->create('InventoryIn'); ?>
    <fieldset>
        <legend><?php echo __('Add Inventory In'); ?></legend>
        <?php
        echo $this->Form->input('date', ['id' => 'nepalidate']);
        echo $this->Form->input('dealer_id', ['id' => 'InventoryInStoreDealerId', 'empty' => 'Choose One', 'required' => 'required', 'label' => 'Party Name', 'onchange' => 'return store_dealer(this)']);
        ?>
        <br/>

            <div id="initial_tr">
                <div class="row">
                    <div class="col-xs-6">
                        <?php echo $this->Form->input('material_id', ['name'=>'data[InventoryIn][material_id][]','id' => 'InventoryInStoreMaterialId', 'empty' => 'Choose One','class'=>'InventoryInStoreMaterialClass', 'required' => 'required']); ?>
                    </div>
                    <div class="col-xs-6">
                        <?php echo $this->Form->label('Quantity') . '<span id="labelUnit"></span>';
                        echo $this->Form->input('amount', ['id'=>'amount','min'=>1,'step'=>'1','onkeyup'=>'return check();','name'=>'data[InventoryIn][amount][]','required' => 'required', 'label' => false]); ?>
                    </div>
                </div>
            </div>
            <div id="db_divResult"></div>

        <button id="db_add_new" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i></button>

        <?php
        echo '<hr/>';
        echo $this->Form->input('user_id', ['empty' => 'Choose One', 'required' => 'required', 'label' => 'Inspected by']);
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>

<script>
    $(document).ready(function(){
        $('#db_add_new').click(function(){
            var newEntry = $('#initial_tr').html();
            $('#db_divResult').append(newEntry);
        });
    });
/* if user change dealer name */
    $(document).ready(function(){
       $('#InventoryInStoreDealerId').change(function(){
           /*reset all data */
           $('#db_divResult').html("");
           $('#InventoryInAmount').val(0);
       });
    });
</script>
