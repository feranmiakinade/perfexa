import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

if (!reducedMotion && 'IntersectionObserver' in window) {
    const sections = document.querySelectorAll('main section:not(.page-hero)');
    const sectionObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('section-reveal-visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0,
        rootMargin: '0px 0px -40px 0px',
    });

    sections.forEach((section) => {
        section.classList.add('section-reveal');
        sectionObserver.observe(section);
    });
}