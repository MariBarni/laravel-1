import Alpine from 'alpinejs'
import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm'
import NotificationsAlpinePlugin from '../../vendor/filament/notifications/dist/module.esm'
// Reference from published scripts
require('./vendor/livewire-ui/modal');


// Reference from vendor
require('../../vendor/livewire-ui/modal/resources/js/modal');
import.meta.glob([
    '../images/**',
    '../fonts/**',
  ]);
  
Alpine.plugin(FormsAlpinePlugin)
Alpine.plugin(NotificationsAlpinePlugin)

window.Alpine = Alpine

Alpine.start()
