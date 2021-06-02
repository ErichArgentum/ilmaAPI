let map;
// [
//  {lat: 45, lng: 45}
//  {lat: 45, lng: 45}
//  {lat: 46, lng: 35}
// ]
function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 58, lng: 22 },
        zoom: 9,
    });
    fetch('getmarkers.php')
        .then(res => res.json())
        .then(data => {
            console.log(data.map(m => {
                return new google.maps.Marker({
                    position: {
                        lat: m.longitude,
                        lng: m.latitude
                    },
                    map,
                })

            }))
            const array = { lat: -25.344, lng: 131.036 };
        })
    const uluru = { lat: -25.344, lng: 131.036 };
    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
    });
}
