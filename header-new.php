<?php
if (!defined('ABSPATH')) { exit; }

$phone_display = '+7 (812) 643-65-64';
$phone_clean   = preg_replace('~[^0-9+]~', '', $phone_display);
$whatsapp_link = 'https://wa.me/79817010302?text=%D0%94%D0%BE%D0%B1%D1%80%D1%8B%D0%B9%20%D0%94%D0%B5%D0%BD%D1%8C!%20%D0%A5%D0%BE%D1%87%D1%83%20%D0%BF%D0%BE%D0%B4%D0%BE%D0%B1%D1%80%D0%B0%D1%82%D1%8C%20%D1%82%D1%83%D1%80';
$telegram_link = 'https://t.me/+79817010302';
$address       = 'Санкт-Петербург, Московский пр. 216, офис 9';

$countries = [
  ['title'=>'Китай','url'=>'https://tez-tourspb.ru/tury-v-kitay','flag'=>'https://tez-tourspb.ru/wp-content/uploads/china.jpg'],
  ['title'=>'Вьетнам','url'=>'https://tez-tourspb.ru/tury-vo-vetnam','flag'=>'https://tez-tourspb.ru/wp-content/uploads/vietnam-150x150.jpg'],
  ['title'=>'Тайланд','url'=>'https://tez-tourspb.ru/tury-v-tajland','flag'=>'https://tez-tourspb.ru/wp-content/uploads/Thailand_flag-150x150.jpg'],
  ['title'=>'Мальдивы','url'=>'https://tez-tourspb.ru/tury-na-maldivy','flag'=>'https://tez-tourspb.ru/wp-content/uploads/Flag-Maldives-1-150x150.webp'],
  ['title'=>'Египет','url'=>'https://tez-tourspb.ru/tury-v-egipet','flag'=>'https://tez-tourspb.ru/wp-content/uploads/flag-egypta_enl-150x150.jpg'],
  ['title'=>'ОАЭ','url'=>'https://tez-tourspb.ru/tury-v-oae','flag'=>'https://tez-tourspb.ru/wp-content/uploads/i-18-150x150.webp'],
  ['title'=>'Турция','url'=>'https://tez-tourspb.ru/tury-v-turciyu','flag'=>'https://tez-tourspb.ru/wp-content/uploads/p1_3536877_c70ab707_1698418660.jpg'],
  ['title'=>'Тунис','url'=>'https://tez-tourspb.ru/tury-v-tynis','flag'=>'https://tez-tourspb.ru/wp-content/uploads/i-2.webp'],
  ['title'=>'Шри-Ланка','url'=>'https://tez-tourspb.ru/tury-na-shri-lanku','flag'=>'https://tez-tourspb.ru/wp-content/uploads/scale_1200-1-150x150.png'],
];
?>

<header class="tt-header" role="banner">
  <div class="tt-topbar">
    <div class="tt-topbar__inner tt-container">
      <div class="tt-topbar__addr"><?php echo esc_html($address); ?></div>

      <nav class="tt-topbar__links" aria-label="Быстрые ссылки">
        <a href="/o-nas">О нас</a>
        <a href="/gde-my">Контакты</a>
      </nav>

      <div class="tt-topbar__right">
        <div class="tt-topbar__icon">
          <a href="<?php echo esc_url($telegram_link); ?>" target="_blank" rel="noopener">
            <img src="https://tez-tourspb.ru/wp-content/uploads/telegram_icon_130816.png" alt="Telegram">
          </a>
        </div>
        <div class="tt-topbar__icon">
          <a href="<?php echo esc_url($whatsapp_link); ?>" target="_blank" rel="noopener">
            <img src="https://tez-tourspb.ru/wp-content/uploads/whatsapp_logo_icon_189219.png" alt="WhatsApp">
          </a>
        </div>
        <a class="tt-topbar__tel" href="tel:<?php echo esc_attr($phone_clean); ?>"><?php echo esc_html($phone_display); ?></a>
      </div>
    </div>
  </div>

  <div class="tt-header__bar">
    <div class="tt-header__inner tt-container">
      <div class="tt-header__logo">
        <?php if (function_exists('the_custom_logo') && has_custom_logo()): ?>
          <?php the_custom_logo(); ?>
        <?php else: ?>
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url('https://tez-tourspb.ru/wp-content/uploads/logo-new.png'); ?>" alt="<?php bloginfo('name'); ?>">
          </a>
        <?php endif; ?>
      </div>

      <nav class="tt-nav" id="tt-nav" aria-label="Главное меню">
        <?php
          wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'fallback_cb'    => '__return_false',
            'menu_class'     => 'tt-nav__list',
            'depth'          => 2,
          ]);
        ?>
      </nav>

      <div class="tt-header__cta">
        <button
          class="tt-cta__btn"
          type="button"
          data-tt-open="ttModal"
          data-tt-title="Подобрать тур"
          data-tt-desc="Мы подберем от пяти вариантов туров с проверенными отелями и лучшей стоимостью"
        >Подобрать тур</button>
      </div>

      <button class="tt-burger" type="button" aria-label="Открыть меню" aria-expanded="false" aria-controls="tt-nav">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>

  <div class="tt-countries" aria-label="Популярные направления">
    <div class="tt-countries__inner tt-container">
      <div class="tt-countries__panel">
        <div class="tt-countries__title">Популярные направления</div>
        <ul class="tt-countries__grid">
          <?php foreach ($countries as $country): ?>
            <li>
              <a href="<?php echo esc_url($country['url']); ?>">
                <img src="<?php echo esc_url($country['flag']); ?>" alt="<?php echo esc_attr($country['title']); ?>">
                <span><?php echo esc_html($country['title']); ?></span>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
        <a class="tt-countries__all" href="https://tez-tourspb.ru/tury-po-country">Все страны</a>
      </div>
    </div>
  </div>
</header>

<!-- Модалка «Подобрать тур» (использует стили mp-order/*) -->
<div class="tt-modal" id="ttModal" role="dialog" aria-modal="true" aria-hidden="true">
  <div class="tt-modal__backdrop" data-tt-close></div>
  <div class="tt-modal__dialog">
    <button class="tt-modal__close" type="button" data-tt-close aria-label="Закрыть"></button>

    <div class="mp-order">
      <div class="mp-order-form">
        <div class="mp-modal-header">
          <div class="mp-modal-title">Подобрать тур</div>
          <div class="mp-modal-desc">Мы подберем от пяти вариантов туров с проверенными отелями и лучшей стоимостью</div>
        </div>

        <?php
        // CF7 форма «Подобрать тур». Поля (Имя, Телефон, чекбокс согласия) уже в шорткоде.
        echo do_shortcode('[contact-form-7 id="da991d3" title="Подобрать тур"]');
        ?>
      </div>
    </div>

  </div>
</div>
