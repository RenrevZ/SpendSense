<template>
    <div class="flex justify-center items-center h-screen">

        <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <!--  ERROR MESSAGE  -->
            <ErrorMessage :errorMessage="ErrorMessage" :hasError="hasError"/>
            <SuccessMessage :message="successMessage"/>


            <form class="space-y-6" @submit.prevent="submitForm">
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Add A Cash Type</h5>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cash Type ID</label>
                    <input type="text"
                           v-model="cashTypeID"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                           required
                           readonly>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cash Description</label>
                    <textarea  rows="4"
                               class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Cash Description...."
                               v-model="cashDescription"
                               style="resize: none;"></textarea>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                    <input type="number"
                           v-model="amount"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                           required>
                </div>
                <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Submit
                </button>
            </form>
        </div>

    </div>
</template>

<script>
    import ErrorMessage from "./ErrorMessage.vue";
    import {get,post} from '../../Api/api.js'
    import SuccessMessage from './SuccessMessage.vue'


    export default {
        components: {ErrorMessage,SuccessMessage},
        data(){
            return {
                cashTypeID: '',
                cashDescription:'',
                amount:'',
                ErrorMessage: [],
                successMessage:'',
                hasError:false,
                user:''
            }
        },
        mounted() {
            this.fetchData();
        },
        methods: {
            fetchData(){
                get("/Cashtype/index")
                     .then(response => {
                         this.cashTypeID = response.data.count
                     })
                    .catch(error => {
                        console.log(error)
                        this.ErrorMessage = error.message
                    })
            },
            submitForm(){
                const formData = {
                    cashTypeID:this.cashTypeID,
                    cashDescription:this.cashDescription,
                    amount:this.amount
                }

                post("Cashtype/store",formData)
                    .then(response => {
                        this.successMessage = 'New Cash Type Has been Added'
                        if(response){
                            setTimeout(() => this.$router.push({name : 'CashRegistry'}),2000)
                        }
                    })
                    .catch(error => {
                        this.hasError = true
                        const errorMessages = Object.values(error.response.data.message);
                        console.log(errorMessages.length)
                        errorMessages.forEach(errorMessage => {
                            this.ErrorMessage.push(errorMessage);
                        });
                    });
            }
        }
    }
</script>

<style scoped>

</style>
