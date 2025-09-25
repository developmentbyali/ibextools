<template>
    <div class="row">
        <div class="col-12 pt-4 pb-4">
            <div class="row">
                <div class="col ">
                    <h4 class="text-left pb-2 b-color-primary result-title">Simply enter your Binary Code</h4>
                </div>
            </div>
            <div class="text-center">
                <button v-if="!contentResult" class="btn btn-primary minifyButton mb-0 mb-3" @click="string()">Run Minify</button>
            </div>
            <div class="text-center">
                <div class="buttonWrapper" style="display: inline-block">
                    <button v-if="contentResult" v-clipboard="contentResult" @click="copyToClipboard" id="copytoClipboard" class=" mb-0 mb-4 btn btn-success position-relative minifyButton" type="button">Copy Output</button>
                    <label class=" text-success font-weight-bold"  v-if="clickMsg">{{clickMsg}}</label>
                </div>
            </div>
            <div class="row">
                    <!-- Two-way Data-Binding -->
                    <div class="col-md-6">
                        <codemirror class="editablediv " v-model="string_text" :options="cmOptions1" />
                    </div>

                      <div class="col-md-6">
                          <codemirror v-if="string_visible" class="editablediv" v-model="contentResult"
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
    // import base style
    import 'codemirror/lib/codemirror.css'
    import 'codemirror/theme/mbo.css';
    import 'codemirror/theme/rubyblue.css';
    import VueAlertify from 'vue-alertify'
    Vue.use(VueAlertify);
    export default {
        components: {
            codemirror
        },
        data() {
            return {
                clickMsg: '',
                content: '',
                contentResult: '',
                string_visible:true,
                string_text:'',
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
            mixpanel.track("load: Binary To String");
        },

        methods: {
            actionMore() {
                this.clickMsg = this.content = this.contentResult =  '';
                this.errors = {}
            },
           string(){
                mixpanel.track("Use:Binary To String  string");
                let binaryNumber = this.string_text;
                let stringData=binaryNumber.split(" ").map(x => String.fromCharCode(parseInt(x, 2))).join("")
                let result='No output'
                if(binaryNumber!==''){
                    this.string_visible=true;
                    this.contentResult = stringData
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
