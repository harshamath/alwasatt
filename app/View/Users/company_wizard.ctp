<div class="row">
    <div class="bbox">
        <h1 class="greenhead to-left"><?= $user['Organization']['name']; ?> Basic information</h1>
        <div class="wizard-data">
            <p class="large">Please specify what commodities or services your provide along with your target market and materials and tools.</p>
            <form class="form-horizontal" role="form" method="post" action="company_wizard" enctype="multipart/form-data">
                <input type="hidden" name="data[Organization][user_id]" value="<?= $user['User']['id']; ?>">
                <input type="hidden" name="data[Organization][id]" value="<?= $user['User']['organization_id']; ?>">
                <section class="panal">
                    <p class="large">Basic Information</p>
                    <div class="form-group">
                        <label for="input1" class="col-sm-2 control-label">Title<i class="red_dot">*</i></label>
                        <div class="col-sm-6">
                            <input type="text" name="data[Organization][title]" value="<?= $user['Organization']['title']; ?>" class="form-control" id="input1">
<!--                            <span class="help-block">@amsg.com</span>-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input2" class="col-sm-2 control-label">Industries<i class="red_dot">*</i></label>
                        <div class="col-sm-3">
                            <select multiple name="data[Organization][industry_id]" class="form-control m170">
                                <option value="0" selected>Select Industry</option>
                                <?php foreach ($industryList as $industry) { ?>
                                    <option value="<?php echo $industry['Industry']['id']; ?>" <?php if ($industry['Industry']['id'] == $user['Organization']['industry_id']) { ?> selected="selected" <?php } ?>> <?php echo $industry['Industry']['name']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </section>
                <section class="panal">
                    <p class="large">Branch Information</p>
                    <div class="form-group">
                        <label for="input3" class="col-sm-2 control-label">Branch Name<i class="red_dot">*</i></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="data[Organization][branch_name]" value="<?= $user['Organization']['branch_name']; ?>">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">Use same as category <span class="glyphicon glyphicon-info-sign"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input4" class="col-sm-2 control-label">Address (1)</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="data[Organization][address_1]" value="<?= $user['Organization']['address_1']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input5" class="col-sm-2 control-label">Address (2)</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="data[Organization][address_2]" value="<?= $user['Organization']['address_2']; ?>">
                        </div>
                    </div>
                    <!--                    <div class="form-group">
                                            <label for="input6" class="col-sm-2 control-label">Country<i class="red_dot">*</i></label>
                                            <div class="col-sm-6">
                                                <select name="data[Organization][country_id]" class="form-control">
                                                    <option selected> --Select Country-- </option>
                    <?php foreach ($countryList as $country) { ?>
                                                                            <option value="<?= $country['Country']['country_id'] ?>"> <?php echo $country['Country']['country_name']; ?> </option>
                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>-->
                    <!--                    <div class="form-group">
                                            <label for="input7" class="col-sm-2 control-label">City<i class="red_dot">*</i></label>
                                            <div class="col-sm-6">
                                                <select name="data[Organization][city_id]" class="form-control">
                                                    <option selected> --Select City-- </option>
                    <?php foreach ($cityList as $city) { ?>
                                                                            <option> <?php echo $city['City']['city_name']; ?> </option>
                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>-->
                    <div class="form-group">
                        <label for="input8" class="col-sm-2 control-label">P.O Box</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="data[Organization][po_box]" value="<?= $user['Organization']['po_box']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input9" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" name="data[Organization][business_email]" value="<?= $user['Organization']['business_email']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Phone Number</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-xs-4 col-sm-2">
                                    <select class="form-control col-md-2">
                                        <option selected> Work </option>
                                    </select>
                                </div>
                                <div class="col-xs-4 col-sm-2">
                                    <select class="form-control col-sm-3">
                                        <option selected> (+971) UAE </option>
                                    </select>
                                </div>
                                <div class="col-xs-4 col-sm-3">
                                    <input type="text" class="form-control col-sm-3" name="data[Organization][business_phone]" value="<?= $user['Organization']['business_phone']; ?>" placeholder="Enter Phone Number">
                                </div>
                            </div>
                            <button type="button" class="btn-success btnRSm">Add</button>
                        </div>
                    </div>

                </section>

                <section class="panal">
                    <p class="large">Additional info (optional)
                        <button type="button" class="btn btn-default gtxt" id="btn-show-optional-info"><span class="glyphicon glyphicon-minus"></span></button>
                    </p>
                    <div id="div-optional-info">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Slogan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="data[Organization][slogan]" value="<?= $user['Organization']['slogan']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Annual Revenue</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="data[Organization][annual_revenue]">
                                    <?php foreach ($annual_revenue_values as $key => $annual_revenue): ?>
                                    <option value="<?= $key ?>" <?php if($key == $user['Organization']['annual_revenue']) { ?> selected="selected" <?php }?>><?= $annual_revenue ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Year Founded</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="data[Organization][year_founded]" value="<?= $user['Organization']['year_founded']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Employees</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="data[Organization][employees]" value="<?= $user['Organization']['employees']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Type of Organization</label>
                            <div class="col-sm-6">
                                <select name="data[Organization][organization_type_id]" class="form-control">
                                    <option value="0" selected>Select Type of Organization</option>
                                    <?php foreach ($organizationType as $organization) { ?>
                                        <option value="<?php echo $organization['OrganizationType']['id']; ?>" <?php if ($organization['OrganizationType']['id'] == $user['Organization']['organization_type_id']) { ?> selected="selected" <?php } ?>> <?php echo $organization['OrganizationType']['name']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Business Type</label>
                            <div class="col-sm-6">
                                <select name="data[Organization][business_type_id]" class="form-control">
                                    <option value="0" selected>Select Business Type</option>
                                    <?php foreach ($businessType as $business) { ?>
                                        <option value="<?php echo $business['BusinessType']['id']; ?>" <?php if ($business['BusinessType']['id'] == $user['Organization']['business_type_id']) { ?> selected="selected" <?php } ?>> <?php echo $business['BusinessType']['name']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Logo</label>
                            <div class="col-sm-6">
                                <?php echo $this->Form->file('Organization.logo'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-success btnR pull-right mTB20">Next</button>
                    </div>
                </section>
            </form>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#btn-show-optional-info').click(function() {
            $('#div-optional-info').toggle('slow');
            $('#btn-show-optional-info span').toggle(function() {
                $(this).show();
                $(this).toggleClass("glyphicon-minus glyphicon-plus");
            }, function() {
                $(this).show();
                $(this).toggleClass("glyphicon-plus glyphicon-minus");
            });
        });
    });
</script>