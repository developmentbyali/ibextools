<template>
    <div class="row">
        <div class="col-12 pt-4 pb-4">
            <div class="row">
                <div class="col ">
                    <h4 class="text-left pb-2 b-color-primary result-title">Simply enter your TimeStamp</h4>
                </div>
            </div>
            <div class="text-center mb-3">
                <button class="mb-0 btn btn-primary minifyButton" @click="timestampConverter()">Run Minify</button>
                <label class="text-lg-center text-md-center mdLabel text-success font-weight-bold text-right wrpper-inner-text mx-auto pl-5 pr-5"  v-if="clickMsg">{{clickMsg}}</label>
                <button v-if="contentResult" v-clipboard="contentResult" @click="copyToClipboard" id="copytoClipboard" class="btn btn-success" type="button">Copy Beautify Js</button>

            </div>
            <div class="row">
                    <!-- Two-way Data-Binding -->
                    <div class="col-md-6">
                        <codemirror class="editablediv" v-model="string_text" :options="cmOptions1" />
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
                content: '',
                contentResult: '',
                clickMsg:'',
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
            mixpanel.track("Load:TimeStamp Converter",);
        },

        methods: {
            copyToClipboard() {
                this.clickMsg  = 'Copied!';
                setTimeout(function() { this.clickMsg = ''; }.bind(this), 5000);

            },
           timestampConverter(){
                mixpanel.track("Use:TimeStamp Converter timestampConverter",);
                let str = this.string_text;
                let a = new Date(this.string_text * 1000);
                let months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                let year = a.getFullYear();
                let month = months[a.getMonth()];
                let date = a.getDate();
                let hour = a.getHours();
                let min = a.getMinutes();
                let sec = a.getSeconds();
                let result='No output';
                if(str != ''){
                    let time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec ;
                    this.string_visible=true;
                    this.contentResult = time.toString();
                }
                else{
                    this.$alertify.error('Please enter timestamp');
                    this.contentResult = result.toString();
                }
            },
        }
    }
</script>
