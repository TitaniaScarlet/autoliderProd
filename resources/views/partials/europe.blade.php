<div class="card h-100">

  <div class="card-body card-body-select " >
    <h4 class="card-title centered bold">АВТО ПОД КЛЮЧ ИЗ ЕВРОПЫ</h4>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <p class="centered p-card-select">Профессиональный подбор автомобиля по заявленным параметрам на аукционах Европы</p>

      <button type="button" class="btn btn-link btn-link-select ps float-right bold" data-toggle="modal" data-target="#europeModalLong">
        подробнее
      </button>
      <div class="modal fade "  id="europeModalLong" tabindex="-1" role="dialog" aria-labelledby="europeModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
          <div class="modal-content">
            <div class="modal-header ">
              <h5 class="modal-title centered bold" id="europeLongTitle">Авто под ключ из Европы</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <ul class="list-group list-group-flush">

                <li class="list-group-item"><p class="list">Подбор наиболее подходящего варианта автомобиля по вашим параметрам на аукционах Европы</p></li>
                <li class="list-group-item"><p class="list">Экспертная оценка целесообразности покупки</p></li>
                <li class="list-group-item"><p class="list">Предоставление полного отчета по выбранному автомобилю в электронном виде (фото)</p></li>
                <li class="list-group-item"><p class="list">Полное сопровождение  на всех этапах покупки автомобиля</p></li>
                <li class="list-group-item"><p class="list">Транспортировка автомобиля к месту жительства Заказчика</p></li>
                <li class="list-group-item list ps">*Транспортные расходы на приобретенный автомобиль оплачиваются отдельно.</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="list-group-item centered"><h4 class="bold">750 рублей</h4></li>
      <li class="list-group-item ps">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-block btn-select" data-toggle="modal" data-target="#europeCenter">
          Оформить заявку
        </button>

        <!-- Modal -->
        <div class="modal fade" id="europeCenter" tabindex="-1" role="dialog" aria-labelledby="europeCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title centered" id="europeLongTitle">Укажите Ваше имя и номер телефона и мы вскоре с Вами свяжемся</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <selection-component message="Авто под ключ из Европы"></selection-component>

                {{-- <form class="form-horizontal" action="{{route('admin.order.store')}}" method="post">
                @csrf
                <input type="text" name="name" class="form-control">
                <input type="text" name="number" class="form-control">
                <input type="hidden" name="message" value="Авто под ключ в Москве и МО">
                <input class="btn btn-block btn-secondary button-basket" type="submit"  value="Отправить">
              </form> --}}
            </div>

          </div>
        </div>
      </div>
    </li>

  </ul>
</div>
