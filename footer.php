			<div class="clear"></div>
		</div>
	</section>
	<footer>
		<div class="main">
			<div class="copyright">
				&copy; 2012 - <?php echo date("Y"); ?> ТЕЗ ТУР в СПб<br />Все права защищены<br><br>
				<a href="https://tez-tourspb.ru/politika-obrabotki-personalnyx-dannyx" target="_blank" rel="nofollow noopener">Политика обработки персональных данных</a>
			</div>

			<nav><?php wp_nav_menu( array('menu' => 'Нижнее меню' )); ?></nav>

			<div class="counters">
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};m[i].l=1*new Date();
for (var j=0;j<document.scripts.length;j++){if (document.scripts[j].src===r){return;}}
k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
(window,document,"script","https://mc.yandex.ru/metrika/tag.js","ym");
ym(31884121,"init",{clickmap:true,trackLinks:true,accurateTrackBounce:true,webvisor:true});
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/31884121" style="position:absolute; left:-9999px;" alt=""/></div></noscript>
<!-- /Yandex.Metrika counter -->
			</div>

			<div class="socset">
				<a class="socset_1" href="https://vk.com/saletury" target="_blank" rel="nofollow noopener"></a>
			</div>

			<div class="sozdatel">
				Продвижение сайта <a href="https://oscarlab.ru/" target="_blank" rel="nofollow noopener">OscarLab</a>
			</div>
		</div>
	</footer>
</div>
<?php wp_footer(); ?>


<script>
// После загрузки DOM (jQuery уже в футере)
document.addEventListener('DOMContentLoaded', function(){
  (function($){
    // Sletat frame width fix
    $('iframe.sletat-frame').css('max-width','inherit');

    // Заказать звонок — открыть
    $('.ordercall_button a').on('click', function(e){
      e.preventDefault();
      $('#ordercall_block .wpcf7-text').removeClass('wpcf7-not-valid');
      $('#ordercall_block .wpcf7-response-output').hide();
      $('#ordercall_block').fadeIn(250);
      $('#ordercall_block .ordercall_form').animate({opacity:1,right:'50%',top:'50%'},250);
    });
    // Закрыть модалки
    $('#ordercall_block .ordercall_close, #ordercall_block .ordercall_plashka').on('click', function(){
      $('#ordercall_block').fadeOut(250);
      $('#ordercall_block .ordercall_form').animate({opacity:0,right:'-50%',top:'-50%'},250);
    });

    // Каталог — заявка
    $('.catalog_form .ordertour_button').on('click', function(e){
      e.preventDefault();
      $('#ordertour_block #ot_yourtour').attr('readonly','readonly');
      $('#ordertour_block .wpcf7-text').removeClass('wpcf7-not-valid');
      $('#ordertour_block .wpcf7-response-output').hide();
      var title = $(this).prev().val();
      $('#ordertour_block #ot_yourtour').val(title);
      $('#ordertour_block').fadeIn(250);
      $('#ordertour_block .ordertour_form').animate({opacity:1,right:'50%',top:'50%'},250);
    });
    $('#ordertour_block .ordertour_close, #ordertour_block .ordertour_plashka').on('click', function(){
      $('#ordertour_block').fadeOut(250);
      $('#ordertour_block .ordertour_form').animate({opacity:0,right:'-50%',top:'-50%'},250);
    });

    // Mobile menu
    var toggled=false;
    var nav=document.getElementsByClassName('menu-glavnyj-menyu-container')[0];
    var btn=document.getElementsByClassName('nav-tgl')[0];
    if (btn && nav) {
      btn.onclick=function(evt){
        toggled=!toggled;
        evt.target.classList.toggle('toggled', toggled);
        nav.classList.toggle('open-menu', toggled);
      };
    }
  })(jQuery);
});
</script>

<!-- Cookie Banner -->
<div id="cookie-banner">
  Мы используем файлы cookie для улучшения работы сайта.
  Продолжая использовать сайт, вы соглашаетесь с 
  <a href="https://tez-tourspb.ru/soglasie-na-obrabotku-personalnyx-dannyx" target="_blank" rel="nofollow noopener">
    политикой обработки персональных данных
  </a><br>
  <button id="accept-cookies">Принять</button>
</div>

<style>
#cookie-banner{position:fixed;bottom:20px;right:50px;max-width:300px;background:#fff;color:#000;border:1px solid #000;padding:15px;z-index:9999;display:none;font-size:14px;box-sizing:border-box;word-wrap:break-word;border-radius:6px;box-shadow:0 2px 8px rgba(0,0,0,.2)}
#cookie-banner button{margin-top:10px;padding:5px 10px;border:none;background:#000;color:#fff;cursor:pointer}
@media (max-width:600px){#cookie-banner{left:50%;right:auto;transform:translateX(-50%);width:90%;max-width:none}}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const banner = document.getElementById("cookie-banner");
  const btn = document.getElementById("accept-cookies");
  if (!localStorage.getItem("cookiesAccepted")) banner.style.display = "block";
  btn.addEventListener("click", function () {
    localStorage.setItem("cookiesAccepted", "1");
    banner.style.display = "none";
  });
});
</script>
<!-- End Cookie Banner -->

