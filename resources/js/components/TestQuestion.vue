<template>
  <div class="row">
    <div class="card col-12" v-for="question in questions" :key="question.id">
      <div class="card-body">
        <h5 class="card-title">{{ question.name }}</h5>
        <div class="form-group">
          <test-question-answer :question="question" :answers="question.answers"></test-question-answer>
        </div>
      </div>
    </div>
    <div class="col-12 text-center my-5">
      <button class="btn btn-primary" @click.prevent="handleSaveAnswers">
        Enviar
      </button>
    </div>
  </div>
</template>

<script>
import TestQuestionAnswer from "./TestQuestionAnswer";
export default {
  name: "TestQuestion",
  components: {TestQuestionAnswer},
  props: {
    questions: {
      required: true,
      type: Array
    },
    generos: {
      required: true,
      type: Object
    }
  },
  data() {
    return {
      answers_selected: []
    }
  },
  methods: {
    handleSaveAnswers() {
      if (this.answers_selected.length !== this.questions.length) {
        return alert('Complete todas las preguntas')
      }

      return axios.post('/api/tests', {
        answers: this.answers_selected,
        generos: (Object.values(this.generos)).toString()
      }).then(res => {
        alert('Se registro correctamente')
      })

    }
  },
}
</script>

<style scoped>

</style>
