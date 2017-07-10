export default {
  init() {
    window.initMap = function() {
      var myLatLng = {
        lat: 35.866426,
        lng: 139.779734,
      };
    
      // Create a map object and specify the DOM element for display.
      var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        scrollwheel: false,
        zoom: 14, 
      });
    
      // Create a marker and set its position.
      var marker = new google.maps.Marker({
        map: map,
        position: myLatLng,
        title: '質イコー',
      });
    
      marker.setMap(map);
    };

    var js_file = document.createElement('script');
    js_file.type = 'text/javascript';
    js_file.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCE_50Di0FMOTtZYL19KuwCFq-SD8OF2bU&callback=initMap';
    document.getElementsByTagName('head')[0].appendChild(js_file);
 },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};


