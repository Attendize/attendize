<!-- Footer -->
<footer class="g-bg-main-light-v1">
    <!-- Content -->
    <div class="g-brd-bottom g-brd-secondary-light-v1 pb-5" style="border-bottom: none !important">
        <div class="container g-pt-100">
            <div class="row justify-content-start g-mb-30 g-mb-0--md">
                <div class="col-12 footer-header mb-5" style="padding: 0 20%;">
                    <h2>Хотите всегда быть в курсе актуальных событий?</h2>
                    <form action="{{route('subscription')}}" method="POST" class="row">
                        <div class="col-9 form-group">
                            <input type="email" class="form-control" name='email' placeholder="Введите ваш e-mail">
                        </div>
                        <div class="col-3 form-group">
                            <input type="submit" class="form-control four-button-type" value="Подписаться">
                        </div>
                    </form>
                    <h6>Подпишитесь на рассылку и получайте на почту персональную подборку
                        событий вашего города</h6>
                </div>
                <div class="col-3">
                    <a href="" style="width: 100%">
                        <img src="{{asset('assets/images/logo/bilet-logo.svg')}}" class="footer-logo">
                    </a>
                    <ul class="list-inline mb-50 row footer-social-icons pt-4" style="width: 100%">
                        <li class="text-center">
                            <a href=""><img src="{{asset('assets/images/icons/social/3.svg')}}"></a>
                        </li>
                        <li class="text-center">
                            <a href=""><img src="{{asset('assets/images/icons/social/2.svg')}}"></a>
                        </li>
                        <li class="text-center">
                            <a href=""><img src="{{asset('assets/images/icons/social/1.svg')}}"></a>
                        </li>
                        <li class="text-center">
                            <a href=""><img src="{{asset('assets/images/icons/social/4.svg')}}"></a>
                        </li>
                    </ul>
                </div>
                <div class="col-3 col-3-with-text">
                    <ul>
                        <li><a href="">ЛИЧНЫЙ КАБИНЕТ</a></li>
                        <li><a href="">ЗНАКОМСТВО С BILETTM.COM</a></li>
                        <li><a href="">ВОПРОСЫ И ОТВЕТЫ</a></li>
                        <li><a href="">БИЛЕТНЫЕ ОФИСЫ</a></li>
                    </ul>
                </div>
                <div class="col-3 col-3-with-text">
                    <ul>
                        <li><a href="">РАССЫЛКА</a></li>
                        <li><a href="">КОЛЛЕКТИВНЫЕ ЗАКАЗЫ</a></li>
                        <li><a href="">ОРГАНИЗАТОРАМ</a></li>
                        <li><a href="">КОНЦЕРТНЫМ ПЛОЩАДКАМ</a></li>
                    </ul>
                </div>
                <div class="col-3 col-3-with-text">
                    <ul>
                        <li><a href="">ПАРТНЁРАМ</a></li>
                        <li><a href="">ЛОГОТИП ДЛЯ АФИШ И СМИ</a></li>
                        <li><a href="">Добавить событие</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- Copyright -->
    <div class="container g-pt-30 g-pb-10 pt-4">
        <div class="row justify-content-between align-items-center" style="border-top: 1px solid #ffffff">
            <div class="col-12">
                <p class="g-font-size-13 mb-0 text-center all-rights-reserved">&copy; 2019 Билетный сервис Billettm.com. Все права защищены.</p>
            </div>
        </div>
    </div>
    <!-- End Copyright -->
</footer>
<!-- End Footer -->