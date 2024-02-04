import Alpine from 'alpinejs'
import sidebar from './sidebar'

Alpine.store('darkMode', {
    dark: false,

    toggle() {
        this.dark = !this.dark
    }
})
 
window.Alpine = Alpine
window.sidebar = sidebar;
 
Alpine.start()