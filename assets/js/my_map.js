
//	$("[href='#location']").trigger("click");

	function initMap(){
		// Init current lang
		var myLatLng = {lat: $("#map-canvas").data("x"), lng: $("#map-canvas").data("y")};
		
		var mapOptions = {
			zoom: 15,
			center: myLatLng
		};

		var markers = [];
		var save_position = function (map){}

		// Khởi tạo map
		var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			title: ''
		});
		markers.push(marker);

		google.maps.event.addListener(map, 'center_changed', function() {
		});
 

		google.maps.event.addListener(map, 'click', function(event) {
			if($("#map-canvas").data("option")=="modifi"){
				placeMarker(event.latLng,map);
				open_popup_changeAddress();
			}
		});

		google.maps.event.addListener(map, 'mouseup', function() {});

		function setMapOnAll(map) {
			for (var i = 0; i < markers.length; i++) {
				markers[i].setMap(map);
			}
			markers=[];
		}

		function open_popup_changeAddress(){
			$("#modal-box").modal("show");
			$("#modal-box .modal-title").text("Do you want to change address ?");
			$(".modal-body").html('<div class="text-center"><button type="button" class="btn btn-primary acceptSave">Save</button> <button type="button" class="btn btn-default rejectSave">Cancel</button></div>');
		}

		function placeMarker(location,map) {
			setMapOnAll(null);
			var marker = new google.maps.Marker({
				position: location,
				map: map
			});
			map.panTo(marker.getPosition());
			markers.push(marker);
		}

		$(document).on("click","#change_address",function(){
			// var input = $("#change_address_input");
			// var searchBox = new google.maps.places.SearchBox(input);
			// map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
		});

		$(document).on("click","[href='#location']",function(){
			google.maps.event.trigger(map, 'resize');
			map.panTo(marker.getPosition());
		});

		$(document).on("click",".acceptSave",function(){
			this_btn = $(".acceptSave");
			save_changeAddress();
			this_btn.toggleClass('btn-primary btn-default');
			this_btn.text(" Saved ... ");
			setTimeout(function(){
				this_btn.toggleClass('btn-primary btn-default');
				this_btn.text(" Save ");
			},1000);
		});

		$(document).on("click",".rejectSave",function(){
			$("#modal-box").modal("hide");
		});

		function save_changeAddress(){
			var myData = markers[0].getPosition().toUrlValue();
			$.post('/ajax/save_position', {position: myData}, function(data, textStatus, xhr) {
				$("#modal-box").modal("hide");
			});
		}



		var autocomplete;
		autocomplete = new google.maps.places.Autocomplete(document.getElementById('autocomplete_address_save'));
		places = new google.maps.places.PlacesService(map);
		autocomplete.addListener('place_changed', onPlaceChanged);

		function onPlaceChanged(){
			selector_x = $("#autocomplete_address_save");
			selector_x.parents("p[id^='edit_']").children('span.value_profile').html(selector_x.val());
			selector_x.parents("p[id^='edit_']").find("a").trigger("click");
			$("[href='#location']").trigger("click");
			var place = autocomplete.getPlace();
			if (place.geometry) {
				map.panTo(place.geometry.location);
				map.setZoom(20);
				placeMarker(place.geometry.location,map);
			} else {
				document.getElementById('autocomplete').placeholder = 'Enter a address';
			}
		}
	}


	// Lúc laod các thẻ DOM thì chạy hàm initialize
//	google.maps.event.addDomListener(window, 'load', initMap);