<!DOCTYPE html>
<html>
<head>
	<title>SMART DUSTBIN</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
	<script type="text/javascript">
		jssor_1_slider_init = function() {

			var jssor_1_SlideshowTransitions = [
			{$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
			{$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
			];

			var jssor_1_options = {
				$AutoPlay: 1,
				$SlideshowOptions: {
					$Class: $JssorSlideshowRunner$,
					$Transitions: jssor_1_SlideshowTransitions,
					$TransitionsOrder: 1
				},
				$ArrowNavigatorOptions: {
					$Class: $JssorArrowNavigator$
				},
				$ThumbnailNavigatorOptions: {
					$Class: $JssorThumbnailNavigator$,
					$Cols: 1,
					$Align: 0,
					$NoDrag: true
				}
			};

			var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
		};
	</script>
	<script src='http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyBoclS5A1wL4ossWVSXNCOzoy6vpjB-LG0' type='text/javascript'></script>
	<script>
		var map;
		
		//SET MARKERS (ICON+SHADOW)
			var iconTS = new GIcon();
			iconTS.image = 'images/1.png';
			//iconTS.shadow = 'images/1.png';
			iconTS.iconSize = new GSize(60,50);
			//iconTS.shadowSize = new GSize(120,120);
			iconTS.iconAnchor = new GPoint(6,20);
			iconTS.infoWindowAnchor = new GPoint(5,1);
			//CREATE OTHER ICON HERE
			
		var customIcons = [];
		customIcons["tempat sampah"] = iconTS;
		//CREATE OTHER CUSTOM ICON HERE
		
		function load_map()
		{
			if(GBrowserIsCompatible())
			{
				//GET DIRECTIONS
					map = new GMap2(document.getElementById("map"));
					
				//MAP CONTROL
					map.setCenter(new GLatLng(-7.04891,110.4394), 17); 	//koordinat center map
					//map.setMapType(G_HYBRID_MAP);						//menampilkan map dalam mode hybrid
						map.addControl(new GLargeMapControl());
						map.addControl(new GScaleControl());			//tombol zoom in / zoom out
						map.addControl(new GMapTypeControl());
						//tombol untuk opsi peta satelit / 2D
							map.enableDoubleClickZoom();
							map.enableScrollWheelZoom();
							
							//mendapatkan semua BU yang terdaftar di database
								GDownloadUrl("map2.php", function(data)
									{
										var xml = GXml.parse(data);
										var markers = xml.documentElement.getElementsByTagName("marker");
										for(var i = 0; i < markers.length; i++)
										{
											var nama_BU = markers[i].getAttribute("nama_BU");
											var alamat_BU = markers[i].getAttribute("alamat_BU");
											var telepon_BU = markers[i].getAttribute("telepon_BU");
											var tipe_BU = markers[i].getAttribute("tipe_BU");
											var longitude_BU = markers[i].getAttribute("longitude_BU");
											var latitude_BU = markers[i].getAttribute("latitude_BU");
											var marker = createMarker(longitude_BU, latitude_BU, nama_BU, alamat_BU, telepon_BU, tipe_BU);
											map.addOverlay(marker);
										}
									}
								);
			}
		}
		
		function createMarker(longitude_BU, latitude_BU, nama_BU, alamat_BU, telepon_BU, tipe_BU)
		{
			var marker = new GMarker(new GLatLng(longitude_BU,latitude_BU), customIcons[tipe_BU]);
			var html;
			html = "<b>" + nama_BU + "</b>";
			html += "<br>";
			html += alamat_BU;
			GEvent.addListener(marker, 'click', function() 
				{
					marker.openInfoWindowHtml(html);
				}
			);
			return marker;
		}
	</script>
</head>
<body id="home" onLoad='load_map();'>
	<header>
		<div class="top-header"></div>
		<div class="main-header">
			<div class="container">
				<div class="pull-left logo">
					<img src="images/logo.png" width="198" height="82" alt="simple logo">
				</div>
				<div class="pull-right">
					<nav>
						<ul>
							<li><a href="index.html#home">Home</a></li>						
							<li><a href="#">Monitoring</a></li>
							<li><a href="deskripsi alat dan komponen.html">Deskripsi</a></li>
							<li><a href="index.html#contact">Kontak Kami</a></li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="top-header clearfix"></div>
		</div>
	</header>
	<!-- / header -->
	
	<section id="monitoring">
		<div class="container">
			<h1 class="text-center judul">MONITORING</h1>	
			<br/><br/>
			<div class="google-map2">
				<?php
					echo "<div id='map' style='border=1px solid black; width:1150px; height:400px;'></div>";
				?>
			</div>
		</div>
	</section>
	<!-- / .contact -->
	
	<footer>
		<div class="container">
			<div class="row">
				<div><center> SMART DUSTBIN <br/>Copyright©2019. All Rights Reserved</center></div>
				<div class="clearfix"></div>
			</div>
		</div>
	</footer>
	<!-- / footer -->

	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/jssor.slider-25.0.7.min.js"></script>
	<script type="text/javascript">jssor_1_slider_init();</script>	
	<script type="text/javascript">
		$(".search").click(function(){
			$(".search-box").slideToggle("fast").find("input").focus();
		});

		$("nav li a").click(function() {
			var target = $(this).attr("href");
			$('html,body').animate({
				scrollTop: $(target).offset().top},
				'slow');
		});
	</script>   
</body>
</html>