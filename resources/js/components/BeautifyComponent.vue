<template>
<div>
                    <div class="row">
                        <div class="col-12 pt-4 pb-4">
                            <div class="row">
                                <div class="col ">
                                    <h4 class="text-left pb-2 b-color-primary result-title">Simply enter your Css</h4>
                                </div>
                            </div>
                            <div class="text-center ">
                                <div class="buttonWrappers m-0  mb-3">
                                    <button class="btn btn-primary buttonsStyling"  @click="callBeautify">Run Beautifier</button>

                                    <label class="text-lg-center text-md-center mdLabel text-success font-weight-bold text-right wrpper-inner-text mx-auto pl-5 pr-5"  v-if="clickMsg">{{clickMsg}}</label>

                                    <button v-if="contentResult" v-clipboard="contentResult" @click="copyToClipboard" id="copytoClipboard" class="btn btn-success copyButton" type="button">Copy Output</button>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 w-100">
                                    <!-- Two-way Data-Binding -->
                                <codemirror class="editablediv " v-model="content" :options="cmOptions1" />
                                </div>


                                <div class="col-lg-6">
                                <codemirror class="editablediv" v-model="contentResult"
                                        ref="cmEditor"
                                        :options="cmOptions"
                                    />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


</template>

<script>
    import { codemirror } from 'vue-codemirror'
    import 'codemirror/theme/mbo.css'
    import 'codemirror/theme/rubyblue.css'
    // import base style
    import 'codemirror/lib/codemirror.css'
    import 'codemirror/theme/paraiso-dark.css'
    import 'codemirror/theme/base16-light.css'
    import'codemirror/addon/selection/active-line.js'
    export default {
        components: {
            codemirror
        },
        data() {
            return {
                clickMsg: '',
                content: 'body{background-color:red;}',
                contentResult: '',
                cmOptions1: {
                    tabSize: 4,
                    mode: 'css',
                    theme: 'mbo',
                    styleActiveLine: true,
                    lineNumbers: true,
                    line: true,
                },
                cmOptions: {
                    tabSize: 4,
                    mode: 'css',
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
            mixpanel.track("load: callBeautify");
        },
        methods: {
            callBeautify() {
                mixpanel.track("Use: callBeautify");
                this.contentResult = cssbeautifier(this.content);
            },
            copyToClipboard() {
                this.clickMsg  = 'Copied!';
                setTimeout(function() { this.clickMsg = ''; }.bind(this), 5000);
          },
        }
    }
</script>
