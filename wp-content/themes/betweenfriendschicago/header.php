<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width"><?php wp_head(); ?>

    <title></title>
</head>

<body <?php body_class(); ?>>
	
	<div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	        <script type="text/javascript" src="https://secure.lglforms.com/form_engine/s/gE99uazOr57j3OG05pjzng.js"></script><noscript><a href="https://secure.lglforms.com/form_engine/s/gE99uazOr57j3OG05pjzng">Fill out my LGL form!</a><br/></noscript>
	    </div>
	  </div>
	</div>
	
	<header id="masthead" class="site-header fixed-top <?php if(!is_front_page()){ ?>whiteBg<?php } ?>" role="banner">
		<div class="container">
			<div class="row">
				<div class="col-2 d-block d-lg-none">
				    <div id="nav-icon">
					  <span></span>
					  <span></span>
					  <span></span>
					  <span></span>
					</div>
				</div>
				<div class="col-5 col-lg-6 text-center text-md-left">
					<div class="logo-holder">
						<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
						$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' ); ?>
						<a href="/">
							<img src="<?php echo esc_url( $custom_logo_url ); ?>" alt="Between Friends Chicago" class="header-logo brightness">
							<div class="logo-text">
								Between Friends
							</div>
						</a>
					</div>
				</div>
				<div class=" col-5 d-block d-lg-none text-right">
					<div class="button-group">
						<button class="btn btn-outline-success my-2 my-sm-0 donate-button" data-toggle="modal" data-target="#donateModal">Donate Now</button>
					    <button class="btn btn-outline-success my-2 my-sm-0 panic-button" id="panicBtnTop" >Safety Exit</button>
					</div>
			    </div>
				<div class="d-none d-lg-block col-lg-6 text-center text-md-right">
					    <a href="/" title="English" class="glink nturl notranslate engSpan active">English</a> <a href="/entre-amigos/" title="Español" class="glink nturl notranslate engSpan">Español</a>
<!--
					    <div id="google_translate_element2"></div>
					    <script type="text/javascript">
							function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
					    </script>
					    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
					    <script type="text/javascript">
					function GTranslateGetCurrentLang() {var keyValue = document['cookie'].match('(^|;) ?googtrans=([^;]*)(;|$)');return keyValue ? keyValue[2].split('/')[2] : null;}
					    function GTranslateFireEvent(element,event){try{if(document.createEventObject){var evt=document.createEventObject();element.fireEvent('on'+event,evt)}else{var evt=document.createEvent('HTMLEvents');evt.initEvent(event,true,true);element.dispatchEvent(evt)}}catch(e){}}
					    function doGTranslate(lang_pair){if(lang_pair.value)lang_pair=lang_pair.value;if(lang_pair=='')return;var lang=lang_pair.split('|')[1];if(GTranslateGetCurrentLang() == null && lang == lang_pair.split('|')[0])return;var teCombo;var sel=document.getElementsByTagName('select');for(var i=0;i<sel.length;i++)if(/goog-te-combo/.test(sel[i].className)){teCombo=sel[i];break;}if(document.getElementById('google_translate_element2')==null||document.getElementById('google_translate_element2').innerHTML.length==0||teCombo.length==0||teCombo.innerHTML.length==0){setTimeout(function(){doGTranslate(lang_pair)},500)}else{teCombo.value=lang;GTranslateFireEvent(teCombo,'change');GTranslateFireEvent(teCombo,'change')}}
					    </script>
					
