<template>
  <div>
    <v-row>
      <v-col cols="3">
        <DatePickerPlugin v-model="dates" :isNow="!isNow" />
      </v-col>
      <v-col cols="4"
        ><v-checkbox v-model="isNow" label="По настоящее время" />
      </v-col>
    </v-row>
    <v-row class="d-flex align-stretch">
      <v-col cols="12">
        <JournalTrend
          ref="journalTrend"
          :nameChart="getNameChart"
          :period="dates"
        />
      </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
  name: "journal_trend_page",
  data() {
    return {
      isNow: true,
      dates: {
        start: this.$moment().subtract(3, "hours").format(),
        end: this.$moment().format(),
      },
    };
  },
  watch: {
    dates: {
      handler(val) {
        if (!this.isNow) {
          this.$refs.journalTrend.stopTimerUpdate();
          this.$refs.journalTrend.stopTimerRefresh();
        } else {
          this.$refs.journalTrend.startTimerUpdate();
          this.$refs.journalTrend.startTimerRefresh();
        }
        this.$nextTick(() => {
          this.$refs.journalTrend.setup();
        });
      },
      deep: true,
    },
  },
  computed: {
    getNameChart() {
      const urlSearchParams = new URLSearchParams(window.location.hash);
      const params = Object.fromEntries(urlSearchParams.entries());
      return Object.values(params)[0];
    },
    datesText() {
      return (
        this.$moment(this.dates.start).format("DD.MM.YYYY HH:mm") +
        "     " +
        this.$moment(this.dates.end).format("DD.MM.YYYY HH:mm")
      );
    },
  },
  methods: {},
  mounted() {},
};
</script>

<style>
</style>