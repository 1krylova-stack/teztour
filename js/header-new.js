(function(){
  const $burger = document.querySelector('.tt-burger');
  const $nav = document.getElementById('tt-nav');
  const $countries = document.querySelector('.tt-countries');

  // Бургер
  if ($burger && $nav){
    $burger.addEventListener('click', () => {
      const open = $burger.getAttribute('aria-expanded') === 'true';
      $burger.setAttribute('aria-expanded', String(!open));
      $nav.classList.toggle('is-open', !open);
    });
  }

  // Найдём пункт «Страны» (добавим точки, если фильтр не сработал)
  const anchors = document.querySelectorAll('.tt-nav__list > li > a');
  let countriesAnchor = null;
  anchors.forEach(a => {
    const t = (a.textContent || '').trim().toLowerCase();
    if (t === 'страны') {
      countriesAnchor = a;
      a.parentElement.classList.add('tt-menu-countries');
    }
  });

  // Всплывающая панель «Страны» по hover/focus (десктоп)
  if (countriesAnchor && $countries){
    let timer;

    const open = () => {
      clearTimeout(timer);
      $countries.classList.add('is-open');
    };
    const close = () => {
      timer = setTimeout(() => $countries.classList.remove('is-open'), 120);
    };

    // наведение на пункт меню
    const li = countriesAnchor.parentElement;
    li.addEventListener('mouseenter', open);
    li.addEventListener('mouseleave', close);

    // наведение на саму панель
    $countries.addEventListener('mouseenter', open);
    $countries.addEventListener('mouseleave', close);

    // доступность
    countriesAnchor.addEventListener('focus', open);
    countriesAnchor.addEventListener('blur', close);

    // закрытие по Esc
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') $countries.classList.remove('is-open');
    });
  }

  // Модалка CF7 — открыть
  document.querySelectorAll('[data-tt-open]').forEach(btn=>{
    btn.addEventListener('click', ()=>{
      const id = btn.getAttribute('data-tt-open');
      const modal = document.getElementById(id);
      if (modal) modal.classList.add('is-open');
    });
  });

  // Модалка CF7 — закрыть
  document.querySelectorAll('[data-tt-close]').forEach(el=>{
    el.addEventListener('click', ()=>{
      const modal = el.closest('.tt-modal');
      if (modal) modal.classList.remove('is-open');
    });
  });
})();
