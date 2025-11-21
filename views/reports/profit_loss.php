<?php init_head(); ?>
<div class="content">
  <div class="row">
     <div class="col-md-12">
        <h4><?php echo _l('aa_profit_loss'); ?></h4>
        <table class="table table-bordered">
           <tr>
              <td><?php echo _l('aa_income'); ?></td>
              <td><?php echo number_format($report['income'], 2); ?></td>
           </tr>
           <tr>
              <td><?php echo _l('aa_expenses'); ?></td>
              <td><?php echo number_format($report['expenses'], 2); ?></td>
           </tr>
           <tr>
              <th><?php echo _l('aa_profit'); ?></th>
              <th><?php echo number_format($report['profit'], 2); ?></th>
           </tr>
        </table>
     </div>
  </div>
</div>
<?php init_tail(); ?>
