<template>
    <div class="flex justify-center items-center h-screen">

        <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <!--  ERROR MESSAGE  -->
            <ErrorMessage :errorMessage="ErrorMessage" :hasError="hasError"/>
            <span v-if="successMessage">
                <SuccessMessage :message="successMessage"/>
            </span>

            <form class="space-y-6" @submit.prevent="submitForm">
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Update {{cashDescription}} Balance</h5>
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
                               readonly
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
    import ErrorMessage from "../components/ErrorMessage.vue";
    import {get,put} from '../../Api/api.js'
    import SuccessMessage from "../components/SuccessMessage.vue";

    export default {
        components: {ErrorMessage,SuccessMessage},
        data(){
            return{
                ErrorMessage: [],
                hasError:false,
                successMessage:'',
                cashTypeID:'',
                cashDescription:'',
                amount:''
            }
        },
        created() {
            this.fetchCashtype()
        },
        methods:{
            fetchCashtype() {
                const id = this.$route.params.id
                get(`/CashRegistry/show/${id}`)
                 .then(response => {
                     this.cashTypeID = response.data.data.CASH_TYPE_ID
                     this.cashDescription = response.data.data.DESCRIPTION
                     this.amount = response.data.data.cash_remittance.AMOUNT
                     console.log(response.data.data)
                 })
                 .catch(error => console.log(error))
            },
            submitForm(){
                const formData = {
                    cashTypeID: this.cashTypeID,
                    cashDescription: this.cashDescription,
                    amount:this.amount
                }

                put('/CashRegistry/update',formData)
                  .then(response => {
                      this.successMessage = response.data.message

                      setTimeout(() => this.$router.push({name : 'CashRegistry'}),2000)

                  })
                  .catch(error => {
                      this.hasError = true
                      this.ErrorMessage.push(error.response.data.message)
                  })
            }
        }
    }
</script>

<style scoped>

</style>
