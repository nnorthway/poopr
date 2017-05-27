var map;
var infowindow;

function initMap() {
  var pyrmont = {lat: 43.0389, lng: -87.9065};

  map = new google.maps.Map(document.getElementById('map'), {
    center: pyrmont,
    zoom: 15,
    type: ['store']
  });

  infowindow = new google.maps.InfoWindow();
  var service = new google.maps.places.PlacesService(map);
  if (center_on.length <= 0) {
    service.nearbySearch({
      location: pyrmont,
      radius: 5000
    }, callback);
  } else {
    var request = {
      placeId: center_on
    };
    service.getDetails(request, getPlace);
  }
}

function callback(results, status) {
  if (status === google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker(results[i]);
    }
  }
}

function getPlace(place, status) {
  if (status === google.maps.places.PlacesServiceStatus.OK) {
    createMarker(place);
    $("#title").append(place.name);
  }
}

function createMarker(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location
  });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
    getInfo(place.place_id);
  });
}

function getInfo(place_id) {
  var request = {
    placeId: place_id
  }
  service = new google.maps.places.PlacesService(map);
  service.getDetails(request, setInfoCard);
}

function setInfoCard(place, status) {
  if (status === google.maps.places.PlacesServiceStatus.OK) {
    var h = "";
    h += "<h1>" + place.name + "</h1>";
    var r = getRating(place.place_id, "#info_card");
    $("#info_card").html(h);
  }
}

function getRating(place_id, selector) {
  return $.ajax({
    type: "POST",
    data: {
      "id": place_id,
    },
    url: base_url + "place/getPlaceRating",
    success: function(msg) {
      if (msg != false) {
        var result = JSON.parse(msg);
        var h = "<div class='rating'><p>";
        var count = parseInt(result.average);
        console.log(count);
        for (var x = 0; x < count; x++) {
          h += "&Star;";
        }
        h += "<br />Based on " + result.total_votes + " votes!</p></div>";
        $(selector).append(h);
      } else {
        var h = "No ratings yet. <a href='" + base_url + "main/rate/" + place_id + "'>Add A Rating</a>";
        $(selector).append(h);
      }
    }
  });
}
