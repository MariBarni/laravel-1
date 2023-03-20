<div class="w-screen h-screen flex items-center justify-center">
    <div class="border-gray-200 rounded-lg">
<form wire:submit.prevent="submit">
    {{ $this->form }}
 
    <button type="submit" class="w-full rounded-md mt-2 py-3">
        Submit
    </button>
</form>
</div>
</div>
