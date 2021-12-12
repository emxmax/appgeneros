<template>
  <div class="row">
    <div class="card col-6" v-for="(question, index) in questions" :key="question.id">
      <div class="card-body">
        <h5 class="card-title">{{index+1}}- {{ question.name }}</h5>
        <div class="form-group">
          <test-question-answer :question="question" :answers="question.answers"></test-question-answer>
        </div>
      </div>
    </div>
    <div class="col-12 text-center my-5">
      <button class="btn btn-primary" @click.prevent="handleSaveAnswers">
        ENVIAR
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
        alert('Sus respuestas han sido registradas con éxito de forma anónima y segura. Te agradecemos por haber participado en esta encuesta que ayudará en la presente investigación con fines académico. Muchas gracias');
        window.location.replace("/");
      })

    }
  },
}
</script>

<style scoped>

</style>
