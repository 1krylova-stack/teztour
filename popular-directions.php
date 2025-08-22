<?php
/**
 * Popular Directions (Минимальные цены) — hover tuned to reference
 */
if (!defined('ABSPATH')) { exit; }

$mp_items = [
  ['title'=>'Турция','subtitle'=>'из Санкт-Петербурга','nights'=>'6 ночей','price'=>'34 362 ₽','image'=>''],
  ['title'=>'Сиде','subtitle'=>'Турция из Санкт-Петербурга','nights'=>'6 ночей','price'=>'37 585 ₽','image'=>''],
  ['title'=>'Хургада','subtitle'=>'Египет из Санкт-Петербурга','nights'=>'10 ночей','price'=>'59 600 ₽','image'=>''],
  ['title'=>'ОАЭ','subtitle'=>'из Санкт-Петербурга','nights'=>'7 ночей','price'=>'52 497 ₽','image'=>''],
];
?>

<section class="mp-minprices" aria-label="Минимальные цены">
  <div class="mp-container">
    <h2 class="mp-title">Минимальные цены</h2>

    <div class="mp-grid">
      <?php foreach ($mp_items as $i => $it): ?>
        <article class="mp-card" data-card-index="<?php echo esc_attr($i); ?>">
          <div class="mp-card-media">
            <div class="mp-card-bg" <?php if(!empty($it['image'])): ?>style="background-image:url('<?php echo esc_url($it['image']); ?>')" <?php endif; ?>></div>
            <div class="mp-card-overlay"></div>

            <div class="mp-card-head">
              <div class="mp-country"><?php echo esc_html(mb_strtoupper($it['title'])); ?></div>
              <?php if(!empty($it['subtitle'])): ?>
                <div class="mp-subtitle"><?php echo esc_html($it['subtitle']); ?></div>
              <?php endif; ?>
            </div>
          </div>

          <!-- Нижняя панель -->
          <div class="mp-card-foot">
            <div class="mp-foot-left">
              <div class="mp-date-main" aria-live="polite" title="Дата вылета"><!-- JS вставит --></div>
              <div class="mp-duration">
                <svg class="mp-ico" width="18" height="18" viewBox="0 0 24 24" aria-hidden="true">
                  <circle cx="12" cy="12" r="9" fill="none" stroke="currentColor" stroke-width="2"/>
                  <path d="M12 7v5l3 2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span><?php echo esc_html($it['nights']); ?></span>
              </div>
            </div>

            <div class="mp-price">
              <?php
                $price = esc_html($it['price']);
                $price = preg_replace('~\s?руб\.?|₽~iu', '<span class="mp-rub">руб</span>', $price);
                echo $price;
              ?>
            </div>
          </div>

          <!-- Ховер-слой -->
          <div class="mp-hover" role="menu" aria-label="Выбор даты вылета">
            <div class="mp-hover-title">Выберите дату вылета</div>
            <ul class="mp-hover-list" data-nights="<?php echo esc_attr($it['nights']); ?>"></ul>
            <div class="mp-hover-note">Нажмите на дату, чтобы оформить заявку</div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Попап Contact Form 7 -->
  <div class="mp-modal" id="mpOrderModal" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Заказать тур">
    <div class="mp-modal-backdrop" data-mp-close></div>
    <div class="mp-modal-dialog" role="document">
      <button class="mp-modal-close" type="button" aria-label="Закрыть" data-mp-close>&times;</button>
      <div class="mp-modal-header">
        <h3>Заказать тур</h3>
        <div class="mp-modal-sub" id="mpSelectedDateInfo" style="display:none"></div>
      </div>
      <div class="mp-modal-body">
        <?php echo do_shortcode('[contact-form-7 id="336f3ef" title="Заказать тур"]'); ?>
      </div>
    </div>
  </div>
</section>

