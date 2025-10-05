<?php
/**
 * TEZ Hotel Card — один файл в теме (shortcode + CSS/JS)
 * Путь: /wp-content/themes/zudefault/template-parts/tez-hotel-card.php
 *
 * Использование в контенте:
 * [tez_hotel_card form_id="da991d3" fancybox="auto"]
 * <table>
 *   <tbody>
 *     <!-- Порядок без заголовков: images | title | stars | price | price_sub | bullets | link | btn_text -->
 *     <tr>
 *       <td>
 * https://tez-tourspb.ru/wp-content/uploads/Centara-Mirage-11.jpeg
 * https://tez-tourspb.ru/wp-content/uploads/Centara-Mirage-10.jpeg
 * https://tez-tourspb.ru/wp-content/uploads/Centara-Mirage-9.jpeg
 * https://tez-tourspb.ru/wp-content/uploads/Centara-Mirage-8.jpeg
 * https://tez-tourspb.ru/wp-content/uploads/Centara-Mirage-7.jpeg
 * https://tez-tourspb.ru/wp-content/uploads/Centara-Mirage-6.jpeg
 * https://tez-tourspb.ru/wp-content/uploads/Centara-Mirage-5.jpeg
 * https://tez-tourspb.ru/wp-content/uploads/Centara-Mirage-4.jpeg
 * https://tez-tourspb.ru/wp-content/uploads/Centara-Mirage-3.jpeg
 * https://tez-tourspb.ru/wp-content/uploads/Centara-Mirage-2.jpeg
 * https://tez-tourspb.ru/wp-content/uploads/Centara-Mirage-1.jpeg
 *       </td>
 *       <td>Centara Mirage Beach Resort Dubai</td>
 *       <td>4★</td>
 *       <td>от 70 000 руб.</td>
 *       <td>Чтобы узнать актуальную стоимость нажмите «Подобрать тур»</td>
 *       <td>
 * 🎢 Огромный аквапарк с горками, ленивой рекой и бассейнами для всех возрастов.
 * 👧 Детские клубы, игровые площадки и даже спа для детей.
 * 🍽 Питание “Всё включено”: рестораны с кухнями мира, снэки у бассейна и на пляже.
 * 🏖 Просторные семейные номера с двухъярусными кроватями и видом на море.
 * 📍 Удобное расположение: рядом частный пляж и всего 20 минут до главных достопримечательностей Дубая.
 *       </td>
 *       <td>#</td>
 *       <td>Подобрать тур</td>
 *     </tr>
 *   </tbody>
 * </table>
 * [/tez_hotel_card]
 *
 * Требования: в шаблоне перед </body> должен быть wp_footer();
 * Зависимости: jQuery; OwlCarousel (автодогружается из CDN при отсутствии); Fancybox v2/v3 уже есть на сайте.
 */

if (!defined('ABSPATH')) exit;

class ZU_Tez_Hotel_Card_OneFile {
  private static $printed_assets = false;

  public function __construct() {
    add_shortcode('tez_hotel_card', [$this, 'shortcode']);
  }

  /** Выводим CSS/JS один раз в футере (и автодогрузка Owl при необходимости) */
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

      /* Owl контейнеры со скруглением */
      .hotel-slider .owl-stage-outer,.hotel-thumbs .owl-stage-outer{border-radius:12px}
      </style>

