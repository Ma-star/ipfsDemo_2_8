<template>
  <div class="Home">
    <b-container fluid class="bv">
      <b-row v-for="n in 6" :key="n">
          <b-col v-for="m in 6" :key="m">
            <b-card title="Card Title"
          img-src="/static/img/example.4d0cba8.jpg"
          img-alt="Image"
          img-top
          tag="article"
          style="max-width: 20rem;"
          class="mb-2">
           </b-card>
          </b-col>
      </b-row>
      <img src="../assets/example.jpg">
    </b-container>
  </div>
</template>

<script>
export default {
  name: 'Home',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.bv{
  padding-left: 0;
  padding-right: 0;
}
.bv>div{
  margin-left: 0px;
  margin-right: 0px;
}
.bv .col{
  padding-left: 0;
  padding-right: 0
}
.bv .col article{
  border-width: 0;
  position: relative;
  margin-bottom:0 !important;
  overflow: hidden;
}
.bv .col article .card-body{
  padding: 0.25rem;
  position: absolute;
  bottom: -3rem;
  width: 100%;
  text-align: center;
  background-color: rgba(0,0,0,0.5);
  color: rgba(255,255,255,1);

  transition: all 0.3s;
}
.bv .col article:hover .card-body{
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  color: rgba(255,255,255,1);
}
</style>
