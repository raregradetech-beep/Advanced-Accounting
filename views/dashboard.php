<?php init_head(); ?>
<div class="content">
  <div class="row">
     <div class="col-md-12">
        <h4><?php echo _l('aa_chart_of_accounts'); ?></h4>
        <table class="table table-bordered">
           <thead>
              <tr>
                 <th><?php echo _l('aa_account_code'); ?></th>
                 <th><?php echo _l('aa_account_name'); ?></th>
                 <th><?php echo _l('aa_type'); ?></th>
              </tr>
           </thead>
           <tbody>
              <?php foreach ($accounts as $acc) { ?>
              <tr>
                 <td><?php echo html_escape($acc['code']); ?></td>
                 <td><?php echo html_escape($acc['name']); ?></td>
                 <td><?php echo html_escape($acc['account_type_id']); ?></td>
              </tr>
              <?php } ?>
           </tbody>
        </table>
     </div>
  </div>
</div>
<?php init_tail(); ?>
