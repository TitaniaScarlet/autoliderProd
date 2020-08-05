<template>
    <div class="container">
      <p v-if="isReverse == true">{{reverseMessage}}</p>

      <p v-if="errReverse == true">{{errMessage}}</p>
      <div v-if="isReverse == false">

      <div class="row">
        <div class="col-md-6">
          <label for="name">Ваше имя</label>
          <input type="text" class="form-control" name="name" placeholder="Ваше имя" v-model="name">
        </div>
        <div class="col-md-6">
          <label for="phone">Номер телефона</label>
          <input type="text" class="form-control" ref="field" v-model="phone">
        </div>
      </div>
  <br>
  <button v-on:click="add" class="btn btn-select float-right">Отправить</button>
</div>
    </div>

</template>

<script>
import Inputmask from 'inputmask';
    export default {
      props: {
        message: { type: String },
      mask: { type: String },

    },
      data: function() {
        return {
          name: '',
          phone: '',
          errMessage: 'Имя и номер телефона обязательны для заполнения',
          errReverse: false,
          isReverse: false,
          reverseMessage: "Ваш заказ принят. Спасибо, что выбрали нас",

      }
    },
        mounted() {
                    console.log(this.message)
          var im = new Inputmask("+375 (99) 999-99-99");
    im.mask(this.$refs.field);
  },
  methods: {
      add: function() {
  if(this.name == null || this.phone == null) {
    this.errReverse = true
  }
  else {
    console.log(this.message)
  axios({
    method: 'post',
    url: 'order',
    params: {name: this.name, phone: this.phone, message: this.message}
  }).then((response) => {
    this.orders = [],
      this.isReverse = true
  })
    .catch(error => {
    console.log(error);
    this.reverseMessage = "Ошибка. Ваше сообщение не может быть отправлено"
      })
  .finally(() => (
    this.orders = '',
    this.phone = '',
    this.isReverse = true,
    this.errReverse = false

  ));
  }

    },
  }


    }
</script>
