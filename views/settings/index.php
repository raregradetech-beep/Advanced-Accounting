<?php init_head(); ?>
<div class="content">
  <div class="row">
     <div class="col-md-8 col-md-offset-2">
        <h4><?php echo _l('aa_settings'); ?></h4>
        <?php echo form_open(admin_url('advanced_accounting/settings')); ?>
        <div class="panel panel-default">
           <div class="panel-body">
              <div class="form-group">
                 <label>Fiscal Year Start</label>
                 <input type="date" name="aa_fiscal_year_start" class="form-control" value="<?php echo get_option('aa_fiscal_year_start'); ?>">
              </div>
              <button type="submit" class="btn btn-primary">Save</button>
           </div>
        </div>
        <?php echo form_close(); ?>
     </div>
  </div>
</div>
<?php init_tail(); ?>
