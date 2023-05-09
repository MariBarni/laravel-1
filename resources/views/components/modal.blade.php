@props(['formAction' => false])

<div>
    @if($formAction)
        <form wire:submit.prevent="{{ $formAction }}">
    @endif
            <div class="bg-white p-2 sm:px-2 sm:py-2 border-b border-gray-150">
            {{ $buttons }}
            </div>
            <div class="bg-white px-2 sm:p-2 min-h-fit">
                <div class="space-y-2 md:flex no-wrap min-h-fit">
                    {{ $content }}
                    
                 
                </div>
            </div>

         
    @if($formAction)
        </form>
    @endif
</div>