<header>
      <div class="popup">
        <a href="./first.php">Main Page</a>
        <?php if ($user_id) : ?>
            <a id="show_add_photo" href="#">Photo</a>
        <?php endif; ?>
        <a href="#">Posts</a>
        <a href="./user.php">Profile</a>
        <?php if ($user_id) : ?>
            <a href="./logout.php">Logout</a>
        <?php endif; ?>
      </div>
      <div class="mobile-icon">
        <img src="./free-icon-menu-bar-8107138.png" alt="" />
      </div>
</header>
