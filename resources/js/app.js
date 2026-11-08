/**
 * Portfolio interactions.
 * Kept dependency-free so the site stays fast and easy to maintain.
 */

const ready = (callback) => {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', callback);
    } else {
        callback();
    }
};

ready(() => {
    const header = document.querySelector('[data-site-header]');
    const menuButton = document.querySelector('[data-menu-button]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');
    const progress = document.querySelector('[data-scroll-progress]');

    const setHeaderState = () => {
        if (!header) return;
        header.classList.toggle('is-scrolled', window.scrollY > 12);
    };

    const setProgress = () => {
        if (!progress) return;
        const height = document.documentElement.scrollHeight - window.innerHeight;
        const value = height > 0 ? (window.scrollY / height) * 100 : 0;
        progress.style.width = `${Math.min(100, Math.max(0, value))}%`;
    };

    setHeaderState();
    setProgress();
    window.addEventListener('scroll', setHeaderState, { passive: true });
    window.addEventListener('scroll', setProgress, { passive: true });
    window.addEventListener('resize', setProgress);

    const menuIconOpen = menuButton?.querySelector('[data-menu-icon-open]');
    const menuIconClose = menuButton?.querySelector('[data-menu-icon-close]');

    const setMenuState = (isOpen) => {
        if (!mobileMenu || !menuButton) return;
        mobileMenu.classList.toggle('hidden', !isOpen);
        menuButton.setAttribute('aria-expanded', String(isOpen));
        document.body.classList.toggle('overflow-hidden', isOpen);
        menuIconOpen?.classList.toggle('hidden', isOpen);
        menuIconClose?.classList.toggle('hidden', !isOpen);
    };

    const closeMenu = () => setMenuState(false);

    if (menuButton && mobileMenu) {
        menuButton.addEventListener('click', () => {
            const isOpen = menuButton.getAttribute('aria-expanded') === 'true';
            setMenuState(!isOpen);
        });

        mobileMenu.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', closeMenu);
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') closeMenu();
        });
    }

    const revealItems = document.querySelectorAll('[data-reveal]');

    if ('IntersectionObserver' in window && revealItems.length) {
        const revealObserver = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                });
            },
            { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
        );

        revealItems.forEach((item) => revealObserver.observe(item));
    } else {
        revealItems.forEach((item) => item.classList.add('is-visible'));
    }

    const navLinks = document.querySelectorAll('[data-nav-link]');
    const sections = [...navLinks]
        .map((link) => {
            const target = link.getAttribute('href');
            return target && target.startsWith('#') ? document.querySelector(target) : null;
        })
        .filter(Boolean);

    if ('IntersectionObserver' in window && sections.length) {
        const sectionObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;
                    navLinks.forEach((link) => {
                        const isActive = link.getAttribute('href') === `#${entry.target.id}`;
                        if (isActive) {
                            link.setAttribute('aria-current', 'page');
                        } else {
                            link.removeAttribute('aria-current');
                        }
                    });
                });
            },
            { rootMargin: '-40% 0px -55% 0px', threshold: 0 }
        );

        sections.forEach((section) => sectionObserver.observe(section));
    }

    const copyButtons = document.querySelectorAll('[data-copy-email]');

    copyButtons.forEach((button) => {
        button.addEventListener('click', async () => {
            const email = button.getAttribute('data-copy-email');
            const original = button.dataset.label ?? button.textContent;

            try {
                await navigator.clipboard.writeText(email);
                button.textContent = 'Copied!';
            } catch {
                button.textContent = email;
            }

            window.setTimeout(() => {
                button.textContent = original;
            }, 1800);
        });
    });
});
