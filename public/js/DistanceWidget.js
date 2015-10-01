function DistanceWidget(map) {
  var radiusWidget = new RadiusWidget();
  radiusWidget.bindTo('map', this);
  radiusWidget.bindTo('center', this, 'position');

  this.set('map', map);
  this.set('position', map.getCenter());

  var marker = new google.maps.Marker({
    draggable: true,
    title: 'Move me!'
  });


  // Bind the marker map property to the DistanceWidget map property
  marker.bindTo('map', this);

  // Bind the marker position property to the DistanceWidget position
  // property
  marker.bindTo('position', this);
  // Bind to the radiusWidgets' distance property
  this.bindTo('distance', radiusWidget);

  // Bind to the radiusWidgets' bounds property
  this.bindTo('bounds', radiusWidget);
}
DistanceWidget.prototype = new google.maps.MVCObject();


DistanceWidget.prototype.setpos = function(map,DistanceWidget) {
DistanceWidget.set('position', map.getCenter());
map.setZoom(17);
};

