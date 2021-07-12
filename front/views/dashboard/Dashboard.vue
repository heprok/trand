<template>
  <v-container id="dashboard" fluid tag="section">
    <v-row>
      <v-col
        cols="12"
        sm="6"
        lg="3"
        v-for="infoCard in infoCards"
        :key="infoCard.nameCard"
      >
        <InfoCard
          :color="infoCard.color"
          :icon="infoCard.icon"
          :sub-icon="infoCard.subIcon"
          :title="infoCard.nameCard"
          :subText="infoCard.subTitle"
          :urlApi="infoCard.urlApi"
          :durations="infoCard.duration"
        />
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="6" xs="6" lg="3">
      <SparkCard nameChart="spark1" />
      </v-col>
      <v-col cols="6" xs="6" lg="3">
      <SparkCard nameChart="spark2" />
      </v-col>
      <v-col cols="6" xs="6" lg="3">
      <SparkCard nameChart="spark3" />
      </v-col>
      <v-col cols="6" xs="6" lg="3">
      <SparkCard nameChart="spark4" />
      </v-col>
      <!-- <v-col cols="6" lg="3">
      <SparkLineChart :nameChart="'spark2'" />
      </v-col>
      <v-col cols="6" lg="3">
      <SparkLineChart :nameChart="'spark3'" />
      </v-col>
      <v-col cols="6" lg="3">
      <SparkLineChart :nameChart="'spark4'" />
      </v-col> -->
    </v-row>
    <v-row>
      <v-col cols="12" lg="6" xl="8">
        <JournalTrend
          nameChart="AllAtrributesDashboard"
        />
      </v-col>
      <v-col cols="12" lg="6" xl="4">
        <JournalEvent />
      </v-col>
      <v-col cols="12" lg="6" xl="4">
        <JournalEvent />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import JournalTrend from '../../components/global/JournalTrend.vue';
import SparkLineChart from '../../components/charts/SparkLineChart.vue'
export default {
  name: "DashboardDashboard",
  components: { JournalTrend, SparkLineChart },
  data() {
    return {
      infoCards: [
        // {
        //   nameCard: "Текущая смена",
        //   color: "info",
        //   subIcon: "mdi-tag",
        //   icon: "mdi-account-hard-hat",
        //   urlApi: "/infocard/currentShift",
        // },
        // {
        //   nameCard: "Последний простой",
        //   color: "orange",
        //   icon: "mdi-clock-fast",
        //   subIcon: "mdi-camera-timer",
        //   urlApi: "/infocard/lastDowntime",
        // },
        // {
        //   nameCard: "Кол-во карманов",
        //   subTitle: "ПФМ: Выгруженно карманов",
        //   color: "info",
        //   icon: "mdi-gradient",
        //   subIcon: "mdi-tag",
        //   urlApi: "/infocard/pfm/countUnloadPocket",
        //   duration: [
        //     {
        //       url: "/currentShift",
        //       title: "за смену",
        //     },
        //     {
        //       url: "/today",
        //       title: "за сутки",
        //     },
        //     {
        //       url: "/weekly",
        //       title: "за неделю",
        //     },
        //     {
        //       url: "/mountly",
        //       title: "за месяц",
        //     },
        //   ],
        // },
      ],
    };
  },
  mounted() {},
  methods: {
    complete(index) {
      this.list[index] = !this.list[index];
    },
  },
};
</script>
