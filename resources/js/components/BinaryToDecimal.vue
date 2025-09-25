<template>
    <div class="row">
        <div class="col-12 pt-4 pb-4">
            <div class="row">
                <div class="col ">
                    <h4 class="text-left pb-2 b-color-primary result-title">Simply enter your Binary Code</h4>
                </div>
            </div>
            <div class="text-center">

                <div class="buttonWrapper" style="display:inline-block">
                    <button v-if="!contentResult" class="btn btn-primary minifyButton  mt-3 mb-3 text-align-center" @click="binary()">Run Minify</button>
                    <button v-if="contentResult" v-clipboard="contentResult" @click="copyToClipboard" id="copytoClipboard" class=" btn btn-success position-relative minifyButton mt-2 mb-2" type="button">Copy Output</button>
                    <label class=" text-success font-weight-bold  style=" v-if="clickMsg">{{clickMsg}}</label>
                </div>
            </div>
            <div class="row">

                    <!-- Two-way Data-Binding -->
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
                clickMsg: '',
                content: '',
                contentResult: '',
                d_visible:true,
                d_text:'',
                cmOptions1: {
                    tabSize: 2,
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
            mixpanel.track("load: binary");
        },
        methods: {
            actionMore() {
                this.clickMsg = this.content = this.contentResult =  '';
                this.errors = {}
            },
           binary(){
               mixpanel.track("Use:Binary To Decimal binary");
               let binaryNumber=this.d_text
               let decimal=parseInt(binaryNumber,2);
               let result='No output';
               if(binaryNumber!=='' && !isNaN(binaryNumber)){
                   this.contentResult = decimal.toString();
               }
               else{
                  this.$alertify.error('Please enter a binary number');
                  this.contentResult = result.toString();
               }

           },
            copyToClipboard() {
                this.clickMsg  = 'Copied!';
                setTimeout(function() { this.clickMsg = ''; }.bind(this), 5000);

            },
        }
    }
</script>
