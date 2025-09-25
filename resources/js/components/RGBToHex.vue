<template>
    <section>
        <div class="container">
            <div class="row">
                <div class=" col-md-12">
                    <photoshop v-model="color" @input="updateFrom"  />
                </div>
            </div>

                    <form class="row">
                        <div class="col-4  mb-2 mt-4">
                            <label for="r">R</label>
                            <input type="number" class="form-control" v-model="colors.rgba.r" @input="updateFromPicker" id="r" placeholder="0-255">
                        </div>
                        <div class="col-4 mb-2 mt-4">
                            <label for="g">G</label>
                            <input type="number" class="form-control" v-model="colors.rgba.g" @input="updateFromPicker" id="g" placeholder="0-255">
                        </div>
                        <div class="col-4 mb-2 mt-4">
                            <label for="b">B</label>
                            <input type="number" class="form-control" v-model="colors.rgba.b"  @input="updateFromPicker" id="b" placeholder="0-255">
                        </div>
                    </form>
                    <div class="form-group">
                        <label for="color">Hexa Code:</label>
                        <input type="text" class="form-control" id="color" @change="updateFromPicker(colors)" v-model="colors.hex"  >
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
        mixpanel.track("loaded: RGB TO HEX");
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
    }
</script>
