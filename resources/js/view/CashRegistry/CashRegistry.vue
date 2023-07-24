<template>
    <mainLayout />

    <div class="p-4 sm:ml-64 mt-16 ">
        <div class="flex justify-between items-center w-full mb-5">
            <div>
                <h1 class="text-1xl font-bold text-slate-500">Cash Registry</h1>
            </div>

            <div>
                <button @click="ishidden = !ishidden" class="flex w-full bg-amber-300 text-white p-2 rounded shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Add Cash Type
                </button>
            </div>
        </div>

        <div class="grid grid-cols-4 gap-2 w-full">
            <div v-for="cash in cashtypeAndRemittance" :key="cash.cash_remittance.CASH_TYPE_ID">
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md shadow-yellow-300/50 dark:bg-gray-800 dark:border-gray-700 mb-3">
                    <div class="flex flex-col justify-center items-center">
                        <div class="flex justify-start items-center w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 text-slate-100 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white bg-amber-400 rounded shadow-md">
                                <path d="M10.75 10.818v2.614A3.13 3.13 0 0011.888 13c.482-.315.612-.648.612-.875 0-.227-.13-.56-.612-.875a3.13 3.13 0 00-1.138-.432zM8.33 8.62c.053.055.115.11.184.164.208.16.46.284.736.363V6.603a2.45 2.45 0 00-.35.13c-.14.065-.27.143-.386.233-.377.292-.514.627-.514.909 0 .184.058.39.202.592.037.051.08.102.128.152z" />
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-6a.75.75 0 01.75.75v.316a3.78 3.78 0 011.653.713c.426.33.744.74.925 1.2a.75.75 0 01-1.395.55 1.35 1.35 0 00-.447-.563 2.187 2.187 0 00-.736-.363V9.3c.698.093 1.383.32 1.959.696.787.514 1.29 1.27 1.29 2.13 0 .86-.504 1.616-1.29 2.13-.576.377-1.261.603-1.96.696v.299a.75.75 0 11-1.5 0v-.3c-.697-.092-1.382-.318-1.958-.695-.482-.315-.857-.717-1.078-1.188a.75.75 0 111.359-.636c.08.173.245.376.54.569.313.205.706.353 1.138.432v-2.748a3.782 3.782 0 01-1.653-.713C6.9 9.433 6.5 8.681 6.5 7.875c0-.805.4-1.558 1.097-2.096a3.78 3.78 0 011.653-.713V4.75A.75.75 0 0110 4z" clip-rule="evenodd" />
                            </svg>
                            <h1 class="text-slate-500 font-bold ml-10">{{cash.DESCRIPTION}} Balance</h1>
                        </div>
                        <h1 class="text-slate-500 font-bold text-sky-500">{{cash.cash_remittance.AMOUNT}}</h1>
                        <router-link :to="{name:'CashRegistryShow',params:{id:cash.cash_remittance.CASH_TYPE_ID}}" class="flex justify-end items-center w-full cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL   -->
    <modal :ishidden="ishidden">
        <!--  ERROR MESSAGE  -->
        <ErrorMessage :errorMessage="message.ErrorMessage" :hasError="message.hasError"/>
        <SuccessMessage :message="message.successMessage"/>


        <form class="space-y-6" @submit.prevent="submitForm">
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Add A Cash Type</h5>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cash Type ID</label>
                <input type="text"
                       v-model="form.cashTypeID"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                       required
                       readonly>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cash Description</label>
                <textarea  rows="4"
                           class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Cash Description...."
                           v-model="form.cashDescription"
                           style="resize: none;"></textarea>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                <input type="number"
                       v-model="form.amount"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                       required>
            </div>
            <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>
    </modal>

</template>

<script>
    import mainLayout from "../Setup/mainLayout.vue";
    import {get,post} from "../../Api/api.js";
    import modal from "../components/modal.vue";

    export default {
        components: {mainLayout,modal},
        data(){
            return {
                cashtypeAndRemittance: '',
                ishidden:true,
                message: {
                    ErrorMessage:'',
                    hasError:false,
                    successMessage:''
                },
                form:{
                    cashTypeID: '',
                    cashDescription:'',
                    amount:'',
                    user:''
                }
            }
        },
        mounted() {
            this.fetchCashtype()
            this.fetchData();
        },
        methods:{
            fetchCashtype(){
                get('/CashRegistry/index')
                  .then(response => this.cashtypeAndRemittance =  response.data.cash)
                  .catch(error => console.log(error))
            },
            fetchData(){
                get("/Cashtype/index")
                    .then(response => {
                        this.form.cashTypeID = response.data.count
                    })
                    .catch(error => {
                        this.message.ErrorMessage = error.message
                    })
            },

            submitForm(){
                post("Cashtype/store",this.form)
                    .then(response => {
                        this.message.successMessage = 'New Cash Type Has been Added'
                        this.ishidden = true
                        if(response){
                            setTimeout(() => this.$router.push({name : 'CashRegistry'}),2000)
                        }
                    })
                    .catch(error => {
                        this.message.hasError = true
                        const errorMessages = Object.values(error.response.data.message);

                        errorMessages.forEach(errorMessage => {
                            this.message.ErrorMessage.push(errorMessage);
                        });
                    });
            }
        }
    }
</script>

<style scoped>

</style>
