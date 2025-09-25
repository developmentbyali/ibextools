<template>
    <div class="row">
        <div class="col-12 pt-4 pb-4">
            <div class="row">
                <div class="col ">
                    <h4 class="text-left pb-2 b-color-primary result-title">Simply enter your String</h4>
                </div>
            </div>
            <div class="text-center mb-4">
                <button class=" mb-0 mb-2 mt-2 btn btn-primary minifyButton" @click="base64decode()">Run Minify</button>
                <label class="text-lg-center text-md-center mdLabel text-success font-weight-bold text-right wrpper-inner-text mx-auto pl-5 pr-5"  v-if="clickMsg">{{clickMsg}}</label>
                <button v-if="contentResult" v-clipboard="contentResult" @click="copyToClipboard" id="copytoClipboard" class="btn btn-success" type="button">Copy Output</button>
            </div>
            <div class="row">

                    <div class="col-md-6">
                        <codemirror class="editablediv " v-model="d_text" :options="cmOptions1" />
                    </div>
                    <div class="col-md-6">
                        <codemirror v-if="d_visible" class="editablediv" v-model="contentResult"
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
    import VueAlertify from 'vue-alertify';
    import 'codemirror/theme/mbo.css';
    import 'codemirror/theme/rubyblue.css';
    Vue.use(VueAlertify);
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
                d_visible:true,
                clickMsg:'',
                d_text:'',
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
             //   this.callBeautify();
              //  return this.$refs.cmEditor.codemirror
            }
        },

        methods: {
            copyToClipboard() {
                this.clickMsg  = 'Copied!';
                setTimeout(function() { this.clickMsg = ''; }.bind(this), 5000);
            },
           base64decode(){
               let binaryNumber=this.d_text
               let decodedString = atob(binaryNumber);
               if(binaryNumber!==''){
                   this.d_visible=true;
                    this.contentResult = decodedString.toString();
               }
               else{
                  this.$alertify.error('Field is empty');
                  this.d_visible=false;
               }
           }


        }
    }
</script>