-->
				</div>
			</div>
			<!-- NAV BAR -->
			<div class="row d-none d-lg-block">
				<div class="col-12">
					<nav class="navbar navbar-expand-lg" id="menu">
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="navbar-toggler-icon"></span>
					  </button>
					  <div class="collapse navbar-collapse" id="">
					    <div class="mr-auto mt-2 mt-lg-0" id="menu-primary-menu">
					    		<?php 
					    		wp_nav_menu( array(
								'theme_location'  => 'top_menu',
								'depth'	          => 2,
								'container'       => 'div',
								'container_class' => 'collapse navbar-collapse',
								'container_id'    => 'bs-example-navbar-collapse-1',
								'menu_class'      => 'navbar-nav mr-auto',
								'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
								'walker'          => new WP_Bootstrap_Navwalker(),
							) );?>
					    </div>
					    <div class="form-inline my-2 my-lg-0">
						    <div class="button-group">
							    <button class="btn btn-outline-success my-2 my-sm-0 donate-button" data-toggle="modal" data-target="#donateModal">Donate Now</button>
							    <button class="btn btn-outline-success my-2 my-sm-0 panic-button" id="panicBtnTop">Safety Exit</div></button>
						    </div>
					    </div>
					  </div>
					</nav>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
	<div class="d-block d-lg-none hidden-side-nav text-left">
		<div class="container-fluid side-nav-holder">
			<div class="row" id="main-side-nav">
				<div class="col-12 float-left" id="main-sub">
					<div class="row no-gutters">
						<div class="col-8">
							<ul class="navbar-nav mr-auto mt-2 mt-lg-0" id="menu-primary-menu">
					    		<?php 
						    		wp_nav_menu( array(
									'theme_location'  => 'top_menu',
									'depth'	          =>1,
									'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
									'walker'          => new WP_Bootstrap_Navwalker(),
								) );?>
						    </ul>
						</div>
						<div class="col-4">
							<ul class="navbar-nav mr-auto mt-2 mt-lg-0" id="menu-primary-secondary">
								<li class="text-right"><a href="#" class="sub-1-click"><i class="fas fa-chevron-right"></i></a></li>
								<li class="text-right"><a href="#" class="sub-2-click"><i class="fas fa-chevron-right"></i></a></li>
								<li class="text-right"><a href="#" class="sub-3-click"><i class="fas fa-chevron-right"></i></a></li>
								<li class="text-right"><a href="#" class="sub-4-click"><i class="fas fa-chevron-right"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="row no-gutters">
					    <div class="col-6 mt-2 mb-2">
						    <a href="/" title="English" class="glink nturl notranslate engSpan active">English</a> 
					    </div>
						<div class="col-6 mt-2 mb-2" >
						   <a href="/entre-amigos/" title="Espanol" class="glink nturl notranslate engSpan">Español</a>
					    </div>
					</div>
					<div class="row no-gutters">
					    <div class="col-6 mt-2 mb-2">
						    <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#donateModal">Donate Now</button>
					    </div>
					    <div class="col-6 mt-2 mb-2">
						    <button class="btn btn-outline-success my-2 my-sm-0 panic-button" id="panicBtnSide">Safety Exit</button>
					    </div>
					</div>
				</div>
				<div class="col-12 float-right mt-2" id="sub-1">
					<div class="row no-gutters">
						<div class="col-2">
							<ul class="navbar-nav mr-auto" id="menu-primary-secondary">
								<li><a href="#" class="main-sub-click"><i class="fas fa-chevron-left"></i></a></li>
							</ul>
						</div>
						<div class="col-10">
							<strong><a href="/get-help/">Get Help</a></strong>
					    		<?php 
						    		wp_nav_menu( array(
									'theme_location'  => 'gethelp_menu',
									'depth'	          =>1,
									'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
									'walker'          => new WP_Bootstrap_Navwalker(),
								) );?>
								
								
						</div>
					</div>
				</div>
				<div class="col-12 float-right mt-2" id="sub-2">
					<div class="row no-gutters">
						<div class="col-2">
							<ul class="navbar-nav mr-auto" id="menu-primary-secondary">
								<li><a href="#" class="main-sub-click"><i class="fas fa-chevron-left"></i></a></li>
							</ul>
						</div>
						<div class="col-10">
							<strong><a href="/get-involved/">Get Involved</a></strong>
				    		<?php 
					    		wp_nav_menu( array(
								'theme_location'  => 'involved_menu',
								'depth'	          =>1,
								'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
								'walker'          => new WP_Bootstrap_Navwalker(),
							) );?>
						</div>
					</div>
				</div>
				<div class="col-12 float-right mt-2" id="sub-3">
					<div class="row no-gutters">
						<div class="col-2">
							<ul class="navbar-nav mr-auto" id="menu-primary-secondary">
								<li><a href="#" class="main-sub-click"><i class="fas fa-chevron-left"></i></a></li>
							</ul>
						</div>
						<div class="col-10">
							<strong><a href="/our-programs/">Our Programs</a></strong>
				    		<?php 
					    		wp_nav_menu( array(
								'theme_location'  => 'programs_menu',
								'depth'	          =>1,
								'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
								'walker'          => new WP_Bootstrap_Navwalker(),
							) );?>
						</div>
					</div>
				</div> 
				<div class="col-12 float-right mt-2" id="sub-4">
					<div class="row no-gutters">
						<div class="col-2">
							<ul class="navbar-nav mr-auto" id="menu-primary-secondary">
								<li><a href="#" class="main-sub-click"><i class="fas fa-chevron-left"></i></a></li>
							</ul>
						</div>
						<div class="col-10">
							<strong><a href="/about-us/">About Us</a></strong>
				    		<?php 
					    		wp_nav_menu( array(
								'theme_location'  => 'aboutus_menu',
								'depth'	          =>1,
								'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
								'walker'          => new WP_Bootstrap_Navwalker(),
							) );?>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="clear-fix"></div>
	<?php if (is_front_page() || is_home()){ ?>
	<section id="slideHolder">
		
		<div class="home-slider">
			<?php
				$args = array( 'post_type' => 'slide', 'posts_per_page' => -1, 'orderby' => 'date', 'order' => 'ASC' );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
				
			  <div class="slider-img" style="background-image:url(<?php echo get_field('slide_image',$post_id); ?>)">
				  <div class="slide-text">
					  <?php the_title(); ?>
				  </div>
			  </div>
			  
			  <?php endwhile; ?>
		</div>
	</section>

	<?php } else { ?>
	
	<?php } ?>
	
	
	<div class="black-cover"></div>	

