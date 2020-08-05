<div class="card h-100">

  <div class="card-body card-body-select " >
    <h4 class="card-title centered bold">АВТО ПОД КЛЮЧ ИЗ <br> МОСКВЫ и МО</h4>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <p class="centered p-card-select">Профессиональный подбор автомобиля по заявленным параметрам в Москве и МО</p>

      <button type="button" class="btn btn-link btn-link-select ps float-right bold" data-toggle="modal" data-target="#moscowModalLong">
        подробнее
      </button>
      <div class="modal fade "  id="moscowModalLong" tabindex="-1" role="dialog" aria-labelledby="moscowModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
          <div class="modal-content ">
            <div class="modal-header ">
              <h5 class="modal-title centered bold" id="moscowLongTitle">Авто под ключ из Москвы и МО</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><p class="list">Подбор наиболее честных вариантов автомобилей по вашим параметрам</p></li>
                <li class="list-group-item list">Эксперт выезжает осматривать подобранные (согласованные с Заказчиком) варианты автомобилей</li>
                <li class="list-group-item list">
                  Первичный осмотр автомобиля
                  <a data-toggle="collapse" class="ps" href="#moscow1" aria-expanded="false" aria-controls="moscow1">
                    подробнее
                  </a>
                  <div class="collapse" id="moscow1">
                    (общий осмотр кузова автомобиля, салона, подкапотного пространства, багажного отсека) </div>
                  </li>
                  <li class="list-group-item list">
                    Проверка толщины лакокрасочного покрытия толщиномером
                    <a data-toggle="collapse" class="ps" href="#moscow2" aria-expanded="false" aria-controls="moscow2">
                      подробнее
                    </a>
                    <div class="collapse" id="moscow2">
                      (проверка кузова на предмет перекраски и ДТП, осматриваются пороги, лонжероны, стойки)
                    </div>
                  </li>
                  <li class="list-group-item list">
                    Проверка двигателя автомобиля
                    <a data-toggle="collapse" class="ps" href="#moscow3" aria-expanded="false" aria-controls="moscow3">
                      подробнее
                    </a>
                    <div class="collapse" id="moscow3">
                      (оценивается степень износа двигателя и приводных ремней, осматриваются все соединения на наличие подтеков и запотеваний, прослушивается на наличие посторонних шумов и вибраций, проверяются рабочие жидкости и их уровень)
                    </div>
                  </li>
                  <li class="list-group-item list">Считывание ошибок диагностическим оборудованием</li>
                  <li class="list-group-item list">Проверка оригинальности пробега</li>
                  <li class="list-group-item list">
                    Полный осмотр и проверка всех систем автомобиля
                    <a data-toggle="collapse" class="ps" href="#moscow4" aria-expanded="false" aria-controls="moscow4">
                      подробнее
                    </a>
                    <div class="collapse" id="moscow4">
                      (кондиционер, электрические стеклоподъемники, освещение автомобиля, аудио и навигационные системы, и др. ассистенты)
                    </div>
                  </li>
                  <li class="list-group-item list">
                    Тест –драйв
                    <a data-toggle="collapse" class="ps" href="#moscow5" aria-expanded="false" aria-controls="moscow5">
                      подробнее
                    </a>
                    <div class="collapse" id="moscow5">
                      (проверка рулевого управления, тормозной системы, ходовой части автомобиля)
                    </div>
                  </li>
                  <li class="list-group-item list">Предоставление полного отчета по авто в электронном виде (фото, видео)</li>
                  <li class="list-group-item list">Оценка стоимости устранения выявленных при осмотре автомобиля неисправностей</li>
                  <li class="list-group-item list">Экспертная оценка целесообразности покупки</li>
                  <li class="list-group-item list">Торг с продавцом в интересах Заказчика</li>
                  <li class="list-group-item list">Транспортировка автомобиля к месту жительства Заказчика</li>
                  <li class="list-group-item list ps">*Транспортные расходы на приобретенный автомобиль оплачиваются отдельно.</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="list-group-item centered"><h4 class="bold">2500 рублей</h4></li>
      <li class="list-group-item ps">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-block btn-select" data-toggle="modal" data-target="#moscowCenter">
          Оформить заявку
        </button>

        <!-- Modal -->
        <div class="modal fade" id="moscowCenter" tabindex="-1" role="dialog" aria-labelledby="moscowCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title centered" id="moscowLongTitle">Укажите Ваше имя и номер телефона и мы вскоре с Вами свяжемся</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <selection-component message="Авто под ключ в Москве и МО"></selection-component>

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
