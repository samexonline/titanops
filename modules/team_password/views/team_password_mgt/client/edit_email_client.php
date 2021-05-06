<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php 
  $id = '';
  $name = '';
  $pin = '';
  $credit_card_type = '';
  $card_number = '';
  $card_cvc = '';
  $notice = '';
  $email_type = '';
  $auth_method = '';
  $host = '';
  $port = '';
  $smtp_auth_method = '';
  $smtp_host = '';
  $smtp_port = '';
  $smtp_user_name = '';
  $smtp_password = '';
  $password = '';
  $enable_log = '';
  $mgt_id = '';
  $custom_field = [];
  $datecreator = '';
  $user_name = '';
  if(isset($email)){
      $id = $email->id;
      $name = $email->name;
      $pin = $email->pin;
      $credit_card_type = $email->credit_card_type;
      $card_number = $email->card_number;
      $card_cvc = $email->card_cvc;
      $notice = $email->notice;
      $email_type = $email->email_type;
      $auth_method = $email->auth_method;
      $host = $email->host;
      $port = $email->port;
      $smtp_auth_method = $email->smtp_auth_method;
      $smtp_host = $email->smtp_host;
      $smtp_port = $email->smtp_port;
      $smtp_user_name = $email->smtp_user_name;
      $smtp_password = AES_256_Decrypt($email->smtp_password);
      $password = AES_256_Decrypt($email->password);
      $enable_log = $email->enable_log;
      $mgt_id = $email->mgt_id;
      $custom_field = json_decode($email->custom_field);
      $datecreator = $email->datecreator;
      $user_name = $email->user_name;
  }
 ?>
<div id="wrapper">
 <div class="content">
   <div class="panel_s">
    <div class="panel-body">
	 <div class="clearfix"></div><br>
	 <div class="col-md-12">
	 	<h4><i class="fa fa-list-ul">&nbsp;&nbsp;</i><?php echo html_entity_decode($title); ?></h4>
	 </div>

		<div class="clearfix"></div>
		<hr class="hr-panel-heading" />
		<div class="clearfix"></div>
	    <?php echo form_open(site_url('team_password/team_password_client/add_email'),array('id'=>'form_category_management')); ?>	            
        <div class="modal-body">
        <div class="row">
        <div class="col-md-12">
        	<input type="hidden" name="id" value="<?php echo html_entity_decode($id); ?>">
            <?php echo render_input('name','name',$name,'',array('required'=>true)); ?>                     
        </div>
        <div class="col-md-12">
            <?php 
              echo render_select('mgt_id',$category,array('id','category_name'),'category_managements',$mgt_id,array('required'=>true));
            ?>
        </div>
        <div class="col-md-12">
                 <?php echo render_input('email_type','email_type',$email_type); ?>
                <?php echo render_input('auth_method','auth_method',$auth_method); ?>
                <?php echo render_input('host','host',$host); ?>
                <?php echo render_input('port','port',$port); ?>
                <?php echo render_input('user_name','user_name',$user_name,'',array('required'=>true)); ?>     
        </div>
        <div class="col-md-12">
        	    <div class="form-group">
        	         <label for="gst"><?php echo _l('password'); ?></label>					 	
    					    <div class="input-group">
    					    	<a href="#" class="input-group-addon view_password"><i class="fa fa-eye"></i></a>
    					        <input type="password" disabled class="form-control" required name="password" value="<?php echo html_entity_decode($password); ?>">
    					        
    					    </div>
				      </div>
			</div>
      <div class="col-md-12">
          <?php echo render_input('smtp_auth_method','smtp_auth_method',$smtp_auth_method); ?>
          <?php echo render_input('smtp_host','smtp_host',$smtp_host); ?>
          <?php echo render_input('smtp_port','smtp_port',$smtp_port); ?>
          <?php echo render_input('smtp_user_name','smtp_user_name',$smtp_user_name); ?>
      </div>
      <div class="col-md-12">
         <div class="form-group">
                   <label for="gst"><?php echo _l('smtp_password'); ?></label>           
                  <div class="input-group">
                    <a href="#" class="input-group-addon view_smtp_password"><i class="fa fa-eye"></i></a>
                      <input type="password" disabled class="form-control" name="smtp_password" value="<?php echo html_entity_decode($smtp_password); ?>">
                     
                  </div>
              </div>
      </div>
      <div class="col-md-12">
          <?php echo render_textarea('notice','notice',$notice); ?>
      </div>
            
          <div class="col-md-12" id="ic_pv_file">
            <?php
             if(isset($email)){
                $attachments = get_item_tp_attachment($email->id,'tp_email');
                $file_html = '';
                $type_item = 'tp_email';
                if(count($attachments) > 0){
                    $file_html .= '<hr />
                            <p class="bold text-muted">'._l('attachments').'</p>';
                    foreach ($attachments as $f) {
                        $href_url = site_url(TEAM_PASSWORD_PATH.'tp_email/'.$f['rel_id'].'/'.$f['file_name']).'" download';
                                        if(!empty($f['external'])){
                                          $href_url = $f['external_link'];
                                        }
                       $file_html .= '<div class="mbot15 row inline-block full-width" data-attachment-id="'. $f['id'].'">
                      <div class="col-md-8">
                         <a name="preview-ic-btn" onclick="preview_ic_btn(this); return false;" rel_id = "'. $f['rel_id']. '" type_item = "'. $type_item. '" id = "'.$f['id'].'" href="Javascript:void(0);" class="mbot10 btn btn-success pull-left mright5" data-toggle="tooltip" title data-original-title="'. _l('preview_file').'"><i class="fa fa-eye"></i></a>
                         <div class="pull-left"><i class="'. get_mime_class($f['filetype']).'"></i></div>
                         <a href=" '. $href_url.'" target="_blank" download>'.$f['file_name'].'</a>
                         <br />
                         <small class="text-muted">'.$f['filetype'].'</small>
                      </div>';
                        
                       $file_html .= '</div>';
                    }
                    $file_html .= '<hr />';
                    echo html_entity_decode($file_html);
                }
             ?>
          </div>
          <?php } ?>
          <div id="ic_file_data"></div>



        </div>
        <div class="modal-footer">
            <a href="javascript:history.back()" class="btn btn-danger"><?php echo _l('close'); ?></a>
            <button type="submit" class="btn btn-info"><?php echo _l('submit'); ?></button>
        </div>
	</div>
        <?php echo form_close(); ?>
  </div>
 </div>
</div>



<div class="modal fade" id="custom_fields" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <span class="add-title"></span>
                </h4>
            </div>
            <div class="modal-body">
	        <div class="row">
               <div class="col-md-12"><?php echo render_input('field_name','field_name'); ?></div>
               <div class="col-md-12"><?php echo render_input('field_value','field_value'); ?></div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" onclick="create_customfield();" data-dismiss="modal"><?php echo _l('save'); ?></button>
            </div>
          </div>
    </div>
</div>


