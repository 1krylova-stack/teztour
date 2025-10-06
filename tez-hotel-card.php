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

      .tez-btn{
  display:inline-block;padding:15px 40px;background:#2864c7;color:#fff;
  font-size:16px;font-weight:600;line-height:1;text-decoration:none;
  border-radius:6px;box-shadow:0 4px 4px rgba(0,0,0,.25);
  transition:opacity .2s ease;-webkit-tap-highlight-color:transparent
}
.tez-btn:hover{opacity:.9;text-decoration:none}
.tez-btn:focus{outline:2px solid rgba(40,99,199,.35);outline-offset:2px}

      .hotel-thumbs:focus-visible{outline:2px solid rgba(40,99,199,.45);outline-offset:4px}
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
    $link     = esc_url_raw(trim(strip_tags($cells[6])));
    $btnText  = wp_strip_all_tags($cells[7]);

    $imagesArr  = array_values(array_filter(array_map('trim', preg_split('~\R+~', $images))));
    $bulletsArr = array_values(array_filter(array_map('trim', preg_split('~\R+~', $bullets))));

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
    $btn_attrs = ($a['fancybox']==='v3')
      ? ' data-fancybox data-src="#popup-'.$uid.'" href="javascript:;"'
      : ' href="#popup-'.$uid.'" class="fancybox"';

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
            Стоимость: <strong><?php echo esc_html($data['price']); ?></strong>
            <?php if ($data['priceSub']): ?><div class="hotel-card__sub"><?php echo esc_html($data['priceSub']); ?></div><?php endif; ?>
          </div>
          <?php endif; ?>

          <a<?php echo $btn_attrs; ?> class="tez-btn" role="button" aria-haspopup="dialog"><?php echo esc_html($data['btnText']); ?></a>
          <div class="hotel-card__note">* Фото являются примерами. Актуальные варианты — по запросу менеджера.</div>
        </div>

      </div>
    </section>

    <div id="popup-<?php echo esc_attr($uid); ?>" style="display:none;max-width:720px;">
      <?php echo do_shortcode('[contact-form-7 id="'.esc_attr($a['form_id']).'" title="Подобрать тур"]'); ?>
    </div>
    <?php
    return ob_get_clean();
  }
}
new ZU_Tez_Hotel_Card_OneFile();

/* В functions.php темы добавьте:
require_once get_template_directory() . '/template-parts/tez-hotel-card.php';
*/
