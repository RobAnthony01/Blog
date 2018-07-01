<template>
    <div>
        <div class="row mt">
            <div class="col-lg-12">
                <h4>Certificates</h4>
            </div>
        </div>
        <div class="row mt centered">
            <certificate v-for="cert in certificates" v-bind:certificate="cert" :key="cert.id"></certificate>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                certificates: [],
            }
        },
        methods: {
            getCertificates: function() {
               fetch('/certificates/index')
                   .then(res => res.json())
                   .then(res => this.certificates = res)
            }
        },
        mounted() {
            this.getCertificates();
        }
    }
</script>
