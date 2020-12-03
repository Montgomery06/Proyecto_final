<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


   @if (Auth::user()->hasRole('Admin') ) 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>

    @else

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-3 mb-2 bg-dark text-white"> 
                <h1 class="text-center"> Proximos estrenos: </h1>
            </div>
             <div>

                      <!-- Grid column -->
                      <div class="mb-3 pics animation all 2">
                        <img class="img-fluid" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fimage.tmdb.org%2Ft%2Fp%2Foriginal%2FzV6C8XHsOHQTkFerREVXCG8DBSF.jpg&f=1&nofb=1" alt="Card image cap">
                      </div>
                      <!-- Grid column -->

                      <!-- Grid column -->
                      <div class="mb-3 pics animation all 1">
                        <img class="img-fluid" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fimgix.ranker.com%2Fuser_node_img%2F4269%2F85376073%2Foriginal%2Fmulan-photo-u3%3Fw%3D650%26q%3D50%26fm%3Dpjpg%26fit%3Dfill%26bg%3Dfff&f=1&nofb=1" alt="Card image cap">
                      </div>
                      <!-- Grid column -->

                      <!-- Grid column -->
                      <div class="mb-3 pics animation all 1">
                        <img class="img-fluid" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Finsidepulse.com%2Fwp-content%2Fuploads%2F2020%2F01%2FBloodshot-Movie-poster-March-13-2020.jpg&f=1&nofb=1" alt="Card image cap">
                      </div>
                      <!-- Grid column -->

                      <!-- Grid column -->
                      <div class="mb-3 pics animation all 2">
                        <img class="img-fluid" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fimgix.ranker.com%2Fuser_node_img%2F4269%2F85378091%2Foriginal%2Ffree-guy-photo-u3%3Fw%3D650%26q%3D50%26fm%3Dpjpg%26fit%3Dfill%26bg%3Dfff&f=1&nofb=1" alt="Card image cap">
                      </div>
                      <!-- Grid column -->

                      <!-- Grid column -->
                      <div class="mb-3 pics animation all 2">
                        <img class="img-fluid" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.movieassets.com%2Fstatic%2Fimages%2Fitems%2Fmovies%2Fposters%2F500%2F100%2Ffast-and-furious-9-26e11841cede8406e71cc28218541080.jpg&f=1&nofb=1" alt="Card image cap">
                      </div>
                      <!-- Grid column -->

                      <!-- Grid column -->
                      <div class="mb-3 pics animation all 1">
                        <img class="img-fluid" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.traileraddict.com%2Fcontent%2Funiversal-pictures%2Fdolittle-poster-3.jpg&f=1&nofb=1" alt="Card image cap">
                      </div>
                      <!-- Grid column -->

                    </div>

            </div>
        </div>
    </div>


      @endif

    
</x-app-layout>
