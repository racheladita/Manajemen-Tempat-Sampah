<html>
<head>
	<script src='http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyBoclS5A1wL4ossWVSXNCOzoy6vpjB-LG0' type='text/javascript'></script>
	<script>
		var map;
		
		//SET MARKERS (ICON+SHADOW)
			var iconTS = new GIcon();
			iconTS.image = 'images/1.png';
			//iconTS.shadow = 'images/1.png';
			iconTS.iconSize = new GSize(40,30);
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
<body onLoad='load_map();'>
	<?php
		echo "<div id='map' style='border=1px solid black; width:900px; height:600px;'></div>";
	?>
</body>
</html>