<!-- Попап квиза -->
<div id="quiz-modal" class="tezquiz-modal" aria-hidden="true">
  <div class="tezquiz-backdrop" data-quiz-close></div>
  <section class="quiz">
    <button class="mfp-close" type="button" aria-label="Закрыть" data-quiz-close>×</button>
    <div class="quiz__form" id="quiz-form" role="group" aria-label="Квиз подбора тура">
      <div class="quiz__steps">
        <div class="quiz__step active" data-consultant="Укажите, сколько ночей Вы хотели бы отдохнуть?">
          <div class="quiz__titlecnt"><div class="quiz__title">СКОЛЬКО НОЧЕЙ ПЛАНИРУЕТЕ ОТДЫХАТЬ?</div></div>
          <div class="quiz__content">
            <label class="quiz__radio radio"><input type="radio" name="step1" value="Меньше 5"><span>Меньше 5</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step1" value="5-7 Ночей"><span>5-7 Ночей</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step1" value="7-9 Ночей"><span>7-9 Ночей</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step1" value="10+ Ночей"><span>10+ Ночей</span></label>
          </div>
        </div>
        <div class="quiz__step" data-consultant="Расскажите, сколько будет взрослых участников поездки?">
          <div class="quiz__titlecnt"><div class="quiz__title">СКОЛЬКО ВЗРОСЛЫХ ЕДЕТ?</div></div>
          <div class="quiz__content">
            <label class="quiz__radio radio"><input type="radio" name="step2" value="1 взрослый "><span>1 взрослый </span></label>
            <label class="quiz__radio radio"><input type="radio" name="step2" value="2 взрослых"><span>2 взрослых</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step2" value="3 взрослых"><span>3 взрослых</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step2" value="4 взрослых и более"><span>4 взрослых и более</span></label>
          </div>
        </div>
        <div class="quiz__step" data-consultant="Поедут ли с вами дети и сколько?">
          <div class="quiz__titlecnt"><div class="quiz__title">СКОЛЬКО ЕДЕТ ДЕТЕЙ</div></div>
          <div class="quiz__content">
            <label class="quiz__radio radio"><input type="radio" name="step3" value="Без детей"><span>Без детей</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step3" value="1 ребенок"><span>1 ребенок</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step3" value="2 ребенка"><span>2 ребенка</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step3" value="3 ребенка и более"><span>3 ребенка и более</span></label>
          </div>
        </div>
        <div class="quiz__step" data-consultant="Расскажите, на какие даты планируете поездку?">
          <div class="quiz__titlecnt"><div class="quiz__title">КОГДА ПЛАНИРУЕТЕ ПОЕЗДКУ?</div></div>
          <div class="quiz__content">
            <label class="quiz__radio radio"><input type="radio" name="step4" value="Ближайшие даты"><span>Ближайшие даты</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step4" value="Через 2-5 недель"><span>Через 2-5 недель</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step4" value="Смотрю на перспективу"><span>Смотрю на перспективу</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step4" value="Пока не знаем"><span>Пока не знаем</span></label>
          </div>
        </div>
        <div class="quiz__step" data-consultant="Выберите планируемый бюджет на человека">
          <div class="quiz__titlecnt"><div class="quiz__title">ВЫБЕРИТЕ ПЛАНИРУЕМЫЙ БЮДЖЕТ</div></div>
          <div class="quiz__content">
            <label class="quiz__radio radio"><input type="radio" name="step5" value="До 100 000 руб"><span>До 150 000 руб</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step5" value="100 000 - 200 000 руб"><span>от 150 000 до 300 000 руб</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step5" value="200 000 руб и выше"><span>от 300 000 руб и выше</span></label>
          </div>
        </div>
        <div class="quiz__step" data-consultant="Есть ли у вас предпочтения по питанию">
          <div class="quiz__titlecnt"><div class="quiz__title">ЕСТЬ ЛИ ПОЖЕЛАНИЯ ПО ПИТАНИЮ?</div></div>
          <div class="quiz__content">
            <label class="quiz__radio radio"><input type="radio" name="step6" value="Все включено!"><span>Все включено!</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step6" value="Только завтраки"><span>Только завтраки</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step6" value="Завтрак и ужин"><span>Завтрак и ужин</span></label>
            <label class="quiz__radio radio"><input type="radio" name="step6" value="Завтра, обед и ужин"><span>Завтра, обед и ужин</span></label>
          </div>
        </div>

        <div class="quiz-final" data-consultant="Оставьте номер WhatsApp, и мы пришлём подборку">
          <span class="quiz-final__title">Спасибо, вся информация принята!</span>
          <p class="quiz-final__text">Оставьте свой номер и наш менеджер отправит варианты туров:</p>
          <div class="quiz-final__form">
            <div class="quiz-final__socials">
           
                <img src="https://tours.turotdel.com/wp-content/uploads/2023/05/tel-icon.svg" alt="иконка">
              
              
                <img src="https://tours.turotdel.com/wp-content/uploads/2023/05/whatsapp.svg" target="_blank" class="quiz-final__soc" alt="иконка">
              
            </div>
            <div class="quiz-final__cf7">
              <?php echo do_shortcode('[contact-form-7 title="Получить подборку"]'); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="quiz__controller">
        <div class="quiz__progress">
          <div class="quiz__result">Готово <span id="quiz-result">0%</span></div>
          <div class="quiz__bar"><span id="quiz-bar-progress" style="width:0%;"></span></div>
        </div>
        <div class="quiz__actions">
          <button class="quiz__prev" id="quiz-prev" disabled type="button" aria-label="Назад">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M9.75584 4.41083C10.0813 4.73626 10.0813 5.2639 9.75584 5.58934L6.17843 9.16675H15.8333C16.2935 9.16675 16.6666 9.53984 16.6666 10.0001C16.6666 10.4603 16.2935 10.8334 15.8333 10.8334H6.17843L9.75584 14.4108C10.0813 14.7363 10.0813 15.2639 9.75584 15.5893C9.4304 15.9148 8.90277 15.9148 8.57733 15.5893L3.57733 10.5893C3.42105 10.4331 3.33325 10.2211 3.33325 10.0001C3.33325 9.77907 3.42105 9.56711 3.57733 9.41083L8.57733 4.41083C8.90277 4.08539 9.4304 4.08539 9.75584 4.41083Z" fill="#BDC6D7"/>
            </svg>
          </button>
          <div class="quiz__btn">
            <button class="quiz__next" id="quiz-next" type="button" disabled>Далее</button>
            <span class="quiz__enter">Или нажмите Enter</span>
          </div>
        </div>
      </div>
    </div>

    <aside class="quiz__sidebar">
      <div class="quiz__consultant">
        <figure class="quiz__img">
          <img width="300" height="300" src="https://tez-tourspb.ru/wp-content/uploads/man.jpg"
               class="attachment-medium size-medium" alt="" loading="lazy">
        </figure>
        <div class="quiz__consultantinfo">
          <span class="quiz__name">Иванова Екатерина</span><br>
          <span class="quiz__sub">Эксперт по подбору туров</span>
        </div>
      </div>
      <div class="quiz__message">Выберите на сколько дней планируете путешествие</div>
      <div class="quiz__present">
        <figure class="qiuz__presentimg">
          <img width="57" height="56" src="https://tours.turotdel.com/wp-content/webp-express/webp-images/uploads/2023/05/fire.png.webp" class="attachment-medium size-medium" alt="" loading="lazy">
        </figure>
        <span>Подборка горящих туров</span>
      </div>
    </aside>
  </section>
</div>
<!-- END Попап квиза -->
