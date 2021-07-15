<template>
  <div id="chart">
    <apexchart
      type="bar"
      height="350"
      ref="chart"
      :options="chartOptions"
      :series="series"
    ></apexchart>
  </div>
</template>

<script>
export default {
  name: "RealTimeBarChart",
  data() {
    const self = this;
    return {
      series: [],
      chartOptions: {
        chart: {
          type: "bar",
          animations: {
            enabled: true,
            easing: "linear",
            dynamicAnimation: {
              speed: 1000,
            },
          },
          toolbar: {
            show: true,
            tools: {
              customIcons: [
                {
                  icon: '<span class="mdi mdi-18px mdi-vector-polyline"></span>',
                  index: 4,
                  title: "Выбранные атрибуты",
                  class: "custom-icon",
                  click: () => {
                    self.$emit("open-menu-attribute");
                  },
                },
              ],
            },
          },
          zoom: {
            enabled: true,
          },
        },
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: "smooth",
        },
        markers: {
          size: 0,
        },
        xaxis: {
          type: "datetime",
        },
        yaxis: {
          max: 100,
        },
        noData: {
          text: "Загрузка...",
        },
        legend: {
          show: true,
          position: "bottom",
          horizontalAlign: "center",
          onItemClick: {
            toggleDataSeries: true,
          },
          onItemHover: {
            highlightDataSeries: true,
          },
        },
      },
    };
  },
  props: {},
  methods: {
    appendData(appendData) {
      // data: [{x: 11, y: 22}]
      let append = [];
      appendData.forEach((item) => {
        append.push({
          data: item.data,
        });
      });
      this.$refs.chart.appendData(append);
    },
    updateSeries(datasets) {
      this.$refs.chart.updateSeries(datasets);
    },
    changeTheme() {
      const mode =
        localStorage.getItem("dark_theme") === "true" ? "dark" : "light";
      this.$refs.chart.updateOptions({
        theme: {
          mode: mode,
        },
        chart: {
          foreColor: mode === "dark" ? "#f6f7f8" : "#373d3f",
        },
        tooltip: {
          theme: mode,
        },
      });
    },
  },
  watch: {
    // series(newData, oldData) {
    //   // console.log(newData, oldData);
    //   const newDataFromNewData = newData.map((item) => {
    //     // if (item.data.length == 0) {
    //       // return {
    //         // x: this.$moment().format(),
    //         // y: 0,
    //       // };
    //     // } else {
    //       return {
    //         x: item.data[0].x,
    //         y: item.data[0].y
    //       };
    //     // }
    //   });
    //   console.log(newDataFromNewData)
    //   this.$refs.chart.appendData({data: newDataFromNewData}, false, true);
    // },
  },
  mounted() {
    this.$eventBus.$on("change-theme", () => {
      this.changeTheme();
    });
    this.changeTheme();
  },
  beforeDestroy() {
    this.$refs.chart.destroy();
    this.$eventBus.$off("change-theme");
  },
  computed: {
    colorScale() {
      return this.$vuetify.theme.dark
        ? this.$vuetify.theme.themes.dark.secondary
        : this.$vuetify.theme.themes.light.greyLight;
    },
    colorFont() {
      return this.$vuetify.theme.dark ? "#fff" : "#000";
    },
  },
};
</script>

<style lang="sass">
.apexcharts-menu
  background-color: #292929!important
  border: 0px
.apexcharts-tooltip
  color: #999
  background: rgba(30, 30, 30, 0.8)
</style>
