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
                                <td>Brand</td>
                                <td>
                                    <select required="required" class="form-control" name="brand" onchange="return changeColour(this);">
                                        <option value="">Please select</option>
                                        <?php foreach($brand as $b):?>
                                        <option value="<?=$b['rexin_dropdown']['brand'];?>"><?=$b['rexin_dropdown']['brand'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </td>
                            </tr>
                            <!-- <tr>
                                <td>Colour</td>
                                <td>
                                    <select required="required" class="form-control" name="colour" id="TblMixingIssueColour">
                                        <option value="">Please select</option>
                                    </select>
                                </td>
                            </tr> -->
                            <tr>
                                <td>Coating</td>
                                <td>
                                    <select required="required" name="material" class="form-control">
                                        <option value="Adhesive Coat">Adhesive Coat</option>
                                        <option value="Foam Coat">Foam Coat</option>
                                        <option value="Others">Others</option>
                                        <option value="Top Coat">Top Coat</option>
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