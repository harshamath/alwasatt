<div class="row">
    <div class="bbox">
        <h1 class="greenhead to-left">AMSG LLC Basic information</h1>
        <div class="wizard-data">
            <p class="large">Please specify what commodities or services your provide along with your target market and materials and tools.</p>
            <form class="form-horizontal" role="form" method="post" action="company_wizard">

                <section class="panal">
                    <p class="large">Basic Information</p>
                    <div class="form-group">
                        <label for="input1" class="col-sm-2 control-label">Title<i class="red_dot">*</i></label>
                        <div class="col-sm-6">
                            <input type="text" name="data[Company][title]" class="form-control" id="input1" placeholder="AMSG">
                            <span class="help-block">@amsg.com</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input2" class="col-sm-2 control-label">Industries<i class="red_dot">*</i></label>
                        <div class="col-sm-3">
                            <select multiple id="input2" class="form-control m170">
                                <option selected>All</option>
                                    <?php foreach ($industryList as $industry) { ?>
                                <option> <?php echo $industry['Industry']['name']; ?> </option>
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
                            <input type="text" class="form-control" id="input3">
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
                            <input type="text" class="form-control" id="input4">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input5" class="col-sm-2 control-label">Address (2)</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="input5">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input6" class="col-sm-2 control-label">Country<i class="red_dot">*</i></label>
                        <div class="col-sm-6">
                            <select id="input6" class="form-control">
                                <option selected> --Select Country-- </option>
                                    <?php foreach ($countryList as $country) { ?>
                                <option> <?php echo $country['Country']['country_name']; ?> </option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input7" class="col-sm-2 control-label">City<i class="red_dot">*</i></label>
                        <div class="col-sm-6">
                            <select id="input7" class="form-control">
                                <option selected> --Select City-- </option>
                                    <?php foreach ($cityList as $city) { ?>
                                <option> <?php echo $city['City']['city_name']; ?> </option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input8" class="col-sm-2 control-label">P.O Box</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="input8">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input9" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="input9">
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
                                    <input type="text" class="form-control col-sm-3" placeholder="Enter Phone Number">
                                </div>
                            </div>
                            <button type="button" class="btn-success btnRSm">Add</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-7 col-sm-6">
                            <button type="submit" class="btn btn-default gtxt">Sign in</button>
                        </div>
                    </div>
                </section>
            </form>
            <section class="panal">
                <p class="large">Additional info (optional)
                    <button type="submit" class="btn btn-default gtxt"><span class="glyphicon glyphicon-plus"></span></button>
                </p>
                <button type="button" class="btn-success btnR pull-right mTB20">Next</button>
            </section>
        </div>
    </div>
</div>