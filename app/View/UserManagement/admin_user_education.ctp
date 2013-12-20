<?
	echo $this->Html->css('alwasatt_admin');
	echo $this->Html->css('jqueryui/themes/base/jquery.ui.core');
	echo $this->Html->css('jqueryui/themes/base/jquery.ui.theme');
	echo $this->Html->css('jqueryui/themes/base/jquery.ui.autocomplete');
	echo $this->Html->script('jqueryui/jquery-ui.auto.custom.min');
	
	$y_start = 1901;
	$y_current = date('Y');
?>

<div class="inner_hdng"><h2><?php echo $subTitle; ?></h2></div>
<div class="clr"></div>

<div class="advertismnt_banner">
    
    <div class="right_section admin_role_bg minH200">
    
    	<input type='hidden' id='y_current' value="<?=$y_current?>" />
        
        <form id="userEducation" name="userEducation" method="post">
			
            <div class='formField'>        	
                <div class='fieldTitle'> <label> User Degree Program: </label> </div>
                <div class='fieldInput'> 
					<input type='text' class="edu_fields txt" id='edu_degree' name='edu_degree' />
					<input type='hidden' id='edu_degree_id' name='edu_degree_id' />    
                </div>
                <div class="clr"></div>
                
                <div class='fieldTitle'> <label> Major Field of Study: </label> </div>
                <div class='fieldInput'> 
					<input type='text' class="edu_fields txt" id='edu_major' name='edu_major' />
					<input type='hidden' id='edu_major_id' name='edu_major_id' />    
                </div>
                <div class="clr"></div>
                
                <div class='fieldTitle'> <label> College / University: </label> </div>
                <div class='fieldInput'> 
					<input type='text' class="edu_fields txt" id='edu_univ' name='edu_univ' />
					<input type='hidden' id='edu_univ_id' name='edu_univ_id' /> 
                </div>
                <div class="clr"></div>
                
                <div class='fieldTitle'> <label> Started In: </label> </div>
                <div class='fieldInput'> 
					<select id='eduStartYear' name='eduStartYear' class="edu_fields date_year" >
                    <? for($yr = $y_start; $yr<=$y_current; $yr++) { ?>
                        <option value="<?=$yr?>" > <?=$yr?> </option>
                    <? } ?>
                    </select>                
				</div>
                <div class="clr"></div>
				
                <div class='fieldTitle'> <label id='lbl_complete'> Completed In: </label> </div>
                <div class='fieldInput'> 
					<select id='eduEndYear' name='eduEndYear' class="edu_fields date_year" >
                    <? for($yr = $y_start; $yr<=$y_current; $yr++) { ?>
                        <option value="<?=$yr?>" > <?=$yr?> </option>
                    <? } ?>
                    </select>
                    
                    <span class='ml10 pl10'>
                    	<input type='hidden' id='edu_under_progress' name='edu_under_progress' value='0' />
                    	<input type='checkbox' id='under_progress' class='neg_mt5' onchange="toggleProgLabel()"/> 
                        <span class='ml5 '> In Progress / Not Completed Yet </span>
                    </span>        
				</div>
                <div class="clr"></div>

                                
			</div>
            
            <div class='save_cancel_btn'>
                <ul>                
                    <!-- <li><a class="cancel" href="javascript:{}">Cancel</a></li> -->
                    <li><a class="save" href="javascript:{}" onclick="save()"> Add Education </a></li>
                </ul>
            </div>
            
        </form>
        
        <div class="clr"></div>
    </div>
    
    <? if( !empty($userEducations) ) { 
	foreach($userEducations as $userEducation) { ?>
    <div class="right_section admin_role_bg minH200">
    	<div class='formField'>        	
            <div class='fieldTitle'> <label> User Degree Program: </label> </div>
            <div class='fieldValue'> 
                <label> <?=$userEducation['EducationDegree']['name']?> </label>
                <input type='hidden' id='edu_degree_id' name='edu_degree_id' />
            </div>
            <div class="clr"></div>
            
            <div class='fieldTitle'> <label> Major Field of Study: </label> </div>
            <div class='fieldValue'> 
                <label> <?=$userEducation['EducationMajor']['name']?> </label>
                <input type='hidden' id='edu_major_id' name='edu_major_id' />    
            </div>
            <div class="clr"></div>
            
            <div class='fieldTitle'> <label> College / University: </label> </div>
            <div class='fieldValue'> 
                <label> <?=$userEducation['EducationInstitute']['name']?> </label>
                <input type='hidden' id='edu_univ_id' name='edu_univ_id' /> 
            </div>
            <div class="clr"></div>
            
            <div class='fieldTitle'> <label> Started In: </label> </div>
            <div class='fieldValue'> 
                <label> <?=$userEducation['UserEducation']['start_date']?> </label>                
            </div>
            <div class="clr"></div>
            
            <div class='fieldTitle'> <label id='lbl_complete'> 
                <?= ($userEducation['UserEducation']['is_completed'] == 1) ? 'Completed In' : 'Expect to Complete In'?> : 
            </label> </div>
            <div class='fieldValue'> 
                <label> <?=$userEducation['UserEducation']['end_date']?> </label>
                
                <span class='fltL ml10 pl10'>
                    <input type='hidden' id='edu_under_progress' name='edu_under_progress' value='0' />
                    <input type='checkbox' id='under_progress' class='neg_mt5' disabled="disabled" 
                        <? if($userEducation['UserEducation']['is_completed'] == 0) { ?> checked="checked" <? } ?>
                    /> 
                    <span class='ml5 '> In Progress / Not Completed Yet </span>
                </span>        
            </div>
            <div class="clr"></div>                
        </div>
    </div>	
    <? } } ?>
	<div class="clr"></div>
    
