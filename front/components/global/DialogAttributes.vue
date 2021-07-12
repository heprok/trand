<template>
  <v-dialog v-model="value" persistent max-width="600px">
    <v-card>
      <v-card-title>Выбранные категории</v-card-title>
      <v-divider></v-divider>
      <v-card-text>
        <v-data-table
          v-model="attributes.selected"
          :headers="attributes.headers"
          :items="attributes.list"
          show-select
          v-bind="$attrs"
          @click:row="clickRow"
          :items-per-page="5"
          class="elevation-1"
        />
      </v-card-text>
      <v-divider></v-divider>
      <v-card-actions>
        <v-btn color="primary darken-1" block @click="saveDialogAttribute">
          Применить
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
import Axios from "axios";
export default {
  name: "DialogAttribute",
  data: () => ({
    attributes: {
      selected: [],
      list: [],
      headers: [
        {
          text: "Название",
          value: "name",
        },
      ],
    },
  }),
  props: {
    selected: {
      type: Array,
      required: true,
    },
    value: {
      type: Boolean,
      required: true,
    },
  },
  async mounted() {
    const { data } = await Axios.get("/api/attributes");
    this.attributes.list = data["hydra:member"];
    this.attributes.selected = this.selected;
  },
  methods: {
    async saveDialogAttribute() {
      if (this.attributes.selected.length == 0) {
        this.$snotify.error("Не выбрана категория!");
        return;
      }
      this.$emit("change", this.attributes.selected);
    },
    clickRow(item) {
      const isSingleItem = this.$attrs.hasOwnProperty("single-select");
      if (isSingleItem) {
        this.attributes.selected = [item];
        return;
      }

      let findItem = this.attributes.selected.find((selectedItem) => {
        return selectedItem.id === item.id;
      });

      this.attributes.selected.indexOf(findItem ?? item) == -1
        ? this.attributes.selected.push(item)
        : this.attributes.selected.splice(
            this.attributes.selected.indexOf(findItem),
            1
          );
    },
  },
};
</script>

<style>
</style>