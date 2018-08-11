<template>
  <div class="header">
    <b-navbar toggleable="md" type="dark" variant="info" fixed="top">
	  <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>
	  <b-navbar-brand to="/">IpfsImg</b-navbar-brand>
	  <b-collapse is-nav id="nav_collapse">
	    <b-navbar-nav>
	      <b-nav-item to="/category">分类1</b-nav-item>
	      <b-nav-item to="/category">分类2</b-nav-item>
	      <b-nav-item to="/category">分类3</b-nav-item>
	      <b-nav-item to="/category">分类4</b-nav-item>
	      <b-nav-item to="/picture">内页</b-nav-item>
	    </b-navbar-nav>
	    <b-navbar-nav class="ml-auto">
	      <b-nav-form>
	        <b-form-input size="sm" class="mr-sm-2" type="text" placeholder="关键词"/>
	        <b-button size="sm" class="my-2 my-sm-0" type="submit">搜索</b-button>
	      </b-nav-form>
	      <b-nav-item to="/setting">更多</b-nav-item>
	      <b-nav-item to="/login">登陆</b-nav-item>
	      <b-nav-item to="/register">注册</b-nav-item>
	      <b-nav-item-dropdown text="bill" right>
	        <b-dropdown-item to="/upload">发布图片</b-dropdown-item>
	        <b-dropdown-item to="/zone">我的图库</b-dropdown-item>
	        <b-dropdown-item href="#">退出登陆</b-dropdown-item>
	      </b-nav-item-dropdown>
	    </b-navbar-nav>

	  </b-collapse>
	</b-navbar>
  </div>
</template>

<script>
export default {
  name: 'Header',
  data () {
    return {
      msg: 'header'
    }
  }
}
</script>
<style scoped>

</style>
