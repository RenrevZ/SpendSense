<template>
    <mainLayout />

    <div class="p-4 sm:ml-64 mt-16 mb-3">
        <div class="flex justify-between items-center w-full mb-5">
            <div>
                <h1 class="text-1xl font-bold text-slate-500">Expense Per Cash Type</h1>
            </div>

            <div class="text-md flex justify-between items-center">
                <div class="flex flex-col mr-5">
                    <label class="mr-3 text-slate-600">Sort</label>

                    <select v-model="formData.sort"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            @change="SortTransaction(formData.sort)">
                        <option selected value="">All</option>
                        <option v-for="cash in CashType" :key="cash.EXPENSE_ID" :value="cash.EXPENSE_ID">
                            {{ cash.DESCRIPTION }}
                        </option>
                    </select>

                </div>

                <div class="flex flex-col">
                    <label class="text-slate-600 mr-3">Transaction Date</label>
                    <input type="date"
                           class="p-1 border border-slate-200 rounded"
                           v-model="formData.selectedDate"
                           @change="fetchTransactionDate(formData.selectedDate)">
                </div>
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-md text-center text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th>
                        Cash Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Amount
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="expense in currentUserExpensesPerCashType" :key="expense.EXPENSE_ID" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th class="px-6 py-3"> {{expense.cash_type.DESCRIPTION}}</th>
                    <td class="px-6 py-3"> {{expense.AMOUNT}}</td>
                    <td class="px-6 py-3"> {{formatDate(expense.created_at)}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="p-4 sm:ml-64 mt-16 ">
        <div class="flex justify-between items-center w-full mb-5">
            <div>
                <h1 class="text-1xl font-bold text-slate-500">Expense Per Expenses Type</h1>
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-md text-center text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th>
                        Expense Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Amount
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                </tr>
                </thead>
                <tbody>
                    <tr v-for="expenses in currentUserExpensesPerExpenseType" :key="expenses.EXPENSE_ID" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="px-6 py-3"> {{expenses.expenses_type ? expenses.expenses_type.DESCRIPTION : ''}}</th>
                        <td class="px-6 py-3"> {{expenses.AMOUNT}}</td>
                        <td class="px-6 py-3"> {{formatDate(expenses.created_at)}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


</template>

<script>
    import mainLayout from "../Setup/mainLayout.vue";
    import {get,post} from "../../Api/api";
    export default {
        components:{mainLayout},
        data(){
            return {
                Expenses:'',
                CashType:'',
                formData:{
                    sort:'',
                    selectedDate: new Date().toISOString().substr(0, 10),
                },
                currentUserExpensesPerCashType:'',
                currentUserExpensesPerExpenseType:''
            }
        },
        mounted(){
            this.fetchCurrentUserExpensesPerCashType()
            this.fetchCurrentUserExpensesPerExpenseType()
            this.fetchExpenseType()
            this.fetchCashtype()
        },
        methods:{
            formatDate(isoDate) {
                const dateObject = new Date(isoDate);
                return dateObject.toLocaleDateString(); // Display date in a user-friendly format
            },

            fetchCashtype(){
                get('/CashRegistry/index')
                    .then(response => this.CashType =  response.data.cash)
                    .catch(error =>error => {
                        this.hasError = true
                        this.ErrorMessage.push(error.response.data.message)
                    })
            },

            fetchCurrentUserExpensesPerCashType() {
                get('Summary/UserExpenses')
                  .then(response => {
                      this.currentUserExpensesPerCashType = response.data
                  })
                  .catch(error => {
                      console.log(error.message)
                  })


            },
            fetchExpenseType(){
                get('/ExpenseType/getExpenseType')
                    .then(response => this.Expenses =  response.data)
                    .catch(error =>error => {
                        this.hasError = true
                        this.ErrorMessage.push(error.response.data.message)
                    })
            },

            fetchCurrentUserExpensesPerExpenseType(){
                get('Summary/UserExpensesPerExpenses')
                    .then(response => this.currentUserExpensesPerExpenseType = response.data)
                    .catch(error => {
                        console.log(error.message)
                    })
            },

            // CASH TYPE SORTING
            fetchTransactionDate(date){
                let FormData = {
                    date:date,
                    ExpenseType:this.formData.sort
                }

                post(`Summary/UserExpensesSortedByDateAndExpense`,FormData)
                    .then(response => this.currentUserExpensesPerCashType = response.data)
                    .catch(error => {
                        this.hasError = true;
                        this.ErrorMessage.push(error.response.data.message)
                    })

            },

            SortTransaction(sort){
                let FormData = {
                    date:this.formData.selectedDate,
                    ExpenseType:sort
                }

                post('Summary/UserExpensesSorted',FormData)
                    .then(response => this.currentUserExpensesPerCashType = response.data)
                    .catch(error => console.log(error.message))
            }
        }
    }
</script>

<style scoped>

</style>
