<template>
    <div class="row">
        <div class="col-12 pt-4 pb-4">
            <div class="row">
                <div class="col ">
                    <h4 class="text-left pb-2 b-color-primary result-title">Simply enter your Binary Code</h4>
                </div>
            </div>

            <div class=" text-center mb-3">
                <div class="buttonWrappers w-100 mt-2 ">
                    <button  class="btn btn-primary ml-lg-2" @click="binary()">Run Conversion</button>
                    <label class="text-lg-center text-md-center mdLabel text-success font-weight-bold text-right wrpper-inner-text mx-auto pl-5 pr-5"  v-if="clickMsg">{{clickMsg}}</label>
                    <button v-if="contentResult" v-clipboard="contentResult" @click="copyToClipboard" id="copytoClipboard" class="btn btn-success" type="button">Copy Output</button>
                </div>
            </div>
            <div class="row">
                    <!-- Two-way Data-Binding -->
                    <div class="col-md-6 ">
                        <codemirror class="editablediv" v-model="comment_text" :options="cmOptions1" />
                    </div>

                    <div class="col-md-6 ">
                        <codemirror v-if="visible" class="editablediv" v-model="contentResult"
                                    ref="cmEditor"
                                    :options="cmOptions"
                        />
                    </div>
            </div>
        </div>

    </div>


</template>

<script>

    import { codemirror } from 'vue-codemirror';
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
                visible:true,
                comment_text:'',
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
            mixpanel.track("load: binary");
        },

        methods: {
            actionMore() {
                this.clickMsg = this.content = this.contentResult =  '';
                this.errors = {}
            },
          binary(){
                mixpanel.track("Use:Binary To Hexadecimal binary");
                let binaryNumber = this.comment_text;
                let hexa=parseInt(binaryNumber, 2).toString(16).toUpperCase();
                let result=' no output';
                if(binaryNumber!=='' && !isNaN(binaryNumber)){
                   this.visible=true;
                  this.contentResult = hexa.toString()
                }
                else{
                    this.$alertify.error('Please enter a binary number');
                    this.contentResult = result.toString()
                }


            },
            copyToClipboard() {
                this.clickMsg  = 'Copied!';
                setTimeout(function() { this.clickMsg = ''; }.bind(this), 5000);

            },
        }
    }
</script>
