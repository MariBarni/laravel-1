<section class="py-10 bg-gray-100">
  <div class="mx-auto grid max-w-6xl  grid-cols-1 gap-6 p-6 ">
    <div class="grid grid-cols-1    filament-forms-component-container gap-6">
      <div class="col-span-full">
        
        <div id="lebenslauf-design-waehlen" class="filament-forms-section-component rounded-xl border border-gray-300 bg-white">
          <div class="filament-forms-section-header-wrapper flex rtl:space-x-reverse overflow-hidden rounded-t-xl min-h-[56px] px-4 py-2 items-center bg-gray-100">
            <div class="filament-forms-section-header flex-1 space-y-1">
              <h3 class="tracking-tight pointer-events-none text-xl font-bold">Design festlegen</h3>
              <p class="text-gray-500 text-base">Los geht´s, wähle eine Vorlage für deinen Lebenslauf aus!</p>
              <div class="inline-block mr-2 mt-2">
                    <a type="button" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg flex items-center" href="{{ url('/edit/' . $profileID ) }}">
                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        Editieren
                    </a>
                </div>
            </div>
          </div>

          <div class="filament-forms-section-content-wrapper">
            <div class="filament-forms-section-content p-6">
              <div class="grid justify-center md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-7 my-10">
                @foreach ($designs as $design)
                <div class="bg-white rounded-lg border shadow-md max-w-xs w-fit overflow-hidden flex-wrap: wrap;">
                  <img class="max-h-full w-fit object-contain items-center" src="{{ asset('storage/'.$design->designimg) }}" alt="" />
                  <div class="p-3">
                    <span class="text-sm text-primary"> {{$design->dname}}</span>
                    <br/>
                    <a type="button" target="_blank" class="rounde mr-3 hidden bg-blue-700 py-1.5 px-6 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 md:mr-0 md:inline-block rounded-lg"
                     href="{{ url('/preview/' . $profileID . '/'.$design->dname) }}">Vorschau</a>
                    <a type="button" target="_blank" class="rounde mr-3 hidden bg-blue-700 py-1.5 px-6 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 md:mr-0 md:inline-block rounded-lg" 
                    href="{{ url('/download/' . $profileID . '/'.$design->dname) }}">Herunteladen</a>

                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>


   