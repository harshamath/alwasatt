<div class="abox mtop15">
                <div class="certificatedetail">
                    <h4 class="media-heading">Personal Information</h4>
                </div>
                <table class="table">
                    <tbody>
                      <tr>
                        <td class="lable">Nationality</td>
                        <td><b>Syrian</b></td>
                      </tr>
                      <tr>
                        <td class="lable">Gender</td>
                        <td><b><?php if(AuthComponent::user('gender')=='M')
						{
							echo 'Male';
						}
						else
						{
							echo 'Female';
						}
						
						?></b></td>
                      </tr>
                      <tr>
                        <td class="lable">Birthday</td>
                        <td><b><?php echo date('d, F,Y',strtotime(AuthComponent::user('birth_date'))); ?></b></td>
                      </tr>
                    </tbody>
                </table>
            </div>



<div class="abox mtop15">
                <div class="certificatedetail">
                    <h4 class="media-heading">Languages</h4>
                </div>
                <table class="table">
                    <tbody>
                      <tr>
                        <td class="lable">English</td>
                        <td>
                            <div class="progress thirtypercent">
                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                <span>Native</span>
                              </div>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="lable">Arabic</td>
                        <td>
                            <div class="progress thirtypercent">
                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                <span>Professional</span>
                              </div>
                            </div>
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>