  <header id="header">
    <hgroup>
      <h1 class="site_title"><a href="index.php">Spotnet Admin</a></h1>
      <h2 class="section_title">Control panel</h2><div class="btn_view_site"><a href="http://www.spotnet.com" target="_blank" >View Site</a></div>
    </hgroup>
  </header> <!-- end of header bar -->
  
  <section id="secondary_bar">
    <div class="user">
      <p>Welcome admin</p>
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
      <li class="icn_new_article"><a href="http://localhost/monprojet/admin2/index.php/main/commandes">Orders</a></li>
      <li class="icn_folder"><a href="http://localhost/monprojet/admin2/index.php/main/packs">Packs</a></li>
      <li class="icn_profile"><a href="admin.php">Admin</a></li>
      <li class="icn_profile"><a href="clients.php">Clients</a></li>
      <li class="icn_categories"><a href="annonce.php">Tous les annonces</a></li>
      <li class="icn_photo"><a href="verif.php">Annonces à verifier</a></li>
      <li class="icn_settings"><a href="signal.php">Annonces signalés</a></li>  
      <li class="icn_jump_back"><a href="index.php">Logout</a></li>
    </ul>
    
    <footer>
      <hr />
      <p><strong>Copyright &copy; 2013 Spotnet Admin</strong></p>
      
    </footer>
  </aside><!-- end of menu gauche -->
  
  <section id="main" class="column">
    <div class="spacer">

<article class="module width_3_quarter">
    <header><h3 class="tabs_involved">Content Manager</h3>
    </header>