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
                const input = (this.string_text || '').toString().trim();

                if (input === '') {
                    this.$alertify.error('Field is empty');
                    this.string_visible = false;
                    return;
                }

                try {
                    // Try to parse input as JSON and pretty-print it
                    const parsed = JSON.parse(input);
                    this.contentResult = JSON.stringify(parsed, null, 2);
                    this.string_visible = true;
                } catch (e) {
                    this.$alertify.error('Invalid JSON: ' + e.message);
                    this.string_visible = false;
                }
            },
        }
    }
</script>
