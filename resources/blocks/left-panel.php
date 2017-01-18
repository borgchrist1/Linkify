<div class="left-panel">
    <ul>
        <a href="index.php"><li><img src="resources/img/design/home.png" alt="Home">HOME</li></a>
        <?php if (!empty($_SESSION["id"])): ?>
            <a href="post.php"><li><img src="resources/img/design/post.png" alt="Profile">NEW POST</li></a>
            <li><img src="resources/img/design/profile.png" alt="Profile">PROIFILE</li>
            <a href="settings.php"><li><img src="resources/img/design/settings.png" alt="">SETTINGS</li></a>
            <a href="logout.php"><li><img src="resources/img/design/logout.png" alt="LOGOUT">LOGOUT</li></a>
        <?php else: ?>
            <li><img src="resources/img/design/login.png" alt="LOGIN">LOGIN</li>
        <?php endif; ?>
    </ul>
</div>