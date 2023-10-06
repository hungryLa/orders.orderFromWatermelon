<?php
$furnitures = '';
    if($order->type == 0){
        $furnitures = $order->title;
    }elseif($order->type == 1){
        for ($i = 0; $i < count($order->furniture); $i++){
            if($i == count($order->furniture) - 1){
                $furnitures = $furnitures . $order->furniture[$i]->description;
            }else{
                $furnitures = $furnitures . $order->furniture[$i]->description.",";
            }
        }
    }
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<style>
    html {
        font-size: 12px;
    }

    body{
        font-family: "DejaVu Sans";
    }

    .all_width_with_underline{
        padding-top: 5px;
        width: 100%;
        border-bottom: 1px solid black;
        text-align: center;
    }

    .for_input_with_underline{
        padding-top: 5px;
        width: 150px;
        display: inline-block;
        border-bottom: 1px solid black;
        text-align: center;
    }

    .img_lg{
        width: 430px;
        height: 154px;
        margin: 0 0 0 130px;
    }

    .on_center{
        font-weight: bold;
        text-align: center;
    }

    .info{
        width: 100%;
        display: block;
        height: 20px;
    }
    .info_city{
        float: left;
    }
    .info_date{
        float: right;
        margin-right: 20px;
    }

    .contacts{
        height: 170px;
    }

    .seller_contact{
        float: left;
        width: 50%;
    }

    .client_contact{
        float: right;
        width: 30%;
    }

    .title{
        width: 25%;
    }
    .line{
        width: 75%;
        float:right;
        text-align: center;
        display: inline-block;
        border-bottom: 1px solid black;
    }

    .requisites{
        margin-bottom: 10px;
    }

    .sign_seller{
        float: left;
    }

    .sign_client{
        float: right;
    }

    .div_contact{
        margin-top: 5px;
    }

</style>

