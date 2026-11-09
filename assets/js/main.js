/* FASTBREAKS theme — main.js */
(function () {
  'use strict';

  /* ナビ開閉（SP） */
  var toggle = document.querySelector('.nav-toggle');
  var nav = document.getElementById('nav');
  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      var open = nav.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      toggle.setAttribute('aria-label', open ? 'メニューを閉じる' : 'メニューを開く');
      document.body.classList.toggle('nav-open', open);
    });
    nav.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () {
        nav.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        document.body.classList.remove('nav-open');
      });
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && nav.classList.contains('is-open')) { toggle.click(); }
    });
  }

  /* ヒーロー動画の停止ボタン */
  var vt = document.querySelector('[data-video-toggle]');
  var video = document.querySelector('.hero__video');
  if (vt && video) {
    vt.addEventListener('click', function () {
      if (video.paused) { video.play(); vt.textContent = '❚❚'; vt.setAttribute('aria-label', '背景動画を停止'); }
      else { video.pause(); vt.textContent = '▶'; vt.setAttribute('aria-label', '背景動画を再生'); }
    });
  }

  /* FACTS カウントアップ */
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var counters = document.querySelectorAll('[data-count]');
  if (counters.length && 'IntersectionObserver' in window && !reduce) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (!en.isIntersecting) { return; }
        var el = en.target; io.unobserve(el);
        var raw = el.textContent.trim();
        var num = parseFloat(raw.replace(/,/g, ''));
        if (isNaN(num)) { return; }
        var hasComma = raw.indexOf(',') !== -1;
        var start = null, dur = 1400;
        function step(ts) {
          if (!start) { start = ts; }
          var p = Math.min((ts - start) / dur, 1);
          var eased = 1 - Math.pow(1 - p, 3);
          var val = Math.round(num * eased);
          el.textContent = hasComma ? val.toLocaleString('en-US') : String(val);
          if (p < 1) { requestAnimationFrame(step); } else { el.textContent = raw; }
        }
        requestAnimationFrame(step);
      });
    }, { threshold: 0.4 });
    counters.forEach(function (c) { io.observe(c); });
  }

  /* 外部リンクは新規タブ */
  document.querySelectorAll('a[href^="http"]').forEach(function (a) {
    if (a.hostname !== location.hostname) { a.target = '_blank'; a.rel = 'noopener'; }
  });

  /* ===== モーション ===== */
  if (!reduce) {
    document.documentElement.classList.add('has-motion');

    /* スクロール連動のフェードイン（自動付与） */
    var targets = document.querySelectorAll('.section-head, .about__text, .about__fig, .fact, .srow, .work, .str, .card, .plan, .tcard, .news__list li, .rbox, .media, .cta__inner, .spec > div, .history li, .steps li, .faq__list dt, .faq__list dd, .word, .mvv__item, .manifesto__line, .partners__list li, .clients__list li, .vision-statement__jp, .vision-statement__en, .phero__inner > *, .post-single__title, .entry-content > *');
    var seen = 0;
    targets.forEach(function (el) {
      if (el.closest('.hero')) { return; }
      el.classList.add('rv');
      var parent = el.parentElement;
      var i = Array.prototype.indexOf.call(parent.children, el);
      el.style.setProperty('--d', Math.min(i, 8) * 70 + 'ms');
    });
    if ('IntersectionObserver' in window) {
      var rio = new IntersectionObserver(function (entries) {
        entries.forEach(function (en) {
          if (en.isIntersecting) { en.target.classList.add('is-in'); rio.unobserve(en.target); }
        });
      }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });
      document.querySelectorAll('.rv').forEach(function (el) { rio.observe(el); });
    } else {
      document.querySelectorAll('.rv').forEach(function (el) { el.classList.add('is-in'); });
    }

    /* ヒーローの登場 */
    var hero = document.querySelector('.hero');
    if (hero) { requestAnimationFrame(function () { setTimeout(function () { hero.classList.add('is-ready'); }, 80); }); }

    /* ヘッダー：スクロールで背景を付ける／パララックス／透かし文字の横ドリフト */
    var header = document.getElementById('site-header');
    var media = document.querySelector('.hero__media');
    var ghosts = document.querySelectorAll('.ghost:not(.ghost--hero)');
    var ticking = false;
    function onScroll() {
      if (ticking) { return; }
      ticking = true;
      requestAnimationFrame(function () {
        var y = window.scrollY || window.pageYOffset;
        if (header) { header.classList.toggle('is-scrolled', y > 40); }
        if (media && y < window.innerHeight * 1.2) { media.style.transform = 'translate3d(0,' + (y * 0.18) + 'px,0)'; }
        var vh = window.innerHeight;
        ghosts.forEach(function (g) {
          var r = g.getBoundingClientRect();
          if (r.bottom < 0 || r.top > vh) { return; }
          var p = (r.top + r.height / 2 - vh / 2) / vh; /* -1..1 */
          g.style.transform = 'translate3d(' + (p * -80) + 'px,0,0)';
        });
        ticking = false;
      });
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    /* 実績カード：マウス追従のわずかな傾き */
    document.querySelectorAll('.work').forEach(function (card) {
      card.addEventListener('mousemove', function (e) {
        var r = card.getBoundingClientRect();
        var x = (e.clientX - r.left) / r.width - 0.5;
        var yy = (e.clientY - r.top) / r.height - 0.5;
        card.style.setProperty('--rx', (-yy * 3) + 'deg');
        card.style.setProperty('--ry', (x * 3) + 'deg');
      });
      card.addEventListener('mouseleave', function () { card.style.setProperty('--rx', '0deg'); card.style.setProperty('--ry', '0deg'); });
    });
  }
})();
