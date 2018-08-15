<template>
  <div class="register">
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
      <b-form-group id="nickGroup"
                    label="昵称:"
                    label-for="nick">
        <b-form-input id="nick"
                      type="text"
                      v-model="form.nick"
                      required
                      placeholder="输入你的昵称">
        </b-form-input>
      </b-form-group>
      <b-form-group id="passGroup1"
                    label="密码:"
                    label-for="pass1">
        <b-form-input id="pass1"
                      type="text"
                      v-model="form.pass1"
                      required
                      placeholder="输入密码">
        </b-form-input>
      </b-form-group>
            <b-form-group id="passGroup2"
                    label="重复密码:"
                    label-for="pass2">
        <b-form-input id="pass2"
                      type="text"
                      v-model="form.pass2"
                      required
                      placeholder="重复密码">
        </b-form-input>
      </b-form-group>
      <b-button type="submit" variant="primary">注册</b-button>
      <b-button type="button" variant="danger">返回登录</b-button>
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
        nick: '',
        pass1: '',
        pass2: '',
      },
    }
  },
  methods: {
    onSubmit (evt) {
      evt.preventDefault();
      if(this.form.pass1!=this.form.pass2){
        alert("重复密码不一致");
        return
      }

      var params = new URLSearchParams();
      params.append('email', this.form.email);
      params.append('nick', this.form.nick);
      params.append('password', CryptoJS.SHA1(this.form.pass1));
      axios({
          method: 'post',
          url:API+"/users/register",
          data:params
      }).then((res)=>{
        if(res.data.code==200){
          alert("注册成功！");
          //TODO 跳转到登陆页面
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
