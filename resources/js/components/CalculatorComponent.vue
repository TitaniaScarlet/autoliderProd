<template>
  <div class="container">
    <div  v-model="selectEngine">
      <div class="row">
        <div class="col-sm-5">
          <label>Кто растамаживает:</label>
        </div>
        <div class="col-sm-3">
          <p><input name="person" type="radio" value="individual" v-model="person" id="individual"> <label for="individual">Физ. лицо</label></p>
        </div>
        <div class="col-sm-3">
          <p><input name="person" type="radio" value="entity" v-model="person" id="entity"> <label for="entity">Юр. лицо</label></p>
        </div>
  </div>
</div>
<br>
    <div v-if="isReverse == true">
      <div class="row">
        <div class="col-sm-5">
          <label>Тип двигателя:</label>
        </div>
        <div class="col-sm-3">
          <p><input name="engine" type="radio" value="petrol" v-model="engine" id="petrol"> <label for="petrol">Бензин</label></p>
        </div>
        <div class="col-sm-3">
          <p><input name="engine" type="radio" value="diesel" v-model="engine" id="diesel"> <label for="diesel">Дизель</label></p>
        </div>
  </div>
</div>
    <br>
    <div class="row">
      <div class="col-sm-5">
        <label>Возраст автомобиля</label>
      </div>
    <div class="col-sm-3">
      <select type="text" class="form-control" v-model="years">
        <option value="young">до 3-х</option>
        <option value="middle">3 - 5</option>
        <option value="old">более 5</option>
      </select>
    </div>
    <div class="col-sm-2">
      <p>лет</p>
    </div>
    </div>

    <br>

    <br>
    <div class="row">
      <div class="col-sm-5">
        <label for="volume">Объем двигателя</label>
      </div>
    <div class="col-sm-3">
      <input type="text" class="form-control" name="volume" v-model="volume">
    </div>
    <div class="col-sm-2">
       <p>см<sup><small>3</small></sup></p>
    </div>
    </div>

    <br>
    <div class="row">
      <div class="col-sm-5">
        <label for="price">Стоиость автомобиля</label>
      </div>
    <div class="col-sm-3">
      <input type="text" class="form-control" name="price" v-model="price">
    </div>
    <div class="col-sm-2">
      <p>евро</p>
    </div>
    </div>
<div v-if="isReverse == false">
    <p><input type="checkbox" name="privilege" v-model="privilege"  id="privilege"> <label for="privilege">Многодетная семья или инвалид I/II группы</label></p>
</div>
<div class="row">
  <div class="col-sm-9">
  </div>
<div class="col-sm-2">
  <button v-on:click="add" class="btn btn-select ">Рассчитать</button>
</div>
</div>
<hr>
<div v-if="dutyReverse == true">

    <div class="row">
      <div class="col-sm-4">
        <label>Таможенная пошлина:</label>
      </div>
    <div class="col-sm-4">
      <h4 class="bold float-right">{{duty}} евро</h4>
    </div>

    </div>
    <div v-if="vatReverse == true">
    <div class="row">
      <div class="col-sm-4">
        <label>НДС:</label>
      </div>
    <div class="col-sm-4">
      <h4 class="bold float-right">{{vat}} евро</h4>
    </div>

    </div>
    <div class="row">
      <div class="col-sm-4">
        <label>Итого:</label>
      </div>
    <div class="col-sm-4">
      <h4 class="bold float-right">{{total}} евро</h4>

      </div>

    </div>
    </div>
  </div>

  </div>

</template>

<script>
export default {
  data: function() {
    return {
      person: 'individual',
      isReverse: false,
      engine: '',
      years: '',
      volume: '',
      price: '',
      privilege: false,
      duty: '',
      vat: '',
      total: '',
      vatReverse: false,
      dutyReverse: false
    }
  },
  mounted() {
  },
  computed: {

    selectEngine: function() {
        if(this.person === 'entity') {
this.isReverse = true
        }
        else if (this.person === 'individual') {
          this.isReverse = false;
          this.engine = '';
        }

    },
  },
  methods: {
    add: function() {
      console.log(this.person);
      console.log(this.engine);
      console.log(this.years);
      console.log(this.volume);
      console.log(this.price);
      console.log(this.privilege);
      axios({
        method: 'get',
        url: 'calculate',
        params: {
          person: this.person,
          engine: this.engine,
          years: this.years,
          volume: this.volume,
          price: this.price,
          privilege: this.privilege
        }
      }).then((response) => {
        if (response.data.duty) {
          this.duty = response.data.duty
          if(response.data.vat) {
            this.vat = response.data.vat
            this.total = response.data.total
            this.vatReverse = true
          }
          else {
            this.vatReverse = false
          }
          this.dutyReverse = true
        }
        else {
          this.dutyReverse = false
        }
      })
      .catch(error => {
        console.log(error);
      })


    }
  },
}

</script>
