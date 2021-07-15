<template>
  <v-dialog
    ref="dialog"
    v-model="modal"
    :return-value.sync="range"
    persistent
    width="400px"
  >
    <template v-slot:activator="{ on, attrs }">
      <v-text-field
        v-model="textRange"
        label="Выбранные даты"
        prepend-icon="mdi-calendar"
        readonly
        v-bind="attrs"
        v-on="on"
      ></v-text-field>
    </template>
    <base-material-card title="Выбрать интервал">
      <v-date-picker
        is-expanded
        locale="ru"
        is24hr
        v-model="range"
        :is-dark="$vuetify.theme.dark"
        mode="dateTime"
        :is-range="isNow"
        :max-date="new Date()"
      >
      </v-date-picker>
      <v-spacer> </v-spacer>
      <div class="d-flex justify-space-around ma-4">
        <v-btn color="error" @click="modal = false"> Отмена </v-btn>
        <v-btn color="primary" @click="saveDialog(range)"> Применить </v-btn>
      </div>
    </base-material-card>
  </v-dialog>
</template>


<script>
import Calendar from "v-calendar/lib/components/calendar.umd";
import DatePicker from "v-calendar/lib/components/date-picker.umd";

export default {
  name: "DatePickerPlugin",
  components: { VDatePicker: DatePicker, VCalendar: Calendar },
  data() {
    return {
      modal: false,
      range: "",
      masks: {
        input: "DD.MM.YYYY HH:mm",
      },
    };
  },
  computed: {
    textRange() {
      return (
        this.$moment(this.range.start).format(this.masks.input) +
        " - " +
        (!this.isNow
          ? " н.в."
          : this.$moment(this.range.end).format(this.masks.input))
      );
    },
  },
  mounted() {
    this.range = this.value.start;
  },
  methods: {
    saveDialog(range) {
      this.$refs.dialog.save(range);
      this.range = {
        start: this.$moment(this.range.start).format(),
        end: this.$moment(this.range.end).format(),
      };
      this.$emit("input", this.range);
    },
  },

  watch: {
    range: {
      handler(val) {
        if (!val.end) {
          this.range = {
            start: this.$moment(val),
            end: this.$moment(),
          };
        }
      },
      deep: true,
    },
    isNow(newValue) {
      this.range = newValue
        ? {
            start: this.$moment(this.range).format(),
            end: this.$moment().format(),
          }
        : {
            start: this.$moment(this.range.start).format(),
            end: this.$moment().format(),
          };

      this.$emit("input", this.range);
    },
  },
  props: {
    isNow: {
      type: Boolean,
      required: true,
    },
    value: {
      type: Object,
      required: true,
    },
  },
};
</script>
