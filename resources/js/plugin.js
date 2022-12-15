import Alpine from 'alpinejs'
import Intersect from '@alpinejs/intersect'

document.addEventListener("alpine:init", () => {
    Alpine.plugin(Intersect)
})
