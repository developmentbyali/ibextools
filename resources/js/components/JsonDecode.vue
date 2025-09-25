<template>
    <div class="row">
        <div class="col-12 pt-4 pb-4">
            <div class="row">
                <div class="col ">
                    <h4 class="text-left pb-2 b-color-primary result-title">Simply enter your Encoded Json</h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <!-- Two-way Data-Binding -->
                    <codemirror class="editablediv mt-3" v-model="string_text" :options="cmOptions1" />
                    <button class="btn btn-primary minifyButton" @click="jsonDecode()">Run Minify</button>
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
            mixpanel.track("Load:Json Decode",);
        },

        methods: {
            jsonDecode(){
                mixpanel.track("Use:Json Encode jsonDecode",);
                let jsonData = this.string_text;
                let jsonStr = jsonData.replace(/(\w+:)|(\w+ :)/g, function(s) {
                    return '"' + s.substring(0, s.length-1) + '":';
                });
                let result='No output';
                let json_decode = JSON.parse(jsonStr);
                // let final =JSON.stringify(json_decode)
                let count=json_decode.length;
                if(jsonData!==''){
                    // let json_decode = JSON.parse(jsonStr);

                    for(let i=0; i<=count;i++){
                        console.log('checking', [i, json_decode [i]]);
                    }
                    console.log('asd',count);
                    this.contentResult = json_decode.name;
                }
                else{
                    this.$alertify.error('JSON text is empty');
                    this.contentResult = result.toString();
                }
            },
        }
    }
</script>
