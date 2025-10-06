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

      .hotel-card{padding:32px 0;border-top:1px solid var(--tez-border)}
      .hotel-card__inner{display:grid;grid-template-columns:1.1fr 0.9fr;gap:28px;align-items:start}
      @media(max-width:980px){.hotel-card__inner{grid-template-columns:1fr}}

      .hotel-card__media{position:relative}
      .hotel-slide img{width:100%;height:auto;display:block;border-radius:14px}
      .hotel-thumbs{margin-top:10px}
      .hotel-thumbs .owl-item{padding:0 5px}
      .hotel-thumb{cursor:pointer;opacity:.9;transition:opacity .2s ease}
      .hotel-thumb img{width:100%;height:auto;display:block;border-radius:10px;border:2px solid transparent}
      .hotel-thumb.is-active img{border-color:var(--tez-blue)}
      .hotel-thumb:hover{opacity:1}

      .hotel-card__title{font-size:26px;line-height:1.25;margin:0 0 8px;color:var(--tez-dark)}
      .hotel-card__stars{font-weight:700;color:#f59e0b;margin-left:6px}
      .hotel-card__intro{color:var(--tez-muted);margin:0 0 14px}
      .hotel-card__bullets{margin:0 18px 16px 0;padding-left:0;list-style:none}
      .hotel-card__bullets li{margin:8px 0;color:#111827}
      .hotel-card__price{margin:10px 0 14px;font-size:18px}
      .hotel-card__sub{font-size:14px;color:var(--tez-muted);margin-top:6px}
      .hotel-card__note{margin-top:10px;font-size:13px;color:var(--tez-muted)}

      .tez-btn{
        display:inline-block;background:#2863c7;color:#fff;font-weight:600;line-height:1;
        padding:14px 22px;border-radius:12px;text-decoration:none;
        box-shadow:0 8px 20px rgba(40,99,199,.18);
        transition:transform .15s ease,box-shadow .15s ease,opacity .15s ease;
        -webkit-tap-highlight-color:transparent
      }
      .tez-btn:hover{box-shadow:0 10px 24px rgba(40,99,199,.26);transform:translateY(-1px)}
      .tez-btn:active{transform:translateY(0);opacity:.95}
      .tez-btn:focus{outline:2px solid rgba(40,99,199,.35);outline-offset:2px}

      /* скругление контейнеров */
      .hotel-slider .owl-stage-outer,.hotel-thumbs .owl-stage-outer{border-radius:12px}
      </style>

      <script>
      (function(w,d){
        var LOG_PREFIX='[TEZ hotel]';
        function log(){ try{ console.log.apply(console,[LOG_PREFIX].concat([].slice.call(arguments))); }catch(e){} }
        function loadCSS(href){
          if (d.querySelector('link[href="'+href+'"]')) return;
          var l=d.createElement('link'); l.rel='stylesheet'; l.href=href; d.head.appendChild(l);
        }
        function loadJS(src, cb){
          var s=d.createElement('script'); s.src=src; s.async=true; s.onload=cb||function(){}; s.onerror=function(){ cb && cb('e'); }; d.head.appendChild(s);
        }
        function onReady(fn){ if (d.readyState!=='loading') fn(); else d.addEventListener('DOMContentLoaded', fn); }

        function initAll(){
          if (!w.jQuery){ log('jQuery not found'); return; }
          var $=w.jQuery;

          $('.hotel-slider[data-hotel]').each(function(){
            var $main=$(this);
            if ($main.data('owl-inited')) return;

            var key=$main.data('hotel');
            var $thumbs=$main.closest('.hotel-card__media').find('.hotel-thumbs[data-hotel="'+key+'"]');

            // отмечаем чтобы не инициализировать повторно
            $main.data('owl-inited',true);

            try{
              $main.owlCarousel({
                items:1,loop:true,dots:false,nav:true,autoplay:false,smartSpeed:420,navText:['‹','›']
              }).on('changed.owl.carousel',function(e){
                if(!$thumbs.length) return;
                var count=e.item.count;
                var idx=(e.item.index - e.relatedTarget._clones.length/2)%count;
                if(idx<0) idx=count+idx;
                $thumbs.find('.owl-item').removeClass('is-active');
                $thumbs.find('.owl-item').eq(idx).addClass('is-active');
              });
              log('main inited', key);
            }catch(err){ log('main init error', err); }

            if ($thumbs.length && !$thumbs.data('owl-inited')){
              try{
                $thumbs.owlCarousel({
                  items:5,margin:10,dots:false,nav:false,smartSpeed:300,
                  responsive:{0:{items:4},480:{items:5},768:{items:6}}
                });
                $thumbs.on('click','.owl-item',function(){
                  var i=$(this).index();
                  $main.trigger('to.owl.carousel',[i,300,true]);
                  $thumbs.find('.owl-item').removeClass('is-active');
                  $(this).addClass('is-active');
                });
                $thumbs.find('.owl-item').eq(0).addClass('is-active');
                $thumbs.data('owl-inited',true);
                log('thumbs inited', key);
              }catch(err){ log('thumbs init error', err); }
            }
          });
        }

        function ensureOwlThenInit(){
          // если уже есть — стартуем
          if (w.jQuery && typeof jQuery.fn.owlCarousel==='function'){ log('Owl present, init'); initAll(); return; }

          // 1) cdnjs
          var css1='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css';
          var css1t='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css';
          var js1='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js';

          // 2) jsDelivr — запасной
          var css2='https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.carousel.min.css';
          var css2t='https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.theme.default.min.css';
          var js2='https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js';

          function trySecond(){
            log('cdnjs failed, trying jsDelivr…');
            loadCSS(css2); loadCSS(css2t);
            loadJS(js2, function(){ setTimeout(function(){ initAll(); }, 80); });
          }

          log('loading Owl from cdnjs…');
          loadCSS(css1); loadCSS(css1t);
          loadJS(js1, function(err){
            if (err==='e' || !(w.jQuery && typeof jQuery.fn.owlCarousel==='function')) return trySecond();
            setTimeout(function(){ initAll(); }, 80);
          });
        }

        onReady(function(){
          // на всякий случай повторим на window.load и через 1с
          ensureOwlThenInit();
          w.addEventListener('load', ensureOwlThenInit);
          setTimeout(ensureOwlThenInit, 1000);
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
          <div class="hotel-slider owl-carousel" data-hotel="<?php echo esc_attr($uid); ?>" aria-label="Галерея отеля <?php echo esc_attr($data['title']); ?>">
            <?php foreach ($data['images'] as $u): ?>
              <div class="hotel-slide"><img src="<?php echo esc_url($u); ?>" alt="<?php echo esc_attr($data['title']); ?> — фото" loading="lazy"></div>
            <?php endforeach; ?>
          </div>
          <div class="hotel-thumbs owl-carousel" data-hotel="<?php echo esc_attr($uid); ?>" aria-label="Миниатюры галереи">
            <?php foreach ($data['images'] as $u): ?>
              <div class="hotel-thumb"><img src="<?php echo esc_url($u); ?>" alt="" loading="lazy"></div>
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
