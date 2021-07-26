<template>
  <div>
    <div @click="click">
      <v-hover v-slot="{ hover }">
        <base-material-stats-card
          :loading="loading"
          :class="{ 'on-hover': hover, pointer: true }"
          v-bind="$attrs"
          :elevation="hover ? 16 : 2"
          :small-value="value + ' ' + suffix"
          :sub-text="subTitle"
          :title="currentAttribute.name"
          :color="color"
          :icon="hover ? 'mdi-hand-pointing-up' : 'mdi-poll'"
          v-on="$listeners"
        >
          <template #footer>
            <v-col cols="12" class="ml-2 mr-1">
              <SparkLineChart ref="chart" :nameChart="nameChart" />
            </v-col>
          </template>
        </base-material-stats-card>
      </v-hover>
    </div>
    <DialogAttributes
      @change="saveDialogAttribute"
      :selected="[currentAttribute]"
      v-model="dialogAttribute"
      single-select
    />
  </div>
</template>

<script>
import InfoCard from "tlc-front-components/src/InfoCard";
import SparkLineChart from "../charts/SparkLineChart.vue";
import Axios from "axios";
export default {
  name: "SparkCard",
  components: { SparkLineChart },
  extends: InfoCard,
  data() {
    return {
      currentAttribute: [],
      dialogAttribute: false,
      entryPointApi: this.$store.state.apiEntryPoint,
    };
  },
  props: {
    nameChart: {
      type: String,
      required: true,
    },
    intervalSecond: {
      type: Number,
      default: 1000 * 1, // 1 секунда
    },
  },
  mounted() {
    this.currentAttribute = JSON.parse(
      localStorage.getItem("spark_card_" + this.nameChart)
    ) ?? { name: "Атрибут не выбран" };
  },

  methods: {
    async update() {
      if (!this.currentAttribute.id) {
        this.color = "error";
        this.value = "Не выбран";
        this.stopTimer();
        return;
      }
      const config = {
        params: {
          "attribute.id": this.currentAttribute.id,
          limit: 30,
          "order[drec]": "desc",
        },
      };
      const { data } = await Axios.get("/api/trends", config);
      const lastTrend =
        data["hydra:member"][data["hydra:member"].length - 1];
      const series = {
        data: data["hydra:member"].map((serie) => {
          return {
            x: serie.drec,
            y: serie.value,
          };
        }),
      };
      if (lastTrend.value != this.value || this.currentAttribute.id == lastTrend.attribute.id ) this.$refs.chart.updateSeries([series]);
      this.color = "info";
      this.value = lastTrend.value;
    },
    click() {
      this.dialogAttribute = true;
    },
    async saveDialogAttribute(attributes) {
      this.currentAttribute = attributes[0];
      localStorage.setItem(
        "spark_card_" + this.nameChart,
        JSON.stringify(this.currentAttribute)
      );
      this.dialogAttribute = false;
      this.startTimer();
      await this.update();
    },
  },
};
</script>
