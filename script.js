/**
 * ICETT '26 Conference Website - Professional JavaScript
 * International Conference on Emerging Trends and Transformations in AI
 * Advanced Animations, Transitions, and Interactive Features
 */

"use strict";

// ============================================
// CONFIGURATION
// ============================================
const CONFIG = {
  conferenceDate: new Date(Date.UTC(2026, 4, 15, 0, 0, 0)), // May 15, 2026
  animationThreshold: 0.15,
  scrollOffset: 100,
  typingSpeed: 50,
  particleCount: 50,
};

// ============================================
// UTILITY FUNCTIONS
// ============================================
const utils = {
  // Debounce function for performance
  debounce(func, wait = 10) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        clearTimeout(timeout);
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  },

  // Throttle function for scroll events
  throttle(func, limit = 100) {
    let inThrottle;
    return function (...args) {
      if (!inThrottle) {
        func.apply(this, args);
        inThrottle = true;
        setTimeout(() => (inThrottle = false), limit);
      }
    };
  },

  // Linear interpolation
  lerp(start, end, factor) {
    return start + (end - start) * factor;
  },

  // Clamp value between min and max
  clamp(value, min, max) {
    return Math.min(Math.max(value, min), max);
  },

  // Get element offset from top
  getOffset(el) {
    const rect = el.getBoundingClientRect();
    return {
      top: rect.top + window.scrollY,
      left: rect.left + window.scrollX,
    };
  },

  // Check if element is in viewport
  isInViewport(el, offset = 0) {
    const rect = el.getBoundingClientRect();
    return rect.top <= window.innerHeight - offset && rect.bottom >= offset;
  },

  // Animate number counting
  animateValue(element, start, end, duration) {
    const startTime = performance.now();
    const updateNumber = (currentTime) => {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / duration, 1);
      const easeProgress = 1 - Math.pow(1 - progress, 3); // Ease out cubic
      const current = Math.floor(start + (end - start) * easeProgress);
      element.textContent = current;
      if (progress < 1) {
        requestAnimationFrame(updateNumber);
      }
    };
    requestAnimationFrame(updateNumber);
  },
};

// ============================================
// PAGE LOADER
// ============================================
class PageLoader {
  constructor() {
    this.loader = document.querySelector(".page-loader");
    this.init();
  }

  init() {
    if (!this.loader) {
      this.createLoader();
    }
    window.addEventListener("load", () => this.hide());
  }

  createLoader() {
    this.loader = document.createElement("div");
    this.loader.className = "page-loader";
    this.loader.innerHTML = `
            <div class="loader-content">
                <div class="loader-spinner"></div>
                <p class="loader-text" style="margin-top: 20px; font-weight: 600; color: var(--primary);">ICETT '26</p>
            </div>
        `;
    document.body.prepend(this.loader);
  }

  hide() {
    setTimeout(() => {
      this.loader.classList.add("hidden");
      document.body.style.overflow = "";
      // Trigger initial animations
      document.dispatchEvent(new CustomEvent("pageLoaded"));
    }, 500);
  }
}

// ============================================
// SCROLL PROGRESS INDICATOR
// ============================================
class ScrollProgress {
  constructor() {
    this.progressBar = null;
    this.init();
  }

  init() {
    this.createProgressBar();
    window.addEventListener(
      "scroll",
      utils.throttle(() => this.update(), 16),
    );
  }

  createProgressBar() {
    this.progressBar = document.createElement("div");
    this.progressBar.className = "scroll-progress";
    document.body.prepend(this.progressBar);
  }

  update() {
    const scrollTop = window.scrollY;
    const docHeight =
      document.documentElement.scrollHeight - window.innerHeight;
    const progress = (scrollTop / docHeight) * 100;
    this.progressBar.style.width = `${progress}%`;
  }
}

// ============================================
// SCROLL REVEAL ANIMATIONS
// ============================================
class ScrollReveal {
  constructor() {
    this.elements = [];
    this.init();
  }

  init() {
    this.elements = document.querySelectorAll(
      ".reveal, .reveal-left, .reveal-right, .reveal-scale, .stagger-children",
    );

    // Use Intersection Observer for better performance
    if ("IntersectionObserver" in window) {
      this.observer = new IntersectionObserver(
        (entries) => this.handleIntersection(entries),
        {
          root: null,
          rootMargin: "0px",
          threshold: CONFIG.animationThreshold,
        },
      );

      this.elements.forEach((el) => this.observer.observe(el));
    } else {
      // Fallback for older browsers
      window.addEventListener(
        "scroll",
        utils.throttle(() => this.checkElements(), 100),
      );
      this.checkElements();
    }
  }

