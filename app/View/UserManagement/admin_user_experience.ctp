<?
	echo $this->Html->css('alwasatt_admin');
	echo $this->Html->css('jqueryui/themes/base/jquery.ui.core');
	echo $this->Html->css('jqueryui/themes/base/jquery.ui.theme');
	echo $this->Html->css('jqueryui/themes/base/jquery.ui.autocomplete');
	echo $this->Html->css('jqueryui/theme_smoothness/jquery.ui.datepicker.min');
	echo $this->Html->script('jqueryui/jquery-ui.auto.custom.min');
	echo $this->Html->script('jqueryui/jquery.ui.datepicker.min');
	echo $this->Html->script('lib/wqr.validator.min');

	$y_start = 1901;
	$y_current = date('Y');

?>

<div class="inner_hdng"><h2><?php echo $subTitle; ?></h2></div>
<div class="clr"></div>

<div class="advertismnt_banner">
    
    <div class="right_section admin_role_bg minH200">
    
    	<input type='hidden' id='y_current' value="<?=$y_current?>" />
        
        <form id="userExperience" name="userExperience" method="post">
			
            <div class='formField'>        	
                <div class='fieldTitle'> <label> Company Name: </label> </div>
                <div class='fieldInput'> 
					<input type='text' class="exp_fields txt" id='exp_company' name='exp_company' />
                    <a href="javascript:{}" onclick="unlock($(this).prev(), this, true)" style="display:none" id="edit_exp_company">edit</a>
					<input type='hidden' id='exp_company_id' name='exp_company_id' />
                </div>
                <div class="clr"></div>
                
                <div class='fieldTitle'> <label> Job Title: </label> </div>
                <div class='fieldInput'> 
					<input type='text' class="exp_fields txt" id='exp_job' name='exp_job' />
                    <a href="javascript:{}" onclick="unlock($(this).prev(), this, true)" style="display:none" id="edit_exp_job">edit</a>
					<input type='hidden' id='exp_job_id' name='exp_job_id' />
                </div>
                <div class="clr"></div>
                
                
                <div class='fieldTitle'> <label> Time Period: </label> </div>
                <div class='fieldInput'>
                	<span id='exp_start'>
                    	 
                        <select id='exp_start_month' name='exp_start_month' class="exp_fields date_month" >
                        <option value=""> <i>Month</i> </option>
						<? foreach($months as $mv => $month) { ?>
                            <option value="<?=$mv?>" > <?=$month?> </option>
                        <? } ?>
                        </select>
                        &nbsp;-&nbsp;
                        <input type="text" class="numericField w_40 checkYear" maxlength="4" id="exp_start_year" name="exp_start_year" />
                    </span>
                    &nbsp;to&nbsp;
                    <span id='exp_end'> 
                        <select id='exp_end_month' name='exp_end_month' class="exp_fields date_month" >
                        <option value=""> <i>Month</i> </option>
						<? foreach($months as $mv => $month) { ?>
                            <option value="<?=$mv?>" > <?=$month?> </option>
                        <? } ?>
                        </select>
                        &nbsp;-&nbsp;
                        <input type="text" class="numericField w_40 checkYear" maxlength="4" id="exp_end_year" name="exp_end_year" />
                    </span>
                    
				</div>
                <div class="clr"></div>
                                
			</div>
            
            <div class='save_cancel_btn'>
                <ul>                
                    <!-- <li><a class="cancel" href="javascript:{}">Cancel</a></li> -->
                    <li><a class="save" href="javascript:{}" onclick="save()"> Add Experience </a></li>
                </ul>
            </div>
            
        </form>
        
        <div class="clr"></div>
    </div>
    
    <?  if( !empty($userExperiences) ) { 
	foreach($userExperiences as $userExperience) { ?>
    <div class="right_section admin_role_bg minH200">
    	<div class='formField'>        	
            <div class='fieldTitle'> <label> Company: </label> </div>
            <div class='fieldValue'> 
                <label> <?=$userExperience['Organization']['name']?> </label>
            </div>
            <div class="clr"></div>
            
            <div class='fieldTitle'> <label> Job Title: </label> </div>
            <div class='fieldValue'> 
                <label> <?=$userExperience['Occupation']['name']?> </label>
                <input type='hidden' id='edu_major_id' name='edu_major_id' />    
            </div>
            <div class="clr"></div>
            
            
            <div class='fieldTitle'> <label> Time Period: </label> </div>
            <div class='fieldValue'>
            	<label> 
				<? if( empty($userExperience['UserExperience']['start_year']) && 
                        empty($userExperience['UserExperience']['end_year']) ) { ?>
                N/A
                <? } else {
                    if( !empty($userExperience['UserExperience']['start_year']) ) { 
                        if( !empty($userExperience['UserExperience']['start_month_name']) ) { 
                            echo $userExperience['UserExperience']['start_month_name'].' ';
                        }
                            echo $userExperience['UserExperience']['start_year'];
                    } else {
                        echo 'N/A';
                    }
                ?>
                    &nbsp;to&nbsp;
                <?  if( !empty($userExperience['UserExperience']['end_year']) ) { 
                        if( !empty($userExperience['UserExperience']['end_month_name']) ) { 
                            echo $userExperience['UserExperience']['end_month_name'].' ';
                        }
                            echo $userExperience['UserExperience']['end_year'];
                    } else {
                        echo 'N/A';
                    }
                }?>
				</label>
            </div>
            <div class="clr"></div>
                            
        </div>
    </div>	
    <? } }   ?>
	<div class="clr"></div>
    
