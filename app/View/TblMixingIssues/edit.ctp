<script>

    function changeColour(that)
    {
        var brand = $(that).val();
        var dataString = 'brand='+brand;
        $.ajax
        ({
            type: "POST",
            url: "<?=$base_url;?>TblMixingIssues/changeColour",
            data: dataString,
            cache: false,
            success: function (html) {
                $("#TblMixingIssueColour").html(html);
                $('#loadingImage').hide();
            }
        });
    }

</script>

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
                            <input type="hidden" name="id" value="<?=$consumption[0]['tbl_mixing_issue']['id'];?>">
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
                                <td>Brand</td>
                                <td>
                                    <select required="required" class="form-control" name="brand" onchange="return changeColour(this);">
                                        <option value="">Please select</option>
                                        <?php foreach($brand as $b):?>
                                            <option <?=$consumption[0]['tbl_mixing_issue']['brand']==$b['rexin_dropdown']['brand'] ?'selected':'';?> value="<?=$b['rexin_dropdown']['brand'];?>"><?=$b['rexin_dropdown']['brand'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </td>
                            </tr>
                          <!--   <tr>
                                <td>Colour</td>
                                <td>
                                    <select required="required" class="form-control" name="colour" id="TblMixingIssueColour">
                                        <option value="">Please select</option>
                                        <?php foreach($colour as $b):?>
                                            <option <?=$consumption[0]['tbl_mixing_issue']['colour']==$b['rexin_dropdown']['colour'] ?'selected':'';?> value="<?=$b['rexin_dropdown']['colour'];?>"><?=$b['rexin_dropdown']['colour'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </td>
                            </tr> -->
                            <tr>
                                <td>Material</td>
                                <td>
                                    <select required="required" name="material" class="form-control">
                                        
                                        
                                        <option <?=$consumption[0]['tbl_mixing_issue']['material']=='Adhesive'?'selected':'';?> value="Adhesive Coat">Adhesive Coat</option>
                                        <option <?=$consumption[0]['tbl_mixing_issue']['material']=='Foam'?'selected':'';?> value="Foam Coat">Foam Coat</option>
                                        <option <?=$consumption[0]['tbl_mixing_issue']['material']=='Others'?'selected':'';?> value="Others">Others</option>
                                        <option <?=$consumption[0]['tbl_mixing_issue']['material']=='Top Coat'?'selected':'';?> value="Top Coat">Top Coat</option>
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
