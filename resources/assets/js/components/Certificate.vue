<template>
    <div class="col-lg-3">
        <figure>
            <img class="img-responsive" :src="certificate.img_url"/>
            <figcaption>{{ certificate.title }}</figcaption>
        </figure>
    </div>
</template>

<script>
    export default {
        props: {
            certificate: {type: Object, required: true},
        }
    }

</script>
