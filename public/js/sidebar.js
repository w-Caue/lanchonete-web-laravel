document.addEventListener('alpine:init', () => {
    Alpine.store('sidebar', {
        full: false,
        active: 'home',
        navOpen: false
    });
})