</div> 

<script type="text/javascript">

$( function() {
	
	function log( message ) {
		$( "<div>" ).text( message ).prependTo( "#log" );
		$( "#log" ).scrollTop( 0 );
	} 
	
	fetchDegreeSuggestions();
	fetchMajorFieldsSuggestions();
	fetchCollegeSuggestions();
	
});

function save() {
	var edu_degree = $('#edu_degree').val();
	var edu_major = $('#edu_major').val();
	var edu_univ = $('#edu_univ').val();
	
	if( edu_degree == null && edu_major == null && edu_univ == null ) {
		if(edu_degree == null){
			alert('Degree Program is Required');
			return false;	
		}
		
		if(edu_major == null){
			alert('Major Field of Study is Required');
			return false;	
		}
		
		if(edu_univ == null){
			alert('College / University is Required');
			return false;	
		}
	}
	
	var url = "<?=$this->base?>/admin/user_management/user_education/<?=$member_uuid?>";
	
	$('#userEducation').attr('action', url);
	$('#userEducation').submit();
	
}

function fetchDegreeSuggestions() {
	
	var edu_degree_url = "<?=$this->base?>/edu_degrees";
	
	$('#edu_degree').autocomplete({
		source: function( request, response ) { 
			$.ajax({
				url: edu_degree_url,
				dataType: "json",
				data : {
					q: request.term,
					reqType: 'ac_ajax'	
				},
				success: function ( result ) {
					response( $.map( result.data.DegreeList, function (item) {
						return {
							label: item.EducationDegree.name,
							value: item.EducationDegree.name,
							degree_id: item.EducationDegree.id
						}
					}) );
				}
			});
		},
		minLength: 2,
		select: function( event, ui ) {
			//console.log( ui.item ? ui.item.degree_id : "0" );
			var degree_id = ui.item ? ui.item.degree_id : 0;
			$('#edu_degree_id').val(degree_id);
			$('#edu_degree').focusout();
		},
		open: function() {
			$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
		},
		close: function() {
			$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
		}
	});
}

function fetchMajorFieldsSuggestions() {
	
	var edu_major_url = "<?=$this->base?>/edu_majors";
	
	$('#edu_major').autocomplete({
		source: function( request, response ) { 
			$.ajax({
				url: edu_major_url,
				dataType: "json",
				data : {
					q: request.term,
					reqType: 'ac_ajax'	
				},
				success: function ( result ) {
					response( $.map( result.data.MajorFields, function (item) {
						return {
							label: item.EducationMajor.name,
							value: item.EducationMajor.name,
							major_id: item.EducationMajor.id
						}
					}) );
				}
			});
		},
		minLength: 2,
		select: function( event, ui ) {
			
			var major_id = ui.item ? ui.item.major_id : 0;
			$('#edu_major_id').val(major_id);
			$('#edu_major').focusout();
		},
		open: function() {
			$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
		},
		close: function() {
			$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
		}
	});
}

function fetchCollegeSuggestions() {
	
	var search_college_url = "<?=$this->base?>/search_college";
	
	$('#edu_univ').autocomplete({
		source: function( request, response ) { 
			$.ajax({
				url: search_college_url,
				dataType: "json",
				data : {
					q: request.term,
					reqType: 'ac_ajax'	
				},
				success: function ( result ) {
					response( $.map( result.data.Colleges, function (item) {
						return {
							label: item.EducationInstitute.name,
							value: item.EducationInstitute.name,
							colg_id: item.EducationInstitute.id
						}
					}) );
				}
			});
		},
		minLength: 2,
		select: function( event, ui ) {
			var colg_id = ui.item ? ui.item.colg_id : 0;
			$('#edu_univ_id').val(colg_id);
			$('#edu_univ').focusout();
		},
		open: function() {
			$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
		},
		close: function() {
			$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
		}
	});
}

function toggleProgLabel() {
	
	var prog_checked = $('#under_progress').prop('checked');
	var prog_val = 0;
	var prog_label = "Completed In:";
	if( prog_checked ) {
		prog_val = 1;
		prog_label = "Expect to Complete In:";
	}
	
	$('#edu_under_progress').val( prog_val );
	$('#lbl_complete').text(prog_label);
}


</script>