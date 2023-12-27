<html>
  <head>
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script type="module" src="./index.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
  </head>
  <style>
    /*
    * Always set the map height explicitly to define the size of the div element
    * that contains the map.
    */
  
    #map {
        position: relative;
      height: 120%;
      width: 100%;    }

    /*
    * Optional: Makes the sample page fill the window.
    */
    html,
    body {
    height: 100%;
    margin: 0;
    padding: 0;
    }

    #contentAboveMap {
      position: absolute;
      top: 11%; /* Ajusta la posición vertical */
      left: 0px; /* Ajusta la posición horizontal */
      background-color: rgba(255, 255, 255, 0.1); /* Fondo semi-transparente */
      backdrop-filter: blur(1px);
      padding: 10px;
      border-radius: 1px;
      z-index: 1000; /* Asegura que esté encima del mapa */
      width: 100%;
    }
  </style>
  <body>
  <nav class="bg-white border-gray-200 dark:bg-gray-900 ">
        <div class="flex flex-wrap items-center justify-between p-4 bg-black">
            <a href="https://flowbite.com/" class="flex items-center space-x-1 rtl:space-x-reverse">
                <img src="https://svgsilh.com/svg/1691149.svg" class="h-8 bg-white rounded-lg" alt="Flowbite Logo" />
                <span class="self-center text-2xl tracking-tight whitespace-nowrap text-white">Blog de Alto Impacto Nacional</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg  md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-50 bg-gray-700 rounded md:bg-transparent md:text-gray-50 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Novedades</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-50 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-50 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Mapa</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-50 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-50 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Blog</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-50 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-50 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Cuenta</a>
                    </li>
                </ul>                
            </div>
            <div class="flex md:order-2">                    
                <form class="flex items-center p-4">   
                    <label for="voice-search" class="sr-only">Search</label>
                    <div class="relative w-96">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linejoin="round" stroke-width="1" d="M8 8v1h4V8m4 7H4a1 1 0 0 1-1-1V5h14v9a1 1 0 0 1-1 1ZM2 1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z"/>
                        </svg>
                            
                        </div>
                        <input type="text" id="voice-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Encuentra notas, videos e imagenes..." required>
                        <button type="button" class="absolute inset-y-0 end-0 flex items-center pe-3">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7v3a5.006 5.006 0 0 1-5 5H6a5.006 5.006 0 0 1-5-5V7m7 9v3m-3 0h6M7 1h2a3 3 0 0 1 3 3v5a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V4a3 3 0 0 1 3-3Z"/>
                            </svg>
                        </button>
                    </div>
                    <button type="submit" class="inline-flex items-center py-2.5 px-3 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>Search
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <div id="map">
        
    </div> 

        <div id="contentAboveMap" class="container-fluid mx-auto">       
            <div class="grid gap-4 grid-cols-2 grid-rows-1">
                <div class="">
                    <p class="max-w-auto tracking-tight text-3xl font-bold leading-relaxed text-gray-50 dark:text-white px-3 my-1">Most views collections tapes 2023</p>
                    <p class="text-gray-50 whitespace-normal dark:text-gray-50 px-3 my-1">Check the most viewed tapes from all year.</p>
                </div>
                <div class="flex items-start justify-end p-8">
                    <button id="dropdownHelperButton" data-dropdown-toggle="dropdownHelper" class="text-white bg-gray-800 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-600 font-medium rounded-lg text-sm px-2 py-1 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        <svg class="p-0.5 w-5 h-5 text-center" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m2.133 2.6 5.856 6.9L8 14l4 3 .011-7.5 5.856-6.9a1 1 0 0 0-.804-1.6H2.937a1 1 0 0 0-.804 1.6Z"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownHelper" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-60 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHelperButton">
                        <li>
                            <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <div class="flex items-center h-5">
                                <input id="helper-checkbox-1" aria-describedby="helper-checkbox-text-1" type="checkbox" value="" class="w-4 h-4 text-gray-600 bg-gray-100 border-gray-300 rounded focus:ring-gray-500 dark:focus:ring-gray-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            </div>
                            <div class="ms-2 text-sm">
                                <label for="helper-checkbox-1" class="font-medium text-gray-900 dark:text-gray-300">
                                    <div>Permitir Fotos</div>
                                    <p id="helper-checkbox-text-1" class="text-xs font-normal text-gray-500 dark:text-gray-300">Activa o desactiva esta opción para mostrar fotos.</p>
                                </label>
                            </div>
                            </div>
                        </li>
                        <li>
                            <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <div class="flex items-center h-5">
                                <input id="helper-checkbox-2" aria-describedby="helper-checkbox-text-2" type="checkbox" value="" class="w-4 h-4 text-gray-600 bg-gray-100 border-gray-300 rounded focus:ring-gray-500 dark:focus:ring-gray-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            </div>
                            <div class="ms-2 text-sm">
                                <label for="helper-checkbox-2" class="font-medium text-gray-900 dark:text-gray-300">
                                    <div>Permitir Videos</div>
                                    <p id="helper-checkbox-text-2" class="text-xs font-normal text-gray-500 dark:text-gray-300">Activa o desactiva esta opción para mostrar videos.</p>
                                </label>
                            </div>
                            </div>
                        </li>
                        <li>
                            <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <div class="flex items-center h-5">
                                <input id="helper-checkbox-3" aria-describedby="helper-checkbox-text-3" type="checkbox" value="" class="w-4 h-4 text-gray-600 bg-gray-100 border-gray-300 rounded focus:ring-gray-500 dark:focus:ring-gray-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            </div>
                            <div class="ms-2 text-sm">
                                <label for="helper-checkbox-3" class="font-medium text-gray-900 dark:text-gray-300">
                                    <div>Permitir publicaciones</div>
                                    <p id="helper-checkbox-text-3" class="text-xs font-normal text-gray-500 dark:text-gray-300">Se pueden mostrar publicaciones.</p>
                                </label>
                            </div>
                            </div>
                        </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="p-3 hover:bg-gray-100">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" value="" class="sr-only peer">
                                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-gray-300 dark:peer-focus:ring-gray-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-gray-600"></div>
                                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Censored Mode</span>
                                    </label>
                                    <p id="helper-checkbox-text-3" class="text-xs font-normal text-gray-500 dark:text-gray-300">Habilita el filtro blur de los post.</p>
                                </div>
                            
                            </li>
                        </ul>               
                    </div>
                </div>
            </div>                     
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-3">
                <div class="grid gap-4">
                    <div>
                        <x-figure src="https://suracapulco.mx/wp-content/uploads/2023/08/Reforma-Jalisco-cinco-jovenes-secuestrados-asesinados-LagosMorelos-150823-pa%CC%81g6-1132x670.jpg" title="En Guanajuato" location="Abril"></x-figure>             
                    </div>
                    <div>
                        <x-figure src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg" title="En Michoacan" location="Julio"></x-figure>             
                    </div>
                    <div>
                        <x-figure src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-2.jpg" title="En CDMX" location="Septiembre"></x-figure>             
                    </div>
                </div>
                <div class="grid gap-4">
                    <div>
                        <x-figure src="https://www.informador.mx/__export/1701746938307/sites/elinformador/img/2023/12/04/jovenes_celaya_crop1701746937371.png_554688468.png" title="En Jalisco" location="Abril"></x-figure>             
                    </div>
                    <div>
                        <x-figure src="https://static.independentespanol.com/2022/02/28/18/MichoacanFusilanFuneral.png?width=1200" title="En Sinaloa" location="Enero"></x-figure>             
                    </div>
                    <div>
                        <x-figure src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-5.jpg" title="En Durango" location="Febrero"></x-figure>             
                    </div>
                </div>
                <div class="grid gap-4">
                    <div>
                        <x-figure src="https://www.am.com.mx/u/fotografias/fotosnoticias/2023/4/16/480398.jpg" title="En Nuevo Leon" location="Enero"></x-figure>             
                    </div>
                    <div>
                        <x-figure src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-7.jpg" title="En Guanajuato" location="Marzo"></x-figure>             
                    </div>
                    <div>
                        <x-figure src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-8.jpg" title="En Sinaloa" location="Septiembre"></x-figure>             
                    </div>
                </div>
                <div class="grid gap-4">
                    <div>
                        <x-figure src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-9.jpg" title="En CDMX" location="Octubre"></x-figure>             
                    </div>
                    <div>
                        <x-figure src="https://www.am.com.mx/u/fotografias/fotosnoticias/2023/4/16/480398.jpg" title="En Jalisco" location="Marzo"></x-figure>             
                    </div>
                    <div>
                        <x-figure src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-11.jpg" title="En Michoacan" location="Agosto"></x-figure>             
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    (g => {
      var h, a, k, p = "The Google Maps JavaScript API",
        c = "google",
        l = "importLibrary",
        q = "__ib__",
        m = document,
        b = window;
      b = b[c] || (b[c] = {});
      var d = b.maps || (b.maps = {}),
        r = new Set,
        e = new URLSearchParams,
        u = () => h || (h = new Promise(async (f, n) => {
          await(a = m.createElement("script"));
          e.set("libraries", [...r] + "");
          for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
          e.set("callback", c + ".maps." + q);
          a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
          d[q] = f;
          a.onerror = () => h = n(Error(p + " could not load."));
          a.nonce = m.querySelector("script[nonce]")?.nonce || "";
          m.head.append(a)
        }));
      d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
    })({
      key: "AIzaSyBGah4F75uZPP444fWzwuIEZHPDVEtDghc",
      v: "weekly"
    });

    let map;

    async function initMap() {
      //@ts-ignore
      const { Map } = await google.maps.importLibrary("maps");

      const styles = [
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#212121"
      }
    ]
  },
  {
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#212121"
      }
    ]
  },
  {
    "featureType": "administrative",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#757575"
      },
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.country",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.locality",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#bdbdbd"
      }
    ]
  },
  {
    "featureType": "administrative.neighborhood",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#181818"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1b1b1b"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#2c2c2c"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#8a8a8a"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#373737"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#3c3c3c"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#4e4e4e"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "transit",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#000000"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#3d3d3d"
      }
    ]
  }
];
    const mexicoBounds = {
        north: 32.7185,
        south: 14.5346,
        east: -86.5904,
        west: -118.6175
    };

      map = new Map(document.getElementById("map"), {
        center: { lat: 24.44236, lng: -102.36939 },
        zoom: 6,
        restriction: {
        latLngBounds: mexicoBounds,
        strictBounds: false
        },
        streetViewControl: false, // Oculta el control de Street View
        fullscreenControl: false, // Oculta el control de pantalla completa
        mapTypeControl: false, // Oculta el control de cambiar entre mapa y vista de satélite
        styles: styles // Aquí se aplica el conjunto de estilos al mapa
      });
    }

    initMap();
  </script>
    
  </body>
</html>