<template>
    <div class="container">
      <p v-if="errReverse == true">{{errMessage}}</p>
      <label for="name">Ваше имя</label>
      <input type="text" class="form-control" name="name" v-model="name">

      <label for="phone">Номер телефона</label>
      <input type="text" class="form-control" ref="field" v-model="phone">

      <label for="message">Ваше сообщение</label>
  <textarea v-model="message" class="form-control" name="message"  rows="5" cols="30" ></textarea><br>
  <br>
  <p v-if="isReverse == true">{{reverseMessage}}</p>

  <button v-on:click="add" class="btn btn-select float-right">Отправить</button>

    </div>

</template>

<script>
import Inputmask from 'inputmask';
    export default {
      props: {
      mask: { type: String }
    },
      data: function() {
        return {
          name: '',
          phone: '',
          message: [],
          errMessage: 'Имя и номер телефона обязательны для заполнения',
          errReverse: false,
          isReverse: false,
          reverseMessage: "Ваше сообщение отправлено",

      }
    },
        mounted() {
          var im = new Inputmask("+375 (99) 999-99-99");
    im.mask(this.$refs.field);
  },
  methods: {
    add: function() {
  if(this.name == null || this.phone == null) {
    this.errReverse = true
  }
  else {
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
    this.name = '',
    this.phone = '',
    this.message = [],
    this.isReverse = true

  ));
  }

    },
  }


    }
</script>
