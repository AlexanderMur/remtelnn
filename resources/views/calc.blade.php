<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('dist/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
</head>
<body class="abtester">
<section id="price" class="bg2">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div id="myProgressbar" class="progress">
                    <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="progress-bar"><span
                                class="sr-only"> </span></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="container_calc">
                    <!-- Первый уровень-->
                    <div class="padding">
                        <div id="hashNav">
                            <div class="flex"><p data-href="1" data-toggle="progressbar" data-target="#myProgressbar"
                                                 data-value="0"
                                                 class="link_href hidden_nav"><img src="{{asset('uploads/')}}/svg/arrow.svg" alt="">В
                                    начало</p>
                                <p data-href="2" data-toggle="progressbar" data-target="#myProgressbar" data-value="20"
                                   class="link_href hidden_nav"><img src="{{asset('uploads/')}}/svg/arrow.svg" alt="">Модели</p>
                                <p data-href="3" data-toggle="progressbar" data-target="#myProgressbar" data-value="60"
                                   class="link_href hidden_nav"><img src="{{asset('uploads/')}}/svg/arrow.svg" alt="">Поломки</p>
                                <p data-href="4" data-toggle="progressbar" data-target="#myProgressbar" data-value="60"
                                   class="link_href hidden_nav displayhash"><img src="{{asset('uploads/')}}/svg/arrow.svg" alt="">Дисплей
                                </p></div>
                        </div>
                        <div data-view="start_view" data-lvl="1" class="block_start views"><h2><span class="bold">Выберите устройство, которое необходимо отремонтировать</span>
                            </h2>
                            <div class="desc">Расчет стоимости производится онлайн, цены фиксированны и не меняются в
                                ходе работ
                            </div>
                            <div class="btn-groups" >

                                @foreach($cats as $cat)

                                    <div class="block">
                                        <img src="{{asset($cat->image)}}" alt=""
                                             class="img-responsive hidden-xs center-block">
                                        <button data-btn="{{$cat->name}}" data-toggle="progressbar"
                                                data-target="#myProgressbar" data-value="{{$cat->devices->isNotEmpty() ? 30 : 'finish'}}"
                                                class="nav_btn device_target">{{$cat->name}}
                                        </button>
                                    </div>

                                @endforeach

                            </div>
                        </div>
                        <!-- Второй уровень-->

                        @foreach ($cats as $cat)

                            @if ($cat->devices->isNotEmpty())

                            <div data-view="{{$cat->name}}_view" data-lvl="2" class="block_iphone views faded"><h2><span
                                            class="bold">Выберите модель</span>
                                </h2>
                                <div class="wrapper">
                                <div class="btn-groups">

                                    @foreach ($cat->devices->sortBy('order') as $device)

                                        <div class="block">
                                            <button data-btn="{{$cat->name}}_breaking" data-toggle="progressbar"
                                                    data-target="#myProgressbar"
                                                    data-value="60" data-model="{{$device->id}}"
                                                    class="nav_btn model_target active">{{$device->name}}
                                            </button>
                                        </div>

                                    @endforeach

                                </div>
                                </div>

                                @if ( strtolower($cat->name) == 'iphone')
                                    <!-- <div class="what_model"><p class="callback_what_model">Не знаете, какая у вас модель?</p></div> -->
                                    <div class="disnone">
                                        <div class="popup_what_model popup_window">
                                            <div class="box-modal_close arcticmodal-close close"><span>Закрыть</span></div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="form">
                                                        <div class="zag">Как определить модель iPhone?<span></span></div>
                                                        <p class="desc main">Посмотрите, какой номер указан на задней крышке вашего устройства внизу, и
                                                            определите свою модель из списка ниже.</p>
                                                        <div class="row">
                                                            <div class="col-sm-12">

                                                                @foreach ($cat->devices as $device)
                                                                    @if ($device->subcategories != ' ' && $device->subcategories != '')
                                                                        

                                                                <div class="flex">
                                                                    <div class="left">
                                                                        <button data-btn="{{$cat->name}}_breaking" data-toggle="progressbar"
                                                                                data-target="#myProgressbar" data-value="60" data-model="{{$device->id}}"
                                                                                class="nav_btn model_target">{{$device->name}}
                                                                        </button>
                                                                    </div>
                                                                    <div class="right">
                                                                        <div class="text">{{$device->subcategories}}</div>
                                                                    </div>
                                                                </div>

                                                                    @endif
                                                                @endforeach
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>

                            @else

                                <div data-view="{{$cat->name}}_view" data-lvl="2" class="block_imac views faded">
                                    <div class="form">
                                        <form id="frm2" method="post" action="{{ asset('dist/mail.php') }}" class="contactform2">
                                            <div class="zag">{{$cat->stub}}</div>
                                            <div class="text">Оставьте свой номер, мы подскажем стоимость и время работ.</div>
                                            <input id="phone" type="text" name="phone" placeholder="+7 (___) ___-__-__"
                                                   class="form-control phone validate[required]"><input name="action" value="Получить скидку"
                                                                                                        type="hidden">
                                            <button>Узнать стоимость</button>
                                            <div id="confidential" class="minconf">Нажимая на кнопку «<span class="textbtn"></span>», я даю <a
                                                        href="/politics.pdf" target="_blank">согласие на обработку персональных данных.</a></div>
                                        </form>
                                    </div>
                                </div>

                            @endif

                        @endforeach

                    <!-- Третий уровень-->

                        @foreach ($cats as $cat)

                            <div data-view="{{$cat->name}}_breaking_view" data-lvl="3"
                                 class="block_iphone_breaking views faded">
                                <h2><span>Выберите поломку {{$cat->name}}</span></h2>

                                @foreach ($cat->devices as $device)

                                    @if ($device->breakings->isNotEmpty())


                                        <div data-device="{{$device->id}}" class="btn-groups">

                                            <div class="block flex-justify-center">

                                                @foreach ($device->breakings as $breaking)
                                                    
                                                    @if ($breaking->is_additional_window())

                                                        <button data-btn="{{$device->name}}_iphone_display" data-toggle="progressbar" data-target="#myProgressbar"
                                                                data-value="80" data-price="b6" data-breaking="{{$breaking->name}}"
                                                                class="nav_btn polomka_target crushglass">{{$breaking->name}}
                                                        </button>


                                                    @else

                                                    <button data-{{$device->id}}-min="{{$breaking->parse_price('min')}}"
                                                            data-{{$device->id}}-max="{{$breaking->parse_price('max')}}"

                                                            data-toggle="progressbar" data-target="#myProgressbar"
                                                            data-value="finish" data-btn="result" data-price="b2"
                                                            data-breaking="{{$breaking->name}}"
                                                            class="nav_btn polomka_target">{{$breaking->name}}
                                                    </button>

                                                    @endif

                                                @endforeach


                                            </div>

                                        </div>

                                    @endif

                                @endforeach
                                <div class="form">
                                    <form id="frm2" method="post" action="{{ asset('dist/mail.php') }}" class="contactform2">
                                        <div class="zag">Вашей поломки нет в списке?</div>
                                        <div class="text">Оставьте свой номер, мы подскажем стоимость и время работ.</div>
                                        <input id="phone" type="text" name="phone" placeholder="+7 (___) ___-__-__"
                                               class="form-control phone validate[required]"><input name="action" value="Получить скидку"
                                                                                                    type="hidden">
                                        <button>Узнать стоимость</button>
                                        <div id="confidential" class="minconf">Нажимая на кнопку «<span class="textbtn"></span>», я даю <a
                                                    href="/politics.pdf" target="_blank">согласие на обработку персональных данных.</a></div>
                                    </form>
                                </div>
                            </div>

                    @endforeach
                    <!-- Четвертый уровень-->

                    @foreach ($cats as $cat)

                        @foreach ($cat->devices as $device)

                                @foreach ($device->breakings as $breaking)

                                    @if ($breaking->is_additional_window())

                        <div data-view="{{$device->name}}_iphone_display_view" data-lvl="4" class="block_iphone_display views faded"><h2>
                                <span>Ваш дисплей исправен? <br>Дисплей считается исправным, если:</span>
                            </h2>
                            <ul>
                                <li>Отсутствуют дефекты изображения (пятна, битые пиксели, полосы на экране).</li>
                                <li>Сенсор полностью чувствителен.</li>
                                <li>Дисплей ранее не менялся или менялся на оригинальный.</li>
                            </ul>
                            <div class="row ">
                                <div class="col-xs-12 ">
                                    <div class="imgsdis"><p class="text">Исправный диплей</p><img src="{{asset('uploads/')}}/iftrue.jpg"
                                                                                                  alt=""
                                                                                                  class="img-responsive"><img
                                                src="{{asset('uploads/')}}/iftrue2.jpg" alt="" class="img-responsive "></div>
                                    <div class="imgsdis"><p class="text">Неисправный диплей</p><img
                                                src="{{asset('uploads/')}}/iffalse.jpg" alt=""
                                                class="img-responsive"><img
                                                src="{{asset('uploads/')}}/iffalse2.jpg" alt="" class="img-responsive"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="btn-groups newgroups">
                                        <button data-{{$device->id}}-min="{{$breaking->parse_price('min')[0]}}"
                                                data-{{$device->id}}-max="{{$breaking->parse_price('max')[0]}}"
                                                data-toggle="progressbar"
                                                data-target="#myProgressbar" data-value="finish" data-btn="result"
                                                data-breaking="Да, исправен" class="nav_btn display_target">Да, исправен
                                        </button>
                                        <button data-{{$device->id}}-min="{{$breaking->parse_price('min')[1]}}"
                                                data-{{$device->id}}-max="{{$breaking->parse_price('max')[1]}}"
                                                data-toggle="progressbar"
                                                data-target="#myProgressbar" data-value="finish" data-btn="result"
                                                data-breaking="Нет, неисправен" class="nav_btn display_target">Нет,
                                            неисправен
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12"><p class="callback8">Не знаете, как ответить?</p></div>
                            </div>
                        </div>
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach

                        <!-- Пятый уровень-->

                        <div data-view="result_view" data-lvl="6" class="block_result views faded">
                            <h2><span>Стоимость ремонта (работа + запчасти):</span></h2>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="flex">
                                        <div class="price max">
                                            <div class="zag"><span>Отсутствует</span>руб.</div>
                                            <div class="text">
                                                Запчасти оригинального класса
                                            </div>
                                        </div>
                                        <div class="price min">
                                            <div class="zag"><span>Отсутствует</span>руб.</div>
                                            <div class="text">
                                                Аналоги оригинальных запчастей
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form">
                                        <form id="frm2" method="post" action="{{ asset('dist/mail.php') }}" class="contactform2">
                                            <div class="zag">Оставьте свои данные ниже, менеджер зафиксирует стоимость,
                                                <br>и она не изменится в
                                                ходе работ.
                                            </div>
                                            <input id="phone" type="text" name="phone" placeholder="+7 (___) ___-__-__"
                                                   class="form-control phone validate[required]"><input name="action"
                                                                                                        value="Получить скидку"
                                                                                                        type="hidden">
                                            <button>Зафиксировать цену<img
                                                        src="{{asset('uploads/')}}/svg/arrow-btn.svg" alt="с">
                                            </button>
                                            <div id="confidential" class="minconf">Нажимая на кнопку «<span
                                                        class="textbtn"></span>», я даю <a
                                                        href="/politics.pdf" target="_blank">согласие на обработку
                                                    персональных данных.</a></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Шестой уровень-->

                        <div class="thanks_view views faded">
                            <div class="ths_block">
                                <img src="{{asset('uploads/')}}/svg/done.svg" alt="" class="img-responsive">
                                <h2><span>Спасибо, заявка отправлена!</span></h2>
                                <div class="zag">Мы свяжемся с вами в течении 15 минут</div>
                            </div>
                            
                        </div>

                        <!-- Консультация уровень-->

                        <div class="help_view views faded">
                            <h2><span>Получите консультацию</span></h2>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form">
                                        <form id="frm2" method="post" action="{{ asset('dist/mail.php') }}" class="contactform2">
                                            <div class="zag">Введите свои данные ниже, наш менеджер свяжется с Вами в течение 5 минут для консультации и ответов на все Ваши вопросы.
                                            </div>
                                            <input id="phone" type="text" name="phone" placeholder="+7 (___) ___-__-__"
                                                   class="form-control phone validate[required]"><input name="action"
                                                                                                        value="Получить скидку"
                                                                                                        type="hidden">
                                            <button>Зафиксировать цену<img
                                                        src="{{asset('uploads/')}}/svg/arrow-btn.svg" alt="с">
                                            </button>
                                            <div id="confidential" class="minconf">Нажимая на кнопку «<span
                                                        class="textbtn"></span>», я даю <a
                                                        href="/politics.pdf" target="_blank">согласие на обработку
                                                    персональных данных.</a></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="{{ asset('dist/jquery.validationengine.js') }}"></script>
<script src="{{ asset('dist/jquery.validationEngine-ru.js') }}"></script>
<script src="{{ asset('dist/jquery.form.js') }}"></script>

<script type="text/javascript" src="{{ asset('dist/iframeResizer.contentWindow.min.js') }}" defer></script>
<script src="{{ asset('dist/main.js') }}"></script>
<script>
    var iFrameResizer = {
            messageCallback: function(message){
                alert(message,parentIFrame.getId());
            }
        }
</script>
</html>