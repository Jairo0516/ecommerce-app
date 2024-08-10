<script>

const props = defineProps({
    item: {
        type: Array
    }
});

</script>


<template>

    <iframe :src="'data:text/csv;base64,'+item.file">
        The “iframe” tag is not supported by your browser.
    </iframe>

</template>
