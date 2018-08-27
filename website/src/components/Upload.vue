<template>
  <div class="login">
    <b-container class="bv-example-row">
      <b-form-file v-model="file" :state="Boolean(file)" placeholder="选择图片"></b-form-file>
      <div class="mt-3">已选图片: {{file && file.name}}</div>
      <div>
        <b-form-select v-model="selected" :options="options" class="mb-3" />
        <div>分类: <strong>{{ selected }}</strong></div>
      </div>
      <b-form-input v-model="title"
                  type="text"
                  placeholder="输入标题"></b-form-input>
      <b-form-input v-model="description"
                  type="text"
                  placeholder="输入描述"></b-form-input>
      <b-button type="button" variant="primary" v-on:click="upload">上传</b-button>
    </b-form>
    </b-container>
  </div>
</template>

<script>
const API ='http://<MyWebAPI>';
const ipfsAPI = require('ipfs-api');
const ipfs = ipfsAPI({host:'127.0.0.1',port:'5001',protocol:'http'});

import axios from 'axios'
export default {
  data () {
    return {
      file: null,
      title: '',
      description: '',
      selected: null,
      options: [],
    }
  },
  methods: {
    upload (evt) {
      var _self = this;
      var reader = new FileReader();
      reader.readAsArrayBuffer(this.file);
      reader.onloadend = function(e){
        const buffer = Buffer.from(reader.result);
        ipfs.add(buffer).then((response)=>{
          var params = new URLSearchParams();
          params.append('token', localStorage.getItem('TOKEN'));
          params.append('hash', response[0].hash);
          params.append('size', response[0].size);
          params.append('title', _self.title);
          params.append('category',_self.selected);
          params.append('description', _self.description);
          //TODO info提交图像相关参数，自定义。
          params.append('info', '');
          axios({
            method: 'post',
            url:API+"/users/add",
            data:params
        }).then((res)=>{
          if(res.data.code==200){
            alert("发布成功");
          }else{
            console.log(res);
          }
        });
        })
      }
    }
  },
  created:function(){
    var category = JSON.parse(localStorage.getItem('category'));
    for (var i=0;i<category.length;i++){
      this.options[i]={"value":category[i].name,"text":category[i].title}
    }
  },
}
</script>
<style scoped>

</style>
