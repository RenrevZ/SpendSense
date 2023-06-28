<template>
    <mainLayout />

    <div class="p-4 sm:ml-64 mt-16 ">
        <div class="flex justify-between items-center w-full mb-5">
            <div>
                <h1 class="text-1xl font-bold text-slate-500">ExpenseType</h1>
            </div>

            <div>
                <button class="flex w-full bg-amber-300 text-white p-2 rounded shadow"
                             @click="ishidden = !ishidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Add Expense Type
                </button>
            </div>
        </div>

        <!--  SUCCESS MESSAGE  -->
        <span class="flex justify-center items-center w-full">
            <SuccessMessage :message="successMessage"/>
            <ErrorMessage :errorMessage="ErrorMessage" :hasError="hasError"/>
        </span>


                <table class="w-full text-md text-center text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Expense ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date Created
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="expense in expenseType" :key="expense.EXPENSE_ID">
                        <td>{{expense.EXPENSE_ID}}</td>
                        <td>{{expense.DESCRIPTION}}</td>
                        <td>{{expense.DATE_CREATED}}</td>
                        <td>
                            <button @click="editForm(expense.EXPENSE_ID)"
                                    class="text-white bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-3 py-1 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Edit
                            </button>
                            <button @click="destroy(expense.EXPENSE_ID)"
                                    class="text-white bg-rose-500 hover:bg-rose-700 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-3 py-1 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Delete
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
    </div>



   <!-- MODAL   -->
    <modal :ishidden="ishidden">
        <ErrorMessage :errorMessage="ErrorMessage" :hasError="hasError"/>
        <form @submit.prevent="dynamicSubmit">
            <div class="mb-6">
                <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expense ID</label>
                <input type="text"
                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                       v-model="ExpenseID"
                       readonly
                       required>
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <input type="text"
                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                       v-model="description"
                       required>
            </div>

            <input type="submit"
                   class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                   :value="isEditing ? 'Update Expense Type':'Add Expense Type'">


        </form>
    </modal>
</template>

<script>
    import mainLayout from "../Setup/mainLayout.vue";
    import {get,post,put,deleteItem} from "../../Api/api.js";
    import modal from "../components/modal.vue";
    import ErrorMessage from "../components/ErrorMessage.vue";
    import SuccessMessage from "../components/SuccessMessage.vue";

    export default {
        components:{mainLayout,modal,ErrorMessage,SuccessMessage},
        data(){
            return {
                expenseType: '',
                ishidden:true,
                ErrorMessage: [],
                hasError:false,
                hasGlobalError:false,
                GlobalError:'',
                ExpenseID:'',
                description:'',
                successMessage:'',
                isEditing:false
            }
        },
        mounted() {
            this.fetchExpenses()
        },
        computed: {
            submitlink() {
                return this.isEditing ? 'submitUpdate' : 'submitForm';
            },
        },
        methods:{
            fetchExpenses(){
                get('/ExpenseType/index')
                    .then(response => {
                        this.ExpenseID = response.data.expenseID
                        this.expenseType = response.data.data
                    })
                    .catch(error =>  {
                        this.hasGlobalError = true
                        this.GlobalError = error.response.data.message
                    })
            },
            dynamicSubmit(){
                if (this.submitlink === 'submitUpdate') {
                    this.submitUpdate();
                } else if (this.submitlink === 'submitForm') {
                    this.submitForm();
                }
            },
            submitForm(){
                const formData = {
                    ExpenseID:this.ExpenseID,
                    description:this.description
                }

                post('/ExpenseType/store',formData)
                    .then(response => {
                        this.ishidden = true
                        this.successMessage = response.data.message
                        setTimeout(() => location.reload(),3000)
                    })
                    .catch(error => {
                        this.hasError = true
                        const errorMessage = error.response.data.message;

                        if (Array.isArray(errorMessage)) {
                            errorMessage.forEach(errorMsg => {
                                this.ErrorMessage.push(errorMsg);
                            });
                        } else if (typeof errorMessage === 'string') {
                            this.ErrorMessage.push(errorMessage);
                        }
                    });
            },
            editForm(id){
                this.isEditing = true
                this.ishidden = !this.ishidden
                get(`/ExpenseType/edit/${id}`)
                    .then(response => {
                            this.ExpenseID = response.data.data.EXPENSE_ID,
                            this.description = response.data.data.DESCRIPTION
                    })
                    .catch(error => {
                        this.hasGlobalError = true
                        this.GlobalError = error.response.data.message
                    })
            },
            submitUpdate(){
                const formData = {
                    ExpenseID:this.ExpenseID,
                    description:this.description
                }

                put('/ExpenseType/update',formData)
                    .then(response => {
                        this.ishidden = true
                        this.successMessage = response.data.message
                        setTimeout(() => location.reload(),3000)
                    })
                    .catch(error => {
                        this.hasError = true
                        const errorMessage = error.response.data.message;

                        if (Array.isArray(errorMessage)) {
                            errorMessage.forEach(errorMsg => {
                                this.ErrorMessage.push(errorMsg);
                            });
                        } else if (typeof errorMessage === 'string') {
                            this.ErrorMessage.push(errorMessage);
                        }
                    });
            },
            destroy(id){
                deleteItem(`/ExpenseType/destroy/${id}`)
                    .then(response => {
                        this.successMessage = response.data.message
                        setTimeout(() => location.reload(),3000)
                    })
                    .catch(error => {
                        this.hasGlobalError = true
                        this.GlobalError = error.response.data.message
                    })
            }
        }
    }
</script>

<style scoped>

</style>
