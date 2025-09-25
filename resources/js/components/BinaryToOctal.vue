<template>
    <div class="row">
        <div class="col-12 pt-4 pb-4">
            <div class="row">
                <div class="col ">
                    <h4 class="text-left pb-2 b-color-primary result-title">Simply enter your Binary Code</h4>
                </div>
            </div>
            <div class="text-center">
                <div class="buttonWrapper" style="display: inline-block">
                    <div class="">
                        <button v-if="!contentResult" class="mb-0 mb-4 mt-4 btn btn-primary minifyButton" @click="octal()">Run Minify</button>
                    </div>
                    <button v-if="contentResult" v-clipboard="contentResult" @click="copyToClipboard" id="copytoClipboard" class="mb-0 mb-4 mt-4 btn btn-success position-relative minifyButton" type="button">Copy Output</button>
                    <p class="mb-3 text-success font-weight-bold" style="" v-if="clickMsg">{{clickMsg}}</p>
                </div>
            </div>
            <div class="row">
                    <!-- Two-way Data-Binding -->
                    <div class="col-md-6">
                        <codemirror class="editablediv" v-model="binary_text" :options="cmOptions1" />
                    </div>
                    <div class="col-md-6 ">
                        <codemirror v-if="octal_visible" class="editablediv" v-model="contentResult"
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
    import 'codemirror/theme/mbo.css';
    import 'codemirror/theme/rubyblue.css';
    // import base style
    import 'codemirror/lib/codemirror.css'
    import VueAlertify from 'vue-alertify';
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
                octal_visible:true,
                binary_text:'',
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
            mixpanel.track("load: octal");
        },

        methods: {
            actionMore() {
                this.clickMsg = this.content = this.contentResult =  '';
                this.errors = {}
            },
           octal(){
                mixpanel.track("Use:Binary To Octal  octal");
                let binary = this.binary_text;
                let octal=parseInt(binary, 2).toString(8);
                let result='No output'
                if(binary!=='' && !isNaN(binary)){
                    this.octal_visible=true;
                    this.contentResult = octal.toString()

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
