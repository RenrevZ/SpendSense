<template>
    <mainLayout />

    <div class="p-4 sm:ml-64 mt-16 ">
        <div class="flex justify-between items-center w-full mb-5">
            <div>
                <h1 class="text-1xl font-bold text-slate-500">Expense Per Cash Type</h1>
            </div>
        </div>


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
                <th> {{expense.cash_type.DESCRIPTION}}</th>
                <th> {{expense.AMOUNT}}</th>
                <th> {{formatDate(expense.created_at)}}</th>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import mainLayout from "../Setup/mainLayout.vue";
    import {get,post} from "../../Api/api";
    export default {
        components:{mainLayout},
        data(){
            return {
                currentUserExpensesPerCashType:''
            }
        },
        mounted(){
            this.fetchCurrentUserExpenses()
        },
        methods:{
            formatDate(isoDate) {
                const dateObject = new Date(isoDate);
                return dateObject.toLocaleDateString(); // Display date in a user-friendly format
            },
            fetchCurrentUserExpenses() {
                get('Summary/UserExpenses')
                  .then(response => {
                      console.log(response.data)
                      this.currentUserExpensesPerCashType = response.data
                  })

            }
        }
    }
</script>

<style scoped>

</style>
