<header id="header">
    <div class="menu-button">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="login"><?php if (empty($_SESSION['id'])): ?>
            <form id="login" method="post" action="resources/lib/login.php">
                email:<input type="email" name="email">
                Password:<input type="password" name="password">
                <input type="hidden" name="token" value="linkify-protection" />
                <input type="submit" value="Login">
            </form>
            <a href="register.php">Register</a>
        <?php endif; ?></div>
</header>