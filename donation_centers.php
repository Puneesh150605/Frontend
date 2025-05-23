<?php include_once "includes/header.php"; ?>

<!-- Hero Section -->
<section class="bg-gradient-to-br from-gray-900 via-accent-900/30 to-gray-900 py-12 relative overflow-hidden">
    <canvas id="particle-canvas" class="absolute inset-0 z-0 opacity-20"></canvas>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-white mb-4">Blood Donation Centers</h1>
            <p class="text-gray-400 max-w-2xl mx-auto">Find the nearest blood donation center to make your contribution. Every donation counts and can save up to three lives.</p>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-12 bg-gradient-dark">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Map Filter -->
            <div class="glassmorphism rounded-lg p-6 shadow-neon">
                <h2 class="text-xl font-bold text-white mb-4">Find a Center</h2>
                
                <div class="space-y-4">
                    <div>
                        <label for="location" class="block text-gray-300 mb-1">Your Location</label>
                        <input type="text" id="location" placeholder="Enter your address" class="w-full bg-gray-700/70 text-white border border-gray-600/50 rounded-lg p-3 focus:outline-none focus:ring-1 focus:ring-primary-600">
                    </div>
                    
                    <div>
                        <label for="distance" class="block text-gray-300 mb-1">Distance</label>
                        <select id="distance" class="w-full bg-gray-700/70 text-white border border-gray-600/50 rounded-lg p-3 focus:outline-none focus:ring-1 focus:ring-primary-600">
                            <option value="5">Within 5 km</option>
                            <option value="10" selected>Within 10 km</option>
                            <option value="25">Within 25 km</option>
                            <option value="50">Within 50 km</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-gray-300 mb-1">Filter by Features</label>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input type="checkbox" id="feature_appointment" class="bg-gray-700/70 border-gray-600/50 rounded text-primary-600 focus:ring-primary-600">
                                <label for="feature_appointment" class="text-gray-300 ml-2">Appointment Available</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="feature_walkin" class="bg-gray-700/70 border-gray-600/50 rounded text-primary-600 focus:ring-primary-600">
                                <label for="feature_walkin" class="text-gray-300 ml-2">Walk-in Accepted</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="feature_weekend" class="bg-gray-700/70 border-gray-600/50 rounded text-primary-600 focus:ring-primary-600">
                                <label for="feature_weekend" class="text-gray-300 ml-2">Open on Weekends</label>
                            </div>
                        </div>
                    </div>
                    
                    <button id="search-centers" class="w-full btn-gradient text-white font-bold py-3 px-4 rounded-lg transition">
                        Search
                    </button>
                </div>
                
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-white mb-3">Need help?</h3>
                    <p class="text-gray-400 text-sm mb-3">Contact our support team for assistance in finding a suitable donation center.</p>
                    <a href="contact.php" class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-accent-500 hover:from-primary-400 hover:to-accent-400 text-sm flex items-center">
                        <i class="fas fa-headset mr-2"></i>
                        Get Support
                    </a>
                </div>
            </div>
            
            <!-- Map -->
            <div class="md:col-span-2">
                <div id="donation-centers-map" class="h-[500px] rounded-lg shadow-neon-blue"></div>
                <p class="text-gray-400 text-sm mt-2">
                    <i class="fas fa-info-circle text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-accent-500 mr-1"></i>
                    Click on a marker to view details about the donation center.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Centers List -->
