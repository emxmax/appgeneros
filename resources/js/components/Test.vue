<template>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <br>
        <h4>Mis generos más escuchados son:</h4>
        <ul>
          <li v-for="gender in genders" style="display: inline;">
            {{ gender }}&nbsp;&nbsp;
          </li>
        </ul>
        <br>
        <h1>Encuesta</h1>
      </div>
    </div>
    <test-question :questions="questions" :generos="genders"></test-question>
  </div>
</template>

<script>

import "axios"
import TestQuestion from "./TestQuestion";

export default {
  name: "Test",
  components: {TestQuestion},
  props: {
    genders: {
      required: true,
      type: Object
    },
    profile: {
      required: true,
      type: Object
    }
  },
  data() {
    return {
      questions: []
    }
  },
  methods: {
    getQuestions() {
      return axios.get('/api/questions')
        .then(res => this.questions = res.data)
    }
  },
  created() {
    this.getQuestions()
  }
}
</script>

<style scoped>

</style>
