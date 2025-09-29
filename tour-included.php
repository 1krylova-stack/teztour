<?php
/**
 * Template part: Tour Included block (final)
 * Вызывается шорткодом [tour_included]
 * Иконки — абсолютные URL из медиатеки.
 */

$ti_imgs = [
  'plane'     => 'https://tez-tourspb.ru/wp-content/uploads/plane.jpg',
  'bus'       => 'https://tez-tourspb.ru/wp-content/uploads/bus.jpg',
  'insurance' => 'https://tez-tourspb.ru/wp-content/uploads/insurance.jpg',
  'hotel'     => 'https://tez-tourspb.ru/wp-content/uploads/hotel.jpg',
];
?>
<section class="ti-section" aria-labelledby="ti-title">
  <div class="ti-head">
    <h2 id="ti-title" class="ti-title">Что входит в тур</h2>
    <p class="ti-sub">Цена на 1 человека при двухместном размещении</p>
  </div>

  <ul class="ti-grid" role="list">
    <li class="ti-card">
      <span class="ti-check" aria-hidden="true">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="20 6 9 17 4 12"/>
        </svg>
      </span>
      <div class="ti-icon">
        <img src="<?php echo esc_url($ti_imgs['plane']); ?>" alt="Авиаперелет" loading="lazy" decoding="async">
      </div>
      <div class="ti-text"><div class="ti-name">Авиаперелет</div></div>
    </li>

    <li class="ti-card">
      <span class="ti-check" aria-hidden="true">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="20 6 9 17 4 12"/>
        </svg>
      </span>
      <div class="ti-icon">
        <img src="<?php echo esc_url($ti_imgs['bus']); ?>" alt="Групповой трансфер" loading="lazy" decoding="async">
      </div>
      <div class="ti-text"><div class="ti-name">Групповой трансфер</div></div>
    </li>

    <li class="ti-card">
      <span class="ti-check" aria-hidden="true">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="20 6 9 17 4 12"/>
        </svg>
      </span>
      <div class="ti-icon">
        <img src="<?php echo esc_url($ti_imgs['insurance']); ?>" alt="Медицинская страховка" loading="lazy" decoding="async">
      </div>
      <div class="ti-text"><div class="ti-name">Медицинская страховка</div></div>
    </li>

    <li class="ti-card">
      <span class="ti-check" aria-hidden="true">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="20 6 9 17 4 12"/>
        </svg>
      </span>
      <div class="ti-icon">
        <img src="<?php echo esc_url($ti_imgs['hotel']); ?>" alt="Проживание в отеле" loading="lazy" decoding="async">
      </div>
      <div class="ti-text"><div class="ti-name">Проживание <br>в отеле</div></div>
    </li>
  </ul>
</section>

<style>
/* ===== Tour Included — scoped (ti-*) =====
   Блок растягивается по ширине родительского контейнера темы. */

.ti-section{position:relative;padding:24px 0 8px}

/* Заголовок — H2, жирный, синий */
.ti-title{
  margin:0 0 6px;
  font:700 28px/1.25 system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,"Helvetica Neue",Arial,sans-serif;
  color:#2864c7;
}
@media (max-width:560px){ .ti-title{font-size:22px} }

/* Подзаголовок — обычный чёрный; увеличенный отступ вниз */
.ti-sub{margin:0 0 28px;color:#111;font-size:16px;line-height:1.45}

/* Сетка карточек */
.ti-grid{
  display:grid;
  grid-template-columns:repeat(4,minmax(0,1fr));
  gap:16px;
  margin:0;
  padding:0;
  list-style:none;
}
@media (max-width:1024px){ .ti-grid{grid-template-columns:repeat(2,minmax(0,1fr))} }
@media (max-width:560px){ .ti-grid{grid-template-columns:1fr} }

/* Карточка: фиксированная высота 120px, без hover-изменений */
.ti-card{
  position:relative;
  background:#f5f5f5;
  border-radius:14px;
  padding:18px 20px;
  display:flex;
  align-items:center;
  gap:16px;
  min-height:80px;
  box-shadow:0 1px 0 rgba(0,0,0,.02);
  transition:none;
}
.ti-card:hover,.ti-card:focus-within{box-shadow:0 1px 0 rgba(0,0,0,.02)} /* без ховера */

/* Иконки */
.ti-icon{width:72px;min-width:72px;height:56px;display:flex;align-items:center;justify-content:center}
.ti-icon img{max-width:64px;max-height:48px;display:block}

/* Подписи */
.ti-name{font-weight:700;color:#111;font-size:16px}

/* Синяя круглая галочка */
.ti-check{
  position:absolute;top:-12px;left:-12px;
  width:36px;height:36px;border-radius:999px;
  background:#2864c7;color:#fff;
  display:flex;align-items:center;justify-content:center;
  box-shadow:0 4px 12px rgba(40,100,199,.35)
}
/* На мобильных — меньше галочка */
@media (max-width:560px){
  .ti-check{width:28px;height:28px;top:-8px;left:-8px;box-shadow:0 3px 8px rgba(40,100,199,.30)}
}
	
/* Блок "Что входит в тур" — убрать точку-маркер у li */
article .container .ti-section .ti-grid{
  list-style: none;
  padding-left: 0;   /* если глобально задан отступ у UL */
  margin-left: 0;
}
article .container .ti-section .ti-grid > li::before{
  content: none !important;   /* гасим "•" из глобального правила */
}

</style>
