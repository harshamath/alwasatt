<div class="row">
	<div class="user_prof_wiz_cont col-md-12">
		<h1>Complete Profile</h1>
		<div class="col-md-11 col-md-offset-1">
			<h3>Change Profile</h3>
			<?php echo $this->Form->create('User', array('class' => "form-horizontal", 'role' => "form")); ?>
			<div class="form-group">
				<label class="col-md-3 control-label" for="title"><?php echo __('Title');?></label>
				<div class="col-md-5 pl_0">
				  <?php echo $this->Form->input('title', array('label' => false, 'class' => "form-control")); ?>
				</div>
			</div>	
			<div class="form-group">
				<label class="col-md-3 control-label" for="firstname"><?php echo __('First Name');?></label>
				<div class="col-md-5 pl_0">
				  <?php echo $this->Form->input('firstname', array('label' => false, 'class' => "form-control")); ?>
				</div>
			</div>	
			<div class="form-group">
				<label class="col-md-3 control-label" for="lastname"><?php echo __('Last Name');?></label>
				<div class="col-md-5 pl_0">
				  <?php echo $this->Form->input('lastname', array('label' => false, 'class' => "form-control")); ?>
				</div>
			</div>			
			<div class="form-group">
				<label class="col-md-3 control-label " for="dob">Date of Birth</label>
				<div class="col-md-5 pl_0">
				  <?php echo $this->Form->input('dob', array('label' => false, 'div' => false, 'class' => "s_month")); ?>
				</div>			
			</div>			
			<div class="form-group">
				<label class="col-md-3 control-label" for="addr1"><?php echo __('Address');?></label>
				<div class="col-md-5 pl_0">
				  <?php echo $this->Form->input('addr1', array('label' => false, 'class' => "form-control")); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="city"><?php echo __('City');?></label>
				<div class="col-md-5 pl_0">
				  <?php echo $this->Form->input('city', array('label' => false, 'class' => "form-control")); ?>
				</div>
			</div>	
			<div class="form-group">
				<label class="col-md-3 control-label" for="state"><?php echo __('State');?></label>
				<div class="col-md-5 pl_0">
				  <?php echo $this->Form->input('state', array('label' => false, 'class' => "form-control")); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="zip"><?php echo __('Zip');?></label>
				<div class="col-md-5 pl_0">
				  <?php echo $this->Form->input('zip', array('label' => false, 'class' => "form-control")); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="country_id"><?php echo __('Country');?></label>
				<div class="col-md-5 pl_0">
				  <?php echo $this->Form->input('country_id', array('label' => false, 'class' => "form-control")); ?>
				</div>
			</div>				
			<div class="form-group">
				<label class="col-md-3 control-label" for="telephone"><?php echo __('Telephone');?></label>
				<div class="col-md-5 pl_0">
				  <?php echo $this->Form->input('telephone', array('label' => false, 'class' => "form-control")); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="mobile"><?php echo __('Mobile');?></label>
				<div class="col-md-5 pl_0">
				  <?php echo $this->Form->input('mobile', array('label' => false, 'class' => "form-control")); ?>
				</div>
			</div>			
            <div class="col-md-12">
              <p class="m_auto">
                <button class="btn btn-success btn-default" type="submit">Save</button>
              </p>             
            </div>			
			</form>
		</div>		
		<div class="col-md-11 col-md-offset-1" id="experiences">
			<h3><a href="#experiences" onclick="$('#experience').toggle();">+ Increase your profile visibility by adding one or more experiences</a></h3>
		<div id="experience" style="display:none;">
			<?php echo $this->Form->create('Experience', array('url' => array('controller' => 'experiences', 'action' => 'add'), 'class' => "form-horizontal", 'role' => "form")); ?>
			<div class="form-group">
				<label class="col-md-3 control-label" for="company_name"><?php echo __('Company Name');?><i class="red_dot">•</i></label>
				<div class="col-md-5 pl_0">
				  <?php echo $this->Form->input('company_name', array('label' => false, 'class' => "form-control")); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="designation"><?php echo __('Title');?><i class="red_dot">•</i></label>
				<div class="col-md-5 pl_0">
				  <?php echo $this->Form->input('designation', array('label' => false, 'class' => "form-control")); ?>
				</div>
			</div>	
			<div class="form-group">
				<label class="col-md-3 control-label" for="location"><?php echo __('Location');?><i class="red_dot">•</i></label>
				<div class="col-md-5 pl_0">
				  <?php echo $this->Form->input('location', array('label' => false, 'class' => "form-control")); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label " for="inputEmail3"><?php echo __('Time Period'); ?><i class="red_dot">•</i></label>
				<label class="col-md-1 control-label pl_0" for="inputEmail3"><?php echo __('From'); ?></label>
				<div class="col-md-2 ">
					<?php echo $this->Form->input('start_month', array('label' => false, 'div' => false, 'type' => 'date', 'dateFormat' => 'M', 'class' =>  'col-md-3 form-control s_month')); ?>
				</div>
				<div class="col-md-2 ">
					<?php echo $this->Form->input('start_year', array('label' => false, 'div' => false, 'type' => 'date', 'dateFormat' => 'Y', 'class' =>  'col-md-3 form-control s_month')); ?>
				</div>
			</div>			
			<div class="form-group">
				<label class="col-md-3 control-label pr_5" for="inputEmail3">&nbsp;</label>
				<label class="col-md-1 control-label pl_0" for="inputEmail3"><?php echo __('To'); ?></label>
				<div class="col-md-2 ">
					<?php echo $this->Form->input('end_month', array('label' => false, 'div' => false, 'type' => 'date', 'dateFormat' => 'M', 'class' =>  'col-md-3 form-control s_month')); ?>
				</div>
				<div class="col-md-2 ">
					<?php echo $this->Form->input('end_year', array('label' => false, 'div' => false, 'type' => 'date', 'dateFormat' => 'Y', 'class' =>  'col-md-3 form-control s_month')); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label ptb_8" for="inputEmail3"><?php echo __('Description'); ?></label>
				<div class="col-md-5 pl_0">
				  <?php echo $this->Form->input('work_desc', array('label' => false, 'type' => 'textarea', 'class' => "form-control", 'rows' => "4")); ?>
				</div>
			</div>								
            <div class="col-md-12">
              <p class="m_auto">
                <button class="btn btn-success btn-default" type="submit"><?php echo __('Save'); ?></button>
				<button class="btn btn-warning btn-default" type="button" onclick="$('#experience').hide();"><?php echo __('Cancel'); ?></button>
              </p>             
            </div>			
			</form>
		</div>
		<!-- end of experience form -->
		<!-- list of experiences -->
			<ul>
				<?php foreach($this->request->data['Experience'] as $experience) { ?>
				<li>
					<h4><?php echo $experience['designation'];?></h4>
					<p><?php echo $experience['company_name'];?></p>
					<p><?php echo date('M Y', strtotime($experience['start_year'].'-'.$experience['start_month']));
							echo " - " . date('M Y', strtotime($experience['end_year'].'-'.$experience['end_month']));
							echo " | " . $experience['location'];?></p>
					<p><?php echo $experience['work_desc'];?></p>
					<div class="col-md-12">
					  <p class="m_auto">
						<?php echo $this->Form->postLink(__('Remove'), array('controller'=> 'experiences', 'action' => 'delete', $experience['id']), array('class' => 'btn btn-danger btn-default'), __('Are you sure you want to remove %s?', $experience['designation'])); ?>
					  </p>             
					</div>					
				</li>
				<?php } ?>
			</ul>
		</div>
		<!-- end of list of experiences -->
    </div>
</div>