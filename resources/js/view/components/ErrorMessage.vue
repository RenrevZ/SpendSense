<template>
    <div :class="['p-4',
                  'mb-4',
                   'text-sm',
                    'text-red-800',
                     'rounded-lg',
                     'bg-red-50',
                      'dark:bg-gray-800',
                       'dark:text-red-400',
                       hasError ? 'block' : 'hidden']" role="alert">
       <div v-if="hasError">
           <ul v-for="error in  errorMessage" :key="error">
               <li>{{error}}</li>
           </ul>
       </div>
    </div>
</template>

<script>
    export default {
        props:['errorMessage','hasError']
    }
</script>

<style scoped>

</style>