<section class="py-12 bg-gradient-dark">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-white mb-6">Available Donation Centers</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            // This would normally be fetched from the database
            $centers = [
                [
                    'id' => 1,
                    'name' => 'Red Cross Blood Bank',
                    'address' => '12, MG Road, Connaught Place, New Delhi',
                    'contact' => '+91 98765 43210',
                    'email' => 'info@redcrossbloodbank.org',
                    'hours' => 'Mon-Fri: 9am-6pm, Sat: 10am-4pm',
                    'features' => ['appointments', 'walk-in', 'weekend'],
                    'lat' => 28.6329,
                    'lng' => 77.2195
                ],
                [
                    'id' => 2,
                    'name' => 'AIIMS Blood Donation Center',
                    'address' => 'AIIMS Campus, Ansari Nagar, New Delhi',
                    'contact' => '+91 11 2659 3333',
                    'email' => 'bloodbank@aiims.edu',
                    'hours' => 'Mon-Sun: 9am-7pm',
                    'features' => ['appointments', 'weekend'],
                    'lat' => 28.5672,
                    'lng' => 77.2100
                ],
                [
                    'id' => 3,
                    'name' => 'Rotary Blood Bank',
                    'address' => '56, Tughlakabad Institutional Area, New Delhi',
                    'contact' => '+91 11 2995 5454',
                    'email' => 'donate@rotarybloodbank.org',
                    'hours' => 'Mon-Sat: 8am-8pm, Sun: 10am-4pm',
                    'features' => ['appointments', 'walk-in', 'weekend'],
                    'lat' => 28.5159,
                    'lng' => 77.2490
                ],
                [
                    'id' => 4,
                    'name' => 'Sankalp Blood Bank',
                    'address' => '32, Malviya Nagar Main Market, New Delhi',
                    'contact' => '+91 89765 12345',
                    'email' => 'info@sankalpbloodbank.org',
                    'hours' => 'Mon-Fri: 10am-6pm',
                    'features' => ['appointments', 'walk-in'],
                    'lat' => 28.5384,
                    'lng' => 77.2157
                ],
                [
                    'id' => 5,
                    'name' => 'Apollo Blood Donation Center',
                    'address' => 'Apollo Hospital, Sarita Vihar, New Delhi',
                    'contact' => '+91 11 2692 5858',
                    'email' => 'bloodbank@apollohospitals.com',
                    'hours' => 'Mon-Fri: 8am-5pm, Sat: 9am-2pm',
                    'features' => ['appointments', 'weekend'],
                    'lat' => 28.5365,
                    'lng' => 77.2853
                ],
                [
                    'id' => 6,
                    'name' => 'Max Healthcare Blood Center',
                    'address' => 'Max Hospital, Saket, New Delhi',
                    'contact' => '+91 11 2651 5050',
                    'email' => 'blood@maxhealthcare.com',
                    'hours' => 'Mon-Thu: 7am-7pm, Fri: 7am-5pm',
                    'features' => ['walk-in'],
                    'lat' => 28.5270,
                    'lng' => 77.2111
                ],
            ];
            
            foreach($centers as $center) {
            ?>
            <div class="modern-card transition-all duration-300 hover:shadow-neon">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-white mb-2"><?php echo $center['name']; ?></h3>
                    
                    <div class="space-y-3 mb-4">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500 mt-1 mr-3"></i>
                            <span class="text-gray-300"><?php echo $center['address']; ?></span>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-phone text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500 mt-1 mr-3"></i>
                            <span class="text-gray-300"><?php echo $center['contact']; ?></span>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-envelope text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500 mt-1 mr-3"></i>
                            <span class="text-gray-300"><?php echo $center['email']; ?></span>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-clock text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500 mt-1 mr-3"></i>
                            <span class="text-gray-300"><?php echo $center['hours']; ?></span>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-2 mb-4">
                        <?php if(in_array('appointments', $center['features'])): ?>
                            <span class="bg-gray-700/50 text-xs text-gray-300 px-2 py-1 rounded">Appointments</span>
                        <?php endif; ?>
                        
                        <?php if(in_array('walk-in', $center['features'])): ?>
                            <span class="bg-gray-700/50 text-xs text-gray-300 px-2 py-1 rounded">Walk-in</span>
                        <?php endif; ?>
                        
                        <?php if(in_array('weekend', $center['features'])): ?>
                            <span class="bg-gray-700/50 text-xs text-gray-300 px-2 py-1 rounded">Weekend Hours</span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="flex space-x-3">
                        <a href="appointment.php?center=<?php echo $center['id']; ?>" class="btn-gradient text-white text-sm py-2 px-4 rounded transition flex-grow text-center">
                            Schedule Appointment
                        </a>
                        <button onclick="showOnMap(<?php echo $center['lat']; ?>, <?php echo $center['lng']; ?>)" class="bg-gray-700 hover:bg-gray-600 text-white text-sm py-2 px-4 rounded transition">
                            <i class="fas fa-map-marker-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        
        <div class="mt-8 text-center">
            <a href="#" id="load-more" class="border border-gray-600 hover:border-gray-500 text-gray-300 hover:text-white font-semibold py-3 px-6 rounded-lg inline-block transition">
                Load More Centers
            </a>
        </div>
    </div>
</section>

<!-- Appointment Promo -->
<section class="py-16 bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="bg-gradient-to-r from-primary-800 to-primary-600 rounded-lg p-8 md:p-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-white mb-4">Schedule Your Donation Today</h2>
                    <p class="text-white text-lg mb-6">Making an appointment helps us prepare for your arrival and reduces waiting time. It takes less than an hour to donate blood and save lives.</p>
                    <a href="appointment.php" class="bg-white text-primary-700 hover:bg-gray-100 font-bold py-3 px-6 rounded-lg inline-block transition">
                        Book Appointment
                    </a>
                </div>
                <div class="hidden md:block">
                    <img src="assets/images/appointment.jpg" alt="Schedule Appointment" class="rounded-lg shadow-xl max-h-[300px] mx-auto object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="py-16 bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-2">Frequently Asked Questions</h2>
            <p class="text-gray-400">Everything you need to know about blood donation centers</p>
        </div>
        
        <div class="max-w-3xl mx-auto space-y-4">
            <div class="bg-gray-900 rounded-lg p-6">
                <h3 class="text-lg font-bold text-white mb-2">What should I bring to a donation center?</h3>
                <p class="text-gray-300">Please bring a valid ID (Aadhaar Card, PAN Card, or Driving License), list of medications you're taking, and ensure you're well-hydrated and have eaten a proper meal before arriving.</p>
            </div>
            
            <div class="bg-gray-900 rounded-lg p-6">
                <h3 class="text-lg font-bold text-white mb-2">How long does the donation process take?</h3>
                <p class="text-gray-300">The entire process takes about 45 minutes to 1 hour, with the actual blood donation only taking around 8-10 minutes.</p>
            </div>
            
            <div class="bg-gray-900 rounded-lg p-6">
                <h3 class="text-lg font-bold text-white mb-2">Do I need an appointment or can I walk in?</h3>
                <p class="text-gray-300">Many centers accept walk-ins, especially during blood drives, but appointments are recommended to reduce wait times. Check each center's details for their policy.</p>
            </div>
            
            <div class="bg-gray-900 rounded-lg p-6">
                <h3 class="text-lg font-bold text-white mb-2">How often can I donate blood?</h3>
                <p class="text-gray-300">According to Indian guidelines, men can donate whole blood every 3 months (90 days) and women every 4 months (120 days). Platelet donation can be done more frequently.</p>
            </div>
        </div>
    </div>
</section>

<!-- Stats -->
<section class="py-16 bg-gradient-dark">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="modern-card p-6 rounded-lg text-center transform hover:scale-105 transition duration-300 shadow-neon">
                <div class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-accent-500 text-4xl mb-2">
                    <i class="fas fa-users"></i>
                </div>
                <div class="text-3xl font-bold text-white mb-2">12,000+</div>
                <div class="text-gray-400">Registered Donors</div>
            </div>
            
            <div class="modern-card p-6 rounded-lg text-center transform hover:scale-105 transition duration-300 shadow-neon-blue">
                <div class="text-transparent bg-clip-text bg-gradient-to-r from-secondary-500 to-accent-500 text-4xl mb-2">
                    <i class="fas fa-tint"></i>
                </div>
                <div class="text-3xl font-bold text-white mb-2">6,500+</div>
                <div class="text-gray-400">Blood Donations</div>
            </div>
            
            <div class="modern-card p-6 rounded-lg text-center transform hover:scale-105 transition duration-300 shadow-neon-purple">
                <div class="text-transparent bg-clip-text bg-gradient-to-r from-accent-500 to-primary-500 text-4xl mb-2">
                    <i class="fas fa-hospital"></i>
                </div>
                <div class="text-3xl font-bold text-white mb-2">120+</div>
                <div class="text-gray-400">Donation Centers</div>
            </div>
            
            <div class="modern-card p-6 rounded-lg text-center transform hover:scale-105 transition duration-300 shadow-neon">
                <div class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500 text-4xl mb-2">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="text-3xl font-bold text-white mb-2">19,500+</div>
                <div class="text-gray-400">Lives Saved</div>
            </div>
        </div>
    </div>
</section>

<!-- How it works -->
<section class="py-16 bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-2">How Blood Donation Works</h2>
            <p class="text-gray-400">Simple process, extraordinary impact</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-gray-900 p-6 rounded-lg">
                <div class="bg-primary-600 w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-xl mb-4">1</div>
                <h3 class="text-xl font-bold text-white mb-2">Registration</h3>
                <p class="text-gray-400">Sign up as a donor, provide your Aadhaar or other government ID, and complete a health screening to ensure donation safety.</p>
            </div>
            
            <div class="bg-gray-900 p-6 rounded-lg">
                <div class="bg-primary-600 w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-xl mb-4">2</div>
                <h3 class="text-xl font-bold text-white mb-2">Donation</h3>
                <p class="text-gray-400">Visit a donation center, undergo a hemoglobin test and health check, and donate blood in a safe and sterile environment.</p>
            </div>
            
            <div class="bg-gray-900 p-6 rounded-lg">
                <div class="bg-primary-600 w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-xl mb-4">3</div>
                <h3 class="text-xl font-bold text-white mb-2">Saving Lives</h3>
                <p class="text-gray-400">Your donation is processed, tested, and distributed to hospitals across India to help those in need.</p>
            </div>
        </div>
        
        <div class="text-center mt-10">
            <a href="about.php" class="text-primary-500 hover:text-primary-400 inline-flex items-center">
                Learn more about the donation process
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Blood types info -->
<section class="py-16 bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-2">Blood Type Compatibility</h2>
            <p class="text-gray-400">Understanding blood types can help save lives</p>
        </div>
        // ... existing code ...
    </div>
</section>

<!-- JavaScript for Map -->
<script>
    // This would be populated from database in a real application
    let centers = [
        {
            name: 'Red Cross Blood Bank',
            address: '12, MG Road, Connaught Place, New Delhi',
            lat: 28.6329,
            lng: 77.2195,
            id: 1
        },
        {
            name: 'AIIMS Blood Donation Center',
            address: 'AIIMS Campus, Ansari Nagar, New Delhi',
            lat: 28.5672,
            lng: 77.2100,
            id: 2
        },
        {
            name: 'Rotary Blood Bank',
            address: '56, Tughlakabad Institutional Area, New Delhi',
            lat: 28.5159,
            lng: 77.2490,
            id: 3
        },
        {
            name: 'Sankalp Blood Bank',
            address: '32, Malviya Nagar Main Market, New Delhi',
            lat: 28.5384,
            lng: 77.2157,
            id: 4
        },
        {
            name: 'Apollo Blood Donation Center',
            address: 'Apollo Hospital, Sarita Vihar, New Delhi',
            lat: 28.5365,
            lng: 77.2853,
            id: 5
        },
        {
            name: 'Max Healthcare Blood Center',
            address: 'Max Hospital, Saket, New Delhi',
            lat: 28.5270,
            lng: 77.2111,
            id: 6
        }
    ];
    
    let map;
    let markers = [];
    let infoWindow;
    
    // Initialize map
    function initMap() {
        const mapElement = document.getElementById('donation-centers-map');
        if (mapElement) {
            map = new google.maps.Map(mapElement, {
                center: { lat: 28.6139, lng: 77.2090 }, // Default to Delhi
                zoom: 11,
                styles: [
                    // Dark mode map styles
                    { elementType: "geometry", stylers: [{ color: "#242f3e" }] },
                    { elementType: "labels.text.stroke", stylers: [{ color: "#242f3e" }] },
                    { elementType: "labels.text.fill", stylers: [{ color: "#746855" }] },
                    { featureType: "administrative.locality", elementType: "labels.text.fill", stylers: [{ color: "#d59563" }] },
                    { featureType: "poi", elementType: "labels.text.fill", stylers: [{ color: "#d59563" }] },
                    { featureType: "poi.park", elementType: "geometry", stylers: [{ color: "#263c3f" }] },
                    { featureType: "poi.park", elementType: "labels.text.fill", stylers: [{ color: "#6b9a76" }] },
                    { featureType: "road", elementType: "geometry", stylers: [{ color: "#38414e" }] },
                    { featureType: "road", elementType: "geometry.stroke", stylers: [{ color: "#212a37" }] },
                    { featureType: "road", elementType: "labels.text.fill", stylers: [{ color: "#9ca5b3" }] },
                    { featureType: "road.highway", elementType: "geometry", stylers: [{ color: "#746855" }] },
                    { featureType: "road.highway", elementType: "geometry.stroke", stylers: [{ color: "#1f2835" }] },
                    { featureType: "road.highway", elementType: "labels.text.fill", stylers: [{ color: "#f3d19c" }] },
                    { featureType: "transit", elementType: "geometry", stylers: [{ color: "#2f3948" }] },
                    { featureType: "transit.station", elementType: "labels.text.fill", stylers: [{ color: "#d59563" }] },
                    { featureType: "water", elementType: "geometry", stylers: [{ color: "#17263c" }] },
                    { featureType: "water", elementType: "labels.text.fill", stylers: [{ color: "#515c6d" }] },
                    { featureType: "water", elementType: "labels.text.stroke", stylers: [{ color: "#17263c" }] }
                ]
            });
            
            infoWindow = new google.maps.InfoWindow();
            
            // Add markers for each center
            centers.forEach(center => {
                addMarker(center);
            });
            
            // Try to get user's location
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const userLocation = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                        
                        map.setCenter(userLocation);
                        
                        // Add a marker for user's location
                        new google.maps.Marker({
                            position: userLocation,
                            map: map,
                            icon: {
                                path: google.maps.SymbolPath.CIRCLE,
                                scale: 10,
                                fillColor: "#4F46E5",
                                fillOpacity: 0.7,
                                strokeWeight: 2,
                                strokeColor: "#FFFFFF"
                            },
                            title: "Your Location"
                        });
                    },
                    () => {
                        // Handle location error
                        console.log("Error: The Geolocation service failed.");
                    }
                );
            }
            
            // Setup search button after map is ready
            document.getElementById('search-centers').addEventListener('click', function() {
                // Get the selected filter values
                const location = document.getElementById('location').value;
                const distance = document.getElementById('distance').value;
                const appointmentFilter = document.getElementById('feature_appointment').checked;
                const walkinFilter = document.getElementById('feature_walkin').checked;
                const weekendFilter = document.getElementById('feature_weekend').checked;
                
                // For demo purposes, we'll just show all centers with adjusted zoom
                const bounds = new google.maps.LatLngBounds();
                
                // Add all markers to bounds and make them visible
                markers.forEach(marker => {
                    marker.setVisible(true);
                    bounds.extend(marker.getPosition());
                });
                
                // Fit the map to show all markers
                map.fitBounds(bounds);
                
                // Zoom out slightly for better view
                const listener = google.maps.event.addListenerOnce(map, 'bounds_changed', function() {
                    if (map.getZoom() > 15) {
                        map.setZoom(15);
                    }
                });
                
                // Scroll to map
                document.getElementById('donation-centers-map').scrollIntoView({ behavior: 'smooth' });
            });
        }
    }
    
    // Add a marker to the map
    function addMarker(center) {
        const marker = new google.maps.Marker({
            position: { lat: center.lat, lng: center.lng },
            map: map,
            title: center.name,
            icon: {
                url: 'https://maps.google.com/mapfiles/ms/icons/red-dot.png'
            }
        });
        
        markers.push(marker);
        
        // Add click event to marker
        marker.addListener('click', () => {
            infoWindow.setContent(`
                <div class="info-window">
                    <h3 style="font-weight: bold; margin-bottom: 5px;">${center.name}</h3>
                    <p style="margin-bottom: 5px;">${center.address}</p>
                    <a href="appointment.php?center=${center.id}" style="color: #dc2626; text-decoration: underline;">
                        Schedule Appointment
                    </a>
                </div>
            `);
            infoWindow.open(map, marker);
        });
    }
    
    // Show a specific center on the map
    function showOnMap(lat, lng) {
        map.setCenter({ lat, lng });
        map.setZoom(15);
        
        // Find the marker and trigger a click
        const marker = markers.find(m => m.getPosition().lat() === lat && m.getPosition().lng() === lng);
        if (marker) {
            google.maps.event.trigger(marker, 'click');
        }
        
        // Scroll to map
        document.getElementById('donation-centers-map').scrollIntoView({ behavior: 'smooth' });
    }
    
    // Initialize map on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Wait for Google Maps to be loaded
        if (typeof google !== 'undefined') {
            initMap();
        } else {
            // If Google Maps isn't loaded yet, wait and try again
            setTimeout(function() {
                if (typeof google !== 'undefined') {
                    initMap();
                }
            }, 1000);
        }
    });
    
    // Load more centers button
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('load-more').addEventListener('click', function(e) {
            e.preventDefault();
            // In a real application, this would load more centers from the database
            alert('This feature would load additional centers in a live application.');
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Particle canvas background
        const canvas = document.getElementById('particle-canvas');
        if (canvas) {
            const ctx = canvas.getContext('2d');
            
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            
            const particles = [];
            const particleCount = 100;
            
            class Particle {
                constructor() {
                    this.x = Math.random() * canvas.width;
                    this.y = Math.random() * canvas.height;
                    this.size = Math.random() * 2 + 1;
                    this.speedX = Math.random() * 1 - 0.5;
                    this.speedY = Math.random() * 1 - 0.5;
                    
                    // Create gradient colors for particles
                    const colors = [
                        [255, Math.floor(Math.random() * 50), Math.floor(Math.random() * 50)], // Red variations
                        [Math.floor(Math.random() * 50), Math.floor(Math.random() * 50), 255], // Blue variations
                        [Math.floor(Math.random() * 50), 0, Math.floor(Math.random() * 150) + 100] // Purple variations
                    ];
                    
                    const colorSet = colors[Math.floor(Math.random() * colors.length)];
                    this.color = `rgba(${colorSet[0]}, ${colorSet[1]}, ${colorSet[2]}, ${Math.random() * 0.5})`;
                }
                
                update() {
                    this.x += this.speedX;
                    this.y += this.speedY;
                    
                    if (this.x > canvas.width || this.x < 0) this.speedX *= -1;
                    if (this.y > canvas.height || this.y < 0) this.speedY *= -1;
                }
                
                draw() {
                    ctx.fillStyle = this.color;
                    ctx.beginPath();
                    ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                    ctx.fill();
                }
            }
            
            function init() {
                for (let i = 0; i < particleCount; i++) {
                    particles.push(new Particle());
                }
            }
            
            function animate() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                
                for (let i = 0; i < particles.length; i++) {
                    particles[i].update();
                    particles[i].draw();
                    
                    // Create connections between particles
                    for (let j = i; j < particles.length; j++) {
                        const dx = particles[i].x - particles[j].x;
                        const dy = particles[i].y - particles[j].y;
                        const distance = Math.sqrt(dx * dx + dy * dy);
                        
                        if (distance < 100) {
                            ctx.beginPath();
                            ctx.strokeStyle = `rgba(255, 0, 0, ${0.1 - distance/1000})`;
                            ctx.lineWidth = 0.2;
                            ctx.moveTo(particles[i].x, particles[i].y);
                            ctx.lineTo(particles[j].x, particles[j].y);
                            ctx.stroke();
                        }
                    }
                }
                
                requestAnimationFrame(animate);
            }
            
            init();
            animate();
            
            // Resize canvas on window resize
            window.addEventListener('resize', function() {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            });
        }
    });
</script>

<?php include_once "includes/footer.php"; ?> 