<!-- Квиз: инициализация -->
<script>
(function(){
  let inited = false;
  function init(){
    if (inited) return;
    inited = true;
    document.body.dataset.quizInit = '1';

    try {
      const modal = document.getElementById('quiz-modal');
      const openBtn = document.getElementById('open-quiz');
      if (!modal || !openBtn) return;

      const closeEls = modal.querySelectorAll('[data-quiz-close]');
      const steps = Array.from(modal.querySelectorAll('.quiz__step'));
      const finalStep = modal.querySelector('.quiz-final');
      const prev = modal.querySelector('#quiz-prev');
      const next = modal.querySelector('#quiz-next');
      const resultBox = modal.querySelector('.quiz__result');
      const resBar = modal.querySelector('#quiz-bar-progress');
      const bubbleEl = modal.querySelector('#quiz-bubble') || modal.querySelector('.quiz__message');
      const cf7Wrap = modal.querySelector('.quiz-final__cf7');

      const Q_COUNT = steps.length;
      let current = 0;

      const bubbles = [
        'Чтобы прикинуть длительность перелёта и бюджет — сколько ночей комфортно для вас?',
        'От этого зависят билеты и тип номера — сколько взрослых едет?',
        'Если с детьми — подберу family-friendly отели. Сколько детей?',
        'Когда ориентировочно хотите вылететь? Подберу оптимальные даты.',
        'Сориентируйте по бюджету на человека — предложу лучшие варианты без «лишнего».',
        'Какое питание предпочитаете? Так быстрее отфильтрую подходящие отели.'
      ];

      function openQuiz(e){ if(e) e.preventDefault(); modal.classList.add('is-open'); document.body.style.overflow='hidden'; setState(); }
      function closeQuiz(){ modal.classList.remove('is-open'); document.body.style.overflow=''; }

      openBtn.addEventListener('click', openQuiz);
      closeEls.forEach(el=>el.addEventListener('click', closeQuiz));
      document.addEventListener('keydown', e=>{ if(e.key==='Escape' && modal.classList.contains('is-open')) closeQuiz(); });

      function setState(){
        steps.forEach((s,i)=>s.classList.toggle('active', i===current));
        finalStep.classList.toggle('active', current===Q_COUNT);

        let percent, label;
        if (current === Q_COUNT) {
          label = 'Остался последний шаг';
          percent = 95;
          resBar && resBar.classList.add('bar-animated');
          injectAnswersToCF7();
          relaxNativeValidation();
          initPhoneMask();
        } else {
          label = 'Готово';
          percent = Math.round((current / Q_COUNT) * 100);
          resBar && resBar.classList.remove('bar-animated');
        }

        if (resultBox) {
          const span = resultBox.querySelector('#quiz-result');
          if (!span) resultBox.innerHTML = label + ' <span id="quiz-result"></span>';
          else if (resultBox.firstChild && resultBox.firstChild.nodeType === 3) {
            resultBox.firstChild.textContent = label + ' ';
          } else {
            resultBox.innerHTML = label + ' <span id="quiz-result"></span>';
          }
        }
        const resultSpanEl = modal.querySelector('#quiz-result');
        if (resultSpanEl) resultSpanEl.textContent = percent + '%';
        if (resBar) resBar.style.width = percent + '%';

        prev && (prev.disabled = (current===0));
        if (next){
          if (current < Q_COUNT) {
            const checked = steps[current].querySelector('input[type="radio"]:checked');
            next.disabled = !checked;
            next.style.display = 'inline-flex';
          } else {
            next.style.display = 'none';
          }
        }

        if (bubbleEl) bubbleEl.textContent = (current < Q_COUNT) ? bubbles[current] : 'Отлично! Оставьте номер WhatsApp — пришлём подборку.';
        highlightSelected();
      }

      function highlightSelected(){
        if (current >= Q_COUNT) return;
        steps[current].querySelectorAll('.radio').forEach(card=>card.classList.remove('selected'));
        const checked = steps[current].querySelector('input[type="radio"]:checked');
        if (checked) checked.closest('.radio').classList.add('selected');
      }

      function go(n){
        current = Math.max(0, Math.min(Q_COUNT, n));
        setState();
      }

      steps.forEach((step, idx)=>{
        step.querySelectorAll('.radio').forEach(card=>{
          const input = card.querySelector('input[type="radio"]');
          card.addEventListener('click', ()=>{
            input.checked = true;
            highlightSelected();
            next && (next.disabled = false);
            setTimeout(()=>go(idx+1), 120);
          });
        });
        step.addEventListener('change', ()=>{
          const checked = step.querySelector('input[type="radio"]:checked');
          next && (next.disabled = !checked);
          highlightSelected();
        });
        step.addEventListener('keydown', (e)=>{
          if (e.key === 'Enter') {
            const checked = step.querySelector('input[type="radio"]:checked');
            if (checked) { e.preventDefault(); go(idx+1); }
          }
        });
      });

      prev && prev.addEventListener('click', ()=>go(current-1));
      next && next.addEventListener('click', ()=>go(current+1));

      function collectAnswers(){
        const data = {};
        for(let i=1;i<=Q_COUNT;i++){
          const c = modal.querySelector(`input[name="step${i}"]:checked`);
          data[`quiz_step${i}`] = c ? c.value : '';
        }
        data['quiz_title'] = document.title || 'Квиз — подборка туров';
        return data;
      }
      function injectAnswersToCF7(){
        const form = cf7Wrap && cf7Wrap.querySelector('form');
        if (!form) return;
        const answers = collectAnswers();
        Object.keys(answers).forEach(name=>{
          const input = form.querySelector(`[name="${name}"]`);
          if (input) input.value = answers[name];
        });
      }

      function relaxNativeValidation(){
        const form = cf7Wrap && cf7Wrap.querySelector('form');
        if (!form) return;
        form.setAttribute('novalidate','novalidate');
        form.querySelectorAll('[required],[pattern]').forEach(el=>{
          el.removeAttribute('required'); el.removeAttribute('pattern');
        });
        form.querySelectorAll('input[type="checkbox"][name^="privacy_policy"]').forEach(cb=>{
          cb.required = false; cb.removeAttribute('required');
        });
      }

      let maskInitialized = false;
      function initPhoneMask(){
        if (maskInitialized) return;
        const form = cf7Wrap && cf7Wrap.querySelector('form');
        if (!form) return;
        const input = form.querySelector('input[type="tel"][name="quiz-phone"]');
        if (!input) return;

        const MAX_LEN = 18;
        const digitsOnly = v => (v || '').replace(/\D/g,'');
        const formatDigits = d => {
          if (d.startsWith('8')) d = '7' + d.slice(1);
          if (!d.startsWith('7')) d = '7' + d.replace(/^7/,'');
          d = d.slice(0,11);
          let out = '+7 (';
          if (d.length > 1) out += d.slice(1,4);
          if (d.length >= 4) out += ') ';
          if (d.length > 4)  out += d.slice(4,7);
          if (d.length > 7)  out += '-' + d.slice(7,9);
          if (d.length > 9)  out += '-' + d.slice(9,11);
          return out;
        };
        const reformat = () => {
          if (input.maxLength !== MAX_LEN) input.setAttribute('maxlength', String(MAX_LEN));
          input.removeAttribute('pattern');
          input.setAttribute('inputmode','numeric'); input.setAttribute('autocomplete','tel');
          const d = digitsOnly(input.value);
          input.value = formatDigits(d);
          try { input.setSelectionRange(input.value.length, input.value.length); } catch(e){}
        };
        input.addEventListener('focus', ()=>{
          if (!input.value || !input.value.startsWith('+7 (')) input.value = '+7 (';
          reformat();
        });
        input.addEventListener('input', reformat);
        input.addEventListener('paste', (e)=>{
          e.preventDefault();
          const text = (e.clipboardData || window.clipboardData).getData('text') || '';
          input.value = formatDigits(digitsOnly(text));
          try { input.setSelectionRange(input.value.length, input.value.length); } catch(e){}
        });
        input.addEventListener('blur', ()=>{
          const d = digitsOnly(input.value);
          if (d.length <= 1) input.value = '';
        });
        input.setAttribute('maxlength', String(MAX_LEN));
        input.setAttribute('inputmode','numeric');
        input.setAttribute('autocomplete','tel');
        maskInitialized = true;
      }

      document.addEventListener('wpcf7mailsent', function (event) {
        const form = cf7Wrap ? cf7Wrap.querySelector('form') : null;
        if(form && event.target === form){
          closeQuiz();
          setTimeout(()=>alert('Спасибо! Мы свяжемся с вами в WhatsApp.'), 50);
        }
      }, false);

      setState();
    } catch(err){
      console.error('TEZ-QUIZ init error:', err);
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init, { once:true });
  } else {
    init();
  }
  window.addEventListener('pageshow', () => { if (!document.body.dataset.quizInit) init(); }, { once:true });
  setTimeout(() => { if (!document.body.dataset.quizInit) init(); }, 5000);
})();
</script>
<!-- END Квиз -->

<script>
(function(){
  var rx=/\/undefined(?:$|[?#])/i;
  if (window.fetch) {
    var _fetch=window.fetch;
    window.fetch=function(i,o){
      var u=(typeof i==='string')?i:(i&&i.url)||'';
      if(rx.test(String(u))){ return Promise.resolve(new Response('',{status:204})); }
      return _fetch.apply(this,arguments);
    };
  }
  var _open=XMLHttpRequest.prototype.open;
  XMLHttpRequest.prototype.open=function(m,u){
    if (u && rx.test(String(u))) { u = location.href; }
    return _open.apply(this, arguments);
  };
  // подчистим очевидное из DOM
  document.querySelectorAll('[src],[href],[poster]').forEach(function(el){
    ['src','href','poster'].forEach(function(a){
      var v=el.getAttribute(a);
      if (v && rx.test(v)) el.removeAttribute(a);
    });
  });
})();
</script>




</body>
</html>
