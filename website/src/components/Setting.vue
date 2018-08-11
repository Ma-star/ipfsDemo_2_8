<template>
  <div class="setting">
    <b-container class="bv-example-row">
      <b-form-group label="ipfs 协议设置">
        <b-form-radio-group v-model="selected"
                            :options="options"
                            plain
                            stacked
                            name="plainStacked" />
      </b-form-group>
    </b-container>
  </div>
</template>

<script>
export default {
  data () {
    return {
      selected: 'type2',
      options: [
        { text: '我的浏览器支持ipfs协议。我们将使用ipfs:// 和 ipns:// 连接ipfs资源', value: 'type1' },
        { text: ' 使用共用自建网关 http://ipfsgetway.imbadl.top/ 受到带宽影响', value: 'type2' },
        { text: '使用第三方网关 http://www.ipfs.guide/', value: 'type3' },
        { text: '使用官方网关 https://ipfs.io/ 需要科学上网', value: 'type4' },
        { text: '使用本地网关 http://127.0.0.1:8080/', value: 'type5' },
        { text: '使用自定义网关 http://', value: 'type6' },
      ]
    }
  },
}
</script>
<style scoped>

</style>
