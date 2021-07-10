<script>
import { Line, mixins } from 'vue-chartjs'
const { reactiveProp } = mixins
// import ChartDataLabels from "chartjs-plugin-datalabels";
export default {
  extends: Line,
  mixins: [reactiveProp],
  // props: {
  //   chartdata: {
  //     type: Object,
  //     default: null,
  //   },
  // },
  watch: {
  // chartData () {
    // this.$data._chart.update()
    // this.renderChart(this.chartData, this.options);
  // }
  },
  mounted() {
    this.options = {
      plugins: {
        datalabels: {
          display: false,
        },
      },
      legend: {
        position: "right",
        labels: {
          fontColor: this.colorFont,
        },
      },
      scales: {
        yAxes: [
          {
            ticks: {
              fontColor: this.colorFont,
            },
            gridLines: {
              color: this.colorScale,
            },
          },
        ],

        xAxes: [
          {
            type: 'time',
            time: {
              tooltipFormat: 'h:mm:ss A',
              unit: 'minute',
              unitStepSize: "10"
              // displayFormat: {
                // day: 'HHH D'
              // }, 
            },
            ticks: {
              fontColor: this.colorFont,
            },
            gridLines: {
              color: this.colorScale,
            },
          },
        ],
      },
    };
    // this.addPlugin([ChartDataLabels]);
    this.renderChart(this.chartData, this.options);
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
