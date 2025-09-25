<template>
    <div class="row">
        <div class="col-12 pt-4 pb-4">
            <div class="row">
                <div class="col ">
                    <h4 class="text-left pb-2 b-color-primary result-title">Simply enter your String</h4>
                </div>
            </div>
            <div class="text-center mb-3">
                <button class="mb-0 btn btn-primary minifyButton" @click="md5encrypt()">Run Minify</button>
                <label class="text-lg-center text-md-center mdLabel text-success font-weight-bold text-right wrpper-inner-text mx-auto pl-5 pr-5"  v-if="clickMsg">{{clickMsg}}</label>
                <button v-if="contentResult" v-clipboard="contentResult" @click="copyToClipboard" id="copytoClipboard" class="btn btn-success" type="button">Copy Output</button>

            </div>
            <div class="row">
                    <!-- Two-way Data-Binding -->
                    <div class="col-md-6">
                        <codemirror class="editablediv" v-model="md5_text" :options="cmOptions1" />
                    </div>

                    <div class="col-md-6">
                        <codemirror v-if="md5_visible" class="editablediv" v-model="contentResult"
                                    ref="cmEditor"
                                    :options="cmOptions"
                        />
                    </div>

            </div>
        </div>
    </div>


</template>

<script>
    import { codemirror } from 'vue-codemirror'
    import VueAlertify from 'vue-alertify'
    // import VueCryptoJS from 'vue-cryptojs'
    var CryptoJS = require("crypto-js");
    import MD5 from 'crypto-js/md5';
    import 'codemirror/theme/mbo.css';
    import 'codemirror/theme/rubyblue.css';
      Vue.use(VueAlertify);
    //   Vue.use(VueCryptoJS);
    // import base style
    import 'codemirror/lib/codemirror.css'
    export default {
        components: {
            codemirror
        },
        data() {
            return {
                content: '',
                contentResult: '',
                clickMsg:'',
                md5_visible:true,
                md5_text:'',
                cmOptions1: {
                    tabSize: 4,
                    mode: 'js',
                    theme: 'mbo',
                    lineNumbers: true,
                    line: true,
                },
                cmOptions: {
                    tabSize: 4,
                    mode: 'js',
                    theme: 'rubyblue',
                    lineNumbers: true,
                    line: true,
                }
            };
        },
        computed: {
            codemirror() {
              //  this.callBeautify();
             //   return this.$refs.cmEditor.codemirror
            }
        },
       mounted() {
            mixpanel.track("Load: MD5 Hash Genrator",);
        },

        methods: {
            copyToClipboard() {
                this.clickMsg  = 'Copied!';
                setTimeout(function() { this.clickMsg = ''; }.bind(this), 5000);

            },

          md5encrypt(){
                mixpanel.track("Use: MD5 Hash Genrator md5encrypt",);
                let md5=this.md5_text;
                let md5Hash =CryptoJS.MD5(md5).toString();
                let result=(md5Hash.toString());
                console.log(result)
                if(md5!==''){
                    this.md5_visible=true;
                    this.contentResult = result;
                }
                else{
                    this.md5_visible=false;
                    this.$alertify.error('MD5 text is empty');
                }

            },
        }
    }
</script>
