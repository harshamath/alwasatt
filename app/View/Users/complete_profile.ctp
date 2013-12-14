<div class="row">
    <div class="user_prof_wiz_cont col-md-12">
        <h1>Complete Profile</h1>
        <div class="col-md-11 col-md-offset-1">
            <h3>Increase your profile visibility by adding one or more experiences</h3>
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputEmail3">Certification Authority<i class="red_dot">•</i></label>
                    <div class="col-md-5 pl_0">
                        <input type="email" placeholder="" id="inputEmail3" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label " for="inputEmail3">Validity Date<i class="red_dot">•</i></label>
                    <label class="col-md-1 control-label pl_0" for="inputEmail3">From</label>
                    <div class="col-md-2 ">
                        <select class="form-control s_month ">
                            <option value=""> Select Month </option>
                        </select>
                    </div>
                    <div class="col-md-2 ">
                        <select class="col-md-3 form-control s_month ">
                            <option value=""> Select Year </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label pr_5" for="inputEmail3">&nbsp;</label>
                    <label class="col-md-1 control-label pl_0" for="inputEmail3">To</label>
                    <div class="col-md-2 ">
                        <select class="form-control s_month ">
                            <option value=""> Select Month </option>
                        </select>
                    </div>
                    <div class="col-md-2 ">
                        <select class="col-md-3 form-control s_month ">
                            <option value=""> Select Year </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label pr_5" for="inputEmail3">&nbsp;</label>
                    <label>
                        <input type="checkbox">
                        This Certificate dose not expire</label>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label ptb_8" for="inputEmail3">Description</label>
                    <div class="col-md-5 pl_0">
                        <textarea placeholder="Describe your experience here" class="form-control" rows="4"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label ptb_8" for="inputEmail3">Realated Experties</label>
                    <div class="col-md-3 plr_0">
                        <select class="multi_select" name="lvl_1" multiple="multiple">
                            <option>Development</option>
                            <option>Accounting</option>
                            <option>IT</option>
                            <option>Web Design</option>
                            <option>User Interface</option>
                            <option>Buyer</option>
                            <option>Team Leader</option>
                            <option>Human Resources</option>
                            <option>Other</option>
                            <option>Other</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="col-md-1 plr_0">
                        <div class="images "> <a href="#"><img class="mb_10" src="<?php echo $this->base;?>/images/icon1.png"></a> <a href="#"><img src="<?php echo $this->base;?>/images/icon2.png"></a> </div>
                    </div>
                    <div class="col-md-3 plr_0">
                        <select class="multi_select" name="lvl_1" multiple="multiple">
                            <option>Development</option>
                            <option>Accounting</option>
                            <option>IT</option>
                            <option>Web Design</option>
                            <option>User Interface</option>
                            <option>Buyer</option>
                            <option>Team Leader</option>
                            <option>Human Resources</option>
                            <option>Other</option>
                            <option>Other</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>
            </form>
            <div class="col-md-12">
                <p class="m_auto">
                    <button class="btn btn-danger btn-default" type="button">Remove</button>
                    <button class="btn btn-warning btn-default" type="button">Cancel</button>
                    <button class="btn btn-success btn-default" type="button">Save</button>
                </p>
                <p>
                    <button class="btn btn-success btn-lg pull-left" type="button">Skip</button>
                    <button class="btn btn-success btn-lg pull-right" type="button">Next</button>
                </p>

            </div>
        </div>
    </div>
</div>