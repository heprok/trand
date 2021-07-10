<template>
  <div v-if="loaded && chartdata.lengths == 0"></div>
  <base-material-card
    class="v-card--material-chart"
    v-bind="$attrs"
    :color="$vuetify.theme.dark ? 'black' : 'grey'"
    v-else-if="loaded"
    v-on="$listeners"
  >
    <template v-slot:heading>
      <RealTimeLineChart ref="chart" :series="chartdata" />
    </template>

    <slot slot="reveal-actions" name="reveal-actions" />
    <h4 class="card-title font-weight-light mt-2 ml-2">
      {{ title }}
    </h4>

    <p class="d-inline-flex font-weight-light ml-2 mt-1">
      {{ subtitle }}
    </p>
    <template v-slot:actions>
      <v-icon class="mr-1" small> mdi-clock-outline </v-icon>
      <span class="caption grey--text font-weight-light"
        >обновлено {{ lastUpdateTime }} минут назад</span
      >
    </template>
  </base-material-card>
  <VSheet v-else>
    <LoaderTlc />
  </VSheet>
</template>

<script>
import Axios from "axios";
import RealTimeLineChart from "../charts/RealTimeLineChart";
export default {
  name: "JournalTrend",
  components: { RealTimeLineChart },
  data: () => ({
    updated: 0,
    loaded: false,
    options: null,
    chartdata: [],
    colors: ["#769A91", "#BBEA6F", "#8D9A67", "#D0A526"],
    interval: null,
    height: null,
    lastUpdateDrec: null,
    lastUpdateTime: -1,
  }),
  computed: {},
  props: {
    query: {
      type: Object,
      default: () => {},
    },
    suffix: {
      type: String,
      default: "",
    },
    attributes: {
      type: Array,
      default: () => [261, 262, 263],
    },
    intervalSecond: {
      type: Number,
      default: 1000 * 5, // 5 секунд
    },
    title: {
      type: String,
      default: "",
    },
    subtitle: {
      type: String,
      default: "",
    },
  },
  methods: {
    config() {
      let config = {
        params: {
          "attribute": this.attributes,
          "drec[after]": this.lastUpdateDrec,
          "drec[before]": (this.lastUpdateDrec = this.$moment().format()),
        },
      };
      return config;
    },
    getStaticColor(index) {
      return this.colors[index];
    },
    getRandomColor() {
      var letters = "0123456789ABCDEF".split("");
      var color = "#";
      for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
      }
      console.log(color);
      return color;
    },
    stopTimerRefresh() {
      if (this.interval) {
        window.clearInterval(this.interval);
      }
    },
    startTimerRefresh() {
      this.stopTimerRefresh();
      this.interval = window.setInterval(() => {
        this.update();
      }, this.intervalSecond);
    },
    async initDataset() {
      let datasets = {};
      let config = {
        params: {
          id: this.attributes,
        },
      };
      const { data } = await Axios.get("/api/attributes", config);
      data["hydra:member"].forEach((attr, index) => {
        datasets[attr.id] = {
          name: attr.name,
          data: [],
          attributeId: attr.id,
        };
      });
      return datasets;
    },
    async setup() {
      this.loaded = false;
      try {
      //   let datasets = await this.initDataset();
        const {data} = await Axios.get("/api/trends/chartAttributes", this.config());

      //   const view = data["hydra:view"];
      //   let currentPageView = view;
      //   do {
      //     data["hydra:member"].forEach((item) => {
      //       datasets[item.attribute.id].data.push({
      //         x: new Date(item.drec),
      //         y: item.value,
      //       });
      //       this.attributes.forEach((attr) => {
      //         if (attr == item.attribute.id) return true;
      //         const lastIndex = datasets[attr].data.length - 1;
      //         const lastValueAttr =
      //           datasets[attr].data[lastIndex] ??
      //           data["hydra:member"].find(
      //             (trend) => trend.attribute.id === attr
      //           );
      //         datasets[attr].data.push({
      //           x: new Date(item.drec),
      //           y: lastValueAttr.y,
      //         });
      //       });
      //     });
      //     data = (
      //       await Axios.get(
      //         currentPageView["hydra:next"] ?? currentPageView["@id"]
      //       )
      //     ).data;
      //     currentPageView = data["hydra:view"];
      //   } while (
      //     view["hydra:last"] != undefined &&
      //     currentPageView["@id"] != view["hydra:last"]
      //   );

      //   this.attributes.forEach((attr) => {
      //     const lastIndex = datasets[attr].data.length - 1;
      //   });
        this.chartdata = Object.values(data);
        this.loaded = true;
        this.lastUpdateTime = 0;
      } catch (e) {
        console.error(e);
      }
    },
    async update() {
      try {
    //     let data = (await Axios.get("/api/trends", this.config())).data;
    //     let datasets = await this.initDataset();
    //     if (data["hydra:totalItems"] == 0) {
    //       this.attributes.forEach((element, index) => {
    //         const lastIndex = this.chartdata[index].data.length - 1;
    //         const lastValueAttr = this.chartdata[index].data[lastIndex];
    //         datasets[element].data.push({
    //           x: new Date(),
    //           y: lastValueAttr.y,
    //         });
    //       });
    //     } else {
    //       data["hydra:member"].forEach((item) => {
    //         datasets[item.attribute.id].data.push({
    //           x: new Date(item.drec),
    //           y: item.value,
    //         });
    //         this.attributes.forEach((attr, index) => {
    //           if (attr == item.attribute.id) return true;
    //           const lastIndex = this.chartdata[index].data.length - 1;
    //           const lastValueAttr = this.chartdata[index].data[lastIndex];
    //           datasets[attr].data.push({
    //             x: new Date(item.drec),
    //             y: lastValueAttr.y,
    //           });
    //         });
    //       });
    //     }
    //     // let datasets = [];
    //     // console.log(datasets);
        const {data} = await Axios.get("/api/trends/chartAttributes", this.config());
        console.log(data);
        this.$refs.chart.appendData(Object.values(data));
    //     // await this.setup();
    //     // this.updated++;
    //     // this.chartdata.datasets.forEach((dataset) => {
    //     // const indexDataset = this.chartdata.datasets.indexOf(dataset);
    //     // // console.log(this.chartdata.datasets[indexDataset]);
    //     // this.chartdata.datasets[indexDataset].data.push(
    //     //   data["hydra:member"]
    //     //     .filter((trend) => {
    //     //       return trend.attribute.id === dataset.attributeId;
    //     //     })
    //     //     .map((trend) => {
    //     //       return {
    //     //         t: new Date(trend.drec),
    //     //         y: trend.value,
    //     //       };
    //     //     })
    //     // );
      } catch (e) {
        console.error(e);
      }
    },
  },
  beforeDestroy() {
    if (this.intervalSecond) this.stopTimerRefresh();
  },
  async mounted() {
    this.lastUpdateDrec = this.$moment().subtract(10, "minutes").format();
    if (this.intervalSecond) {
      setInterval(
        () => (this.lastUpdateTime = this.lastUpdateTime + 1),
        1000 * 60 * 1
      );
      this.startTimerRefresh();
    }
    await this.setup();
  },
};
</script>

<style lang="sass">
.v-card--material-chart
  position: relative
  p
    color: #95a5a6

  .v-card--material__heading
    max-height: 1200px
</style>
