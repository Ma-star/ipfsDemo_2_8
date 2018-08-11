<template>
  <div class="zone">
    <vue-waterfall-easy :imgsArr="imgsArr" @scrollReachBottom="getData" :maxCols="1">
    <div class="img-info" slot-scope="props">
      <p class="some-info">第{{props.index+1}}张图片</p>
      <!-- <p class="some-info">{{props.value.info}}</p> -->
      <div>
      <b-button>修改</b-button>
      <b-button href="#">删除</b-button>
    </div>
    </div>
  </vue-waterfall-easy>
  </div>
</template>
<script>
import vueWaterfallEasy from 'vue-waterfall-easy'
import axios from 'axios'
export default {
  name: 'Zone',
  data () {
    return {
      msg: 'Category',
      imgsArr: [],
      group: 0,
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
.zone {
  background-color: #FFFFFF;
  position: absolute;
  width: 100%;
  top: 56px;
  bottom: 0;
}

</style>
