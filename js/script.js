let map, directionsService, directionsRenderer;

// Inicializa el mapa
function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: { lat: 18.855894, lng: -97.099189 },  // Coordenada inicial
        maxZoom: 15,
        minZoom: 10,
    });

    // Servicio de rutas
    directionsService = new google.maps.DirectionsService();
    directionsRenderer = new google.maps.DirectionsRenderer();
    directionsRenderer.setMap(map);

    // Cargar rutas
    loadRoutes();
}

// Función para cargar las rutas desde PHP
async function fetchRoutes() {
    const response = await fetch('./model/routes.php');  // Llamada a PHP que devuelve rutas
    const data = await response.json();  // Convertir la respuesta en formato JSON
    return data;
}

// Cargar las rutas en el mapa
async function loadRoutes() {
    const routes = await fetchRoutes();  // Obtener rutas desde PHP
}

// Función para calcular y mostrar una ruta seleccionada
function calculateRoute(routeName, routes) {
    const points = routes[routeName];
    const origin = points[0];
    const destination = points[points.length - 1];
    const waypoints = points.slice(1, -1).map(point => ({ location: point, stopover: true }));

    directionsService.route(
        {
            origin: origin,
            destination: destination,
            waypoints: waypoints,
            travelMode: google.maps.TravelMode.DRIVING,
        },
        (response, status) => {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsRenderer.setDirections(response);
            } else {
                alert("No se pudo calcular la ruta: " + status);
            }
        }
    );
}

// Manejar cambio de la selección de rutas
async function handleRouteChange() {
    const selectedRoute = document.getElementById("routeSelect").value;
    if (selectedRoute !== "0") {
        const routes = await fetchRoutes();  // Cargar rutas desde PHP
        calculateRoute(selectedRoute, routes);  // Mostrar ruta seleccionada
    }
}
