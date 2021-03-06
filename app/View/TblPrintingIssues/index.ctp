<?php
//echo '<pre>';
//var_dump($consumptions);exit;
/*echo '<pre>';
print_r($consumptions);
print_r($material_lists);
exit;*/
?>
<script>
    $(document).ready(function () {
        $('.nepaliDatePicker').nepaliDatePicker();
    });
</script>
<div class="pull-right">
    <?= $this->Html->link('Add New Printing Mix', array('action' => 'add'), ['class' => 'btn btn-primary']); ?>
        <a class="btn btn-warning" href="<?=$base_url;?>TblPrintingIssues/pdf<?=isset($_GET['q'])?'?q='.$_GET['q']:'';?><?=isset($_GET['page_id'])?(isset($_GET['q'])?'&':'?').'page_id='.$_GET['page_id']:'';?>"><i class="glyphicon glyphicon-download"></i> Download PDF</a>
        <a class="btn btn-success" href="<?=$base_url;?>TblPrintingIssues/exportcsv"><i class="glyphicon glyphicon-download"></i> Export CSV</a>
</div>
<br><br>

<div class="container">
    <div class="row">
        <?=$this->Form->create(null, array(array('controller' => 'TblPrintingIssue', 'action' => 'index'),'type'=>'get'));?>
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" name="q" class="form-control nepaliDatePicker" id="nepaliDatePicker" autocomplete="off" value="<?=isset($_GET['q']) ? $_GET['q'] : ''; ?>" placeholder="Search for...">
                  <span class="input-group-btn">
                      <input title="Search" class="btn btn-primary" type="submit" value="Search">&nbsp;
                      <!--<input title="Search" name="print" class="btn btn-warning" type="submit" value="Print">-->
                  </span>
                </div>
            </div>
            <div class="col-md-6 pull-right">

                <!-- pagination -->
                <nav>
                    <ul class="pagination pull-right">
                        <?php if($pagination->currentPage-1>=1):?>
                            <li><a href="<?=$this->Html->url(null,true).(isset($_GET['q'])?'?q='.$_GET['q'].'&page_id='.($pagination->currentPage-1):'?page_id='.($pagination->currentPage-1));?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                        <?php endif;?>

                        <!-- first page -->
                        <?php if($pagination->currentPage>1):?>
                            <li><a href="<?=$this->Html->url(null,true).(isset($_GET['q'])?'?q='.$_GET['q'].'&page_id=1':'?page_id=1'); ?>">1</a></li>
                        <?php endif;?>
                        <!-- end first page -->
                        <?php if($pagination->currentPage>3):?>
                            <li><a href="#">...</a> </li>
                        <?php endif;?>

                        <?php if(2<$pagination->currentPage):?>
                            <li><a href="<?=$this->Html->url(null,true).(isset($_GET['q'])?'?q='.$_GET['q'].'&page_id='.($pagination->currentPage-1):'?page_id='.($pagination->currentPage-1)); ?>"><?=$pagination->currentPage-1;?></a></li>
                        <?php endif;?>
                        <!-- current page -->
                        <?php if($pagination->totalPage!=1):?>
                        <li class="<?=isset($_GET['page_id'])==1?'active':'';?>"><a href="<?=$this->Html->url(null,true).(isset($_GET['q'])?'?q='.$_GET['q'].'&page_id='.$pagination->currentPage:'?page_id='.$pagination->currentPage); ?>"><?=$pagination->currentPage;?></a></li>
                        <?php endif;?>
                        <!-- end current page -->

                        <?php if($pagination->totalPage>$pagination->currentPage+1):?>
                            <li><a href="<?=$this->Html->url(null,true).(isset($_GET['q'])?'?q='.$_GET['q'].'&page_id='.($pagination->currentPage+1):'?page_id='.($pagination->currentPage+1)); ?>"><?=$pagination->currentPage+1;?></a></li>
                        <?php endif;?>

                        <?php if($pagination->totalPage>$pagination->currentPage+2):?>
                            <li><a href="<?=$this->Html->url(null,true).(isset($_GET['q'])?'?q='.$_GET['q'].'&page_id='.($pagination->currentPage+2):'?page_id='.($pagination->currentPage+2)); ?>"><?=$pagination->currentPage+2;?></a></li>
                        <?php endif;?>

                        <?php if($pagination->totalPage-3>=$pagination->currentPage):?>
                            <li><a href="#">...</a> </li>
                        <?php endif;?>

                        <!-- last page -->
                        <?php if($pagination->currentPage!=$pagination->totalPage):?>
                            <li><a href="<?=$this->Html->url(null,true).(isset($_GET['q'])?'?q='.$_GET['q'].'&page_id='.$pagination->totalPage:'?page_id='.$pagination->totalPage); ?>"><?=$pagination->totalPage;?></a></li>
                        <?php endif;?>
                        <!-- end last page -->

                        <?php if($pagination->currentPage<$pagination->totalPage):?>
                        <li><a href="<?=$this->Html->url(null,true).(isset($_GET['q'])?'?q='.$_GET['q'].'&page_id='.($pagination->currentPage+1):'?page_id='.($pagination->currentPage+1)); ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                        <?php endif;?>
                    </ul>
                </nav>
                <!-- end pagination -->

            </div>
        </form>
        <!-- /input-group -->
        <br><br><br>

        <div class="clearfix"></div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <p class="text-center">Printing Mix</p>
            </div>
            <div class="panel-footer">
                <?php
                // if there is no data, echo custom message
                if (!count($consumptions)):
                    echo "<h2>No data exists</h2>";
                else:
                    ?>
                    <table class="table table-bordered table-hover">
                        <tr class="success">
                            <th>Actions</th>
                            <?php for ($i = 0; $i < count($consumptions); $i++): ?>
                                <td class="text-center"><?= $this->Html->link('Edit', array('action' => 'edit', $consumptions[$i]['TblPrintingIssue']['id'])); ?>
                                    ||  <?php echo $this->Html->link('Delete', array('action' => 'delete', $consumptions[$i]['TblPrintingIssue']['id']), array('confirm' => 'Are you sure you wish to delete this item? This can\'t undone')); ?>  </td>
                            <?php endfor; ?>
                        </tr>
                        <tr class="success">
                            <th>Date</th>
                            <?php for ($i = 0; $i < count($consumptions); $i++): ?>
                                <td><?= $consumptions[$i]['TblPrintingIssue']['nepalidate']; ?></td>
                            <?php endfor; ?>
                        </tr>
                        <tr class="success">
                            <th>Shift</th>
                            <?php for ($i = 0; $i < count($consumptions); $i++): ?>
                                <td><?= $consumptions[$i]['TblPrintingIssue']['shift']; ?></td>
                            <?php endfor; ?>
                        </tr>
                        <tr class="success">
                            <th>Material</th>
                            <?php for ($i = 0; $i < count($consumptions); $i++): ?>
                                <td><?= $consumptions[$i]['TblPrintingIssue']['material']; ?></td>
                            <?php endfor; ?>
                        </tr>
                        <?php foreach ($material_lists as $m): ?>
                            <tr>
                                <td class="danger"><?= $m['PrintingPattern']['pattern_name']; ?></td>
                                <?php for ($i = 0; $i < count($consumptions); $i++): ?>
                                    <td>
                                        <?php
                                        $materials = json_decode($consumptions[$i]['TblPrintingIssue']['patterns']);
                                            echo isset($materials->$m['PrintingPattern']['id']) ? number_format($materials->$m['PrintingPattern']['id'],2) ? number_format($materials->$m['PrintingPattern']['id'],2) : '0.00' : 0;
                                        ?>
                                    </td>
                                <?php endfor; ?>
                            </tr>
                        <?php endforeach; ?>
                        <tr class="success">
                            <th>Total</th>
                            <?php for ($i = 0; $i < count($consumptions); $i++): ?>
                                <th>
                                    <?php
                                    $total = 0;
                                    $material = json_decode($consumptions[$i]['TblPrintingIssue']['patterns']);
                                    foreach($material_lists as $m):
                                        if(property_exists($material, $m['PrintingPattern']['id']))
                                        {
                                            $materialWeight = $material->$m['PrintingPattern']['id'];
                                        }else{
                                            $materialWeight=0;
                                        }
                                        $total += $materialWeight;
                                    endforeach;
                                    echo number_format($total,2);
                                    ?>
                                </th>
                            <?php endfor; ?>
                        </tr>
                    </table>
                <?php endif;//end if no data exists ?>

                                <!-- pagination -->
                <nav>
                    <ul class="pagination pull-right">
                        <?php if($pagination->currentPage-1>=1):?>
                            <li><a href="<?=$this->Html->url(null,true).(isset($_GET['q'])?'?q='.$_GET['q'].'&page_id='.($pagination->currentPage-1):'?page_id='.($pagination->currentPage-1));?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                        <?php endif;?>

                        <!-- first page -->
                        <?php if($pagination->currentPage>1):?>
                            <li><a href="<?=$this->Html->url(null,true).(isset($_GET['q'])?'?q='.$_GET['q'].'&page_id=1':'?page_id=1'); ?>">1</a></li>
                        <?php endif;?>
                        <!-- end first page -->
                        <?php if($pagination->currentPage>3):?>
                            <li><a href="#">...</a> </li>
                        <?php endif;?>

                        <?php if(2<$pagination->currentPage):?>
                            <li><a href="<?=$this->Html->url(null,true).(isset($_GET['q'])?'?q='.$_GET['q'].'&page_id='.($pagination->currentPage-1):'?page_id='.($pagination->currentPage-1)); ?>"><?=$pagination->currentPage-1;?></a></li>
                        <?php endif;?>
                        <!-- current page -->
                        <?php if($pagination->totalPage!=1):?>
                        <li class="<?=isset($_GET['page_id'])==1?'active':'';?>"><a href="<?=$this->Html->url(null,true).(isset($_GET['q'])?'?q='.$_GET['q'].'&page_id='.$pagination->currentPage:'?page_id='.$pagination->currentPage); ?>"><?=$pagination->currentPage;?></a></li>
                        <?php endif;?>
                        <!-- end current page -->

                        <?php if($pagination->totalPage>$pagination->currentPage+1):?>
                            <li><a href="<?=$this->Html->url(null,true).(isset($_GET['q'])?'?q='.$_GET['q'].'&page_id='.($pagination->currentPage+1):'?page_id='.($pagination->currentPage+1)); ?>"><?=$pagination->currentPage+1;?></a></li>
                        <?php endif;?>

                        <?php if($pagination->totalPage>$pagination->currentPage+2):?>
                            <li><a href="<?=$this->Html->url(null,true).(isset($_GET['q'])?'?q='.$_GET['q'].'&page_id='.($pagination->currentPage+2):'?page_id='.($pagination->currentPage+2)); ?>"><?=$pagination->currentPage+2;?></a></li>
                        <?php endif;?>

                        <?php if($pagination->totalPage-3>=$pagination->currentPage):?>
                            <li><a href="#">...</a> </li>
                        <?php endif;?>

                        <!-- last page -->
                        <?php if($pagination->currentPage!=$pagination->totalPage):?>
                            <li><a href="<?=$this->Html->url(null,true).(isset($_GET['q'])?'?q='.$_GET['q'].'&page_id='.$pagination->totalPage:'?page_id='.$pagination->totalPage); ?>"><?=$pagination->totalPage;?></a></li>
                        <?php endif;?>
                        <!-- end last page -->

                        <?php if($pagination->currentPage<$pagination->totalPage):?>
                        <li><a href="<?=$this->Html->url(null,true).(isset($_GET['q'])?'?q='.$_GET['q'].'&page_id='.($pagination->currentPage+1):'?page_id='.($pagination->currentPage+1)); ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                        <?php endif;?>
                    </ul>
                </nav>
                <!-- end pagination -->
            </div>
        </div>
    </div>
</div>