  handleIntersection(entries) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("active");
        // Optionally unobserve after animation
        // this.observer.unobserve(entry.target);
      }
    });
  }

  checkElements() {
    this.elements.forEach((el) => {
      if (utils.isInViewport(el, CONFIG.scrollOffset)) {
        el.classList.add("active");
      }
    });
  }
}

// ============================================
// SMOOTH SCROLL
// ============================================
class SmoothScroll {
  constructor() {
    this.init();
  }

  init() {
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener("click", (e) => this.handleClick(e, anchor));
    });
  }

  handleClick(e, anchor) {
    const href = anchor.getAttribute("href");
    if (href === "#" || href === "") return;

    const target = document.querySelector(href);
    if (target) {
      e.preventDefault();
      const headerOffset = 80;
      const elementPosition = target.getBoundingClientRect().top;
      const offsetPosition = elementPosition + window.scrollY - headerOffset;

      window.scrollTo({
        top: offsetPosition,
        behavior: "smooth",
      });

      // Update URL without jumping
      history.pushState(null, null, href);
    }
  }
}

// ============================================
// COUNTDOWN TIMER
// ============================================
class CountdownTimer {
  constructor() {
    this.elements = {
      days: document.querySelector(".countdown-days"),
      hours: document.querySelector(".countdown-hours"),
      minutes: document.querySelector(".countdown-minutes"),
      seconds: document.querySelector(".countdown-seconds"),
    };
    this.previousValues = {
      days: null,
      hours: null,
      minutes: null,
      seconds: null,
    };
    this.init();
  }

  init() {
    if (this.hasElements()) {
      this.update();
      setInterval(() => this.update(), 1000);
    }
  }

  hasElements() {
    return Object.values(this.elements).some((el) => el !== null);
  }

  update() {
    const now = new Date().getTime();
    const distance = CONFIG.conferenceDate.getTime() - now;

    if (distance < 0) {
      this.setValues({ days: 0, hours: 0, minutes: 0, seconds: 0 });
      return;
    }

    const values = {
      days: Math.floor(distance / (1000 * 60 * 60 * 24)),
      hours: Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)),
      minutes: Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)),
      seconds: Math.floor((distance % (1000 * 60)) / 1000),
    };

    this.setValues(values);
  }

  setValues(values) {
    Object.keys(values).forEach((key) => {
      const el = this.elements[key];
      if (el) {
        const value =
          key === "seconds"
            ? String(values[key]).padStart(2, "0")
            : values[key];

        // Add flip animation when value changes
        if (this.previousValues[key] !== values[key]) {
          el.classList.add("flip");
          setTimeout(() => el.classList.remove("flip"), 500);
        }

        el.textContent = value;
        this.previousValues[key] = values[key];
      }
    });
  }
}

// ============================================
// NAVIGATION
// ============================================
class Navigation {
  constructor() {
    this.header = document.querySelector("header");
    this.mobileMenuBtn = document.querySelector(
      ".mobile-menu-btn, [data-mobile-menu]",
    );
    this.mobileMenu = document.querySelector(".mobile-menu");
    this.navLinks = document.querySelectorAll(".nav-link, nav a");
    this.lastScroll = 0;
    this.init();
  }

  init() {
    this.setupMobileMenu();
    this.setupScrollBehavior();
    this.highlightCurrentPage();
  }

