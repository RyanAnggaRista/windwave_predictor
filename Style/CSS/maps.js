< ? php
require '..\koneksi.php'; ?
>
var
    mymap =
    L.map('mapid').setView([-4.947625,
            112.077026
        ],
        7);
L.tileLayer(
    'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Mapdata& copy;<a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' + 'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mymap);

L.marker([ < ? php echo $latitude[0]; ? > , < ? php echo $longitude[0]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[1]; ? > , < ? php echo $longitude[1]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[2]; ? > , < ? php echo $longitude[2]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[3]; ? > , < ? php echo $longitude[3]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[4]; ? > , < ? php echo $longitude[4]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[5]; ? > , < ? php echo $longitude[5]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[6]; ? > , < ? php echo $longitude[6]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[7]; ? > , < ? php echo $longitude[7]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[8]; ? > , < ? php echo $longitude[8]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[9]; ? > , < ? php echo $longitude[9]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[10]; ? > , < ? php echo $longitude[10]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[11]; ? > , < ? php echo $longitude[11]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[12]; ? > , < ? php echo $longitude[12]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[13]; ? > , < ? php echo $longitude[13]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[14]; ? > , < ? php echo $longitude[14]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[15]; ? > , < ? php echo $longitude[15]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[16]; ? > , < ? php echo $longitude[16]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[17]; ? > , < ? php echo $longitude[17]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[18]; ? > , < ? php echo $longitude[18]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[19]; ? > , < ? php echo $longitude[19]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[20]; ? > , < ? php echo $longitude[20]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[21]; ? > , < ? php echo $longitude[21]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[22]; ? > , < ? php echo $longitude[22]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[23]; ? > , < ? php echo $longitude[23]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[24]; ? > , < ? php echo $longitude[24]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[25]; ? > , < ? php echo $longitude[25]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[26]; ? > , < ? php echo $longitude[26]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([ < ? php echo $latitude[27]; ? > , < ? php echo $longitude[27]; ? > ]).addTo(mymap)
    .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

L.marker([-5.346885, 113.557687]).addTo(mymap).bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([-4.919334, 113.798803]).addTo(mymap).bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([-4.514656, 114.038085]).addTo(mymap).bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([-5.821719, 113.283983]).addTo(mymap).bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
L.marker([-6.348056, 113.022948]).addTo(mymap).bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();



L.circle([ < ? php echo $latitude[0]; ? > , < ? php echo $longitude[0]; ? > ], 250, {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5
}).addTo(mymap).bindPopup("I am a circle.");
L.circle([ < ? php echo $latitude[1]; ? > , < ? php echo $longitude[1]; ? > ], 250, {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5
}).addTo(mymap).bindPopup("ICT");
L.circle([ < ? php echo $latitude[2]; ? > , < ? php echo $longitude[2]; ? > ], 500, {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5
}).addTo(mymap).bindPopup("T-LAMG");
L.circle([ < ? php echo $latitude[3]; ? > , < ? php echo $longitude[3]; ? > ], 500, {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5
}).addTo(mymap).bindPopup("PLTU");
L.circle([ < ? php echo $latitude[4]; ? > , < ? php echo $longitude[4]; ? > ], 500, {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5
}).addTo(mymap).bindPopup("PETRO");