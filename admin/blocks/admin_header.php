<header class="admin_header main-item flex-1">
    <div class="admin_header_container">
        <div class="logo">
            <a href="/parser">P</a>
        </div>
        <div class="menu-admin">

            <div class="menu-admin-item"><a id="admin-profile" href="/parser/admin/index.php">Profile</a></div>
            <div class="menu-admin-item"><a href="/parser">Home</a></div>
            <div class="menu-admin-item"><a id="admin-articles" href="/parser/articles.php?article_id=-1&portion=0">All articles</a></div>
            <div class="menu-admin-item"><a href="/parser/authorize/logout.php">Log out</a></div>
            <form class="parse-form" action="/parser/parser.php" method="post">
                    <input class="parse-btn" name="parse" type="submit" value="Start parse">
                    <h1 id="load-status"></h1>
            </form>
        </div>
    </div>
</header>