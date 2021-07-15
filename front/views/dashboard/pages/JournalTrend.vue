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
    <v-row>
      <v-col>
        <v-text-field v-model="datesText" readonly />
      </v-col>
    </v-row>
    <JournalTrend ref="journalTrend" nameChart="PageChart" :period="dates" />
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