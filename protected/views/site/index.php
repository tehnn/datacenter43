<?php
Yii::app()->clientScript->registerScriptFile('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&language=th', CClientScript::POS_HEAD);
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="glyphicon glyphicon-map-marker" style="padding-right: 3px"></i>
            ร้อยละสถานบริการส่งข้อมูลทันเวลาในเดือนที่ผ่านมา
        </h3>
    </div>
    <div class="panel-body" align="center">
        <div id="map-canvas" style="width: 95%;
             height:405px; border-style: solid;
             border-width: 0.5px;">
        </div>
        <div id="map-legend" style="background: white;padding: 5px;text-align: left">           
            <font size="3">สถานบริการส่งข้อมูลทันเวลา</font><br>
            <font size="2">
            <table>
                <tr><td><div style="background-color: green">&nbsp;&nbsp;&nbsp;</div></td><td>มากกว่าเท่ากับร้อยละ 80</td></tr>
                <tr><td><div style="background-color: yellow">&nbsp;&nbsp;&nbsp;</div></td><td>มากกว่าเท่ากับร้อยละ 60</td></tr>
                <tr><td><div style="background-color: red">&nbsp;&nbsp;&nbsp;</div></td><td>น้อยกว่าร้อยละ 60</td></tr>
            </table>
            </font>
            แหล่งข้อมูล : PLK-43 DataCenter
        </div>

        
        
    </div>
</div>

<script>
    var mapTypeIds = [];
    for (var type in google.maps.MapTypeId) {
        mapTypeIds.push(google.maps.MapTypeId[type]);
    }
    mapTypeIds.push("OSM")

    var map = new google.maps.Map(document.getElementById('map-canvas'), {
        zoom: 9,
        center: new google.maps.LatLng(17.020, 100.550),
        //mapTypeId: "OSM",
        mapTypeId: google.maps.MapTypeId.TERRAIN,
        panControl: false,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.SMALL
        },
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
        },
        mapTypeControlOptions: {
            mapTypeIds: mapTypeIds
        }
    });
    map.mapTypes.set("OSM", new google.maps.ImageMapType({
        getTileUrl: function(coord, zoom) {
            return "http://tile.openstreetmap.org/" + zoom + "/" + coord.x + "/" + coord.y + ".png";
        },
        tileSize: new google.maps.Size(256, 256),
        name: "OSM",
        maxZoom: 18
    }));
    var pol_lyr = new Array();
<?php
for ($i = 1; $i <= 9; $i++):
    ?>
    <?php
    $model = GisPolAmp::model()->findAll(array('condition' => "amp_code=$i"));
    echo "var coord = new Array();\r\n";
    foreach ($model as $data) {
        echo "coord.push(new google.maps.LatLng($data->Y,$data->X));\r\n";
    }
    ?>
        pol_lyr[<?= $i ?>] = new google.maps.Polygon({
            paths: coord,
            strokeColor: 'black',
            strokeOpacity: 0.8,
            strokeWeight: 1.5,
            
            <?php if($i%2===0): ?>
            fillColor: 'green',
            <?php else: ?>
             fillColor: '#24ACF2',
            <?php endif; ?>  
                
            fillOpacity: 0.5
        });
        pol_lyr[<?= $i ?>].setMap(map);
        google.maps.event.addListener(pol_lyr[<?= $i ?>], "mouseover", function() {
            this.setOptions({strokeWeight: 8.5});
        });
        google.maps.event.addListener(pol_lyr[<?= $i ?>], "mouseout", function() {
            this.setOptions({strokeWeight: 1.5});
        });
         google.maps.event.addListener(pol_lyr[<?= $i ?>], "click", function() {
            alert(<?= $i ?>);
        });
    <?php
endfor;
?>
    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(document.getElementById('map-legend'));

</script>