</div> 

<script type="text/javascript">

$( function() {
	
	bindNumericFields();
	fetchCompaniesSuggestions();
	fetchJobTitleSuggestions();
});

function save() {
	
	var exp_org = $.trim( $('#exp_company').val() );
	var exp_job = $.trim( $('#exp_job').val() );
		
	if(!exp_org || exp_org == '' || exp_org == null){
		alert('Company Name is Required');
		return false;	
	}
	
	if(!exp_job || exp_job == '' || exp_job == null){
		alert('Job Title is Required');
		return false;	
	}
		
	$('.checkYear').each(function(index,elem){ test_year($(elem)); });	
	
	var url = "<?=$this->base?>/admin/user_management/user_experience/<?=$member_uuid?>";
	
	$('#userExperience').attr('action', url);
	$('#userExperience').submit();
	
}

function fetchCompaniesSuggestions() {
	
	var exp_org_url = "<?=$this->base?>/search_companies";
	
	$('#exp_company').autocomplete({
		source: function( request, response ) { 
			$.ajax({
				url: exp_org_url,
				dataType: "json",
				data : {
					q: request.term,
					reqType: 'ac_ajax'	
				},
				success: function ( result ) {
					response( $.map( result.data.OrganizationsList, function (item) {
						return {
							label: item.Organization.name,
							value: item.Organization.name,
							org_id: item.Organization.id
						}
					}) );
				}
			});
		},
		minLength: 2,
		select: function( event, ui ) {
			//console.log( ui.item ? ui.item.degree_id : "0" );
			var org_id = ui.item ? ui.item.org_id : 0;
			$('#exp_company_id').val(org_id);
			$('#exp_company').focusout();
			$('#exp_company').attr('disabled', 'disabled');
			$('#edit_exp_company').show();
		},
		open: function() {
			$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
		},
		close: function() {
			$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
		}
	});
}

function fetchJobTitleSuggestions() {
	
	var exp_job_url = "<?=$this->base?>/occupations";
	
	$('#exp_job').autocomplete({
		source: function( request, response ) { 
			$.ajax({
				url: exp_job_url,
				dataType: "json",
				data : {
					q: request.term,
					reqType: 'ac_ajax'	
				},
				success: function ( result ) {
					response( $.map( result.data.JobTitles, function (item) {
						return {
							label: item.Occupation.name,
							value: item.Occupation.name,
							ejob_id: item.Occupation.id
						}
					}) );
				}
			});
		},
		minLength: 2,
		select: function( event, ui ) {
			//console.log( ui.item ? ui.item.degree_id : "0" );
			var ejob_id = ui.item ? ui.item.ejob_id : 0;
			$('#exp_job_id').val(ejob_id);
			$('#exp_job').focusout();
			$('#exp_job').attr('disabled', 'disabled');
			$('#edit_exp_job').show();
		},
		open: function() {
			$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
		},
		close: function() {
			$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
		}
	});
}

function bindNumericFields() {
	$('.numericField').on('keypress', function (e) {
	    return custom_validator.numericFormat(this, e);			
	});
	
	$('.checkYear').on('blur', function (e) {
	    return test_year(this);	
	});	
}

function test_year(elem){
	
	var d = new Date();
	var start = 1901;
	var end = d.getFullYear();	
	
	var val = parseInt($(elem).val());
	
	if(!val || val == null || val == '' ) {
		return false;
	}
	
	if( isNaN(val) || val < start || val > end ) {
		alert('VALID YEAR VALUE REQUIRED \nEnter Value Between: ' +start+ ' to ' + end);
		$(elem).val('');
		$(elem).focus();
		return false;	
	}
	
	return true;
}

function lock(elem){
	$(elem).attr('disabled', 'disabled');	
}

function unlock(elem, ref, clean ){
	$(elem).removeAttr('disabled');
	if(clean){
		$(elem).val('');	
	}
	$(elem).focus();
	
	$(ref).hide();
}

</script>