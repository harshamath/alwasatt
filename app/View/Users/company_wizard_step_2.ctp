<div class="row">
    <div class="bbox">
        <div class="presence">
            <h1><?= $user['Organization']['name']; ?> Company Information</h1>
        </div>
        <form class="form-horizontal" role="form" method="post" action="company_wizard_step_2">
            <input type="hidden" name="data[Organization][user_id]" value="<?= $user['User']['id']; ?>">
            <input type="hidden" name="data[Organization][id]" value="<?= $user['User']['organization_id']; ?>">
            <div class="col-lg-7 col-md-7 ">
                <h2>Commodities and Services</h2>
                <strong>Service Category</strong>

                <div class="form-group">
                    <div class="col-sm-12 pl_0">
                        <div class="col-sm-12 pl_0"> 
                            <label class="col-sm-3 control-label">Search Categories<i class="red_dot">*</i></label>
                            <div class="col-sm-8 pl_0"><input type="text" name="data[Organization][service_category]" value="<?= $user['Organization']['service_category']; ?>" placeholder="" class="form-control"></div>
<!--                            <div class="col-sm-1 pl_0"><input type="button" size="10" class="search"></div>-->
                        </div>

                    </div>
                </div>
                <h3>or select category from below</h3>
                <div class="col-sm-12 pl_0 mar_b10">

                    <div class="col-sm-4 pl_0 cat_lvl">
                        <select class="form-control" multiple="multiple">
                            <option>Development</option>
                            <option>Accounting</option>
                            <option>IT</option>
                            <option>Web Design</option>
                            <option>User Interface</option>
                            <option>Buyer</option>
                            <option>Team Leader</option>
                            <option>Human Resources</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="col-sm-4 pl_0 cat_lvl">    
                        <select class="form-control" multiple="multiple">
                            <option>Development</option>
                            <option>Accounting</option>
                            <option>IT</option>
                            <option>Web Design</option>
                            <option>User Interface</option>
                            <option>Buyer</option>
                            <option>Team Leader</option>
                            <option>Human Resources</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="col-sm-4 pl_0 cat_lvl">    
                        <select class="form-control" multiple="multiple">
                            <option>Development</option>
                            <option>Accounting</option>
                            <option>IT</option>
                            <option>Web Design</option>
                            <option>User Interface</option>
                            <option>Buyer</option>
                            <option>Team Leader</option>
                            <option>Human Resources</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 "> 
<!--                    <div class="breadcrumb mb-30">
                        Development <span>&gt;</span> Web Design <span>&gt;</span> Photoshop <span class="last"><img src="<?= $this->webroot ?>/images/ic_ok_1.png"></span>
                    </div>-->
                    <div class="col-xs-offset-2"><form role="form" class="form-horizontal ">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Service Title<i class="red_dot">*</i></label>
                                <div class="col-sm-8 pl_0">
                                    <input type="text" name="data[Organization][service_title]" value="<?= $user['Organization']['service_title']; ?>" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Keywords<i class="red_dot">*</i></label>
                                <div class="col-sm-8 pl_0">
                                    <input type="text" name="data[Organization][keywords]" value="<?= $user['Organization']['keywords']; ?>" placeholder="" class="form-control"><img src="<?= $this->webroot ?>images/ic_info_1.png">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Target Range<i class="red_dot">*</i></label>
                                <div class="col-sm-8 pl_0">
                                    <input type="text" name="data[Organization][target_range]" value="<?= $user['Organization']['target_range']; ?>" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label ">Description<i class="red_dot">*</i></label>
                                <div class="col-sm-8 pl_0">
                                    <textarea placeholder="Text here..." name="data[Organization][service_description]" size="" type="text" class="form-control"><?= $user['Organization']['service_description']; ?></textarea>
                                </div>
                            </div>

                    </div>
                </div>

            </div>

            <div style="float:left; width:100%;"><hr />
                <div class="col-xs-offset-1">

                    <h3>Business Territories</h3>
                    <div class="form-group">
                        <label class="col-sm-3 control-label ">Target Range<i class="red_dot">*</i></label>
                        <div class="col-sm-8 pl_0">
                            <input type="text" name="data[Organization][target_range_2]" value="<?= $user['Organization']['target_range_2']; ?>" class="form-control"  placeholder="">
                        </div>
                    </div>
                    <fieldset class="clearfix">
                        <a href="<?= $this->base ?>/users/company_wizard" class="act_btn btn_radius float-l btn_glow">Previous</a>
                        <!--                        <a href="#" class="act_btn btn_radius  btn_glow">Next</a>-->
                        <button type="submit" class="act_btn btn_radius  btn_glow">Next</button>
                    </fieldset>

                </div>
            </div>
        </form>
        <div class="col-lg-12 col-md-7 "><hr />
            <div class="bottom_text">
                All items marked with red strip (<b style="color:#FF0000;" class="text_16">*</b>) are required.
            </div></div>
    </div>