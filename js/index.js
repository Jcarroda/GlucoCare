document.addEventListener("DOMContentLoaded", function () {
    // Modal functionality
    const modal = document.getElementById("modal");
    const modalImg = document.getElementById("modal-image");
    const modalClose = document.querySelector(".modal-close");

    // Only initialize modal if elements exist
    if (modal && modalImg && modalClose) {
        // Function to open modal with image
        window.openModal = function(button) {
            const card = button.closest('.educational-card');
            const img = card.querySelector('.educational-img');
            if (modal && modalImg && img) {
                modal.style.display = "block";
                modalImg.src = img.src;
                modalImg.alt = img.alt;
                document.body.style.overflow = "hidden"; // Prevent background scrolling
            }
        };

        // Close modal functions
        function closeModal() {
            if (modal) {
                modal.style.display = "none";
                document.body.style.overflow = "auto"; // Restore scrolling
            }
        }

        modalClose.addEventListener("click", closeModal);

        modal.addEventListener("click", function (e) {
            if (e.target === modal) {
                closeModal();
            }
        });
    }

    // Close modal with Escape key
    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape" && modal && modal.style.display === "block") {
            closeModal();
        }
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add animation classes when elements come into view
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, observerOptions);

    // Observe feature cards and educational cards
    const cardsToObserve = document.querySelectorAll('.feature-card, .educational-card');
    if (cardsToObserve.length > 0) {
        cardsToObserve.forEach(card => {
            observer.observe(card);
        });
    }

    // Mobile menu toggle (if needed in future)
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const nav = document.querySelector('.nav');
    
    if (mobileMenuToggle && nav) {
        mobileMenuToggle.addEventListener('click', function() {
            nav.classList.toggle('mobile-open');
        });
    }

    // Add loading states to buttons
    const buttons = document.querySelectorAll('.btn');
    if (buttons.length > 0) {
        buttons.forEach(button => {
            if (button.href && !button.href.includes('#')) {
                button.addEventListener('click', function() {
                    this.classList.add('loading');
                    // Remove loading state after navigation
                    setTimeout(() => {
                        this.classList.remove('loading');
                    }, 2000);
                });
            }
        });
    }

    // Form validation enhancement
    const forms = document.querySelectorAll('form');
    if (forms.length > 0) {
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                const requiredFields = form.querySelectorAll('[required]');
                let isValid = true;
                
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        field.classList.add('error');
                        isValid = false;
                    } else {
                        field.classList.remove('error');
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                    // Show error message
                    const errorMsg = document.createElement('div');
                    errorMsg.className = 'error-message';
                    errorMsg.textContent = 'Por favor, completa todos los campos requeridos.';
                    errorMsg.style.cssText = 'color: var(--danger-color); margin-top: 1rem; padding: 0.5rem; background: rgba(239, 68, 68, 0.1); border-radius: 0.5rem;';
                    
                    const existingError = form.querySelector('.error-message');
                    if (existingError) {
                        existingError.remove();
                    }
                    
                    form.appendChild(errorMsg);
                }
            });
        });
    }

    // Add hover effects to cards
    const cardsForHover = document.querySelectorAll('.feature-card, .educational-card');
    if (cardsForHover.length > 0) {
        cardsForHover.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-4px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    }

    // Performance optimization: Lazy load images
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
});
