<?
	echo $this->Html->css('alwasatt_admin');
?>


<div class="inner_hdng"><h2><?php //echo $subTitle; ?></h2></div>
<div class="clr"></div>
<div class="advertismnt_banner">
    <div class="right_section admin_role_bg w95">
		<ul class="heading">
			<li class="pl10 pr10 w_40"> Sr. # </li>
            <li class="pl10 pr10 w_150"> First Name </li>
            <li class="pl10 pr10 w_150"> Last Name </li>
            <li class="pl10 pr10 w_150"> Email Id </li>
            <li class="pl10 pr10 w_165"> Category </li>
            <li class="pl10 pr10 w_210"> Industry </li>
        </ul>
        <div class="clr"></div>
        <div class="userData">
        <? if( empty($users) ) { ?>
        	<div class='error'> NO REGISTERED USER RECORD FOUND</div>
            <div class="clr"></div>
		<? } else { 
			foreach($users as $user) { 
		?>
        	<ul class='content'>
				<li class="pl10 pr10 w_40"> &nbsp; </li>
                <li class="pl10 pr10 w_150"> <?=$user['User']['first_name']?> </li>
                <li class="pl10 pr10 w_150"> <?=$user['User']['last_name']?> </li>
                <li class="pl10 pr10 w_150"> <?=$user['User']['email']?> </li>
                <li class="pl10 pr10 w_165"> <?=$user['User']['user_category']?> </li>
                <li class="pl10 pr10 w_210"> <?=$user['User']['user_industry']?> </li>
            </ul>
            <div class="clr"></div>
		<? } } ?>
        </div>
    	<div class="clr"></div>
    </div>
    <div class="clr"></div>
</div> 

<script type="text/javascript">


</script>