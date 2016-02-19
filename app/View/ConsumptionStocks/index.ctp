<script>
    $(document).ready(function () {
        var value = ''
        $('.popupDatepicker').nepaliDatePicker();
        // Trigger On change/Selected event
        $.onChangeDatepicker_Ravindra = function (selectedDate) {
            value = $("#popupDatepicker").val();
            $.ajax({
                url: "/polychem/ConsumptionStocks/create_mixingpdf",
                type: "POST",
                cache: false,
                data: {city_id: value}
            });
        }
    });
</script>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <strong>
                <center>Consumption Stock</center>
            </strong>
        </h3>
    </div>
    <div class="panel-body">
        <table>

            <?php  echo '<tr><td>' . $this->Search->create('', array('class' => 'form-inline', 'type' => 'post')) . '</td>';
            echo '<td>' . $this->Search->input('filter1', array('id' => 'popupDatepicker', 'class' => 'popupDatepicker')) . '</td>';
            echo '<td>' . $this->Search->end(__('Search', true)) . '</td>';
            ?>
            <td>
                <button class="btn btn-primary"
                        onclick="window.location.href='<?php echo Router::url(array('controller' => 'ConsumptionStocks', 'action' => 'add')) ?>'">
                    Add
                </button>
            </td>
            <td>
                <button class="btn btn-primary"
                        onclick="window.open('<?php echo Router::url(array('controller' => 'ConsumptionStocks', 'action' => 'create_mixingpdf')) ?>')">
                    Print
                </button>


            </td>
        </table>
    </div>
</div>

<ul class="pagination pagination-sm">
    <?php
    echo '<li>' . $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled')) . '</li>';
    echo '<li>' . $this->Paginator->numbers(array('separator' => '')) . '</li>';
    echo '<li>' . $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled')) . '</li>';
    //print_r($this->Paginator->last());
    ?>
</ul>
<div class="row" id="print">
    <div class="col-lg-3">


        <div class="row">
            <div class="col-xs-13">
                <table class="table  table-hover">
                    <tr>
                        <td class="success">Action</td>
                    </tr>
                    <tr>
                        <td class="success">Date</td>
                    </tr>
                    <tr>
                        <td class="success">Brand</td>
                    </tr>
                    <tr>
                        <td class="success">Quality</td>
                    </tr>
                    <tr>
                        <td class="success">Color</td>
                    </tr>
                    <tr>
                        <td class="success">Dimension</td>
                    </tr>
                    <?php
                    // print'<pre>';print_r($  );print'</pre>';
                    foreach ($mixingraws as $mixing):
                        echo "<tr>";
                        echo "<td>";
                        echo $mixing;
                        echo "</td>";
                        echo "</tr>";
                    endforeach;
                    ?>
                    <tr>
                        <td>Total</td>
                    </tr>

                </table>
            </div>
        </div>


    </div>


    <?php
    $i = 1;
    $flag = 0;
    $count = 1;
    $number = count($mixingraws);
    foreach ($consumptionStocks as $consumptionStock):
        if ($i <= 1) {
            echo '<div class="col-lg-2">';
            echo '<table class="table">';
            echo '<tr><td class="success" align="right">' . $this->Html->link(__('Edit'), array('action' => 'edit', $consumptionStock['ConsumptionStock']['consumption_id'])) . '&nbsp'
                .
                $this->Form->postLink(__('Delete'), array('action' => 'delete', $consumptionStock['ConsumptionStock']['consumption_id']), null, __('Are you sure you want to delete # %s?', $consumptionStock['ConsumptionStock']['consumption_id'])) .
                '</td></tr>';
            echo '<tr><td class="success" align="right">' . $consumptionStock['ConsumptionStock']['nepalidate'] . '</td></tr>';
            echo '<tr><td class="success" align="right">' . $consumptionStock['ConsumptionStock']['brand'] . '</td></tr>';
            echo '<tr><td class="success" align="right">' . $consumptionStock['ConsumptionStock']['quality_id'] . '</td></tr>';
            echo '<tr><td class="success" align="right">' . $consumptionStock['ConsumptionStock']['color'] . '</td></tr>';
            echo '<tr><td class="success" align="right">' . $consumptionStock['ConsumptionStock']['dimension'] . '</td></tr>';

            $i = 2;
            $flag++;


        }

        //$flag=1 at first, $number =number of materials in mixing-materials i.e. 34
        if ($flag < $number) {


            echo '<tr>';

            //echo '<td>'.$consumptionStock['ConsumptionStock']['material_id'].'</td>';
            echo '<td style="text-align:right;" class="xedit" id="' . $consumptionStock['ConsumptionStock']['consumption_id'] . '" key="quantity">' . number_format($consumptionStock['ConsumptionStock']['quantity'], 2) . '</td>';
            echo '</tr>';
            $flag = $flag + 1;
        } else {
            //from this line  i need to break the table
            echo '<tr>';
            echo '<td style="text-align:right;" class="xedit" id="' . $consumptionStock['ConsumptionStock']['consumption_id'] . '" key="quantity">' . number_format($consumptionStock['ConsumptionStock']['quantity'], 2) . '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td style="text-align:right;" id="' . $consumptionStock['ConsumptionStock']['total'] . '" key="quantity"><strong>' . number_format($consumptionStock['ConsumptionStock']['total'], 2) . '</strong></td>';
            echo '</tr>';
            $i = 1;
            $flag = 0;
            $count = 1;
            echo '</table>';
            echo '</div>';
        }
    endforeach;
    ?>
</div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        $.fn.editable.defaults.mode = 'inline';
        $('.xedit').editable();
        $(document).on('click', '.editable-submit', function () {
            var key = $(this).closest('.editable-container').prev().attr('key');
            var x = $(this).closest('.editable-container').prev().attr('id');
            var y = $('.input-sm').val();
            var z = $(this).closest('.editable-container').prev().text(y);
            $.ajax({
                url: "/polychem/ConsumptionStocks/ajaxupdate?id=" + x + "&data=" + y + '&key=' + key,
                type: 'POST',
                success: function (s) {
                    if (s == 'status') {
                        $(z).html(y);
                    }
                    if (s == 'error') {
                        alert('Error Processing your Request!');
                    }
                },
                error: function (e) {
                    alert('Error Processing your Request!!');
                }
            });
        });
    });
</script>