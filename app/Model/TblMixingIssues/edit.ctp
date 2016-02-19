<div class="container">
    <div class="row">
        <?=$this->Html->link('List items', array('action' => 'index'),['class'=>'btn btn-primary pull-right']);?>
        <br><br>

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Mixing Mix Edit
                </div>
                <div class="panel-footer">
                    <table class="table">
                        <form action="" method="post">
                        <tr>
                            <td>Nepalidate</td>
                            <td><input id="nepali-calendar" required="required" class="form-control nepali-calendar" type="text" value="<?=$consumption[0]['tbl_mixing_issue']['nepalidate']?$consumption[0]['tbl_mixing_issue']['nepalidate']:0;?>" name="nepalidate"></td>
                        </tr>
                            <tr>
                                <td>Shift</td>
                                <td>
                                    <select required="required" class="form-control" name="shift">
                                        <option value="">Please select</option>
                                        <option <?=$consumption[0]['tbl_mixing_issue']['shift']=='A'?'selected':'';?> value="A">A</option>
                                        <option <?=$consumption[0]['tbl_mixing_issue']['shift']=='B'?'selected':'';?> value="B">B</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Material</td>
                                <td>
                                    <select required="required" name="material" class="form-control">
                                        <option <?=$consumption[0]['tbl_mixing_issue']['material']=='Top Coat'?'selected':'';?> value="Top Coat">Top Coat</option>
                                        <option <?=$consumption[0]['tbl_mixing_issue']['material']=='Foam'?'selected':'';?> value="Foam">Foam</option>
                                        <option <?=$consumption[0]['tbl_mixing_issue']['material']=='Adhesive'?'selected':'';?> value="Adhesive">Adhesive</option>
                                        <option <?=$consumption[0]['tbl_mixing_issue']['material']=='Others'?'selected':'';?> value="Others">Others</option>
                                    </select>
                                </td>
                            </tr>
                        <?php
                        //materials field
                        /*echo '<pre>';
                        print_r($materials);*/
                        $materialsVal = json_decode($consumption[0]['tbl_mixing_issue']['patterns']);
                        ?>
                        <?php foreach ($materials as $key => $m): ?>
                            <tr>
                                <td><?= $m['mixing_pattern']['pattern_name']; ?></td>
                                <td>
                                    <?php
                                    if(property_exists($materialsVal, $m['mixing_pattern']['id']))
                                    {
                                        $materialValue = $materialsVal->$m['mixing_pattern']['id'];
                                    }else{
                                        $materialValue = 0;
                                    }
                                    ?>
                                    <input class="form-control" type="text" name="patterns[<?=$m['mixing_pattern']['id']; ?>]" value="<?=$materialValue;?>">
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