  setupMobileMenu() {
    if (this.mobileMenuBtn) {
      this.mobileMenuBtn.addEventListener("click", () =>
        this.toggleMobileMenu(),
      );
    }

    // Close mobile menu on link click
    if (this.mobileMenu) {
      this.mobileMenu.querySelectorAll("a").forEach((link) => {
        link.addEventListener("click", () => this.closeMobileMenu());
      });
    }

    // Close on escape key
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") this.closeMobileMenu();
    });

    // Close on outside click
    document.addEventListener("click", (e) => {
      if (
        this.mobileMenu?.classList.contains("open") &&
        !this.mobileMenu.contains(e.target) &&
        !this.mobileMenuBtn?.contains(e.target)
      ) {
        this.closeMobileMenu();
      }
    });
  }

  toggleMobileMenu() {
    this.mobileMenu?.classList.toggle("open");
    this.mobileMenuBtn?.classList.toggle("active");
    document.body.style.overflow = this.mobileMenu?.classList.contains("open")
      ? "hidden"
      : "";
  }

  closeMobileMenu() {
    this.mobileMenu?.classList.remove("open");
    this.mobileMenuBtn?.classList.remove("active");
    document.body.style.overflow = "";
  }

  setupScrollBehavior() {
    window.addEventListener(
      "scroll",
      utils.throttle(() => {
        const currentScroll = window.scrollY;

        // Add/remove shadow on scroll
        if (this.header) {
          if (currentScroll > 10) {
            this.header.classList.add("shadow-lg");
          } else {
            this.header.classList.remove("shadow-lg");
          }

          // Hide/show header on scroll direction
          if (currentScroll > this.lastScroll && currentScroll > 100) {
            this.header.style.transform = "translateY(-100%)";
          } else {
            this.header.style.transform = "translateY(0)";
          }
        }

        this.lastScroll = currentScroll;
      }, 100),
    );
  }

  highlightCurrentPage() {
    const currentPage =
      window.location.pathname.split("/").pop() || "index.html";
    this.navLinks.forEach((link) => {
      const href = link.getAttribute("href");
      if (
        href === currentPage ||
        (currentPage === "" && href === "index.html")
      ) {
        link.classList.add("active", "text-primary", "font-bold");
      }
    });
  }
}

// ============================================
// DARK MODE
// ============================================
class DarkMode {
  constructor() {
    this.toggleBtn = document.querySelector(
      ".dark-mode-toggle, [data-dark-toggle]",
    );
    this.prefersDark = window.matchMedia("(prefers-color-scheme: dark)");
    this.init();
  }

  init() {
    // Check saved preference or system preference
    const savedMode = localStorage.getItem("darkMode");
    if (
      savedMode === "true" ||
      (savedMode === null && this.prefersDark.matches)
    ) {
      this.enable();
    }

    // Setup toggle button
    if (this.toggleBtn) {
      this.toggleBtn.addEventListener("click", () => this.toggle());
    }

    // Listen for system preference changes
    this.prefersDark.addEventListener("change", (e) => {
      if (localStorage.getItem("darkMode") === null) {
        e.matches ? this.enable() : this.disable();
      }
    });
  }

  toggle() {
    document.documentElement.classList.contains("dark")
      ? this.disable()
      : this.enable();
  }

  enable() {
    document.documentElement.classList.add("dark");
    localStorage.setItem("darkMode", "true");
    this.updateIcon();
  }

  disable() {
    document.documentElement.classList.remove("dark");
    localStorage.setItem("darkMode", "false");
    this.updateIcon();
  }

  updateIcon() {
    if (this.toggleBtn) {
      const isDark = document.documentElement.classList.contains("dark");
      const icon = this.toggleBtn.querySelector(
        ".material-symbols-outlined, i",
      );
      if (icon) {
        icon.textContent = isDark ? "light_mode" : "dark_mode";
      }
    }
  }
}

// ============================================
// RIPPLE EFFECT
// ============================================
class RippleEffect {
  constructor() {
    this.init();
  }

  init() {
    document.querySelectorAll(".btn-ripple, button").forEach((btn) => {
      btn.addEventListener("click", (e) => this.createRipple(e, btn));
    });
  }

  createRipple(e, button) {
    const ripple = document.createElement("span");
    ripple.className = "ripple";

    const rect = button.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = e.clientX - rect.left - size / 2;
    const y = e.clientY - rect.top - size / 2;

    ripple.style.cssText = `
            width: ${size}px;
            height: ${size}px;
            left: ${x}px;
            top: ${y}px;
        `;

    button.appendChild(ripple);

    setTimeout(() => ripple.remove(), 600);
  }
}

// ============================================
// TILT EFFECT
// ============================================
class TiltEffect {
  constructor() {
    this.cards = document.querySelectorAll(".card-tilt");
    this.init();
  }

  init() {
    this.cards.forEach((card) => {
      card.addEventListener("mousemove", (e) => this.handleMove(e, card));
      card.addEventListener("mouseleave", (e) => this.handleLeave(e, card));
    });
  }

