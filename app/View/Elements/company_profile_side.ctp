<div class="col-xs-12 col-md-3">
    <div class="bbox">
        <div class="user_info">
            <div class="suserinfo"> <a href="#"><img class="img-circle" alt="Liena" src="<?= $this->webroot . Configure::read('ORGANIZATION_LOGO_PATH');?>/<?= $user['Organization']['logo']?>"></a> <a href="#" class="susername"><?= $user['Organization']['name']?></a>
            </div>
            <a href="<?= $this->base . '/users/company_wizard'?>" class="edit">Edit Profile</a> </div>
        <div class="suserhead">Our Sphere</div>
        <ul class="nav nav-pills nav-stacked susernav">
            <li><a href="#"><span class="glyphicon glyphicon-dashboard"></span> My Dashboard</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> My Messages <span class="count">6</span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> My Requests <span class="count">2</span></a></li>
        </ul>
        <div class="suserhead">My Jobs <span>Matched (5)</span></div>
        <div class="suserjob">
            <h3>Software engineer required</h3>
            <p>New Activities <span class="badge">2</span></p>
            <p>New comment from buyer <span class="badge">8</span></p>
        </div>
        <div class="suserjob last">
            <h3>Software engineer required</h3>
            <p>New Activities <span class="badge">4</span></p>
            <p>New comment from buyer <span class="badge">1</span></p>
        </div>
        <div class="suserhead">My Companies <span class="glyphicon glyphicon-plus"></span></div>
        <div class="susercompany">
            <p>Companies i'm member of:</p>
            <ul class="nav nav-pills susercomp">
                <li><a href="#" class="green">co</a></li>
                <li><a href="#" class="yellow">8</a></li>
                <li><a href="#" class="green">5</a></li>
                <li><a href="#" class="link">view more</a></li>
            </ul>
        </div>
        <div class="susercompany last">
            <p>Companies i'm member of:</p>
            <ul class="nav nav-pills susercomp">
                <li><a href="#" class="green">co</a></li>
                <li><a href="#" class="yellow">8</a></li>
                <li><a href="#" class="green">5</a></li>
                <li><a href="#" class="link">view more</a></li>
            </ul>
        </div>
    </div>
</div>