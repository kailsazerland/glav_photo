<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2>Мой профиль</h2>
            <hr class="star-primary">
        </div>
    </div>
    <b>Имя:</b> <?=$auth['name']?><br>
    <b>E-mail:</b> <?=$auth['mail']?><br>
    <b>Дата регистрации:</b> <?=$auth['created']?><br>
    <h3>Бонусный счёт</h3>
    <b>Всего: </b><?=$auth['all_bonuses']?><br>
    <b>Подарочных: </b><?=$auth['bonuses_light']?><br>
    <b>"До победы": </b><?=$auth['bonuses_win']?><br>
    <b>Стандартных: </b><?=$auth['bonuses_standart']?><br>
</div>