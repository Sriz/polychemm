<?=$this->Html->link('List items', array('action' => 'index'),['class'=>'btn btn-primary pull-right']);?>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Mixing Mix Add
                </div>
                <div class="panel-footer">
                    <table class="table">
                        <form action="" method="post">
                            <tr>
                                <td>Nepalidate</td>
                                <td><input autocomplete="off" id="nepali-calendar" class="form-control nepali-calendar" type="text" required="required" placeholder="Date" name="nepalidate"></td>
                            </tr>
                            <tr>
                                <td>Shift</td>
                                <td>
                                    <select required="required" class="form-control" name="shift">
                                        <option value="">Please select</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Material</td>
                                <td>
                                    <select required="required" name="material" class="form-control">
                                        <option value="Top Coat">Top Coat</option>
                                        <option value="Foam">Foam</option>
                                        <option value="Adhesive">Adhesive</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </td>
                            </tr>
                            <?php
                            //materials field
                            /*echo '<pre>';
                            print_r($materials);*/
                            ?>
                            <?php foreach ($materials as $key => $m): ?>
                                <tr>
                                    <td><?= $m['mixing_pattern']['pattern_name']; ?></td>
                                    <td>
                                        <input class="form-control" type="text" name="patterns[<?=$m['mixing_pattern']['id']; ?>]" value="0">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="submit" value="Submit" class="btn btn-primary pull-right"></td>
                            </tr>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var value = ''
        $('.nepali-calendar').nepaliDatePicker();
        // Trigger On change/Selected event
        $.onChangeDatepicker_Ravindra = function (selectedDate) {
            value = $("#nepali-calendar").val();
            $('.nepalidatepicker').val(value);
        }
    });
</script>