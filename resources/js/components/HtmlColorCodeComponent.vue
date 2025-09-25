<template>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="color">Color:</label>
                        <input type="text" class="form-control" id="color" @change="updateFromPicker(colors)" v-model="colors.hex"  >
                        <small id="emailHelp" class="form-text text-muted">Enter your color code like #fffff.</small>
                    </div>
                    <form class="row">
                        <div class="col-4  mb-2">
                            <label for="r">R</label>
                            <input type="number" class="form-control" v-model="colors.rgba.r" @input="updateFromPicker" id="r" placeholder="0-255">
                        </div>
                        <div class="col-4 mb-2">
                            <label for="g">G</label>
                            <input type="number" class="form-control" v-model="colors.rgba.g" @input="updateFromPicker" id="g" placeholder="0-255">
                        </div>
                        <div class="col-4 mb-2">
                            <label for="b">B</label>
                            <input type="number" class="form-control" v-model="colors.rgba.b"  @input="updateFromPicker" id="b" placeholder="0-255">
                        </div>
                    </form>
                    <div class="form-group">
                        <label for="color">Opacity:</label>
                        <input type="text" class="form-control" id="color" v-model="colors.rgba.a"  @input="updateFromPicker(colors)">
                        <small id="emailHelp" class="form-text text-muted">Change your color opacity form 0 to 1 ratio.</small>
                    </div>
                    <chrome v-model="color" @input="updateFrom" />
                </div>
                <div class="col-12 col-md-6">
                    <photoshop v-model="color" @input="updateFrom"  />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    /*const Chrome = require('vue-color/src/components/Chrome.vue');*/
    import { Photoshop, Material, Slider, Chrome, Swatches, Compact, Sketch } from 'vue-color'
    export default {
        components: {
            Photoshop,
             Material,
            Slider,
            Chrome,
            Swatches,
            Compact,
            Sketch
        },
        data() {
            return {
                color: {
                    hex: '#ffffff',
                    rgba: {
                        r: 255,
                        g: 255,
                        b: 255,
                        a: 1,
                    },
                },
                colors: {
                    hex: '#ffffff',
                    rgba: {
                        r: 255,
                        g: 255,
                        b: 255,
                        a: 1,
                    },
                }
             }
        },
    computed: {
    },
    mounted() {
        mixpanel.track("loaded: HTMLColorCode");
    },
    methods: {
        updateFromPicker(color) {
            mixpanel.track("use: updateFromPicker");
            this.color = color
        },
        updateFrom() {
            mixpanel.track("trigger: updateFrom");
            this.colors = this.color
        }
    },
    watch: {

    },
    }
</script>
