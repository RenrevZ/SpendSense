<template>
  <span v-if="message != ''">
    <div class="bg-lime-100 border-l-4 border-lime-500 text-lime-700 p-4 flex success-alert mb-10 transition ease-in-out" role="alert">
        <p><strong class="font-bold"><i class="fa-solid fa-circle-check text-lime-700 text-lg"></i> Success! </strong> {{message}}</p>
    </div>
</span>
</template>

<script>
export default {
    props: ['message']
}
</script>

<style>

</style>
