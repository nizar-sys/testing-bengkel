if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(position => {
        localCoord = position.coords;
        objLocalCoord = {
            lat: localCoord.latitude,
            lng: localCoord.longitude
        }

        let platform = new H.service.Platform({
            'apikey': window.hereApiKey
          });
    
          // Obtain the default map types from the platform object
          let defaultLayers = platform.createDefaultLayers();
    
          // Instantiate (and display) the map
          let map = new H.Map(
            document.getElementById('mapContainer'),
            defaultLayers.vector.normal.map,
            {
              zoom: 13,
              center: objLocalCoord,
              pixelRatio: window.devicePixelRatio || 1
            });
            window.addEventListener('resize', () => map.getViewPort().resize());

            let ui = H.ui.UI.createDefault(map, defaultLayers);
            let mapEvents = new H.mapevents.MapEvents(map);
            let behavior = new H.mapevents.Behavior(mapEvents);

            //Draggable marker function (fungsi agar marker bisa digerakkan)
            function addDragableMarker(map, behavior) {
              let inputLat = document.getElementById('latitude');
              let inputLng = document.getElementById('longitude');

              if (inputLat.value != '' && inputLng.value != '') {
                objLocalCoord = {
                  lat: inputLat.value,
                  lng: inputLng.value
                }
              }

              let marker = new H.map.Marker(objLocalCoord, {
                volatility: true
              })

              marker.draggable = true;
              map.addObject(marker);

              map.addEventListener('dragstart', function(ev) {
                let target = ev.target,
                    pointer = ev.currentPointer;
                if (target instanceof H.map.Marker) {
                  let targetPosition = map.geoToScreen(target.getGeometry());
                  target['offset'] = new H.math.Point(pointer.viewportX - targetPosition.x, pointer.viewportY -targetPosition.y );
                  behavior.disable();
                }
              }, false)

              map.addEventListener('drag', function(ev) {
                let target = ev.target,
                    pointer = ev.currentPointer;
                if (target instanceof H.map.Marker) {
                    target.setGeometry(
                      map.screenToGeo(
                        pointer.viewportX - target['offset'].x, pointer.viewportY - target['offset'].y
                      )
                    );
                }
              }, false);

              map.addEventListener('dragend', function(ev) {
                let target = ev.target;
                if (target instanceof H.map.Marker) {
                  behavior.enable();
                  let resultCoord = map.screenToGeo (
                    ev.currentPointer.viewportX,
                    ev.currentPointer.viewportY
                  );
                  //result coordination
                  inputLat.value = resultCoord.lat.toFixed(5);
                  inputLng.value = resultCoord.lng.toFixed(5);
                }
              }, false);
            }

            if (window.action == "submit") {
              addDragableMarker(map, behavior);
            }

            //Browse location
            let bengkels = [];
            const fetchBengkels = function (latitude, longitude, radius) {
                return new Promise(function (resolve, reject) {
                    resolve(
                        fetch(`/api/bengkel?lat=${latitude}&lng=${longitude}&rad=${radius}`)
                        .then((res) => res.json())
                        .then(function(data) {
                            data.forEach(function (value, index) {
                                let marker = new H.map.Marker({
                                    lat: value.latitude, lng: value.longitude
                                });
                                bengkels.push(marker);
                            })
                        })
                    )
                })
            }

            function clearBengkel() {
              map.removeObjects(bengkels);
              bengkels = [];
            }

            function init(latitude, longitude, radius) {
              clearBengkel();
              fetchBengkels(latitude, longitude, radius)
              .then(function () {
                map.addObjects(bengkels);
              });
            }
            

            if (window.action == 'browse') {
              map.addEventListener('dragend', function(ev) {
                let resultCoord = map.screenToGeo(
                  ev.currentPointer.viewportX,
                  ev.currentPointer.viewportY
                );
                init(resultCoord.lat, resultCoord.lng, 40);
              }, false);

              init(objLocalCoord.lat, objLocalCoord.lng, 40);
            }

            //Route to bengkel
            let urlParams = new URLSearchParams(window.location.search);

            function calculateRouteAtoB (platform) {
              let router = platform.getRoutingService(null, 8);
                  // routeRequestParam = {
                  //     mode: 'faster;car',
                  //     representation: 'display',
                  //     routeattributes: 'summary',
                  //     manueverattributes: 'direction.action',
                  //     waypoint0: urlParams.get('from'),
                  //     waypoint1: urlParams.get('to')
                  // }
              
                  let routingParameters = {
                    'routingMode': 'fast',
                    'transportMode': 'car',
                    'origin': urlParams.get('from'),
                    'destination': urlParams.get('to'),
                    'return': 'polyline,summary',
                    'route': 'summary',
                  };

              router.calculateRoute(
                // routeRequestParam,
                routingParameters,
                // onSuccess,
                onResult,
                onError,
              )
            }

            // function onSuccess(result) {
            //   route = result.response.route[0];

            //   addRouteShapeToMap(route);
            //   addSummaryToPanel(route.summary);
            // }
            let onResult = function(result) {
              // ensure that at least one route was found
              if (result.routes.length) {
                result.routes[0].sections.forEach((section) => {
                  // Create a linestring to use as a point source for the route line
                  let linestring = H.geo.LineString.fromFlexiblePolyline(
                      section.polyline);
         
                  // Create a polyline to display the route:
                  let routeLine = new H.map.Polyline(linestring, {
                    style: {strokeColor: 'black', lineWidth: 2},
                  });
         
                  // Create a marker for the start point:
                  let startMarker = new H.map.Marker(section.departure.place.location);
         
                  // Create a marker for the end point:
                  let endMarker = new H.map.Marker(section.arrival.place.location);
         
                  // Add the route polyline and the two markers to the map:
                  map.addObjects([routeLine, startMarker, endMarker]);
         
                  // Set the map's viewport to make the whole route visible:
                  map.getViewModel().
                      setLookAtData({bounds: routeLine.getBoundingBox()});

                  addSummaryToPanel(section.summary); 
                  
                });
              }
            };

            function onError(error) {
              alert('Cant reach the remote server' + error);
            }

            // function addRouteShapeToMap(route) {
            //   let linestring = new H.geo.LineString(),
            //     routeShape = route.shape,
            //     startPoint, endPoint,
            //     polyline, routeline, svgStartMark, iconStart, startMarker, svgEndMark,
            //     iconEnd, endMarker;

            //   routeShape.forEach(function(point) {
            //     let parts = point.split(',');
            //     linestring.pushLatLngAlt(parts[0], parts[1]);
            //   });

            //   startPoint = route.waypoint[0].mappedPosiiton;
            //   endPoint = route.waypoint[1].mappedPosition;

            //   polyline = new H.map.Polyline(linestring, {
            //     style: {
            //     lineWidth: 5,
            //     strokeColor: 'rgba(0, 128, 255, 0.7)',
            //     lineTailCap: 'arrow-tail',
            //     lineHeadCap: 'arrow-head'
            //     }
            //   });

            //   routeline = new H.map.Polyline(linestring, {
            //     style: {
            //         lineWidth: 5,
            //         fillColor: 'white',
            //         strokeColor: 'rgba(255, 255, 255, 1)',
            //         lineDash: [0, 2],
            //         lineTailCap: 'arrow-tail',
            //         lineHeadCap: 'arrow-head'
            //     }
            //   });

            //   svgStartMark = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 52 52" style="enable-background:new 0 0 52 52;" xml:space="preserve" width="512px" height="512px"><g><path d="M38.853,5.324L38.853,5.324c-7.098-7.098-18.607-7.098-25.706,0h0  C6.751,11.72,6.031,23.763,11.459,31L26,52l14.541-21C45.969,23.763,45.249,11.72,38.853,5.324z M26.177,24c-3.314,0-6-2.686-6-6  s2.686-6,6-6s6,2.686,6,6S29.491,24,26.177,24z" data-original="#1081E0" class="active-path" data-old_color="#1081E0" fill="#C12020"/></g> </svg>`;

            //   iconStart = new H.map.Icon(svgStartMark, {
            //     size: { h: 45, w: 45 }
            //   });

            //   startMarker = new H.map.Marker({
            //     lat: startPoint.latitude,
            //     lng: startPoint.longitude
            //   }, { icon: iconStart });

            //   svgEndMark = `<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 52 52" style="enable-background:new 0 0 52 52;" xml:space="preserve"> <path style="fill:#1081E0;" d="M38.853,5.324L38.853,5.324c-7.098-7.098-18.607-7.098-25.706,0h0 C6.751,11.72,6.031,23.763,11.459,31L26,52l14.541-21C45.969,23.763,45.249,11.72,38.853,5.324z M26.177,24c-3.314,0-6-2.686-6-6 s2.686-6,6-6s6,2.686,6,6S29.491,24,26.177,24z"/></svg>`;

            //   iconEnd = new H.map.Icon(svgEndMark, {
            //       size: { h: 45, w: 45 }
            //   });

            //   endMarker = new H.map.Marker({
            //       lat: endPoint.latitude,
            //       lng: endPoint.longitude
            //   }, { icon: iconEnd });

            //   // Add the polyline to the map
            //   map.addObjects([polyline, routeline, startMarker, endMarker]);

            //   // And zoom to its bounding rectangle
            //   map.getViewModel().setLookAtData({
            //       bounds: polyline.getBoundingBox()
            //   });

            // }

            function addSummaryToPanel(summary){
              const sumDiv = document.getElementById('summary');
              const markup = `
                  <ul>
                    <li>Total Distance: ${summary.length / 1000} Km</li>
                    <li>Travel Time: ${summary.duration.toMMSS()} (in current traffic)</li>
                  </ul>
              `;
              sumDiv.innerHTML = markup;
            }
  
            if (window.action == "direction") {
                calculateRouteAtoB(platform);
    
                Number.prototype.toMMSS = function () {
                    return  Math.floor(this / 60)  +' minutes '+ (this % 60)  + ' seconds.';
                }
            }
    })
    //Open url direction
    function openDirection(lat, lng, id) {
      window.open(`/bengkels/${id}?from=${objLocalCoord.lat},${objLocalCoord.lng}&to=${lat},${lng}`, "_self");
    }

    btnEl = document.querySelector('#terdekat');

    function openList() {
      window.open(`/api/bengkel?lat=${objLocalCoord.lat}&lng=${objLocalCoord.lng}&rad=40`)
    }

    btnEl.addEventListener('click', openList)
} else {
    console.error("Geolocation is not supported sama browser lu bro!");
}