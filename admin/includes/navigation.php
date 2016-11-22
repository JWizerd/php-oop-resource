<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../index.php">HOME PAGE</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li><a target="_blank" href="http://localhost/phpMyAdmin/">phpMyAdmin</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
            <?php
             echo User::find_user_by_session_id()->get_full_name();
            ?><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li>
                    <a href="update.php"><i class="fa fa-fw fa-gear"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <?php if ($_SESSION['username'] == 'admin'): ?>
              <li>
                  <a href="users.php"><i class="fa fa-fw fa-bar-chart-o"></i> Users</a>
              </li>
            <?php endif; ?>
            <li>
                <a href="upload.php"><i class="fa fa-fw fa-table"></i> Upload</a>
            </li>
            <li>
                <a href="photos.php"><i class="fa fa-fw fa-bar-chart-o"></i> Photos</a>
            </li>
            <li>
                <a href="comments.php"><i class="fa fa-fw fa-edit"></i> Comments</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
