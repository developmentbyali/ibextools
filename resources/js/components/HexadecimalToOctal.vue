<template>
    <div class="row">
        <div class="col-12 pt-4 pb-4">
            <div class="row">
                <div class="col ">
                    <h4 class="text-left pb-2 b-color-primary result-title">Simply enter your Hexadecimal Code</h4>
                </div>
            </div>
            <div class="text-center  mb-3">
                <button class="btn btn-primary minifyButton mb-0" @click="hexatooctal()">Run Minify</button>
                <label class="text-lg-center text-md-center mdLabel text-success font-weight-bold text-right wrpper-inner-text mx-auto pl-5 pr-5"  v-if="clickMsg">{{clickMsg}}</label>
                <button v-if="contentResult" v-clipboard="contentResult" @click="copyToClipboard" id="copytoClipboard" class="btn btn-success" type="button">Copy Output</button>

            </div>
            <div class="row">
                    <!-- Two-way Data-Binding -->
                    <div class="col-md-6">
                        <codemirror class="editablediv" v-model="hexa_text" :options="cmOptions1" />
                    </div>

                    <div class="col-md-6">
                        <codemirror v-if="hexa_visible" class="editablediv" v-model="contentResult"
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
                clickMsg:'',
                hexa_visible:true,
                hexa_text:'',
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
            mixpanel.track("Load: Hexadecimal To Octal",);
        },

        methods: {
            copyToClipboard() {
                this.clickMsg  = 'Copied!';
                setTimeout(function() { this.clickMsg = ''; }.bind(this), 5000);

            },

          hexatooctal(){
                mixpanel.track("Use: Hexadecimal To Octal hexatooctal",);
                let hexaNumber = this.hexa_text;
                let binary=((parseInt(hexaNumber, 16)).toString(8));
                if(hexaNumber!==''){
                   this.hexa_visible=true;
                   this.contentResult = binary.toString()
                }
                else{
                   this.$alertify.error('Field is empty');
                   this.hexa_visible=false;
                }
            },
        }
    }
</script>
