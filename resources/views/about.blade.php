<x-guest-layout>
    @section('title', 'About - Feliciano Restaurant')
    <x-hero-card namePage="About" bg="images/about-1.jpg" />
        <!-- About Start -->
        @include('partials._about')
        <!-- About End -->

        @include('partials._gallery')


        <!-- Services Start -->
        @include('partials._services')
        <!-- Services End -->
        
        
</x-guest-layout>