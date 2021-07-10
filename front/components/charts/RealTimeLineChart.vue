<template>
  <div id="chart">
    <apexchart
      type="line"
      height="350"
      ref="chart"
      :options="chartOptions"
      :series="series"
    ></apexchart>
  </div>
</template>

<script>
export default {
  name: "RealTimeLineChart",
  data: () => ({
    chartOptions: {
      tooltip: {
        theme: "dark",
        x: {
          format: "hh:mm:ss",
        },
      },
      chart: {
        id: "realtime",
        height: 350,
        type: "line",
        animations: {
          enabled: true,
          easing: "linear",
          dynamicAnimation: {
            speed: 1000,
          },
        },
        toolbar: {
          show: false,
        },
        zoom: {
          enabled: false,
        },
      },
      dataLabels: {
        enabled: false,
      },
      stroke: {
        curve: "smooth",
      },
      title: {
        text: "Dynamic Updating Chart",
        align: "left",
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
      legend: {
        show: false,
      },
    },
  }),
  props: {
    series: {
      type: Array,
      default: () => [],
    },
  },
  methods: {
    appendData(appendData) {
      // data: [{x: 11, y: 22}]
      let append = [];
      appendData.forEach(item => {
        append.push({
          data: item.data
        })
      });
      this.$refs.chart.appendData(append);
    },
    updateSeries(datasets) {
      this.$refs.chart.updateSeries(datasets);
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
  mounted() {},
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
