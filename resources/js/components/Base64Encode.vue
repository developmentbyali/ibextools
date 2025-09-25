<template>
    <div class="row">
        <div class="col-12 pt-4 pb-4">
            <div class="row">
                <div class="col ">
                    <h2 class="text-left pb-2 b-color-primary result-title">Simply enter your Data</h2>
                </div>
            </div>
            <div class="row">
                        <!-- Two-way Data-Binding -->
                <div class="col-md-12 col-lg-5 col-sm-12">
                    <codemirror class="editablediv" v-model="d_text" :options="cmOptions1" />
                </div>
                <div class="buttonWrappers col-lg-2 col-sm-12 col-md-12 text-center m-0 pt-5">
                    <button class=" btn btn-primary minifyButton m-0 mb-2 w-75 mb-5" @click="base64encode()">Run Minify</button>
                    <button v-if="contentResult" v-clipboard="contentResult" @click="copyToClipboard" id="copytoClipboard" class=" w-75 m-0 mb-2 btn btn-success" type="button">Copy Output</button><br>
                    <label class="text-lg-center text-md-center mdLabel text-success font-weight-bold text-right wrpper-inner-text mx-auto pl-5 pr-5 pt-2 m-0 mb-4"  v-if="clickMsg">{{clickMsg}}</label>

                </div>

                <div class="col-md-12 col-lg-5 col-sm-12">
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
    import 'codemirror/theme/rubyblue.css'
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
              //  this.callBeautify();
             //   return this.$refs.cmEditor.codemirror
            }
        },

        methods: {
            copyToClipboard() {
                this.clickMsg  = 'Copied!';
                setTimeout(function() { this.clickMsg = ''; }.bind(this), 5000);

            },
           base64encode(){
               let binaryNumber=this.d_text
               let encodedString = btoa(binaryNumber);
                 console.log(encodedString);
               if(binaryNumber!==''){
                   this.d_visible=true;
                    this.contentResult = encodedString.toString();
               }
               else{
                  this.$alertify.error('Field is empty');
                  this.d_visible=false;
               }

           }
        }
    }
</script>
