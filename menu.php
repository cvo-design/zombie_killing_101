<?php
/**
 * Created by PhpStorm.
 * User: Chris VanOrden
 * Date: 11/10/2015
 * Time: 11:37 AM
 */

if (!$_SESSION['LoginStatus']) {
    echo('
<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="#">Home</a>
            <a class="blog-nav-item" href="login.php">Log In</a>
            <a class="blog-nav-item" href="newUserReg.php">Register</a>
        </nav>
    </div>
</div>
');
}
else {
    echo('

    <div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="index.php">Home</a>
            <a class="blog-nav-item" href="logout.php">Log Outs</a>
            <a class="blog-nav-item" href="blog_entry.php">Post</a>
            <a class="blog-nav-item" href="#">Your Entries</a>
        </nav>
    </div>
</div>

    ');
}


