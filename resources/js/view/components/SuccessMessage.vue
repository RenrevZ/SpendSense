<template>
     <span v-if="message">
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Success!</span> {{message}}
        </div>
     </span>
</template>

<script>
    export default {
        name: "SuccessMessage",
        props:['message']
    }
</script>

<style scoped>

</style>
