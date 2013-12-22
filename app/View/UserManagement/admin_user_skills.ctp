<?
	echo $this->Html->css('alwasatt_admin');
	echo $this->Html->css('jqueryui/themes/base/jquery.ui.core');
	echo $this->Html->css('jqueryui/themes/base/jquery.ui.theme');
	echo $this->Html->css('jqueryui/themes/base/jquery.ui.autocomplete');
	echo $this->Html->script('jqueryui/jquery-ui.auto.custom.min');

?>


<div class="inner_hdng"><h2><?php //echo $subTitle; ?></h2></div>
<div class="clr"></div>
<div class="advertismnt_banner">
	
    <div class="right_section admin_role_bg w95 minH40">
            <div class='formField'>        	
                <div class='fieldTitle'> <label> Add User Skill: </label> </div>
                <div class='fieldInput'> 
					<input type='text' class="skl_fields txt" id='new_skill' name='new_skill' />
                    <a href="javascript:{}" onclick="unlock($(this).prev(), this, true)" style="display:none" id="edit_new_skill">edit</a>
					<input type='hidden' id='new_skill_id' name='new_skill_id' value="0" />
                </div>
                <div class="clr"></div>
			</div>
        
        <div class="clr"></div>
    </div>

    
		
	<? if( !empty($userSkills) ) { ?> 
    <div class="right_section admin_role_bg w95 minH40"> 
        <div class="unendorsed-skills-list">
            <ol class="skills-list">
            <? foreach($userSkills as $us => $uSkill) { ?>
                <li class="skill-container-item" id="user_skill_<?=$uSkill['UserSkill']['uuid']?>">
                    <fieldset>
                        <span class="endorse-item-name jellybean">
                            <span class="value"><?=$uSkill['Skill']['name']?></span> <span class="removeUSkill" onclick="remove_user_skill(this)">×</span>
                        </span>
                    </fieldset>
                </li>
            <? } ?>    
            </ol>
        </div>
    	<div class="clr"></div>
    </div>
	<? } ?>
    
    <div class="clr"></div>
</div> 

<script type="text/javascript">


$( function() {
	
	fetchSkillSuggestions();
});

function remove_user_skill(elem){
	
	if(!elem){
		return false;	
	}
		
	var item_li = $(elem).parents('li.skill-container-item');
	var li_id = item_li.attr('id');
	li_id = li_id.replace('user_skill_', '');
	item_li.hide();
	
	var url = "<?=$this->base?>/rem_user_skill/"+li_id;
	
	$.get(url, null, function(resp){
		if(resp == 'true'){
			item_li.remove();	
		} 
	});
	
}

function add_user_skill(skill_id, skill_name){
	
	var url = "<?=$this->base?>/add_user_skill";
	var user_id = "<?=$member_uuid?>";
	
	if(!skill_name || skill_name == null || skill_name == ''){
		console.log('skill name not here');
		return false;	
	}
	
	var skill_data = { "user" : user_id, "skill_id" : skill_id, "skill_name" : skill_name };
	$('#new_skill').val('');
	
	if( $('.unendorsed-skills-list .skill-list').length <= 0 ) {
		var skill_sect = '<div class="right_section admin_role_bg w95 minH40"> <div class="unendorsed-skills-list">';
		skill_sect += '<ol class="skills-list"> </ol> </div> <div class="clr"></div> </div> <div class="clr"></div>';
		
		$('div.advertismnt_banner').append(skill_sect);
	}
	
	var app_html = '<li class="skill-container-item" id=""><fieldset>';
	app_html += '<input type="hidden" class="new-skill-add" value="'+skill_name+'" />';
	app_html += '<span class="endorse-item-name jellybean">'
	app_html += '<span class="value">'+skill_name+'</span> <span class="removeUSkill" style="display:none" onclick="remove_user_skill(this)">×</span>';
	app_html += '</span> </fieldset> </li>';
	
	$('ol.skills-list').append(app_html);
	
	$.post(url, skill_data, function(resp){
		if(resp.status && resp.status == 'OK'){
			var ns = resp.data.skill_name;
			var inp = $("input.new-skill-add[value='"+ns+"']");
			var prnt = inp.parents('li.skill-container-item');
			prnt.attr('id', resp.data.user_skill_uuid);
			prnt.find('span.removeUSkill').show();
		}	
	});
}

function fetchSkillSuggestions() {
	
	var exp_org_url = "<?=$this->base?>/skills";
	var user_id = "<?=$member_uuid?>";
	
	$('#new_skill').autocomplete({
		source: function( request, response ) { 
			$.ajax({
				url: exp_org_url,
				dataType: "json",
				data : {
					q: request.term,
					user: user_id,
					reqType: 'ac_ajax'
				},
				success: function ( result ) {
					response( $.map( result.data.SkillsList, function (item) {
						return {
							label: item.Skill.name,
							value: item.Skill.name,
							skill_id: item.Skill.id
						}
					}) );
				}
			});
		},
		minLength: 2,
		select: function( event, ui ) {
			//console.log( ui.item ? ui.item.degree_id : "0" );
			var skill_id = ui.item ? ui.item.skill_id : 0;
			
		//	$('#new_skill_id').val(org_id);
		//	$('#new_skill').focusout();
		//	$('#exp_company').attr('disabled', 'disabled');
		//	$('#edit_exp_company').show();
			$('#new_skill').val('');
			add_user_skill(skill_id, ui.item.value);
			
		},
		open: function() {
			$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
		},
		close: function() {
			$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
		}
	});
}

</script>