  handleMove(e, card) {
    const rect = card.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    const centerX = rect.width / 2;
    const centerY = rect.height / 2;
    const rotateX = (y - centerY) / 10;
    const rotateY = (centerX - x) / 10;

    card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.02, 1.02, 1.02)`;
  }

  handleLeave(e, card) {
    card.style.transform =
      "perspective(1000px) rotateX(0) rotateY(0) scale3d(1, 1, 1)";
  }
}

// ============================================
// CURSOR GLOW EFFECT
// ============================================
class CursorGlow {
  constructor() {
    this.glow = null;
    this.enabled = window.innerWidth > 768;
    this.init();
  }

  init() {
    if (!this.enabled) return;

    this.glow = document.createElement("div");
    this.glow.className = "cursor-glow";
    document.body.appendChild(this.glow);

    document.addEventListener(
      "mousemove",
      utils.throttle((e) => this.update(e), 16),
    );

    document.querySelectorAll("a, button, .card-hover").forEach((el) => {
      el.addEventListener("mouseenter", () =>
        this.glow.classList.add("active"),
      );
      el.addEventListener("mouseleave", () =>
        this.glow.classList.remove("active"),
      );
    });
  }

  update(e) {
    if (this.glow) {
      this.glow.style.left = `${e.clientX}px`;
      this.glow.style.top = `${e.clientY}px`;
    }
  }
}

// ============================================
// PARALLAX EFFECT
// ============================================
class ParallaxEffect {
  constructor() {
    this.elements = document.querySelectorAll("[data-parallax]");
    this.init();
  }

  init() {
    if (this.elements.length === 0) return;

    window.addEventListener(
      "scroll",
      utils.throttle(() => this.update(), 16),
    );
    this.update();
  }

  update() {
    const scrollY = window.scrollY;

    this.elements.forEach((el) => {
      const speed = parseFloat(el.dataset.parallax) || 0.5;
      const yPos = -(scrollY * speed);
      el.style.transform = `translateY(${yPos}px)`;
    });
  }
}

// ============================================
// TYPING EFFECT
// ============================================
class TypingEffect {
  constructor() {
    this.elements = document.querySelectorAll("[data-typing]");
    this.init();
  }

  init() {
    this.elements.forEach((el) => {
      const text = el.dataset.typing || el.textContent;
      el.textContent = "";
      this.type(el, text, 0);
    });
  }

  type(element, text, index) {
    if (index < text.length) {
      element.textContent += text.charAt(index);
      setTimeout(() => this.type(element, text, index + 1), CONFIG.typingSpeed);
    }
  }
}

// ============================================
// COUNTER ANIMATION
// ============================================
class CounterAnimation {
  constructor() {
    this.counters = document.querySelectorAll("[data-counter]");
    this.init();
  }

  init() {
    if (this.counters.length === 0) return;

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const el = entry.target;
            const target =
              parseInt(el.dataset.counter) || parseInt(el.textContent);
            utils.animateValue(el, 0, target, 2000);
            observer.unobserve(el);
          }
        });
      },
      { threshold: 0.5 },
    );

    this.counters.forEach((counter) => observer.observe(counter));
  }
}

// ============================================
// PARTICLE BACKGROUND
// ============================================
class ParticleBackground {
  constructor(containerId) {
    this.container = document.getElementById(containerId);
    if (!this.container) return;

    this.canvas = document.createElement("canvas");
    this.ctx = this.canvas.getContext("2d");
    this.particles = [];
    this.init();
  }

  init() {
    this.canvas.style.cssText =
      "position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none;";
    this.container.style.position = "relative";
    this.container.appendChild(this.canvas);

    this.resize();
    this.createParticles();
    this.animate();

    window.addEventListener(
      "resize",
      utils.debounce(() => this.resize(), 250),
    );
  }

  resize() {
    this.canvas.width = this.container.offsetWidth;
    this.canvas.height = this.container.offsetHeight;
  }

  createParticles() {
    this.particles = [];
    for (let i = 0; i < CONFIG.particleCount; i++) {
      this.particles.push({
        x: Math.random() * this.canvas.width,
        y: Math.random() * this.canvas.height,
        vx: (Math.random() - 0.5) * 0.5,
        vy: (Math.random() - 0.5) * 0.5,
        radius: Math.random() * 2 + 1,
        opacity: Math.random() * 0.5 + 0.2,
      });
    }
  }

  animate() {
    this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

    this.particles.forEach((p) => {
      p.x += p.vx;
      p.y += p.vy;

      if (p.x < 0 || p.x > this.canvas.width) p.vx *= -1;
      if (p.y < 0 || p.y > this.canvas.height) p.vy *= -1;

      this.ctx.beginPath();
      this.ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
      this.ctx.fillStyle = `rgba(37, 99, 235, ${p.opacity})`;
      this.ctx.fill();
    });

    // Draw connections
    this.particles.forEach((p1, i) => {
      this.particles.slice(i + 1).forEach((p2) => {
        const dx = p1.x - p2.x;
        const dy = p1.y - p2.y;
        const distance = Math.sqrt(dx * dx + dy * dy);

        if (distance < 100) {
          this.ctx.beginPath();
          this.ctx.moveTo(p1.x, p1.y);
          this.ctx.lineTo(p2.x, p2.y);
          this.ctx.strokeStyle = `rgba(37, 99, 235, ${0.2 * (1 - distance / 100)})`;
          this.ctx.stroke();
        }
      });
    });

    requestAnimationFrame(() => this.animate());
  }
}

// ============================================
// FORM VALIDATION WITH ANIMATIONS
// ============================================
class FormAnimations {
  constructor() {
    this.forms = document.querySelectorAll("form");
    this.init();
  }

  init() {
    this.forms.forEach((form) => {
      const inputs = form.querySelectorAll("input, textarea, select");

      inputs.forEach((input) => {
        // Floating label effect
        input.addEventListener("focus", () => this.handleFocus(input));
        input.addEventListener("blur", () => this.handleBlur(input));

        // Initial check for pre-filled inputs
        if (input.value) this.handleFocus(input);
      });

      // Submit animation
      form.addEventListener("submit", (e) => this.handleSubmit(e, form));
    });
  }

  handleFocus(input) {
    const label = input.parentElement.querySelector("label");
    if (label) {
      label.classList.add(
        "active",
        "text-primary",
        "-translate-y-6",
        "scale-75",
      );
    }
    input.parentElement.classList.add("focused");
  }

  handleBlur(input) {
    if (!input.value) {
      const label = input.parentElement.querySelector("label");
      if (label) {
        label.classList.remove(
          "active",
          "text-primary",
          "-translate-y-6",
          "scale-75",
        );
      }
    }
    input.parentElement.classList.remove("focused");
  }

  handleSubmit(e, form) {
    const submitBtn = form.querySelector('button[type="submit"]');
    if (submitBtn) {
      submitBtn.classList.add("animate-pulse-glow");
    }
  }
}

// ============================================
// LAZY LOADING IMAGES
// ============================================
class LazyImages {
  constructor() {
    this.images = document.querySelectorAll("img[data-src], [data-bg]");
    this.init();
  }

  init() {
    if ("IntersectionObserver" in window) {
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              this.loadImage(entry.target);
              observer.unobserve(entry.target);
            }
          });
        },
        { rootMargin: "50px" },
      );

      this.images.forEach((img) => observer.observe(img));
    } else {
      this.images.forEach((img) => this.loadImage(img));
    }
  }

  loadImage(element) {
    if (element.dataset.src) {
      element.src = element.dataset.src;
      element.removeAttribute("data-src");
    }
    if (element.dataset.bg) {
      element.style.backgroundImage = `url(${element.dataset.bg})`;
      element.removeAttribute("data-bg");
    }
    element.classList.add("loaded", "animate-fade-in-up");
  }
}

// ============================================
// INITIALIZE EVERYTHING
// ============================================
class App {
  constructor() {
    this.init();
  }

  init() {
    // Wait for DOM
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", () => this.setup());
    } else {
      this.setup();
    }
  }

  setup() {
    // Core features
    new PageLoader();
    new ScrollProgress();
    new ScrollReveal();
    new SmoothScroll();
    new CountdownTimer();
    new Navigation();
    new DarkMode();

    // Interactive effects
    new RippleEffect();
    new TiltEffect();
    new CursorGlow();
    new ParallaxEffect();

    // Content animations
    new CounterAnimation();
    new FormAnimations();
    new LazyImages();

    // Initialize particle background if container exists
    if (document.getElementById("hero-particles")) {
      new ParticleBackground("hero-particles");
    }

    // Log initialization
    console.log("ICETT '26 Website initialized successfully");

    // Dispatch ready event
    document.dispatchEvent(new CustomEvent("appReady"));
  }
}

// Start the application
const app = new App();

// Export for module usage if needed
if (typeof module !== "undefined" && module.exports) {
  module.exports = { App, utils };
}
