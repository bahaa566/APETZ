require('./../bootstrap')

import Alpine from 'alpinejs'
import destroy from './components/btns/destroy'
import repeater from './components/form/repeater'
import product_offer_item from './components/product/product_offer_item'
import product_unit from './components/product/product_units'
import action from './components/btns/action'
import activate from './components/btns/activate'
import groupSelect from './components/groupSelect'
import location from './components/form/location_input'
import openModal from './components/btns/open_modal';

require('./plugins/TomSelect')
require('./plugins/livewire')

window.Alpine = Alpine
Alpine.data('destroy', destroy)
Alpine.data('action', action)
Alpine.data('toggleActivation', activate)
Alpine.data('groupSelect', groupSelect)
Alpine.data('location', location)
Alpine.data('repeater', repeater)
Alpine.data('product_unit', product_unit)
Alpine.data('product_offer_item', product_offer_item)
Alpine.data('openModal', openModal)

Alpine.start()
