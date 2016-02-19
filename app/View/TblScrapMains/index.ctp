<script>
    $(document).ready(function () {
        $('.nepaliDatePicker').nepaliDatePicker();
    });
</script>

<?= $this->Html->link('Add', array('action' => 'add'), ['class' => 'btn btn-primary pull-right']); ?>
<a class="btn btn-success  pull-right" style="margin-right:5px;" href="<?=$base_url;?>TblScrapMains/exportcsv"><i class="glyphicon glyphicon-download"></i> Export CSV</a>
<div class="clearfix"></div>
<br>
<div class="panel panel-primary">
    <div class="panel-heading">
        Scrap Details
    </div>
    <div class="panel-body">
        <div class="col-md-4 pull-right">
            <form method="get">
                <div class="input-group">
                    <input type="text" name="q" class="form-control nepaliDatePicker" id="nepaliDatePicker" autocomplete="off" value="<?=isset($_GET['q']) ? $_GET['q'] : ''; ?>" placeholder="Search for...">
                      <span class="input-group-btn">
                          <input title="Search" class="btn btn-primary" type="submit" value="Search">&nbsp;
                          <!--<input title="Search" name="print" class="btn btn-warning" type="submit" value="Print">-->
                      </span>
                </div>
            </form>
        </div>
        <br><br>
        <table class="table table-hover table-bordered">
            <tr class="success">
                <th>Date</th>
                <th>Scrap</th>
                <th>Segregated Waste</th>
                <th>Burnt Scrap</th>
                <th>Sieved Dust</th>
                <th>Final Chipps</th>
                <th>Foaming Scrap</th>
                <th>Percentage</th>
                <th>Actions</th>
            </tr>
            <?php foreach($scrapMains as $s):?>
            <tr>
                <td><?=$s['TblScrapMain']['date']?></td>
                <td><?=number_format($s['TblScrapMain']['scrap'],2);?></td>
                <td><?=number_format($s['TblScrapMain']['segregated_waste'],2);?></td>
                <td><?=number_format($s['TblScrapMain']['burnt_scrap'],2);?></td>
                <td><?=number_format($s['TblScrapMain']['sieved_dust'],2);?></td>
                <td><?=number_format($s['TblScrapMain']['final_chipps'],2);?></td>
                <td><?=number_format($s['TblScrapMain']['foaming_scrap'],2);?></td>
                <td><?=number_format(($s['TblScrapMain']['final_chipps']/$s['TblScrapMain']['scrap'])*100,2).'%';?></td>
                <td>
                    <?= $this->Html->link('Edit', array('action' => 'edit', $s['TblScrapMain']['id'])); ?>
                    || <?php echo $this->Html->link('Delete', array('action' => 'delete', $s['TblScrapMain']['id']), array('confirm' => 'Are you sure you wish to delete this item? This can\'t undone')); ?>
                </td>
            </tr>
            <?php endforeach;?>
        </table>

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