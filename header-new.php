<?php
if (!defined('ABSPATH')) {
    exit;
}

$phone_display = '+7 (812) 643-65-64';
$phone_clean   = preg_replace('~[^0-9+]~', '', $phone_display);
$whatsapp_link = 'https://wa.me/79817010302?text=%D0%94%D0%BE%D0%B1%D1%80%D1%8B%D0%B9%20%D0%94%D0%B5%D0%BD%D1%8C!%20%D0%A5%D0%BE%D1%87%D1%83%20%D0%BF%D0%BE%D0%B4%D0%BE%D0%B1%D1%80%D0%B0%D1%82%D1%8C%20%D1%82%D1%83%D1%80';
$telegram_link = 'https://t.me/+79817010302';
$address       = 'Санкт-Петербург, Московский пр. 216, офис 9';

$countries = [
    ['title' => 'Турция',     'url' => '/category/strany/turtsiya/',     'flag' => 'https://tez-tourspb.ru/wp-content/uploads/flags/turkey.svg'],
    ['title' => 'Египет',     'url' => '/category/strany/egipet/',       'flag' => 'https://tez-tourspb.ru/wp-content/uploads/flags/egypt.svg'],
    ['title' => 'Тайланд',    'url' => '/category/strany/tailand/',      'flag' => 'https://tez-tourspb.ru/wp-content/uploads/flags/thailand.svg'],
    ['title' => 'ОАЭ',        'url' => '/category/strany/oae/',          'flag' => 'https://tez-tourspb.ru/wp-content/uploads/flags/uae.svg'],
    ['title' => 'Тунис',      'url' => '/category/strany/tunis/',        'flag' => 'https://tez-tourspb.ru/wp-content/uploads/flags/tunisia.svg'],
    ['title' => 'Шри-Ланка',  'url' => '/category/strany/shri-lanka/',   'flag' => 'https://tez-tourspb.ru/wp-content/uploads/flags/sri-lanka.svg'],
    ['title' => 'Мальдивы',   'url' => '/category/strany/maldivy/',      'flag' => 'https://tez-tourspb.ru/wp-content/uploads/flags/maldives.svg'],
    ['title' => 'Греция',     'url' => '/category/strany/gretsiya/',     'flag' => 'https://tez-tourspb.ru/wp-content/uploads/flags/greece.svg'],
    ['title' => 'Кипр',       'url' => '/category/strany/kipr/',         'flag' => 'https://tez-tourspb.ru/wp-content/uploads/flags/cyprus.svg'],
    ['title' => 'Вьетнам',    'url' => '/category/strany/vetnam/',       'flag' => 'https://tez-tourspb.ru/wp-content/uploads/flags/vietnam.svg'],
    ['title' => 'Индонезия',  'url' => '/category/strany/indoneziya/',   'flag' => 'https://tez-tourspb.ru/wp-content/uploads/flags/indonesia.svg'],
    ['title' => 'Доминикана', 'url' => '/category/strany/dominikana/',   'flag' => 'https://tez-tourspb.ru/wp-content/uploads/flags/dominicana.svg'],
];
?>

<header class="tt-header" role="banner">
  <div class="tt-topbar">
    <div class="tt-topbar__inner tt-container">
      <div class="tt-topbar__addr"><?php echo esc_html($address); ?></div>
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
            <img src="<?php echo esc_url('https://tez-tourspb.ru/wp-content/uploads/logo-h_11-1-1.png'); ?>" alt="<?php bloginfo('name'); ?>">
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
        <button class="tt-cta__btn" type="button" data-tt-open="ttModal">Подобрать тур</button>
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
        <a class="tt-countries__all" href="/category/strany/">Все направления</a>
      </div>
    </div>
  </div>
</header>

<div class="tt-modal" id="ttModal" role="dialog" aria-modal="true" aria-hidden="true">
  <div class="tt-modal__backdrop" data-tt-close></div>
  <div class="tt-modal__dialog">
    <button class="tt-modal__close" type="button" data-tt-close aria-label="Закрыть"></button>
    <?php echo do_shortcode('[contact-form-7 id="da991d3" title="Подобрать тур"]'); ?>
  </div>
</div>
