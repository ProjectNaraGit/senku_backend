/* ============================================================
   PORTFOLIO FLIPBOOK — JavaScript Controller
   ============================================================ */

'use strict';

(function () {

  // ── State ─────────────────────────────────────────────────
  let currentPage = 0;       // 0-indexed spread index
  let isAnimating  = false;

  const pages = document.querySelectorAll('.book-page');
  const totalPages = pages.length;

  const prevBtn    = document.getElementById('btn-prev');
  const nextBtn    = document.getElementById('btn-next');
  const counter    = document.getElementById('page-counter');
  const transition = document.getElementById('page-transition');

  // ── Helpers ───────────────────────────────────────────────
  function showPage(index) {
    pages.forEach((p, i) => {
      p.classList.toggle('active', i === index);
    });

    // Update counter
    // Spread 0 = Cover, Spread (last) = Back Cover
    if (index === 0) {
      counter.textContent = 'Sampul';
    } else if (index === totalPages - 1) {
      counter.textContent = 'Penutup';
    } else {
      // Each internal spread has 2 real "pages"
      const leftPage  = (index * 2);
      const rightPage = (index * 2) + 1;
      counter.textContent = `${leftPage} — ${rightPage}`;
    }

    prevBtn.disabled = (index === 0);
    nextBtn.disabled = (index === totalPages - 1);
  }

  function flipTo(newIndex, direction) {
    if (isAnimating) return;
    if (newIndex < 0 || newIndex >= totalPages) return;

    isAnimating = true;

    // Quick fade transition
    transition.classList.add('active');

    setTimeout(() => {
      currentPage = newIndex;
      showPage(currentPage);
      transition.classList.remove('active');
      triggerSkillAnimations();

      setTimeout(() => {
        isAnimating = false;
      }, 200);
    }, 180);
  }

  function triggerSkillAnimations() {
    const fills = document.querySelectorAll('.book-page.active .skill-bar-fill');
    fills.forEach(fill => {
      const clone = fill.cloneNode(true);
      fill.parentNode.replaceChild(clone, fill);
    });
  }

  // ── Event Listeners ───────────────────────────────────────
  prevBtn.addEventListener('click', () => flipTo(currentPage - 1, 'backward'));
  nextBtn.addEventListener('click', () => flipTo(currentPage + 1, 'forward'));

  document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
      flipTo(currentPage + 1, 'forward');
    } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
      flipTo(currentPage - 1, 'backward');
    }
  });

  // ── Touch / Swipe Support ─────────────────────────────────
  let touchStartX = 0;
  let touchStartY = 0;

  document.addEventListener('touchstart', (e) => {
    touchStartX = e.changedTouches[0].screenX;
    touchStartY = e.changedTouches[0].screenY;
  }, { passive: true });

  document.addEventListener('touchend', (e) => {
    const dx = e.changedTouches[0].screenX - touchStartX;
    const dy = e.changedTouches[0].screenY - touchStartY;
    if (Math.abs(dx) > Math.abs(dy) && Math.abs(dx) > 40) {
      if (dx < 0) flipTo(currentPage + 1, 'forward');
      else         flipTo(currentPage - 1, 'backward');
    }
  }, { passive: true });

  // ── TOC Navigation ────────────────────────────────────────
  document.querySelectorAll('[data-goto]').forEach(el => {
    el.addEventListener('click', () => {
      const target = parseInt(el.getAttribute('data-goto'));
      flipTo(target, target > currentPage ? 'forward' : 'backward');
    });
    el.style.cursor = 'pointer';
  });

  // ── Init ───────────────────────────────────────────────────
  showPage(0);

  // Animate counter on load
  counter.style.opacity = '0';
  setTimeout(() => {
    counter.style.transition = 'opacity 0.5s';
    counter.style.opacity    = '1';
  }, 300);

})();
