<template>
  <div class="login">
    <b-container class="bv-example-row">
      <b-form-file v-model="file" :state="Boolean(file)" placeholder="选择图片"></b-form-file>
      <div class="mt-3">已选图片: {{file && file.name}}</div>
      <b-form-input v-model="title"
                  type="text"
                  placeholder="输入标题"></b-form-input>
      <b-form-input v-model="description"
                  type="text"
                  placeholder="输入描述"></b-form-input>
      <b-button type="submit" variant="primary">上传</b-button>
    </b-form>
    </b-container>
  </div>
</template>

<script>
export default {
  data () {
    return {
      file: null,
      title: '',
      description: '',
    }
  },
  methods: {
    onSubmit (evt) {
      evt.preventDefault();
      alert(JSON.stringify(this.form));
    }
  }
}
</script>
<style scoped>

</style>