      <script>
      (function(w,d){
        function loadCSS(href){
			 if (d.querySelector('link[href="'+href+'"]')) return;
          var l=d.createElement('link'); l.rel='stylesheet'; l.href=href; d.head.appendChild(l);
        }
        function loadJS(src, cb){
          var s=d.createElement('script'); s.src=src; s.async=true; s.onload=cb||function(){}; d.head.appendChild(s);
        }
        function domReady(fn){
          if (d.readyState !== 'loading') fn(); else d.addEventListener('DOMContentLoaded', fn);
        }

        function initAll(){
          if (!w.jQuery) { console.warn('jQuery недоступен.'); return; }
          var $ = w.jQuery;

          function initHotelCarousel(key){
            var $main = $('.hotel-slider[data-hotel="'+key+'"]');
            var $thumbs= $('.hotel-thumbs[data-hotel="'+key+'"]');
            if(!$main.length) return;

            $main.owlCarousel({
              items:1, loop:true, dots:false, nav:true, autoplay:false, smartSpeed:420, navText:['‹','›']
            }).on('changed.owl.carousel', function(e){
              var count=e.item.count;
              var idx=(e.item.index - e.relatedTarget._clones.length/2) % count;
              if(idx<0) idx=count+idx;
              $thumbs.find('.owl-item').removeClass('is-active');
              $thumbs.find('.owl-item').eq(idx).addClass('is-active');
            });

            if ($thumbs.length){
              $thumbs.owlCarousel({
                items:5, margin:10, dots:false, nav:false, smartSpeed:300,
                responsive:{0:{items:4},480:{items:5},768:{items:6}}
              });
              $thumbs.on('click','.owl-item',function(){
                var i=$(this).index();
                $main.trigger('to.owl.carousel',[i,300,true]);
                $thumbs.find('.owl-item').removeClass('is-active');
                $(this).addClass('is-active');
              });
              $thumbs.find('.owl-item').eq(0).addClass('is-active');
            }
          }

          if (w.TEZ_HOTEL_IDS && w.TEZ_HOTEL_IDS.length){
            w.TEZ_HOTEL_IDS.forEach(initHotelCarousel);
          }
        }

        domReady(function(){
			var owlCss = 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css';
          var owlTheme = 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css';
          loadCSS(owlCss);
          loadCSS(owlTheme);
          // Если Owl уже подключён — инициализируем сразу
          if (w.jQuery && typeof jQuery.fn.owlCarousel === 'function') {
            initAll();
            return;
          }
          // Иначе подгружаем Owl из CDN и потом инициализируем
         
          loadJS('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', function(){
            setTimeout(initAll, 50);
          });
        });
      })(window, document);
      </script>
      <?php
    }, 99);
  }

  /** Парсим мини-таблицу */
  private function parse_table($content) {
    $content = (string) $content;
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
    // Разрешаем переносы строк/эмодзи в bullets (сохраняем <br> если вдруг будет)
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

  /** Рендер шорткода */
  public function shortcode($atts, $content = null) {
    $a = shortcode_atts([
      'form_id'  => 'da991d3',
      'fancybox' => 'auto', // auto (v2) | v3
    ], $atts, 'tez_hotel_card');

    $data = $this->parse_table($content);
    if (!$data || empty($data['images'])) return '';

    // Выводим CSS/JS один раз
    $this->print_assets_once();

    $uid = 'tez-hotel-' . wp_rand(1000, 999999);

    // Fancybox: v2 — class="fancybox" + href="#id"; v3 — data-fancybox data-src
    $btn_attrs = [
      'class' => ['tez-btn'],
    ];

    if ($a['fancybox'] === 'v3') {
      $btn_attrs['href'] = 'javascript:;';
      $btn_attrs['data-fancybox'] = '';
      $btn_attrs['data-src'] = '#popup-' . $uid;
    } else {
      $btn_attrs['class'][] = 'fancybox';
      $btn_attrs['href'] = '#popup-' . $uid;
    }

    $btn_attr_parts = [];
    foreach ($btn_attrs as $attr => $value) {
      if ($attr === 'class' && is_array($value)) {
        $value = implode(' ', array_unique(array_filter($value)));
      }

      if ($value === '') {
        $btn_attr_parts[] = esc_attr($attr);
      } else {
        $btn_attr_parts[] = sprintf('%s="%s"', esc_attr($attr), esc_attr($value));
      }
    }

    $btn_attr_string = $btn_attr_parts ? ' ' . implode(' ', $btn_attr_parts) : '';


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

          <a<?php echo $btn_attr_string; ?> role="button" aria-haspopup="dialog">
            <?php echo esc_html($data['btnText']); ?>
          </a>

          <div class="hotel-card__note">* Фото являются примерами. Актуальные варианты — по запросу менеджера.</div>
        </div>

      </div>
    </section>

    <div id="popup-<?php echo esc_attr($uid); ?>" style="display:none;max-width:720px;">
      <?php echo do_shortcode('[contact-form-7 id="'.esc_attr($a['form_id']).'" title="Подобрать тур"]'); ?>
    </div>

    <script>
      window.TEZ_HOTEL_IDS = (window.TEZ_HOTEL_IDS || []);
      window.TEZ_HOTEL_IDS.push('<?php echo esc_js($uid); ?>');
    </script>
    <?php
    return ob_get_clean();
  }
}

new ZU_Tez_Hotel_Card_OneFile();

// Подключение файла из темы:
// добавьте в functions.php вашей темы:
// require_once get_template_directory() . '/template-parts/tez-hotel-card.php';
