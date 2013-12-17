<?
	echo $this->Html->css('alwasatt_admin');
	echo $this->Html->css('jqueryui/theme_smoothness/jquery.ui.datepicker.min');
	echo $this->Html->script('jqueryui/jquery.ui.datepicker.min');
//	debug($user_data); exit;
?>

<!-- <ul class="breadcrumb">
    <li><a href="#">Dashboard</a> <span class="divider">>></span></li>
    <li><?php echo $this->Html->link(__('List Users'), array('action' => 'admin_index')); ?> <span class="divider">>></span></li>
    <li><a href="#"></a> <span class="divider"><?php echo __('Add User'); ?></span></li>
</ul> 
<div class="clr"></div>
-->
<div class="inner_hdng"><h2><?php echo $subTitle; ?></h2></div>
<div class="clr"></div>
<?php echo $this->Session->flash(); ?>
<div class="advertismnt_banner">
    <div class="right_section admin_role_bg">
        <form id="newUser" name="newUser" method="post">
			
            <div class='formField'>        	
                <div class='fieldTitle'> <label> User Category: </label> </div>
                <div class='fieldInput'> 
                    <select id='userCategory' name='UserCategory' onchange="toggleSubCategory()">
                    <? foreach($userCategories[0] as $cat_id => $category) { ?>
                        <option value="<?=$cat_id?>" <?= (!empty($user_data['UserCategory']) && $user_data['UserCategory'] == $cat_id) ? 'selected="selected"' : ''; ?> > <?=$category?> </option>
                    <? } ?>
                    </select>
                    <span class='subCategory'>
                        <? foreach($subCategories as $p_id => $subCategory) { ?>
                        <span id='subCat<?=$p_id;?>' class='pl10' style="display:none">  
                            <select id='userSubCategory' name='UserSubCategory'>
                                <option value=""></option>
                            <? foreach($subCategory as $sub_id => $subCat) { ?>
                                <option value="<?=$sub_id?>" <?= (!empty($user_data['UserSubCategory']) && $user_data['UserSubCategory'] == $sub_id) ? 'selected="selected"' : ''; ?> > <?=$subCat?> </option>
                            <? } ?>	
                            </select>
                        </span>	
                        <? } ?>
                    </span>
                    <input type="hidden" id='has_subcategory' name='has_subcategory' value="0" />
                </div>
                <div class="clr"></div>
			</div>
            
            <div class='formField'>        	
                <div class='fieldTitle'> <label> Industry: </label> </div>
                <div class='fieldInput'>
                	<select id='industry' name="industry" style="width:412px;" >
                    <? foreach($industries as $ids_slug => $ids_name) { ?>
                    	<option value="<?=$ids_slug?>" <?= (!empty($user_data['industry']) && $user_data['industry'] == $ids_slug) ? 'selected="selected"' : ''; ?> > <?=ucwords(strtolower($ids_name))?> </option> 
                    <? } ?>
                    </select>
                </div>
                <div class="clr"></div>
			</div>
            
            <div class='formField'>        	
                <div class='sectionTitle' > <label> PERSONAL INFORMATION </label> </div>
                <div class="clr"></div>
			</div>
            
            <div class='formField'>        	
                <div class='fieldTitle'> <label> First Name: </label> </div>
                <div class='fieldInput'>
                	<input type="text" class='txt' name='first_name' maxlength="200" value="<?= !empty($user_data['first_name']) ? $user_data['first_name'] : '' ?>" />
                </div>
                <div class="clr"></div>
			</div>
            
            <div class='formField'>        	
                <div class='fieldTitle'> <label> Last Name: </label> </div>
                <div class='fieldInput'>
                	<input type="text" class='txt' name='last_name' maxlength="200" value="<?= !empty($user_data['last_name']) ? $user_data['last_name'] : '' ?>" />
                </div>
                <div class="clr"></div>
			</div>
            
            <div class='formField'>        	
                <div class='fieldTitle'> <label> Gender: </label> </div>
                <div class='fieldInput'>
                	<input type="radio" name='gender' class='opt_gender' value='M' checked="checked" /> <span class="mt5">  Male </span>
                    <input type="radio" name='gender' class='opt_gender' value='F' /> <span class="mt5">  Female </span>
                </div>
                <div class="clr"></div>
			</div>
            
            <div class='formField'>        	
                <div class='fieldTitle'> <label> Date of Birth: </label> </div>
                <div class='fieldInput'>
                	<input type="text" class='txt' name='birth_date' id='birth_date' readonly="readonly" value="<?= !empty($user_data['birth_date']) ? $user_data['birth_date'] : '' ?>" />
                </div>
                <div class="clr"></div>
			</div>
            
            <div class='formField'>        	
                <div class='fieldTitle'> <label> Country: </label> </div>
                <div class='fieldInput'>
                	<select id='country' name="country" >
                    <? foreach($countries as $c_code => $c_name) { ?>
                    	<option value="<?=$c_code?>" <?= (!empty($user_data['country']) && $user_data['country'] == $c_code) ? 'selected="selected"' : ''; ?>> 
							<?=ucwords(strtolower($c_name))?> 
						</option> 
                    <? } ?>
                    </select>
                </div>
                <div class="clr"></div>
			</div>
			
            <div class='formField'>        	
                <div class='fieldTitle'> <label> City: </label> </div>
                <div class='fieldInput'>
                	<input type="text" class='txt' name='city' maxlength="200" value="<?= !empty($user_data['city']) ? $user_data['city'] : '' ?>" />
                </div>
                <div class="clr"></div>
			</div>
            
            <div class='formField'>        	
                <div class='fieldTitle'> <label> Post Code: </label> </div>
                <div class='fieldInput'>
                	<input type="text" class='txt' name='post_code' maxlength="15" value="<?= !empty($user_data['post_code']) ? $user_data['post_code'] : '' ?>" />
                </div>
                <div class="clr"></div>
			</div>

			<div class='formField'>        	
                <div class='sectionTitle' > <label> LOGIN INFORMATION </label> </div>
                <div class="clr"></div>
			</div>
			
            <div class='formField'>        	
                <div class='fieldTitle'> <label> Email: </label> </div>
                <div class='fieldInput'>
                	<input type="text" class='txt' name='email' maxlength="200" value="<?= !empty($user_data['email']) ? $user_data['email'] : '' ?>" />
                </div>
                <div class="clr"></div>
			</div>
            
            <div class='formField'>        	
                <div class='fieldTitle'> <label> Username: </label> </div>
                <div class='fieldInput'>
                	<input type="text" class='txt' name='username' maxlength="200" value="<?= !empty($user_data['username']) ? $user_data['username'] : '' ?>" />
                </div>
                <div class="clr"></div>
			</div>
            
            <div class='formField'>        	
                <div class='fieldTitle'> <label> Password: </label> </div>
                <div class='fieldInput'>
                	<input type="password" class='txt' name='user_password' maxlength="200" value="<?= !empty($user_data['user_password']) ? $user_data['user_password'] : '' ?>" />
                </div>
                <div class="clr"></div>
			</div>
            
            <input type='hidden' name='id' value = "<?= !empty($user_data['id']) ? $user_data['id'] : '' ?>" />
            <input type='hidden' name='uuid' value = "<?= !empty($user_data['uuid']) ? $user_data['uuid'] : '' ?>" />
            
            <div class='save_cancel_btn'>
                <ul>                
                    <!-- <li><a class="cancel" href="javascript:{}">Cancel</a></li> -->
                    <li><a class="save" href="javascript:{}" onclick="save()"> <?= !empty($user_data['id']) ? 'Update User' : 'Create User' ?> </a></li>
                </ul>
            </div>
            
        </form>
        <div class="clr"></div>
    </div>
    <div class="clr"></div>
</div>

<script type="text/javascript">

$(document).ready( function(){
	$( "#birth_date" ).datepicker({ 
		minDate: "-99Y", 
		maxDate: "-14Y",
		changeMonth: true,
		changeYear: true,
		dateFormat: "mm-dd-yy"
	});
	
	toggleSubCategory();
});

function toggleSubCategory() {
	
	$('.subCategory span').hide();
	var category = $('#userCategory').val();
	$('#subCat'+category).show();
	
	var sub_cat = 0;
	if( $('#subCat'+category).length > 0 ){
		sub_cat = 1;	
	}
	
	$('#has_subcategory').val(sub_cat);
	
}

function save(){
	var save_url = "<?=$this->base?>/admin/user_management/save_user";
	$('#newUser').attr('action', save_url);
	$('#newUser').submit();
}

</script>