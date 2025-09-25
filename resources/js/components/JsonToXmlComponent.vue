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
                content: '',
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
                console.log('callBeautify')
                console.log(this.content)
                var code = {
                    "name" : "Admin",
                    "age" : 36,
                    "rights" : [ "admin", "editor", "contributor" ]
                }
                console.log(xmljs.json2xml(code))
                var options = {compact: false};
                this.contentResult = xmljs.json2xml(this.content, options);
            },
        }
    }
</script>
