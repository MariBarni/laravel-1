<div class="w-screen h-screen flex items-center justify-center bg-white flex flex-row flex-wrap">
    <div class="border-gray-200 rounded-lg">
        <form wire:submit.prevent="submit">
        {{ $this->form }}     
        </form>
        {{-- STEP 1 --}}
        @if ($currentStepF == 1)
       
        </br>
        <div class="grid grid-cols-1      filament-forms-component-container gap-6">
            <div class="col-span-full filament-forms-section-component rounded-xl border border-gray-300 bg-white">

                <div class="filament-forms-section-header-wrapper flex rtl:space-x-reverse overflow-hidden rounded-t-xl min-h-[56px] px-4 py-2 items-center bg-gray-100 rounded-b-xl">
                    <div class="filament-forms-section-header flex-1 space-y-1 cursor-pointer ">
                        <h3 class="font-bold tracking-tight pointer-events-none text-xl font-bold">
                        Schritt 3: Lebenslauf herunteladen
                        </h3>

                        <p class="text-gray-500 text-base">
                        Lade deinen Lebenslauf als PDF herunter
                        </p>
                    </div>

                    <button type="button" class="flex items-center justify-center transform rounded-full text-primary-500 outline-none hover:bg-gray-500/5 focus:bg-primary-500/10 w-10 h-10 ">
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>          
                    
                    </button>
                </div>
              
            </div>
        </div>
        @endif

            {{-- STEP 2 --}}
            @if ($currentStepF == 2)
       
         
         <div class="grid grid-cols-1      filament-forms-component-container gap-6">

            <div class="col-span-full filament-forms-section-component rounded-xl border border-gray-300 bg-white">
       
                <div class="filament-forms-section-header-wrapper flex rtl:space-x-reverse overflow-hidden rounded-t-xl min-h-[56px] px-4 py-2 items-center bg-gray-100 rounded-b-xl">
                    <div class="filament-forms-section-header flex-1 space-y-1 cursor-pointer ">
                        <h3 class="font-bold tracking-tight pointer-events-none text-xl font-bold">
                            Schritt 1: Design festlegen
                        </h3>

                            <p class="text-gray-500 text-base">
                            Los geht´s, wähle eine Vorlage für deinen Lebenslauf aus!
                            </p>
                    </div>

                    <button type="button" class="flex items-center justify-center transform rounded-full text-primary-500 outline-none hover:bg-gray-500/5 focus:bg-primary-500/10 w-10 h-10 ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>              
                    
                    </button>
                </div>
            </div>

            <div class="col-span-full filament-forms-section-component rounded-xl border border-gray-300 bg-white">
       
                <div class="filament-forms-section-header-wrapper flex rtl:space-x-reverse overflow-hidden rounded-t-xl min-h-[56px] px-4 py-2 items-center bg-gray-100 rounded-b-xl">
                    <div class="filament-forms-section-header flex-1 space-y-1 cursor-pointer ">
                        <h3 class="font-bold tracking-tight pointer-events-none text-xl font-bold">
                        Schritt 2: Lebenslauf erstellen
                        </h3>

                        <p class="text-gray-500 text-base">
                        Fülle die Lebenslauf-Vorlage Schritt für Schritt aus.
                        </p>
                     </div>

                    <button type="button" class="flex items-center justify-center transform rounded-full text-primary-500 outline-none hover:bg-gray-500/5 focus:bg-primary-500/10 w-10 h-10 ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>              
                    
                    </button>
                </div>
            </div>

            <div class="col-span-full filament-forms-section-component rounded-xl border border-gray-300 bg-white">

                <div class="filament-forms-section-header-wrapper flex rtl:space-x-reverse overflow-hidden rounded-t-xl min-h-[56px] px-4 py-2 items-center bg-gray-100 rounded-b-xl">
                    <div class="filament-forms-section-header flex-1 space-y-1 cursor-pointer ">
                        <h3 class="font-bold tracking-tight pointer-events-none text-xl font-bold">
                        Schritt 3: Lebenslauf herunteladen
                        </h3>

                    <p class="text-gray-500 text-base">
                    Lade deinen Lebenslauf als PDF herunter
                    </p>
                    </div>

                    <button type="button" class="flex items-center justify-center transform rounded-full text-primary-500 outline-none hover:bg-gray-500/5 focus:bg-primary-500/10 w-10 h-10 ">
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>          
                    
                    </button>
                </div>
                <div  class="filament-forms-section-content-wrapper" aria-expanded="true">
                    <div class="filament-forms-section-content p-6">
                        <div class="grid grid-cols-1   lg:grid-cols-2   filament-forms-component-container gap-6">
                        
                            
                         
                <div class="mb-5">

<a   
class="filament-button filament-button-size-sm inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2rem] px-3 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700" 
href="{{ route('resume.show',33)}}" >
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
        </svg>
        <span>vorschau</span>
</a>
     
</div>     

<div class="mb-5">

<a
    class="filament-button filament-button-size-sm inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2rem] px-3 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700"
            href="{{ route('resume.download',33)}}" >
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                <span>herunterladen</span>
</a> 


</div>   

                    </div>
                </div>
            </div>


        </div>

        @endif
 
    </div>
</div>