<template>
  <div class="header">
    <b-navbar toggleable="md" type="dark" variant="info" fixed="top">
	  <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>
	  <b-navbar-brand to="/">IpfsImg</b-navbar-brand>
	  <b-collapse is-nav id="nav_collapse">
	    <b-navbar-nav>
	      <b-nav-item v-for="item in category" :key="item.name" :to="'/c/'+item.name" >{{ item.title }}</b-nav-item>
	      <b-nav-item to="/picture">内页</b-nav-item>
	    </b-navbar-nav>
	    <b-navbar-nav class="ml-auto">
	      <b-nav-form>
	        <b-form-input size="sm" class="mr-sm-2" type="text" placeholder="关键词"/>
	        <b-button size="sm" class="my-2 my-sm-0" type="submit">搜索</b-button>
	      </b-nav-form>
	      <b-nav-item to="/setting">更多</b-nav-item>
	      <b-nav-item to="/login" v-if="!TOKEN">登陆</b-nav-item>
	      <b-nav-item to="/register" v-if="!TOKEN">注册</b-nav-item>
	      <b-nav-item-dropdown :text="nick" right v-if="TOKEN">
	        <b-dropdown-item to="/upload">发布图片</b-dropdown-item>
	        <b-dropdown-item to="/zone">我的图库</b-dropdown-item>
	        <b-dropdown-item href="#" v-on:click="logout">退出登陆</b-dropdown-item>
	      </b-nav-item-dropdown>
	    </b-navbar-nav>

	  </b-collapse>
	</b-navbar>
  </div>
</template>

<script>
const API ='http://ipfsdemo2api.imba.cc';
import axios from 'axios'
export default {
  name: 'Header',
  data () {
    return {
      category: null,
      TOKEN: null,
      nick:''
    }
  },
  created:function(){
    this.TOKEN = localStorage.getItem('TOKEN');
  	this.nick = localStorage.getItem('nick');
    if(!this.category){
      axios({
          method: 'get',
          url:API+"/home/category"
      }).then((res)=>{
        if(res.data.code==200){
          this.category=res.data.data;
          localStorage.setItem('category',JSON.stringify(this.category));
        }else{
          console.log(res);
        }
      });
    }
  },
  methods: {
    logout (evt) {
      localStorage.removeItem('TOKEN');
      this.TOKEN=null;
      //TODO 如果是自己的页面，跳转到首页
      evt.preventDefault();
    }
  }
}
</script>
<style scoped>

</style>
