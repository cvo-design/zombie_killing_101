<?php
/**
 * Created by PhpStorm.
 * User: Chris VanOrden
 * Date: 11/10/2015
 * Time: 11:37 AM
 */

if (!$_SESSION['LoginStatus']) {
    echo('
 <div class="masthead clearfix">
                <div class="inner">
                    <h3 class="masthead-brand">Jims App</h3>
                    <nav>
                        <ul class="nav masthead-nav">
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="newUserReg.php">New User</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
');
}
else {
    echo('

     <div class="masthead clearfix">
                <div class="inner">
                    <h3 class="masthead-brand">Cover</h3>
                    <nav>
                        <ul class="nav masthead-nav">
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="newUserReg.php">New User</a></li>
                            <li><a href="logout.php">Log Out</a></li>
                            <li><a href="windowcalls.php">Window Calls</a></li>
                            <li><a href="the_storm.php">Osiris</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

    ');
}


