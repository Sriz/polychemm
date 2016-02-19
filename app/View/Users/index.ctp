

<div class="row">

	<div class="col-12">
		<?php echo $this->Session->flash() ?>

    <div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Users</h4>
    </div>
    <br>
    <div style="padding-right:15px">
        <?php echo $this->Html->link(__('Add'), array('action' => 'add'), ['class'=>'btn btn-primary pull-right']); ?>
    </div>
    <br><br>
    <div class="panel-body">
        <table class="table table-bordered table-hover">
            <tr class="success">
              <th>#</th>
              <th><?php echo __('Username') ?></th>
              <th><?php echo __('Department') ?></th>
              <th>Admin</th>
            </tr>
            </thead>
            <tbody>
              <?php foreach( $users as $user ){ ?>
              <tr>
                <td width="50px"><?php echo $user['User']['id'] ?></td>
                <td><?php echo $user['User']['username'] ?></td>
                <td><?php echo $user['User']['role'] ?></td>
                <td width="150px">
                  
                  <?php echo $this->Html->link(__('Edit'),'/users/edit/'.$user['User']['id']) ?> |
                  <?php echo $this->Html->link(
                    __('Delete'),
                    '#UsersModal',
                    array(
                      'class' => 'btn-remove-modal',
                      'data-toggle' => 'modal',
                      'role'  => 'button',
                      'data-uid' => $user['User']['id'],
                      'data-uname' => $user['User']['username']
                    ));
                  ?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
        </table>
  </div>
</div>


<div class="modal fade" id="UsersModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 id="myModalLabel"><?php echo __('Remove user') ?></h4>
      </div>
      <div class="modal-body">
        <p><?php echo __('Are you sure you want to delete the user ') ?><span class="label-uname strong"></span> ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Cancel') ?></button>
        <?php echo $this->Html->link(__('Delete'),'/users/delete/#{uid}',array('class' => 'btn btn-danger delete-user-link')) ?>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
