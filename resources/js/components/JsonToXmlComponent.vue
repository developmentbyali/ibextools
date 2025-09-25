<template>



                    <div class="row">
                        <div class="col-12 pt-4 pb-4">
                            <div class="row">
                                <div class="col ">
                                    <h4 class="text-left pb-2 b-color-primary result-title">Simply enter your data</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <!-- Two-way Data-Binding -->
                                     <codemirror class="editablediv mt-3" v-model="content" :options="cmOptions1" />
                                    <button class="btn btn-primary minifyButton" @click="callBeautify">Run Beautifier</button>
                                    <codemirror class="editablediv" v-model="contentResult"
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
    export default {
        components: {
            codemirror
        },
        data() {
            return {
                content: '{\n  "name":"Admin",\n  "age":36,\n  "rights":["admin","editor","contributor"]\n}',
                contentResult: '',
                cmOptions1: {
                    tabSize: 4,
                    mode: 'json',
                    theme: 'mbo',
                    lineNumbers: true,
                    line: true,
                },
                cmOptions: {
                    tabSize: 4,
                    mode: 'json',
                    theme: 'rubyblue',
                    lineNumbers: true,
                    line: true,
                }
            };
        },
        computed: {
            codemirror() {
                this.callBeautify();
                return this.$refs.cmEditor.codemirror
            }
        },
        mounted() {
            mixpanel.track("Visited: JsonToXML");
        },
        methods: {
            callBeautify() {
                mixpanel.track("Visited and use: JsonToXML");
                // Try to parse the input as JSON. If parsing fails, show an error instead of throwing.
                let parsed = null;
                if (!this.content || this.content.trim() === '') {
                    this.contentResult = '<!-- No input provided -->';
                    return;
                }
                try {
                    parsed = JSON.parse(this.content);
                } catch (e) {
                    // If it isn't valid JSON, show a helpful message.
                    this.contentResult = 'Invalid JSON: ' + e.message;
                    return;
                }

                // Convert parsed object to XML. Use compact mode for cleaner output and pretty print.
                try {
                    const options = { compact: true, spaces: 2 };
                    this.contentResult = xmljs.json2xml(parsed, options);
                } catch (e) {
                    this.contentResult = 'Conversion error: ' + (e && e.message ? e.message : e);
                }
            },
        }
    }
</script>
