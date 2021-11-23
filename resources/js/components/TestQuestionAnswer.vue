<template>
  <div class="container">
    <div class="form-check" v-for="answer in answers" :key="answer.id">
      <input class="form-check-input" type="radio" :name="'question-' + question.id + '-' + answer.id" v-model="answer_selected" style="cursor: pointer" :value="answer.pivot.id" :id="'question-' + question.id + '-' + answer.id">
      <label class="form-check-label" :for="'question-' + question.id + '-' + answer.id" style="cursor: pointer">
        {{ answer.name }}
      </label>
    </div>
  </div>
</template>

<script>
export default {
  name: "TestQuestionAnswer",
  props: {
    answers: {
      required: true,
      type: Array
    },
    question: {
      required: true,
      type: Object
    }
  },
  data() {
    return {
      answer_selected: null
    }
  },
  watch: {
    answer_selected(currentValue, oldValue) {
      this.$parent.answers_selected = this.$parent.answers_selected.filter(w => w !== oldValue)

      this.$parent.answers_selected.push(currentValue)

    }
  }
}
</script>

<style scoped>

</style>
