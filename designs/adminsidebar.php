	<style>
		body
		{
			font-family: Comic Sans, Comic Sans MS, cursive;
		}
		
		.sidebar-link
		{
			color: green;
			font-size: 111%;			
		}
		
		.sidebar-element
		{
			width: 125px;
		}
		
		.navbar-default
		{
			margin-top: 25px;
			background-image: #000;
		}
		
		.nav>li>a:hover,.nav>li>a:focus,.nav>li>a:active
		{
			color: brown;
			background-color: #ffe680;
		}
		
		.sidebar-active
		{
			color: brown;
			background-color: #ffe680;
		}
	</style>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav sidebar-nav sidebar-menu">
					<li class="sidebar-element"><a class="sidebar-link <?php if($_GET['c'] == 'slides') echo 'sidebar-active'; ?>" href="admin.php?c=slides"><?php language('slides'); ?></a></li>
					<li class="sidebar-element"><a class="sidebar-link <?php if($_GET['c'] == 'system') echo 'sidebar-active'; ?>" href="admin.php?c=system"><?php language('system'); ?></a></li>
					<li class="sidebar-element"><a class="sidebar-link <?php if($_GET['c'] == 'pages') echo 'sidebar-active'; ?>" href="admin.php?c=pages"><?php language('pages'); ?></a></li>
					<li class="sidebar-element"><a class="sidebar-link <?php if($_GET['c'] == 'blog') echo 'sidebar-active'; ?>" href="admin.php?c=blog"><?php language('blog'); ?></a></li>
					<li class="sidebar-element"><a class="sidebar-link <?php if($_GET['c'] == 'genders') echo 'sidebar-active'; ?>" href="admin.php?c=genders"><?php language('genders'); ?></a></li>
					<li class="sidebar-element"><a class="sidebar-link <?php if($_GET['c'] == 'fields') echo 'sidebar-active'; ?>" href="admin.php?c=fields"><?php language('fields'); ?></a></li>
					<li class="sidebar-element"><a class="sidebar-link <?php if($_GET['c'] == 'courses') echo 'sidebar-active'; ?>" href="admin.php?c=courses"><?php language('courses'); ?></a></li>
					<li class="sidebar-element"><a class="sidebar-link <?php if($_GET['c'] == 'plans') echo 'sidebar-active'; ?>" href="admin.php?c=plans"><?php language('plans'); ?></a></li>
					<li class="sidebar-element"><a class="sidebar-link <?php if($_GET['c'] == 'orders') echo 'sidebar-active'; ?>" href="admin.php?c=orders"><?php language('orders'); ?></a></li>
					<li class="sidebar-element"><a class="sidebar-link <?php if($_GET['c'] == 'users') echo 'sidebar-active'; ?>" href="admin.php?c=users"><?php language('users'); ?></a></li>
					<li class="sidebar-element"><a class="sidebar-link <?php if($_GET['c'] == 'testimonials') echo 'sidebar-active'; ?>" href="admin.php?c=testimonials"><?php language('testimonials'); ?></a></li>
					<li class="sidebar-element"><a class="sidebar-link <?php if($_GET['c'] == 'contact') echo 'sidebar-active'; ?>" href="admin.php?c=contact"><?php language('contact'); ?></a></li>
					<li class="sidebar-element"><a class="sidebar-link <?php if($_GET['c'] == 'account') echo 'sidebar-active'; ?>" href="admin.php?c=account"><?php language('account'); ?></a></li>
					<li class="sidebar-element"><a class="sidebar-link" href="adminlogout.php"><?php language('logout'); ?></a></li>
				</ul>
			</div>
		</div>
	</nav>