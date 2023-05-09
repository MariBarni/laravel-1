<x-modal>
    <x-slot name="buttons">
    <button wire:click="$emit('closeModal', true)">X</button>
    </x-slot>

    <x-slot name="content">
    
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>




        
            <!-- Left Side -->
            <div class="w-full md:w-4/12 min-h-fit bg-blue-200">
                <!-- Profile Card -->
                <div class="p-3 border-t-4 border-blue-200">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto"
                       src="{{ url('storage/'.$profile->profileimg) }}" 
                        >
                    </div>
                    <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                        <span>Persönliches</span>
                    </div>
                    
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span class="text-blue-800">
                                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
                                </svg>
                                </span>
                                <span ><h3 class="text-gray-600 font-lg text-semibold leading-6"> {{$profile->email}}</h3></span>
                    </div>

                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span class="text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                </svg>
                                </span>
                                <span ><h3 class="text-gray-600 font-lg text-semibold leading-6"> {{$profile->handynummer}}</h3></span>
                    </div>
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span class="text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                </span>
                                <span ><h3 class="text-gray-600 font-lg text-semibold leading-6"> {{$profile->straße}}, {{$profile->plz}} {{$profile->ort}}</h3></span>
                    </div>   

                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span class="text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8.25v-1.5m0 1.5c-1.355 0-2.697.056-4.024.166C6.845 8.51 6 9.473 6 10.608v2.513m6-4.87c1.355 0 2.697.055 4.024.165C17.155 8.51 18 9.473 18 10.608v2.513m-3-4.87v-1.5m-6 1.5v-1.5m12 9.75l-1.5.75a3.354 3.354 0 01-3 0 3.354 3.354 0 00-3 0 3.354 3.354 0 01-3 0 3.354 3.354 0 00-3 0 3.354 3.354 0 01-3 0L3 16.5m15-3.38a48.474 48.474 0 00-6-.37c-2.032 0-4.034.125-6 .37m12 0c.39.049.777.102 1.163.16 1.07.16 1.837 1.094 1.837 2.175v5.17c0 .62-.504 1.124-1.125 1.124H4.125A1.125 1.125 0 013 20.625v-5.17c0-1.08.768-2.014 1.837-2.174A47.78 47.78 0 016 13.12M12.265 3.11a.375.375 0 11-.53 0L12 2.845l.265.265zm-3 0a.375.375 0 11-.53 0L9 2.845l.265.265zm6 0a.375.375 0 11-.53 0L15 2.845l.265.265z" />
                                </svg>
                                </span>
                                <span ><h3 class="text-gray-600 font-lg text-semibold leading-6"> {{$profile->geburtstag}}</h3></span>
                    </div>   

                                       
                </div>
                <!-- End of profile card -->
                
                <!-- Skills card -->
                <div class="p-3 hover:shadow">
                    <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                        <span>Fähigkeiten</span>
                    </div>

                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                            <span clas="text-green-500"> </span>
                            <span ><h3 class="text-gray-600 font-lg text-semibold leading-6"> 
                            <ul>

                            @foreach($profile->tags as $e)

                            <li> {{$e}} </li>

                            @endforeach
                            </ul>
                            </h3>
                            </span>
                    </div>              
                </div>

                <!-- End of Skills card -->
                 <!-- Languages card -->
                 <div class="p-3 hover:shadow">
                    <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                        <span>Sprachen</span>
                    </div>

                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                            <span clas="text-green-500"> </span>
                            <span ><h3 class="text-gray-600 font-lg text-semibold leading-6"> 
                            <ul>
                            @foreach($profile->languages as $lan)
                        
                            <li>
                            {{$lan->language}}  {{$lan->level}}                   
                            </li>
                            @endforeach                            
                            </ul>
                            </h3>
                            </span>
                    </div>                                  
                </div>
                <!-- End of Languages card -->
            </div>

            <!-- Right Side -->
            <div class="w-full md:w-8/12 mx-2 min-h-fit">
            <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">             
                    <div class="text-4xl text-blue-700 font-semibold leading-tight">{{$profile->vorname}}</div>
                    <div class="text-4xl text-blue-700 font-semibold leading-tight">{{$profile->name}}</div>
                    <div class="text-3xl text-blue-400 font-semibold leading-tight">{{$profile->wunschposition}}</div>      
                </div>
                <!-- End of about section -->

                <div class="my-4"></div>

                <!-- Beruferfahrungen .- kann leer Sein -->
                @if (count($profile->experiences) > 0)
                <div class="bg-white p-3 shadow-sm rounded-sm">                  
                        
                        
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Beruferfahrungen</span>
                            </div>

                            <ul class="list-inside space-y-2">
                            @foreach ($profile->experiences as $exp)
                                <li>
                                    <div class="text-blue-600">{{$exp->jname}} </div>
                                    <div class="text-gray-600">{{$exp->cnname}} </div>
                                    <div class="text-gray-500 text-s"> {{$exp->started_at->format('d/m/Y')}} - {{ $exp->finished_at?->format('d/m/Y') }}                                        
                                    </div>
                                    <div class="text-gray-500 text-s max-w-xl">{{$exp->description}}</div>
                                </li>
                                @endforeach                           
                            </ul>
                        
                 <!-- End of Beruferfahrungen grid --> 
                </div>
                @else

                @endif
                <div class="my-4"></div>

                <!-- Bildungsweg  -->                      
                <div class="bg-white p-3 shadow-sm rounded-sm">              
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                </svg>
                                </span>
                                <span class="tracking-wide">Bildungsweg</span>
                            </div>
                            <ul class="list-inside space-y-2">
                            @foreach ($profile->educations as $edu)
                                <li>
                                    <div class="text-blue-600">{{$edu->abschluss}} </div>
                                    <div class="text-gray-600">{{$edu->bildungseinrichtung}} </div>
                                    <div class="text-gray-500 text-s">{{$edu->started_at->format('d/m/Y')}} - {{ $edu->finished_at?->format('d/m/Y') }}</div>
                                    <div class="text-gray-500 text-s">{{$edu->fachrichtung}}</div>
                                    <div class="text-gray-500 text-s">{{$edu->orth}}</div>
                                </li>
                                @endforeach                           
                            </ul>
                        </div>    
                 <!-- End of Beruferfahrungen grid --> 
                </div>        
                <!-- End of profile tab -->
            </div>
        
    


    </x-slot>

 
</x-modal>
