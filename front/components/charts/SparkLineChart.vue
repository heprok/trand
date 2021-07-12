<template>
  <div :id="nameChart">
    <apexchart
      type="line"
      height="80"
      ref="chart"
      :options="chartOptions"
      :series="series"
    ></apexchart>
  </div>
</template>

<script>
export default {
  name: "SparkLineChart",
  data() {
    const self = this;
    return {
      series: [],
      chartOptions: {
        chart: {
          sparkline: {
            enabled: true,
          },
          animations: {
            enabled: true,
            easing: "linear",
            dynamicAnimation: {
              speed: 1000,
            },
          },
          dropShadow: {
            enabled: true,
            top: 1,
            left: 1,
            blur: 2,
            opacity: 0.2,
          },
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
        colors: ["#03a9f4"],
        tooltip: {
          x: {
            format: "dd.MM.yy hh:mm:ss",
          },
          y: {
            title: {
              formatter: function formatter(val) {
                return "";
              },
            },
          },
        },
      },
    };
  },
  props: {
    nameChart: {
      type: String,
      required: true,
    },
  },
  methods: {
    appendData(appendData) {
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
  watch: {},
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
