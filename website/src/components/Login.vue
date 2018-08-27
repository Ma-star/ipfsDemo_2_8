<template>
  <div class="login">
  	<b-container class="bv-example-row">
  	<b-form @submit="onSubmit">
      <b-form-group id="emailGroup"
                    label="邮箱"
                    label-for="email">
        <b-form-input id="email"
                      type="email"
                      v-model="form.email"
                      required
                      placeholder="输入你的邮箱">
        </b-form-input>
      </b-form-group>
      <b-form-group id="passGroup"
                    label="密码:"
                    label-for="pass">
        <b-form-input id="pass"
                      type="text"
                      v-model="form.pass1"
                      required
                      placeholder="输入密码">
        </b-form-input>
      </b-form-group>
      <b-button type="submit" variant="primary">登录</b-button>
      <b-button type="button" variant="danger">前往注册</b-button>
    </b-form>
    </b-container>
  </div>
</template>

<script>
const API ='http://<MyWebAPI>';
import axios from 'axios'
import CryptoJS from 'crypto-js/crypto-js'
export default {
  data () {
    return {
      form: {
        email: '',
        pass1: '',
      },
    }
  },
  methods: {
    onSubmit (evt) {
      evt.preventDefault();
      var params = new URLSearchParams();
      params.append('email', this.form.email);
      params.append('password', CryptoJS.SHA1(this.form.pass1));
      axios({
          method: 'post',
          url:API+"/users/login",
          data:params
      }).then((res)=>{
        if(res.data.code==200){
          alert("登陆成功！");
          localStorage.setItem('TOKEN',res.data.token);
          localStorage.setItem('nick',res.data.user.nick);
          localStorage.setItem('email',res.data.user.email);
          localStorage.setItem('user',res.data.user.user);
          //TODO 跳转到个人中心页面
        }else{
          console.log(res);
        }
      });
    }
  }
}
</script>
<style scoped>

</style>
