let mapContainer = document.querySelector("#mapContainer");

function refreshMap(location){
    mapContainer.innerHTML = ` <div class='mapouter'>
        <div class='gmap_canvas'>
        <iframe width='900' height='500' id='gmap_canvas'
        src='https://maps.google.com/maps?q=`+ location +`&ie=UTF8&iwloc=&output=embed' 
        frameborder='0' scrolling='no' marginheight='0' marginwidth='0'></iframe>
        <a href='https://www.embedgooglemap.net'>embedgooglemap.net</a></div><style>
        .mapouter{text-align:right;height:500px;width:900px;}.gmap_canvas 
        {overflow:hidden;background:none!important;height:500px;width:900px;}</style></div>`;
}