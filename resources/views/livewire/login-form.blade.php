
<div class="bg-white">
        <div class="flex justify-center h-screen">
          
            
            <div class="flex items-center w-full max-w-md px-6 mx-auto md:w-2/3">
                <div class="flex-1">
                    <div class="text-center">
                        <h2 class="text-4xl font-bold text-center text-gray-700">Brand</h2>
                        
                        <p class="mt-3 text-gray-500">Sign in to access your account</p>
                    </div>

                    <div class="mt-8">
                    <form wire:submit.prevent="anmelden">
                        
                        {{ $this->form }}     
                    

                            <div class="mt-6">
                                <button class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                    Anmelden
                                </button>
                            </div>

                        </form>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
