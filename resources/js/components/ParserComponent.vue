<template>
  <div class="container">
    <p v-if="isReverse == true">{{reverseMessage}}</p>
    <select type="text" class="custom-select" v-model="marka">
      <option v-for="mark in sortedMarkas" v-bind:value="mark">{{mark.mark}}</option>
    </select>
    <br><br>
    <select type="text" class="custom-select" v-model="mod">
      <option v-for="mod in sortedMods" v-bind:value="mod.model">{{mod.model}}</option>
    </select>
    <br><br>
    <button v-on:click="add" class="btn btn-primary">Отправить</button>
  </div>

</template>

<script>
export default {
  data: function() {
    return {
      sortKeyMarka: 'mark',
      sortKeyMod: 'model',
      reverse: false,
      markas: [],
      marka: [],
      mods: [],
      models: [],
      mod: '',
      isReverse: false,
      reverseMessage: "Запрос обрабатывается",
      mass: [],
    }
  },
  mounted() {
    this.json();
    console.log(this.markas);
  },
  computed: {
    sortedMarkas: function() {
      const k = this.sortKeyMarka;
      return this.markas.sort((a, b) => (a[k] < b[k] ? -1 : a[k] > b[k] ? 1 : 0) * [1, -1][+this.reverse]);
    },
    sortedMods: function() {
      for (let i = 0; i < this.mods.length; i++) {
        if(this.mods[i].mark_id === this.marka.id) {
          this.models.push(this.mods[i]);
        }
      }
      console.log(this.marka)
      const j = this.sortKeyMod;
      return this.models.sort((a, b) => (a[j] < b[j] ? -1 : a[j] > b[j] ? 1 : 0) * [1, -1][+this.reverse]);

    },
  },
  methods: {
    json: function() {
      axios.get('parser/json').
      then((response) => {
        this.markas = JSON.parse(response.data.markas)
        this.mods = JSON.parse(response.data.mods)
      });
    },
    add: function() {
      console.log(this.mod)
      axios({
        method: 'get',
        url: 'parser/form',
        params: {marka: this.marka.mark, model: this.mod}
      }).then((response) => {
      })
      .catch(error => {
        console.log(error);
        this.reverseMessage = "Ошибка"
      })
      .finally(() => (
        this.isReverse = true
      ));

    }
  },
}

</script>