<style>
/* ===== Макет ===== */
.mp-minprices{
  --gap:14px; --r:14px; --shadow:0 10px 26px rgba(0,0,0,.10);
  --border:#e6e9ef; --text:#111827; --muted:#6b7280;
  padding:32px 0px; box-sizing:border-box;
}
.mp-container{max-width:100%;margin:0;padding:0}
.mp-title{margin:0 0 16px;font-size:26px;font-weight:800;color:var(--text)}

/* карточки чуть крупнее, расстояние между ними меньше */
.mp-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:var(--gap)}
@media (max-width:1200px){.mp-grid{grid-template-columns:repeat(3,minmax(0,1fr))}}
@media (max-width:900px){.mp-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media (max-width:560px){.mp-grid{grid-template-columns:1fr}}

/* ===== Карточка ===== */
.mp-card{
  position:relative;border-radius:var(--r);overflow:hidden;background:#fff;
  border:1px solid var(--border);box-shadow:var(--shadow);
  transition:transform .2s ease, box-shadow .2s ease;
}
.mp-card:hover{transform:translateY(-2px);box-shadow:0 12px 32px rgba(0,0,0,.14)}

/* медиаблок выше, чтобы влез ховер */
.mp-card-media{position:relative;padding-top:60%}
.mp-card-bg{position:absolute;inset:0;background:#dfe6f1 center/cover no-repeat}
.mp-card-overlay{position:absolute;inset:0;background:
  linear-gradient(180deg, rgba(0,0,0,.45) 0%, rgba(0,0,0,.35) 40%, rgba(0,0,0,.12) 68%, rgba(0,0,0,0) 100%)}
.mp-card-head{position:absolute;left:16px;right:16px;top:14px;color:#fff;text-shadow:0 2px 14px rgba(0,0,0,.35)}
.mp-country{font-size:26px;font-weight:900;letter-spacing:.2px;line-height:1.15}
.mp-subtitle{margin-top:6px;font-size:15px;opacity:.95}

/* Нижняя панель */
.mp-card-foot{
  display:flex;align-items:flex-end;justify-content:space-between;gap:10px;
  background:#f3f4f6;border-top:1px solid #e5e7eb;padding:12px 14px;
  border-bottom-left-radius:var(--r);border-bottom-right-radius:var(--r);
  position:relative;margin-top:-6px;
}
.mp-foot-left{display:flex;flex-direction:column;gap:6px}
.mp-date-main{display:flex;align-items:center;gap:8px;font-size:15px;color:#111827;font-weight:800;white-space:nowrap}
.mp-duration{display:flex;align-items:center;gap:8px;font-size:14px;color:#4b5563}
.mp-ico{display:inline-block;vertical-align:middle;opacity:.95}
.mp-price{font-weight:900;font-size:20px;color:#111827;white-space:nowrap}
.mp-price .mp-rub{font-size:11px;text-transform:uppercase;margin-left:6px;opacity:.8;position:relative;top:-2px}

/* ===== Ховер-слой (даты) ===== */
.mp-hover{
  position:absolute; left:6px; right:6px; bottom:8px;
  background:#fff;border:1px solid var(--border);border-radius:12px;
  transform:translateY(100%); opacity:0; pointer-events:none;
  transition:transform .18s ease, opacity .18s ease;
  box-shadow:0 12px 26px rgba(0,0,0,.14);
  padding:10px; box-sizing:border-box; overflow:visible;
}
.mp-card:hover .mp-hover{transform:translateY(0);opacity:1;pointer-events:auto}
@media (max-width:768px){
  .mp-card:hover .mp-hover{transform:translateY(100%);opacity:0;pointer-events:none}
  .mp-card.is-open .mp-hover{transform:translateY(0);opacity:1;pointer-events:auto}
}
.mp-hover-title{font-size:14px;color:#111827;font-weight:800;margin:6px 0 6px}
.mp-hover-list{
  margin:0 !important;
  padding:0 !important;
  list-style-type:none !important;
  list-style:none !important;
  max-height:300px;
  overflow-y:auto;
  overflow-x:hidden;
  border:1px solid #e6ebf2;
  border-radius:10px;
  box-sizing:border-box;
}
.mp-hover-list > li{
  list-style:none !important;
  list-style-type:none !important;
  padding-left:12px;              /* явный паддинг вместо маркера */
}
.mp-hover-list > li::marker{content:none !important}
.mp-hover-list > li::before{content:none !important}
.mp-h-col-date{font-weight:600;white-space:nowrap}
.mp-h-col-nights{color:#6b7280;white-space:nowrap}
.mp-h-col-cta{margin-left:auto;display:inline-flex;align-items:center;gap:6px;font-weight:800;color:#111827;white-space:nowrap;cursor:pointer}
.mp-h-col-cta svg{width:14px;height:14px;stroke:currentColor}

.mp-hover-note{font-size:12px;color:#6b7280;margin-top:8px}

/* ===== Попап (без изменений функционально) ===== */
.mp-modal{position:fixed;inset:0;display:none}
.mp-modal[aria-hidden="false"]{display:block}
.mp-modal-backdrop{position:absolute;inset:0;background:rgba(17,24,39,.5)}
.mp-modal-dialog{position:relative;max-width:720px;margin:40px auto;background:#fff;border-radius:16px;box-shadow:0 20px 60px rgba(0,0,0,.2);padding:20px}
@media (max-width:768px){.mp-modal-dialog{margin:10px;max-height:85vh;overflow:auto}}
.mp-modal-close{position:absolute;right:12px;top:12px;background:#f3f4f6;border:1px solid #e5e7eb;border-radius:10px;font-size:22px;line-height:1;height:36px;width:36px;display:inline-flex;align-items:center;justify-content:center;cursor:pointer}
.mp-modal-header h3{margin:0 0 6px;font-size:20px}
.mp-modal-sub{font-size:13px;color:#374151;background:#f3f4f6;border:1px solid #e5e7eb;border-radius:10px;padding:8px 10px}
</style>


<script>
(function(){
  // ===== Параметры =====
  const DAYS_IN_LIST = 4;   // показываем 4 варианта вылета
  const START_OFFSET = 3;   // первая дата: сегодня +3
  const locale = 'ru-RU';

  // короткие месяцы для ховера
  const shortMonths = ['янв','фев','мар','апр','май','июн','июл','авг','сен','окт','ноя','дек'];

  // Вспомогательные
  function addDays(date, days){ const d = new Date(date); d.setDate(d.getDate()+days); return d; }
  function fmtMain(d){ // «25 августа» — на карточке
    return d.toLocaleDateString(locale, { day:'numeric', month:'long' });
  }
  function fmtHoverShort(d){ // «25 авг» — в ховере
    return `${d.getDate()} ${shortMonths[d.getMonth()]}`;
  }
  function nightsShort(str){ // «6 ночей» -> «6 нч»
    if(!str) return '';
    const n = parseInt(String(str).replace(/\D+/g,''),10);
    return isFinite(n) ? `${n} нч` : str;
  }

  // Иконка календаря в дате карточки
  const calendarSVG = `
    <svg class="mp-ico" width="18" height="18" viewBox="0 0 24 24" aria-hidden="true">
      <rect x="3" y="4" width="18" height="18" rx="2" ry="2" fill="none" stroke="currentColor" stroke-width="2"/>
      <path d="M16 2v4M8 2v4M3 10h18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
    </svg>`;

  // Заполняем карточки
  document.querySelectorAll('.mp-card').forEach(function(card){
    const firstDate = addDays(new Date(), START_OFFSET);

    // Главная дата на карточке
    const mainDateEl = card.querySelector('.mp-date-main');
    if (mainDateEl) {
      mainDateEl.setAttribute('data-iso', firstDate.toISOString().slice(0,10));
      mainDateEl.innerHTML = calendarSVG + `<span>${fmtMain(firstDate)}</span>`;
    }

    // Ховер-список
    const ul = card.querySelector('.mp-hover-list');
    if (ul) {
      const nights = nightsShort(ul.getAttribute('data-nights') || '');
      ul.innerHTML = '';
      for (let i=0; i<DAYS_IN_LIST; i++){
        const d = addDays(new Date(), START_OFFSET + i);
        const iso = d.toISOString().slice(0,10);
        const price = `от ${(Math.floor(33000 + Math.random()*9000)).toLocaleString('ru-RU')}`;
        const li = document.createElement('li');
        li.setAttribute('role','menuitem');
        li.setAttribute('tabindex','0');
        li.dataset.dateIso = iso;
        li.innerHTML = `
          <span class="mp-h-col-date">${fmtHoverShort(d)}</span>
          <span class="mp-h-col-nights">${nights}</span>
          <span class="mp-h-col-cta" role="button" aria-label="Выбрать дату">
            ${price} <span class="mp-rub">руб</span>
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M9 18l6-6-6-6"/>
            </svg>
          </span>
        `;
        ul.appendChild(li);
      }
    }
  });

  // ===== Мобильное поведение: первый тап раскрывает ховер =====
  const isTouch = matchMedia('(max-width: 768px)').matches || 'ontouchstart' in window;
  if (isTouch) {
    document.querySelectorAll('.mp-card').forEach(function(card){
      card.addEventListener('click', function(e){
        if (e.target.closest('.mp-hover-list')) return;
        if (!card.classList.contains('is-open')) {
          e.preventDefault(); e.stopPropagation();
          document.querySelectorAll('.mp-card.is-open').forEach(c => c.classList.remove('is-open'));
          card.classList.add('is-open');
        }
      });
    });
    document.addEventListener('click', function(e){
      if (!e.target.closest('.mp-card')) {
        document.querySelectorAll('.mp-card.is-open').forEach(c => c.classList.remove('is-open'));
      }
    });
  }

  // ===== Попап и передача выбранной даты =====
  const modal = document.getElementById('mpOrderModal');
  const dateInfo = document.getElementById('mpSelectedDateInfo');

  function openModal(selectedText, iso){
    if (dateInfo) {
      if (selectedText) { dateInfo.style.display=''; dateInfo.textContent=`Вы выбрали дату вылета: ${selectedText}`; }
      else { dateInfo.style.display='none'; dateInfo.textContent=''; }
    }
    modal.setAttribute('aria-hidden','false');
    document.documentElement.style.overflow='hidden';

    // подставляем дату в скрытое поле формы, если его нет — создаём
    try{
      const root = modal.querySelector('.wpcf7 form');
      if (root && iso) {
        const names = ['date','Дата','Дата вылета','flight_date','selected_date','mp_date'];
        let input = null; names.some(n => (input = root.querySelector(`[name="${n}"]`)));
        if (!input) { input=document.createElement('input'); input.type='hidden'; input.name='selected_date'; root.appendChild(input); }
        input.value = iso;
      }
    }catch(e){}
  }
  function closeModal(){ modal.setAttribute('aria-hidden','true'); document.documentElement.style.overflow=''; }

  modal.addEventListener('click', e => { if (e.target.matches('[data-mp-close], .mp-modal-backdrop')) closeModal(); });
  document.addEventListener('keydown', e => { if (e.key==='Escape' && modal.getAttribute('aria-hidden')==='false') closeModal(); });

  // Клик/клавиши по строке ховера
  document.querySelectorAll('.mp-hover-list').forEach(list=>{
    list.addEventListener('click', e=>{
      const li = e.target.closest('li'); if (!li) return;
      const iso = li.dataset.dateIso || '';
      const dateTxt = li.querySelector('.mp-h-col-date')?.textContent?.trim() || '';
      const nightsTxt = li.querySelector('.mp-h-col-nights')?.textContent?.trim() || '';
      const label = nightsTxt ? `${dateTxt}, ${nightsTxt}` : dateTxt;
      openModal(label, iso);
    });
    list.addEventListener('keydown', e=>{
      if ((e.key==='Enter' || e.key===' ') && e.target.closest('li')) { e.preventDefault(); e.target.click(); }
    });
  });
})();
</script>

