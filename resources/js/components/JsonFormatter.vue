<template>
    <div class="row">
        <div class="col-12 pt-4 pb-4">
            <div class="row">
                <div class="col ">
                    <h4 class="text-left pb-2 b-color-primary result-title">JSON Formatter</h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <!-- Two-way Data-Binding -->
                    <codemirror class="editablediv mt-3" v-model="string_text" :options="cmOptions1" />
                    <button class="btn btn-primary minifyButton" @click="jsonformatter()">Run Minify</button>
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
    import JSONFormatter from 'json-formatter-js'
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
            mixpanel.track("Load:JSON Formatter",);
        },

        methods: {
           jsonformatter(){
                mixpanel.track("Use:JSON Formatter jsonformatter",);
                let xml = this.string_text;
                let myJSON = {ans: this.string_text};
                let formatter = new JSONFormatter(myJSON);
                console.log(formatter)
                return
                let result='No output';
                if(xml != ''){
                    let formatXml=format(xml)
                    this.string_visible=true;
                    this.contentResult = formatXml.toString();
                    console.log(formatXml)
                }
                else{
                    this.$alertify.error('Please enter Xml');
                    this.contentResult = result.toString();
                }
            },
        }
    }
</script>
