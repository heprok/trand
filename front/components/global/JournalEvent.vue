<template>
    <CrudTable
      title="Аварии и сообщения"
      url-api="/events"
      :query="query"
      icon="mdi-gesture-double-tap"
      :headers="headers"
      dense
    />
</template>

<script>
export default {
  name: "JournalEvent",
  data() {
    return {
      headers: [
        { text: "Время", value: "startTime" },
        { text: "Код", value: "code" },
        { text: "Сообщение", value: "text" },
        { text: "Источник", value: "source.name" },
        { text: "Тип", value: "type.name" },
      ],
    };
  },
  computed: {
    query() {
      let periodDay = this.$store.getters.TIME_FOR_THE_DAY(this.date);
      return {
        drecTimestampKey: periodDay.start + "..." + periodDay.end,
        type: ["e", "m"],
        source: ["p", "s", "o"],
      };
    },
  },
};
</script>

<style>
</style>