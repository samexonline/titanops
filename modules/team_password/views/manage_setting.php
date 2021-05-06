<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
 <div class="content">
   <div class="panel_s">
	    <div class="panel-body">
	    	<h4><?php echo html_entity_decode($title); ?></h4>
	    	<div class="col-md-12">
	    		<hr>
	    	</div>

	    	<?php echo form_open(admin_url('team_password/setting_form'),array('id'=>'setting-form')); ?>
	    	<div class="col-md-6">
	    		<label for="security_key"><span class="text-danger">* </span><?php echo _l('security_key'); ?></label>
	    		<?php echo render_input('security_key','',get_option('team_password_security'),'',array('required'=>'true')); ?>
	    	</div><br>
	    	
	    	<div class="col-md-12">
	    		<p class="text-danger"><?php echo _l('security_note_key'); ?></p>
	    		<hr>
	    	</div>

			<button type="submit" class="btn btn-info pull-right"><?php echo _l('submit'); ?></button>
			<?php echo form_close(); ?>
			
	    </div>
	</div>
 </div>
</div>
<?php init_tail(); ?>
</body>
</html>
