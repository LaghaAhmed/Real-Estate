<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>SPOTNET Admin Panel</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.php">Spotnet Admin</a></h1>
			<h2 class="section_title">Control panel</h2><div class="btn_view_site"><a href="http://www.spotnet.com" target="_blank" >View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>Welcome <?php echo $username; ?></p>
		    <a class="logout_user" href="home/logout" title="Logout">Logout</a>
		</div>
		<!--<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.html">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
		</div>-->
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Quick Search" onFocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		
		<h3>Admin</h3>
		<ul class="toggle">
	        <li class="icn_photo"><a href="<?php echo site_url('main/achats')?>">Buy / Bid</a></li>
			<li class="icn_new_article"><a href="<?php echo site_url('main/commandes')?>">Orders</a></li>
            <li class="icn_profile"><a href="<?php echo site_url('main/membres')?>">Members</a></li>
			<li class="icn_folder"><a href="<?php echo site_url('main/packs')?>">Packs</a></li>
			<li class="icn_photo"><a href="<?php echo site_url('main/offres')?>">Offers</a></li>
			<li class="icn_categories"><a href="<?php echo site_url('main/categories')?>">Category Offers</a></li>
			<li class="icn_settings"><a href="<?php echo site_url('main/pays')?>">Country</a></li>
			<li class="icn_settings"><a href="<?php echo site_url('main/villes')?>">City</a></li>			
			<li class="icn_profile"><a href="<?php echo site_url('main/users')?>">Admin</a></li>
			<li class="icn_jump_back"><a href="<?php echo site_url('home/logout')?>">Logout</a></li>
		</ul>
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2013 Spotnet Admin</strong></p>
			
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		
		
		
		<div class="spacer"></div>
	</section>


</body>

</html>