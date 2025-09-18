<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
<?php
  global $page, $paged;
  wp_title( '|', true, 'right' );
  if ( $paged >= 2 || $page >= 2 ) {
    echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
  }
?>
</title>

<!-- Стили -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="all" />
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/lightbox.css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/flexslider.css" media="screen" />

<?php wp_head(); ?>

<!-- Тяжёлые скрипты — неблокирующие -->
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/lightbox.js" defer></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/flexslider.js" defer></script>

<!-- Инициализация слайдера после готовности DOM + наличия jQuery и плагина -->
<script defer>
(function(){
  function ready(fn){
    if (document.readyState !== 'loading') fn();
    else document.addEventListener('DOMContentLoaded', fn);
  }
  function isBad(val){
    if (val == null) return true;
    var s = String(val).trim();
    return !s || s === 'undefined' || s === 'null' || /^undefined(?:$|[?#/])/.test(s);
  }
  ready(function(){
    var tries = 0;
    (function wait(){
      tries++;
      var $ = window.jQuery;
      if ($ && $.fn && $.fn.flexslider) {
        try {
          var $slides = $('.slide-image');
          if ($slides.length){
            $slides.each(function(){
              var el  = this; if (!el) return;
              var bg  = $(el).data('bg');
              var pos = $(el).data('flex-start') || 'center center';
              if (!isBad(bg)) {
                el.style.backgroundImage  = 'url("' + bg + '")';
                el.style.backgroundSize   = 'cover';
                el.style.backgroundRepeat = 'no-repeat';
                el.style.backgroundPosition = 'center';
                el.style.transformOrigin  = pos;
              }
              var img = el.querySelector('img');
              if (img) {
                var src = img.getAttribute('src');
                if (isBad(src)) img.removeAttribute('src');
              }
            });
          }
          var $fs = $('.flex-slider');
          if ($fs.length) {
            $fs.flexslider({ animation: 'fade', animationLoop: true, slideshowSpeed: 7000, controlNav: true, directionNav: true });
          }
        } catch(e){ /* noop */ }
      } else if (tries < 60) {
        setTimeout(wait, 100);
      }
    })();
  });
})();
</script>

<!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" media="screen">
<![endif]-->
	
</head>

<body<?php echo ($_SERVER['REQUEST_URI']=="/" ? " class='home'" : ""); ?>>
<div class="main_body">
  <header>
    <div class="main">
      <div class="logo"><a href="/"></a></div>

      <div class="adress">
        Санкт-Петербург,<br><span>Московский пр. 216, офис 9</span>
        <div class="phones mobf_t"><a href="tel:8126436564"><span>(812)</span> 64-365-64</a></div>
      </div>

      <div class="d_f">
        <div class="head-contackt">
          <div class="phones desc_t"><a href="tel:8126436564"><span>(812)</span> 64-365-64</a></div>
        </div>

        <div class="soc_top desc_t">
          <div class="tel_soc"><a href="https://t.me/+79817010302"><img src="/wp-content/uploads/telegram_icon_130816.png" alt=""></a></div>
          <div><a href="https://wa.me/79817010302?text=%D0%94%D0%BE%D0%B1%D1%80%D1%8B%D0%B9%20%D0%94%D0%B5%D0%BD%D1%8C!%20%D0%A5%D0%BE%D1%87%D1%83%20%D0%BF%D0%BE%D0%B4%D0%BE%D0%B1%D1%80%D0%B0%D1%82%D1%8C%20%D1%82%D1%83%D1%80"><img src="/wp-content/uploads/whatsapp_logo_icon_189219.png" alt=""></a></div>
        </div>

        <div class="ordercall_button">
          <p>Подберем выгодный тур<br> онлайн без переплат</p>
          <div class="soc_top mobf_t">
            <div class="tel_soc"><a href="https://t.me/+79817010302"><img src="/wp-content/uploads/telegram_icon_130816.png" alt=""></a></div>
            <div><a href="https://wa.me/79817010302?text=%D0%94%D0%BE%D0%B1%D1%80%D1%8B%D0%B9%20%D0%94%D0%B5%D0%BD%D1%8C!%20%D0%A5%D0%BE%D1%87%D1%83%20%D0%BF%D0%BE%D0%B4%D0%BE%D0%B1%D1%80%D0%B0%D1%82%D1%8C%20%D1%82%D1%83%D1%80"><img src="/wp-content/uploads/whatsapp_logo_icon_189219.png" alt=""></a></div>
          </div>
          <a href="#" id="go">Заказать звонок</a>
		 
			
			
        </div>
      </div>

      <nav>
        <?php wp_nav_menu(); ?>
        <button class="nav-tgl menu-toggle" type="button" aria-label="toggle menu"><span aria-hidden="true"></span></button>
      </nav>
    </div>
  </header>

  <div id="modal_form">
    <span id="modal_close">X</span>
    <div class="g__htext">Заказать звонок</div>
    <p class="p_modal">Оставьте заявку, и мы с вами свяжемся</p>
    <?php echo do_shortcode('[contact-form-7 title="Заказать звонок"]'); ?>
  </div>

  <div id="modal_form_slider">
    <span id="modal_close_slider">X</span>
    <div class="g__htext">ОСТАВИТЬ ЗАЯВКУ</div>
    <p class="p_modal">Оставьте заявку, и мы с вами свяжемся</p>
    <?php echo do_shortcode('[contact-form-7 title="Оставить заявку слайдер"]'); ?>
  </div>

  <div id="overlay"></div>

  <?php if (!is_home()) : ?>
    <section><div class="main">
  <?php else: ?>
    <section class="bn___top"><div class="main">
  <?php endif; ?>

<!-- CF7: клики по ссылке внутри label не ломают чекбокс -->
<script>
  document.addEventListener('click', function (e) {
    var a = e.target.closest('.wpcf7-list-item-label a');
    if (a) e.stopPropagation();
  });
</script>

<!-- Управление попапом заказа звонка -->
<script>
document.addEventListener('DOMContentLoaded', function(){
  var btn = document.getElementById('go');
  var modal = document.getElementById('mpCallModal');

  function openModal(){
    if(modal) modal.setAttribute('aria-hidden','false');
    document.documentElement.style.overflow='hidden';
  }
  function closeModal(){
    if(modal) modal.setAttribute('aria-hidden','true');
    document.documentElement.style.overflow='';
  }

  if(btn){
    btn.addEventListener('click', function(e){
      e.preventDefault();
      openModal();
    });
  }

  if(modal){
    modal.addEventListener('click', function(e){
      if(e.target.matches('[data-mp-close], .mp-modal-backdrop')) closeModal();
    });
  }
  document.addEventListener('keydown', function(e){
    if(e.key==='Escape' && modal && modal.getAttribute('aria-hidden')==='false') closeModal();
  });
});
</script>
