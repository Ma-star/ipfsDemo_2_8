<template>
  <div class="category">
  	<vue-waterfall-easy :imgsArr="imgsArr" @scrollReachBottom="getData" :maxCols="16">
	  <div class="img-info" slot-scope="props">
	    <p class="some-info">第{{props.index+1}}张图片</p>
	    <!-- <p class="some-info">{{props.value.info}}</p> -->
	  </div>
	</vue-waterfall-easy>
  </div>
</template>

<script>
import vueWaterfallEasy from 'vue-waterfall-easy'
import axios from 'axios'
export default {
  name: 'Category',
  data () {
    return {
      msg: 'Category',
      imgsArr: [],
      group: 0, // request param
    }
  },
  components: {
    vueWaterfallEasy
  },
  methods: {
    getData() {
      axios.get('./static/info.json?group=' + this.group)
        .then(res => {
          this.imgsArr = this.imgsArr.concat(res.data)
          this.group++
        })
    },
  },
  created() {
    this.getData()
  }
}
</script>
<style scoped>
.category {
	background-color: #FFFFFF;
	position: absolute;
	width: 100%;
    top: 56px;
    bottom: 0;
}
</style>
