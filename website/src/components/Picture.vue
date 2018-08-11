<template>
  <div class="picture">
    <div class="pic">
      <b-img src="/static/img/example.4d0cba8.jpg" fluid alt="Responsive image" />
    </div>
    <div class="info">
      <h1>asdasdad.jpg</h1>
      <p>图片尺寸: 2122*5464</p>
      <p>图片大小: 15.4M</p>
      <p>拍摄时间: 2018年7月31日</p>
      <p><a href="#">下载原图</a></p>
      <p>上传者: <a href="#">Jerry</a></p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Picture',
  data () {
    return {
      msg: 'image'
    }
  }
}
</script>
<style scoped>
.picture{
  position: absolute;
  width: 100%;
  height: 100%;
  padding-top: 136px;
  background-clip: padding-box;
  bottom: 80px;
  overflow: hidden;

}
.pic{
  padding-right: 400px;
}
.pic img{
  width: 100%;
}
.info{
  position: absolute;
  width: 400px;
  right: 0;
  top: 136px;
}
/*.footer{
  position: absolute;
  width: 100%;
  bottom: 0;
}*/
</style>