<body>
    <img class="img_lg" src="data:image/png;base64, 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"/>
    <p class="on_center">Договор №{{$order->id}}<br>купли-продажи мебели</p>
    <div class="info">
        <div class="info_city">
            г.Уфа
        </div>
        <div class="info_date">
            {{\Carbon\Carbon::parse($order->created_at)->format('d.m.Y').'г'}}
        </div>
    </div>
    <div>
        ООО « Сигма Студия » именуемый  в дальнейшем "Продавец",в лице Генерального директора Садыкова Эмиля Рафаэлевича , действующего  на основании Устава , с одной стороны и
    </div>
    <div class="all_width_with_underline">{{$order->full_name}}</div>
    <div>именуемый в дальнейшем "Покупатель" с другой стороны, вместе именуемые в дальнейшем "Стороны", заключили настоящий Договор о нижеследующем:</div>
    <p><b>1. Предмет Договора</b></p>
    <div>1.1. Продавец передает в собственность, а Покупатель принимает и оплачивает: <b>{{$furnitures}}</b></div>
    <div>в порядке и на условиях, которые указаны в настоящем Договоре.</div>
    <div>Список, основные характеристики, комплектность передаваемой Мебели, количество и стоимость единицы Мебели указаны
        в Настоящем договоре и(или), в Спецификации к Договору (Приложение № 1).</div>
    <div>1.2. Доставка Мебели Покупателю осуществляется силами и средствами (Продавца/Покупателя). </div>
    <div><b>Цена доставки составляет <div class="for_input_with_underline">{{$order->delivery_price?: '—'}}</div> рублей.<br>
            Цена подъёма составляет <div class="for_input_with_underline">{{$order->lifting_price?: '—'}}</div> рублей.<br>
            Цена сборки составляет <div class="for_input_with_underline">{{$order->assembly_price?: '—'}}</div> рублей.<br>
            Передача Мебели от Продавца Покупателю осуществляется по адресу: </b></div>
    <div class="all_width_with_underline">{{$order->address?: ""}}</div>
    <div>
        @foreach(\App\Models\Order::TYPES_ADDRESS as $type_address)
             <span @if($loop->index == $order->type_address) style="text-decoration: underline" @endif>{{$type_address}}</span>
            @if(count(\App\Models\Order::TYPES_ADDRESS) != $loop->index + 1) /@endif
        @endforeach с
        обязательным подписанием Сторонами Акта приема-передачи мебели (Приложение № 2).<br>
        1.3. Гарантийный срок на Мебель составляет 18 месяцев, начинает исчисляться с даты передачи Мебели Покупателю по Акту приема-передачи (Приложение № 2).<br>
        1.4. Гарантийные обязательства действительны при условии соблюдения Покупателем условий эксплуатации, то есть правильным использованием мебели по назначению</div>
    <p><b>2. Обязанности Сторон</b></p>
    <div>
        2.1. Продавец обязан:<br>
        2.1.1. Предупредить Покупателя о готовности и согласовать с ним дату и время передачи Мебели не позднее чем за один календарный день.<br>
        2.1.2. Предупредить Покупателя обо всех недостатках Мебели, если таковые имеются.<br>
        2.1.3. Передать Покупателю Мебель в месте его передачи в количестве и ассортименте согласно условиям Настоящего
        Договора в срок <div class="for_input_with_underline"><b>{{\Carbon\Carbon::parse($order->deadline_delivery)->format('d.m.Y')?: '—'}}</b></div>. Качество Мебели должно соответствовать ГОСТ 16371-93 «Мебель - общие технические
        условия» и быть пригодным для использования ее по назначению. Мебель передается со всеми принадлежностями, технической и иной
        документацией. В случае несвоевременной поставки Мебели Продавец предоставляет Покупателю компенсацию в размере 0,1% от суммы товара за каждый день просрочки.
    </div>
    <p><b>2.2. Покупатель обязан:</b></p>
    <div>
        2.2.1. Принять Мебель по Акту приема-передачи в течение 3-х календарных  дней с момента получения в установленном
        настоящим Договором порядке уведомления от Продавца и согласования даты и времени передачи Мебели.<br>
        2.2.2. Оплатить Мебель в сроки и в порядке, которые указаны в разд. 3 настоящего Договора.<br>
        2.3. Право собственности
        на Мебель переходит к Покупателю с момента подписания Сторонами Акта приема-передачи мебели в соответствии с условиями настоящего Договора.
    </div>
    <p><b>3. Стоимость Мебели и порядок оплаты</b></p>
    <div>
        3.1. Цена Договора включает в себя стоимость всей Мебели, передаваемой по настоящему Договору, и составляет <b>{{$order->price}}</b> рублей,
        в том числе НДС не облагается.<br>
        3.2. Стоимость единицы Мебели согласована Сторонами в Настоящем договоре и(или) в Спецификации (Приложение № 1).<br>
        3.3. Оплата по настоящему Договору осуществляется в следующем порядке:<br>
        3.3.1. Покупатель вносит авансовый платеж в размере <b>{{$order->deposit ?: 0}}</b> рублей, в том числе НДС не облагается
        с момента подписания Сторонами настоящего Договора.<br>
        3.3.2. Оставшаяся часть цены Договора в размере <b>{{$order->rest_amount ?: 0}}</b> рублей, в том числе НДС не облагается,
        уплачивается Покупателем в день поставки заказа.<br>

        3.4. Оплата Мебели производится путем ( @foreach(\App\Models\Order::TYPES_PAYMENT as $type_payment)
            <span @if($loop->index == $order->type_payment) style="text-decoration: underline" @endif>{{$type_payment}}</span>
            @if(count(\App\Models\Order::TYPES_PAYMENT) != $loop->index + 1) /@endif
        @endforeach ).<br>
        3.5 При безналичной оплате Обязанность Покупателя по оплате по настоящему Договору считается исполненной с момента
        поступления денежных средств  на корреспондентский счет банка Продавца.
    </div>
    <p><b>4. Ответственность Сторон</b></p>
    <div>4.1. Продавец  несет ответственность перед Покупателем за нарушение сроков оказания услуг и передачи заказа в соответствии
        с Гражданским Кодексом Российской Федерации и ФЗ « О защите прав потребителей», если не докажет что такое нарушение произошло не по вине Продавца.<br>
        4.2. Покупатель несет ответственность за несвоевременную уплату аванса и оставшейся части платежа в соответствии с ГК РФ,
        если не докажет, что такое нарушение произошло не по его вине.<br>
        4.3.  В случае невозможности исполнения договора ,возникшей по вине Продавца, Продавец обязуется возвратить фактически
        уплаченную сумму договора в течении 30 дней с момента подписания соглашения о расторжении договора.<br>
        4.4. Мебель надлежащего качества ,полученная Покупателем ,не подходящая по размерам, цвету и габаритам, обмену и
        возврату не подлежит.(Постановление №55 Правительства РФ от 19.01.1998г.в редакции Постановлений Правительства
        РФ №81 от 06.02.2002г.)4.5 В случае если доставка товара в установленные сроки не осуществились по вине Покупателя,
        повторная доставка производится в новые сроки, согласованные с Продавцом, после оплаты Покупателем транспортных расходов по доставке.<br>
        4.6 Мебель надлежащего качества, выполненная с нестандартными размерами и элементами по индивидуальному заказу Покупателя,
        обмену и возврату не подлежит.<br>4.7 Претензии по качеству Товара принимаются согласно статье №18 Закона о защите прав потребителей.<br>
        4.8 Продавец не несет ответственности за действия третьих лиц, участвующих со стороны Покупателя в хранении, установке,
        сборке и подъеме мебели, приведшие к ухудшению качества Товара или его порче. Продавец не несет ответственность
        за правильность оценки Покупателя, возможности перемещения мебели по лестничным маршам, коридорам и через дверные проемы помещений.
        Продавец не несет ответственности за геометрию, неровности стен и полов Покупателя.<br>4.9 В случае возврата товара,
        Продавец имеет право вернуть денежные средства в срок до 10 дней, в случае отправки товара на фабрику для проведения
        экспертизы то срок увеличивается до 20 дней <br>4.10 Если покупатель считает что мебель ненадлежащего качества, то
        товар отправляется на экспертизу, в случае если поломка, геометрические размеры, отклонения или изменения произошли
        в ходе не правильной эксплуатации или их вовсе нет, то все расходы оплачиваются за счёт покупателя, по выставленному счёту продавца.<br>
        4.11 При покупке мебели под заказ, после запуска в работу материала, а то есть его распиловка, изменить цвет и размеры нельзя,
        только за дополнительную стоимость согласованную двумя сторонами и подписания дополнительного соглашения.<br>
        4.12 Все претензии принимаются согласно Закона РФ «О защите прав потребителей».
    </div>

    <br>
    <br>
    <p><b>5. Форс-мажор</b></p>
    <div>
        5.1. Стороны освобождаются от ответственности за неисполнение или ненадлежащее исполнение обязательств по Договору,
        если надлежащее исполнение оказалось невозможным вследствие обстоятельств непреодолимой силы, то есть чрезвычайных и
        непредотвратимых при данных условиях обстоятельств, под которыми понимаются запретительные действия властей, гражданские волнения,
        эпидемии, блокада, военные действия, эмбарго, землетрясения, наводнения, пожары или другие стихийные бедствия.<br>
        5.2 Стороны освобождаются от ответственности за неисполнение или ненадлежащее исполнение обязательств по Договору,
        если надлежащее исполнение оказалось невозможным вследствие:-закрытие фабрики, ухода с рынка поставщика товара и(или)
        материала.-сезонная перегрузка производства (большое количество заказов)
    </div>
    <p><b>6. Заключительные положения</b></p>
    <div>
        6.1. Настоящий Договор вступает в силу с момента его подписания уполномоченными представителями Сторон и действует
        до полного исполнения Сторонами своих обязательств.<br>
        6.2. Все изменения и дополнения к Договору действительны, если совершены в письменной форме и подписаны уполномоченными
        представителями обеих Сторон. Соответствующие дополнительные соглашения и приложения Сторон являются неотъемлемой частью Договора.<br>
        6.3. Настоящий Договор может быть досрочно расторгнут по соглашению Сторон либо по требованию одной из Сторон в порядке
        и по основаниям, которые предусмотрены действующим законодательством Российской Федерации.<br>
        6.4. Во всем остальном, что не урегулировано настоящим Договором, Стороны руководствуются действующим законодательством Российской Федерации.<br>
        6.5. Настоящий Договор составлен в 2 (двух) экземплярах, имеющих равную юридическую силу, по одному для каждой из Сторон.<br>
        6.6. Неотъемлемой частью настоящего Договора являются приложения:<br>
        -6.6.1. Спецификация (Приложение № 1).<br>
        -6.6.2. Акт приема-передачи мебели (Приложение № 2).
    </div><br>
    <div style="page-break-before: always;"></div>
    <p><b>7. Адреса и реквизиты Сторон</b></p>
    <div class="contacts">
        <div class="seller_contact">
            <p>Продавец:</p>
            Наименование: ООО «Сигма Студия»<br>
            Юридический/почтовый адрес: г. Уфа,<br>
            ул.Рехмукова,д.5,к.213<br>
            ИНН/КПП 0276963545/027601001<br>
            ОГРН 1210200037849<br>
            Телефон: 8-917-409-64-92<br>
            Адрес электронной почты:<br>
            <a href="sigmas102@yandex.ru">sigmas102@yandex.ru</a>
        </div>
        <div class="client_contact">
            <p>Покупатель:</p>
            <div class="div_contact"><span class="title">Ф.И.О: </span><span>{{$order->full_name ?: ''}}</span></div>
            <div class="div_contact"><span class="title">Адрес: </span><span>{{$order->address ?: ''}}</span></div>
            <div class="div_contact"><span class="title">Телефон: </span><span>{{$order->phone_number ?: ''}}</span></div>
            <p>Адрес электронной почты:</p>
            <div class="all_width_with_underline"></div>
        </div>
    </div>
    <div class="requisites">
        <p>Банковские ревкизиты</p>
        БАШКИРСКОЕ ОТДЕЛЕНИЕ N8598 ПАО СБЕРБАНК г. Уфа,<br>
        р/счет40702810806000047817<br>
        кор.счет 30101810300000000601<br>
        БИК 048073601<br>
    </div>
    <div class="signs">
        <div class="sign_seller">
            Продавец:<br>
            ____________/ Садыков Э.Р.<br>
            (подпись/Ф.И.О.)
        </div>
        <div class="sign_client">
            Покупатель:<br>
            ____________/____________<br>
            (подпись/Ф.И.О.)
        </div>
    </div>
</body>
</html>
