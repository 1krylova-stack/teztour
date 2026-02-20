<?php
/**
 * TEZ Hotel Card — один файл в теме (shortcode + CSS/JS + надёжная инициализация Owl)
 * Путь: /wp-content/themes/zudefault/template-parts/tez-hotel-card.php
 */
if (!defined('ABSPATH')) exit;

class ZU_Tez_Hotel_Card_OneFile {
  private static $printed_assets = false;

  public function __construct() {
    add_shortcode('tez_hotel_card', [$this, 'shortcode']);
  }

  private function print_assets_once() {
    if (self::$printed_assets) return;
    self::$printed_assets = true;

    add_action('wp_footer', function () {
      ?>
      <style>
      :root { --tez-blue:#2863c7; --tez-dark:#0f172a; --tez-muted:#6b7280; --tez-border:#e5e7eb; }

      .hotel-card{padding:32px 0}
      .hotel-card__inner{display:grid;grid-template-columns:1.1fr 0.9fr;gap:28px;align-items:start}
@media(max-width:980px){.hotel-card__inner{grid-template-columns:1fr}}

      .hotel-card__media{position:relative;min-width:0}
.hotel-slider{position:relative;border-radius:14px;overflow:hidden;background:#fff;text-align:center;width:100%;height:420px;display:block}
@media(max-width:1280px){.hotel-slider{height:360px}}
@media(max-width:980px){.hotel-slider{height:320px}}
@media(max-width:640px){.hotel-slider{height:240px}}
.hotel-slide{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;width:100%;height:100%;box-sizing:border-box;padding:0 18px;opacity:0;visibility:hidden;transition:opacity .25s ease;pointer-events:none}
.hotel-slide.is-active{opacity:1;visibility:visible;pointer-events:auto}
.hotel-card .hotel-slide img{width:auto;max-width:100%;max-height:100%;height:auto;display:block;border-radius:14px;margin:0 auto}
@media(max-width:640px){.hotel-card .hotel-slide img{border-radius:10px}}

      .hotel-slider__nav{position:absolute;top:50%;transform:translateY(-50%);width:38px;height:48px;border:none;border-radius:12px;
        background:rgba(15,23,42,.6);color:#fff;font-size:28px;line-height:1;display:flex;align-items:center;justify-content:center;
        cursor:pointer;transition:background .2s ease;box-shadow:0 8px 18px rgba(15,23,42,.18);z-index:2}
      .hotel-slider__nav:hover{background:rgba(15,23,42,.82)}
      .hotel-slider__nav:focus{outline:2px solid rgba(40,99,199,.45);outline-offset:2px}
      .hotel-slider__nav--prev{left:12px}
      .hotel-slider__nav--next{right:12px}

      .hotel-thumbs{margin-top:12px;display:flex;gap:10px;overflow-x:auto;padding-bottom:4px;scrollbar-width:thin}
      .hotel-thumbs::-webkit-scrollbar{height:6px}
      .hotel-thumbs::-webkit-scrollbar-thumb{background:rgba(148,163,184,.6);border-radius:999px}
      .hotel-thumb{cursor:pointer;opacity:.92;transition:opacity .2s ease,transform .2s ease;border:none;background:transparent;padding:0;display:block}
      .hotel-thumb:hover{opacity:1;transform:translateY(-1px)}
      .hotel-thumb:focus{outline:2px solid rgba(40,99,199,.45);outline-offset:3px}
      .hotel-card .hotel-thumb img{width:100%;max-width:120px;height:auto;display:block;border-radius:12px;border:2px solid transparent}
      .hotel-thumb.is-active img{border-color:var(--tez-blue)}

      .hotel-card__title{font-size:26px;line-height:1.25;margin:0 0 8px;color:var(--tez-dark)}
      .hotel-card__stars{font-weight:700;color:#f59e0b;margin-left:6px}
      .hotel-card__intro{color:var(--tez-muted);margin:0 0 14px}
      .hotel-card__bullets{margin:0 18px 16px 0;padding-left:0;list-style:none}
      .hotel-card__bullets li{margin:8px 0;color:#111827}
      .hotel-card__price{margin:10px 0 14px;font-size:18px}
      .hotel-card__sub{font-size:14px;color:var(--tez-muted);margin-top:6px}
      .hotel-card__note{margin-top:10px;font-size:13px;color:var(--tez-muted)}

	/* Кнопка в карточке — синий как в нижнем блоке */
.tez-btn{
  display:flex;width:max-content;margin:16px auto 0;align-items:center;justify-content:center;gap:8px;
  padding:15px 45px;
  background: linear-gradient(90deg, var(--tez-blue) 0%, #1e4fb8 100%);
  color:#fff;
  font-size:16px;font-weight:600;line-height:1.2;text-decoration:none;
  border-radius:10px;
  box-shadow:0 6px 16px rgba(30,79,184,.28);
  transition:transform .18s ease,box-shadow .18s ease,opacity .18s ease;
  -webkit-tap-highlight-color:transparent;
}
.tez-btn:hover{
  /* убираем opacity и даём затемнение фоном */
  background: linear-gradient(90deg, #1f57b9 0%, #1946a6 100%);
  text-decoration:none;
  transform:translateY(-1px);
}

/* Кнопка отправки в попапе — те же цвета и ховер */
.tez-modal .wpcf7-submit{
  display:inline-flex;align-items:center;justify-content:center;
  padding:15px 26px;font-size:16px;font-weight:600;
  border:none;border-radius:10px;
  background: linear-gradient(90deg, var(--tez-blue) 0%, #1e4fb8 100%);
  color:#fff;cursor:pointer;
  box-shadow:0 6px 16px rgba(30,79,184,.28);
  transition:transform .18s ease,box-shadow .18s ease,opacity .18s ease;
}
.tez-modal .wpcf7-submit:hover{
  background: linear-gradient(90deg, #1f57b9 0%, #1946a6 100%);
  transform:translateY(-1px);
}

    
      .tez-btn:active{transform:translateY(0);box-shadow:0 2px 6px rgba(0,0,0,.2);}
      .tez-btn:focus-visible{outline:3px solid rgba(38,197,206,.35);outline-offset:3px;}
      @media(max-width:640px){.tez-btn{width:100%;padding:14px 24px;text-align:center;}}

      .hotel-thumbs:focus-visible{outline:2px solid rgba(40,99,199,.45);outline-offset:4px}
tez-modal[hidden]{display:none !important}
      .tez-modal{position:fixed;inset:0;z-index:99999;display:flex;align-items:center;justify-content:center;padding:24px;
        opacity:0;visibility:hidden;transition:opacity .25s ease;pointer-events:none;}
      .tez-modal.is-open{opacity:1;visibility:visible;pointer-events:auto;}
      .tez-modal__backdrop{position:absolute;inset:0;background:rgba(15,23,42,.55);}
      .tez-modal__dialog{position:relative;z-index:1;max-width:520px;width:100%;background:#fff;border-radius:18px;padding:32px 34px;
        box-shadow:0 24px 48px rgba(15,23,42,.35);max-height:90vh;overflow:auto;}
      @media(max-width:640px){.tez-modal__dialog{padding:26px 22px;border-radius:16px;}}
      .tez-modal__close{position:absolute;top:12px;right:12px;width:34px;height:34px;border:none;border-radius:50%;
        background:rgba(148,163,184,.22);color:#111827;font-size:20px;cursor:pointer;line-height:1;display:flex;
        align-items:center;justify-content:center;transition:background .2s ease;}
      .tez-modal__close:hover{background:rgba(148,163,184,.4);}
      .tez-modal__close:focus{outline:2px solid rgba(40,99,199,.35);outline-offset:2px;}
      .tez-modal__body{display:flex;flex-direction:column;gap:18px;}
      .tez-modal__title{margin:0;font-size:24px;line-height:1.25;font-weight:700;color:var(--tez-dark);text-align:center;}
      .tez-modal__subtitle{margin:0;font-size:15px;line-height:1.5;color:var(--tez-muted);text-align:center;}
      .tez-modal__form{display:flex;flex-direction:column;gap:16px;}
      .tez-modal .wpcf7-form{display:flex;flex-direction:column;gap:14px;}
      .tez-modal .wpcf7-form p{margin:0;}
      .tez-modal .wpcf7-form label{display:flex;flex-direction:column;gap:6px;font-size:14px;color:var(--tez-muted);}
      .tez-modal .wpcf7-form-control-wrap{display:block;width:100%;}
      .tez-modal .wpcf7-text,
      .tez-modal .wpcf7-tel,
      .tez-modal .wpcf7-email,
      .tez-modal .wpcf7-number,
      .tez-modal .wpcf7-select,
      .tez-modal input[type="text"],
      .tez-modal input[type="email"],
      .tez-modal input[type="tel"],
      .tez-modal input[type="number"],
      .tez-modal select,
      .tez-modal textarea{width:100%;max-width:100%;border:1px solid var(--tez-border);border-radius:10px;padding:12px 14px;font-size:15px;
        background:#f9fbff;box-sizing:border-box;transition:border-color .2s ease,box-shadow .2s ease;}
      .tez-modal textarea{min-height:110px;resize:vertical;}
      .tez-modal .wpcf7-form input:focus,
      .tez-modal .wpcf7-form textarea:focus,
      .tez-modal .wpcf7-form select:focus{border-color:var(--tez-blue);box-shadow:0 0 0 3px rgba(40,99,199,.14);outline:none;}
     
      .tez-modal .wpcf7-submit:active{transform:translateY(0);box-shadow:0 2px 6px rgba(0,0,0,.2);}
      .tez-modal .wpcf7-form .wpcf7-not-valid{border-color:#f97316;box-shadow:0 0 0 3px rgba(249,115,22,.14);}
      .tez-modal .wpcf7-response-output{margin:0;font-size:13px;line-height:1.4;border-radius:10px;padding:10px 12px;border:1px solid transparent;}
      .tez-modal .wpcf7-response-output.wpcf7-mail-sent-ok{background:#ecfdf5;border-color:#34d399;color:#047857;}
      .tez-modal .wpcf7-response-output.wpcf7-validation-errors,
      .tez-modal .wpcf7-response-output.wpcf7-acceptance-missing{background:#fef3c7;border-color:#f59e0b;color:#92400e;}
      .tez-modal .wpcf7-spinner{margin:0 auto;}
      .tez-modal .wpcf7-list-item{margin:0;}
      .tez-modal .wpcf7-list-item label{display:flex;align-items:flex-start;gap:10px;font-size:13px;color:var(--tez-muted);}
      .tez-modal .wpcf7-list-item input[type="checkbox"]{margin-top:3px;}
      .tez-modal .wpcf7-list-item-label a{color:inherit;text-decoration:underline;}
      .tez-modal .wpcf7-acceptance{font-size:13px;line-height:1.5;color:var(--tez-muted);} 
</style>

      <script>
      (function(w,d){
        function initCard(card){
          if(!card || card.dataset.sliderInited==='true') return;

        var slider=card.querySelector('.hotel-slider');
          if(!slider) return;

          var slides=[].slice.call(slider.querySelectorAll('.hotel-slide'));
          if(!slides.length) return;

         var thumbsWrap=card.querySelector('.hotel-thumbs');
          var thumbs=thumbsWrap?([].slice.call(thumbsWrap.querySelectorAll('.hotel-thumb'))):[];
          var prevBtn=card.querySelector('.hotel-slider__nav--prev');
          var nextBtn=card.querySelector('.hotel-slider__nav--next');
          var activeIndex=0;


         slider.setAttribute('aria-live','polite');

          if(slides.length<2){
            if(prevBtn) prevBtn.style.display='none';
            if(nextBtn) nextBtn.style.display='none';
          }

         if(!thumbs.length){
            if(thumbsWrap) thumbsWrap.style.display='none';
          }

          function setActive(index){
            if(index<0) index=slides.length-1;
            if(index>=slides.length) index=0;

            activeIndex=index;
            slides.forEach(function(slide,i){
              var isActive=i===index;
              slide.classList.toggle('is-active', isActive);
              slide.setAttribute('aria-hidden', isActive ? 'false' : 'true');
            });
            thumbs.forEach(function(thumb,i){
              var isActive=i===index;
              thumb.classList.toggle('is-active', isActive);
              thumb.setAttribute('aria-pressed', isActive ? 'true' : 'false');
            });

            slider.setAttribute('data-active-index', index);

            if(thumbsWrap && thumbs[index]){
              var target=thumbs[index];
              var offset=target.offsetLeft - (thumbsWrap.clientWidth/2 - target.clientWidth/2);
              var left=Math.max(offset,0);
              if(typeof thumbsWrap.scrollTo==='function'){
                thumbsWrap.scrollTo({ left:left, behavior:'smooth' });
              }else{
                thumbsWrap.scrollLeft=left;
              }
            }
          }

          setActive(0);

          if(prevBtn){ prevBtn.addEventListener('click', function(){ setActive(activeIndex-1); }); }
          if(nextBtn){ nextBtn.addEventListener('click', function(){ setActive(activeIndex+1); }); }
          thumbs.forEach(function(thumb,i){
            thumb.addEventListener('click', function(){ setActive(i); });
          });
			card.dataset.sliderInited='true';
        }

         function initAll(){
          var cards=d.querySelectorAll('.hotel-card');
          cards.forEach(initCard);
        }

        if(d.readyState==='loading') d.addEventListener('DOMContentLoaded', initAll);
        else initAll();

        w.addEventListener('load', initAll);
      })(window, document);
      </script>
 <script>
      (function(w,d){
        function ready(fn){
          if(d.readyState==='loading'){d.addEventListener('DOMContentLoaded', fn);} else {fn();}
        }
        function hasFancybox(){
          if(w.Fancybox) return true;
          if(!w.jQuery) return false;
          return !!(w.jQuery.fancybox || (w.jQuery.fn && w.jQuery.fn.fancybox));
        }
        ready(function(){
          if(hasFancybox()) return;
          var active=null;
          function getModal(id){
            if(!id) return null;
            return d.getElementById(id);
          }
          function closeModal(){
            if(!active) return;
            active.classList.remove('is-open');
            active.setAttribute('aria-hidden','true');
            active.setAttribute('hidden','');
            d.documentElement.style.overflow='';
            active=null;
          }
          function focusFirst(modal){
            if(!modal) return;
            var focusable=modal.querySelector('[data-tez-modal-close], button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
            if(focusable) {
              try { focusable.focus({preventScroll:true}); }
              catch(e){ focusable.focus(); }
            }
          }
          function openModal(id){
            var modal=getModal(id);
            if(!modal) return;
            if(active && active!==modal) closeModal();
            active=modal;
            modal.classList.add('is-open');
            modal.removeAttribute('hidden');
            modal.setAttribute('aria-hidden','false');
            d.documentElement.style.overflow='hidden';
            focusFirst(modal);
          }
          d.addEventListener('click', function(e){
            var opener=e.target.closest('[data-tez-modal-open]');
            if(opener){
              e.preventDefault();
              openModal(opener.getAttribute('data-tez-modal-open'));
              return;
            }
            if(active && (e.target.hasAttribute('data-tez-modal-close') || e.target.closest('[data-tez-modal-close]'))){
              e.preventDefault();
              closeModal();
              return;
            }
            if(active && e.target.classList.contains('tez-modal__backdrop')){
              e.preventDefault();
              closeModal();
            }
          });
          d.addEventListener('keydown', function(e){
            if(e.key==='Escape') closeModal();
          });
        });
      })(window, document);
      </script>

      <?php
    }, 99);
  }

  private function parse_table($content) {
    $content = (string)$content;
    if (!preg_match('~<table.*?>(.*?)</table>~is', $content, $m)) return null;
    $table_html = $m[1];
    if (!preg_match('~<tr.*?>(.*?)</tr>~is', $table_html, $r)) return null;
    $row_html = $r[1];

    preg_match_all('~<td.*?>(.*?)</td>~is', $row_html, $cells);
    $cells = isset($cells[1]) ? $cells[1] : [];
    $cells = array_pad($cells, 8, '');

    $images   = trim(strip_tags($cells[0]));
    $title    = wp_strip_all_tags($cells[1]);
    $stars    = wp_strip_all_tags($cells[2]);
    $price    = wp_strip_all_tags($cells[3]);
    $priceSub = wp_strip_all_tags($cells[4]);
    $bullets  = trim(strip_tags($cells[5], '<br>'));
	$bullets  = preg_replace('/\x{00AD}|\x{200B}|\x{202F}|\x{00A0}/u', ' ', $bullets);
	  $bullets  = str_replace(["\r\n","\r"], "\n", $bullets);
$bullets  = preg_replace('~<br\s*/?>~i', "\n", $bullets);
	$bulletsArr = array_values(array_filter(array_map('trim', preg_split('~\n+~', $bullets))));
    $link     = esc_url_raw(trim(strip_tags($cells[6])));
    $btnText  = wp_strip_all_tags($cells[7]);

    $imagesArr  = array_values(array_filter(array_map('trim', preg_split('~\R+~', $images))));
    

    return [
      'images'   => $imagesArr,
      'title'    => $title,
      'stars'    => $stars,
      'price'    => $price,
      'priceSub' => $priceSub,
      'bullets'  => $bulletsArr,
      'link'     => $link ?: '#',
      'btnText'  => $btnText ?: 'Подобрать тур',
    ];
  }

  public function shortcode($atts, $content = null) {
    $a = shortcode_atts([
      'form_id'  => 'da991d3',
      'fancybox' => 'auto', // auto (v2) | v3
    ], $atts, 'tez_hotel_card');

    $data = $this->parse_table($content);
    if (!$data || empty($data['images'])) return '';

    $this->print_assets_once();

    $uid = 'tez-hotel-' . wp_rand(1000, 999999);

    // кнопка (fancybox v2/v3)
    $popup_id = 'popup-' . $uid;
$btn_attrs = ($a['fancybox']==='v3')
  ? ' data-fancybox data-src="#'.$popup_id.'" href="javascript:;"'
  : ' href="#'.$popup_id.'"';
$btn_attrs .= ' data-tez-modal-open="'.$popup_id.'"';
$btn_classes = ['tez-btn'];
if ($a['fancybox'] !== 'v3') {
  $btn_classes[] = 'fancybox';
}

ob_start(); ?>
<section class="hotel-card" id="<?php echo esc_attr($uid); ?>">
  <div class="hotel-card__inner">

    <div class="hotel-card__media">
       <div class="hotel-slider" role="group" aria-roledescription="галерея" aria-label="Галерея отеля <?php echo esc_attr($data['title']); ?>">
        <?php foreach ($data['images'] as $i => $u): ?>
          <div class="hotel-slide<?php echo $i === 0 ? ' is-active' : ''; ?>" aria-hidden="<?php echo $i === 0 ? 'false' : 'true'; ?>"><img src="<?php echo esc_url($u); ?>" alt="<?php echo esc_attr($data['title']); ?> — фото" loading="lazy"></div>
        <?php endforeach; ?>
 <button type="button" class="hotel-slider__nav hotel-slider__nav--prev" aria-label="Предыдущее фото">‹</button>
        <button type="button" class="hotel-slider__nav hotel-slider__nav--next" aria-label="Следующее фото">›</button>  
      </div>
      <div class="hotel-thumbs" aria-label="Миниатюры галереи">
        <?php foreach ($data['images'] as $i => $u): ?>
          <button type="button" class="hotel-thumb<?php echo $i === 0 ? ' is-active' : ''; ?>" aria-pressed="<?php echo $i === 0 ? 'true' : 'false'; ?>"><img src="<?php echo esc_url($u); ?>" alt="" loading="lazy"></button>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="hotel-card__content">
      <h3 class="hotel-card__title">
        <?php echo esc_html($data['title']); ?>
        <?php if ($data['stars']): ?><span class="hotel-card__stars"><?php echo esc_html($data['stars']); ?></span><?php endif; ?>
      </h3>

      <?php if ($data['bullets']): ?>
      <ul class="hotel-card__bullets">
        <?php foreach ($data['bullets'] as $b): ?>
          <li><?php echo wp_kses_post($b); ?></li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>

      <?php if ($data['price']): ?>
      <div class="hotel-card__price">
        Стоимость на человека от: <strong><?php echo esc_html($data['price']); ?></strong>
        <?php if ($data['priceSub']): ?><div class="hotel-card__sub"><?php echo esc_html($data['priceSub']); ?></div><?php endif; ?>
      </div>
      <?php endif; ?>

      <a<?php echo $btn_attrs; ?> class="<?php echo esc_attr(implode(' ', $btn_classes)); ?>" role="button" aria-haspopup="dialog"><?php echo esc_html($data['btnText']); ?></a>
     
    </div>

  </div>
</section>

<?php $modal_title_id = $popup_id . '-title'; $modal_desc_id = $popup_id . '-desc'; ?>
<div id="<?php echo esc_attr($popup_id); ?>" class="tez-modal" hidden aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="<?php echo esc_attr($modal_title_id); ?>" aria-describedby="<?php echo esc_attr($modal_desc_id); ?>">
  <div class="tez-modal__backdrop" data-tez-modal-close></div>
  <div class="tez-modal__dialog" role="document">
    <button type="button" class="tez-modal__close" aria-label="Закрыть" data-tez-modal-close>&times;</button>
    <div class="tez-modal__body">
      <h2 class="tez-modal__title" id="<?php echo esc_attr($modal_title_id); ?>">Подбор тура</h2>
      <p class="tez-modal__subtitle" id="<?php echo esc_attr($modal_desc_id); ?>">Заполните форму — мы свяжемся с вами и подготовим подборку подходящих вариантов.</p>
      <div class="tez-modal__form">
        <?php echo do_shortcode('[contact-form-7 id="'.esc_attr($a['form_id']).'" title="Подобрать тур"]'); ?>
      </div>
    </div>
  </div>
    </div>
    <?php
    return ob_get_clean();
  }
}
new ZU_Tez_Hotel_Card_OneFile();

/* В functions.php темы добавьте:
require_once get_template_directory() . '/template-parts/tez-hotel-card.php';
*/
