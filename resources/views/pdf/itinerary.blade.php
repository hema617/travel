<h2>Travel Itinerary</h2>

<p>Package: {{ $package->package_name }}</p>

<h3>Travelers</h3>

@foreach($travelers as $traveler)

<p>{{ $traveler->name }} - {{ $traveler->age }}</p>

@endforeach