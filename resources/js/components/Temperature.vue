<template>
  <div>
    <div>
      <h1 class="t-title">Login Temperatures</h1>
      <hr />

      <div class="t-buttons">
        <button class="button-r py-2 px-4 ml-4" @click="getWeatherData">
          Reset Order
        </button>
        <button class="button-h py-2 px-4 ml-4" @click="getHottestWeatherData">
          Hottest First
        </button>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <table v-for="(items, city) in weatherData" :key="city">
          <h2 class="font-bold tracking-wide text-2xl lg:text-3xl pl-3">
            {{ city }}
          </h2>
          <tr v-for="item in items" :key="item.id">
            <td class="p-3 mr-2">{{ item.date }}</td>
            <td class="p-3 mr-2">{{ item.celsius }}°C</td>
            <td class="p-3 mr-2">{{ item.fahrenheit }}°F</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Weather",
  data() {
    return {
      weatherData: Object,
    };
  },
  methods: {
    getWeatherData() {
      axios.get("/weather").then((response) => {
        this.weatherData = response.data;
        console.log(this.weatherData);
      });
    },

    getHottestWeatherData() {
      axios.get("/weather/hottest").then((response) => {
        this.weatherData = response.data;
        console.log(this.weatherData);
      });
    },
  },
  created() {
    this.getWeatherData();
  },
};
</script>


<style>
.t-title {
  color: mediumseagreen;
  font-size: 60px;
  font-weight: bold;
}

.t-buttons {
  text-align: right;
  margin: 10px;
  padding: 10px;
}

.button-r {
  background-color: deeppink;
  border: none;
}

.button-h {
  background-color: mediumslateblue;
  border: none;
}
</style>