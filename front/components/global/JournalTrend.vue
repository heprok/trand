<template>
  <base-material-card
    class="v-card--material-chart"
    v-bind="$attrs"
    :color="$vuetify.theme.dark ? 'black' : 'white'"
    v-on="$listeners"
  >
    <template v-slot:heading>
      <RealTimeLineChart
        @open-page-full-journal="openFullPageJournal"
        @open-menu-attribute="openMenuAttribute"
        ref="chart"
      />
    </template>
    <DialogAttributes
      @change="saveDialogAttribute"
      :selected="attributes.selected"
      v-model="dialogAttribute"
    />
    <h4 class="card-title font-weight-light mt-2 ml-2">
      {{ title }}
    </h4>

    <p class="d-inline-flex font-weight-light ml-2 mt-1">
      {{ subtitle }}
    </p>
    <template v-slot:actions> </template>
  </base-material-card>
</template>

<script>
import Axios from "axios";
import RealTimeLineChart from "../charts/RealTimeLineChart";
export default {
  name: "JournalTrend",
  components: { RealTimeLineChart },
  data: () => ({
    options: null,
    intervalUpdate: null,
    intervalRefresh: null,
    lastPeriod: null,
    dialogAttribute: false,
    attributes: {
      selected: [],
    },
  }),
  computed: {},
  props: {
    secondUpdate: {
      type: Number,
      default: 1000 * 5, // 5 секунд
    },
    title: {
      type: String,
      default: "",
    },
    nameChart: {
      type: String,
      required: true,
    },
    subtitle: {
      type: String,
      default: "",
    },
    beforeFirstDatasetMinute: {
      type: Number,
      default: 30,
    },
    period: {},
  },
  watch: {
    period: {
      handler(val) {
        console.log(val, this.lastPeriod);
        this.lastPeriod = val;
      },
      deep: true,
    },
  },
  methods: {
    openFullPageJournal() {
      document.location.href =
        document.location.origin + "/#/journal?nameChart=" + this.nameChart;
    },
    openMenuAttribute() {
      this.stopTimerUpdate();
      this.stopTimerRefresh();
      this.dialogAttribute = true;
    },
    async saveDialogAttribute(selectedAttribute) {
      this.dialogAttribute = false;
      this.attributes.selected = selectedAttribute;
      localStorage.setItem(
        "chart_" + this.nameChart,
        JSON.stringify(this.attributes.selected)
      );
      this.lastPeriod = this.period ?? {
        start: this.$moment()
          .subtract(this.beforeFirstDatasetMinute, "minutes")
          .format(),
        end: this.$moment().format(),
      };
      await this.setup();
      this.startTimerUpdate();
      this.startTimerRefresh();
    },
    paramsQuery() {
      let config = {
        params: {
          attribute: this.attributes.selected.map((attr) => attr.id),
          "drec[after]": this.lastPeriod.start,
          "drec[before]": this.lastPeriod.end,
        },
      };
      this.lastPeriod = {
        start: this.lastPeriod.end,
        end: this.$moment().format(),
      };
      return config;
    },
    stopTimerUpdate() {
      window.clearInterval(this.intervalUpdate);
    },
    stopTimerRefresh() {
      window.clearInterval(this.intervalRefresh);
    },
    startTimerRefresh() {
      this.stopTimerRefresh();
      this.intervalRefresh = window.setInterval(() => {
        this.lastPeriod = this.period ?? {
          start: this.$moment()
            .subtract(this.beforeFirstDatasetMinute, "minutes")
            .format(),
          end: this.$moment().format(),
        };
        this.setup();
      }, this.beforeFirstDatasetMinute * 1000 * 60);
    },
    startTimerUpdate() {
      this.stopTimerUpdate();
      this.intervalUpdate = window.setInterval(() => {
        this.update();
      }, this.secondUpdate);
    },
    async setup() {
      try {
        const { data } = await Axios.get(
          "/api/trends/chartAttributes",
          this.paramsQuery()
        );
        this.$refs.chart.updateSeries(
          data.length === 0 ? [{}] : Object.values(data)
        );
      } catch (e) {
        console.error(e);
      }
    },
    async update() {
      try {
        const { data } = await Axios.get(
          "/api/trends/chartAttributes",
          this.paramsQuery()
        );
        this.$refs.chart.appendData(Object.values(data));
      } catch (e) {
        console.error(e);
      }
    },
  },
  beforeDestroy() {
    if (this.secondUpdate) this.stopTimerUpdate();
    this.stopTimerRefresh();
  },
  async mounted() {
    this.lastPeriod = this.period ?? {
      start: this.$moment()
        .subtract(this.beforeFirstDatasetMinute, "minutes")
        .format(),
      end: this.$moment().format(),
    };
    this.attributes.selected =
      JSON.parse(localStorage.getItem("chart_" + this.nameChart)) ?? [];
    this.startTimerUpdate();
    this.startTimerRefresh();
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
