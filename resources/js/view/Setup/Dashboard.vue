<template>
    <!-- MAIN LAYOUT   -->
    <main-layout />
    <div class="p-4 sm:ml-64 mt-16 ">
        <div class="flex justify-between items-center w-fulll">
            <div>
                <h1 class="text-1xl font-bold text-slate-500">Balance Overview</h1>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-2 mb-10">
            <div class="max-w-xl p-6 bg-white border border-gray-200 rounded-lg shadow-lg shadow-cyan-500/50 dark:bg-gray-800 dark:border-gray-700">
                <GoogleChart
                    :type="'LineChart'"
                    :chartData="chartData"
                    :chartOptions="chartOptions"
                    :chartWidth="'80%'"
                    :chartHeight="'3000px'"
                />
            </div>

            <div>
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md shadow-yellow-300/50 dark:bg-gray-800 dark:border-gray-700 mb-3">
                    <div class="flex flex-col justify-center items-center">
                        <div class="flex justify-start items-center w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 text-slate-100 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white bg-amber-400 rounded shadow-md">
                                <path d="M10.75 10.818v2.614A3.13 3.13 0 0011.888 13c.482-.315.612-.648.612-.875 0-.227-.13-.56-.612-.875a3.13 3.13 0 00-1.138-.432zM8.33 8.62c.053.055.115.11.184.164.208.16.46.284.736.363V6.603a2.45 2.45 0 00-.35.13c-.14.065-.27.143-.386.233-.377.292-.514.627-.514.909 0 .184.058.39.202.592.037.051.08.102.128.152z" />
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-6a.75.75 0 01.75.75v.316a3.78 3.78 0 011.653.713c.426.33.744.74.925 1.2a.75.75 0 01-1.395.55 1.35 1.35 0 00-.447-.563 2.187 2.187 0 00-.736-.363V9.3c.698.093 1.383.32 1.959.696.787.514 1.29 1.27 1.29 2.13 0 .86-.504 1.616-1.29 2.13-.576.377-1.261.603-1.96.696v.299a.75.75 0 11-1.5 0v-.3c-.697-.092-1.382-.318-1.958-.695-.482-.315-.857-.717-1.078-1.188a.75.75 0 111.359-.636c.08.173.245.376.54.569.313.205.706.353 1.138.432v-2.748a3.782 3.782 0 01-1.653-.713C6.9 9.433 6.5 8.681 6.5 7.875c0-.805.4-1.558 1.097-2.096a3.78 3.78 0 011.653-.713V4.75A.75.75 0 0110 4z" clip-rule="evenodd" />
                            </svg>
                            <h1 class="text-slate-500 font-bold ml-10">Cash Balance</h1>
                        </div>
                        <h1 class="text-slate-500 font-bold text-sky-500">10000</h1>
                    </div>
                </div>

                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md shadow-rose-500/50 dark:bg-gray-800 dark:border-gray-700 mb-3">
                    <div class="flex flex-col justify-center items-center">
                        <div class="flex justify-start items-center w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 text-slate-100 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white bg-rose-400 rounded shadow-md">
                                <path d="M12 9a1 1 0 01-1-1V3c0-.553.45-1.008.997-.93a7.004 7.004 0 015.933 5.933c.078.547-.378.997-.93.997h-5z" />
                                <path d="M8.003 4.07C8.55 3.992 9 4.447 9 5v5a1 1 0 001 1h5c.552 0 1.008.45.93.997A7.001 7.001 0 012 11a7.002 7.002 0 016.003-6.93z" />
                            </svg>
                            <h1 class="text-slate-500 font-bold ml-10">Total Expenses</h1>
                        </div>
                        <h1 class="text-slate-500 font-bold text-sky-500">10000</h1>
                    </div>
                </div>

                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col justify-center items-center">
                        <h1 class="text-slate-500 font-bold">Total Expenses</h1>
                        <h1 class="text-slate-500 font-bold text-sky-500">10000</h1>
                    </div>
                </div>
            </div>

            <div class="flex flex-col justify-center items-center">
                <button @click="ishidden = !ishidden" class=" focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                    + Add Expenses
                </button>
                <button class="flex focus:outline-none text-white bg-teal-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>
                    Import Expenses
                </button>
            </div>
        </div>

        <div class="justify-between items-center w-fulll">
            <h1 class="text-1xl font-bold text-slate-500">Transaction Overview</h1>
        </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Expense Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Transaction Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Amount
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Action</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        E-cash
                    </th>
                    <td class="px-6 py-4">
                        Gcash
                    </td>
                    <td class="px-6 py-4">
                        -300
                    </td>
                    <td class="px-6 py-4">
                        May 03,2023
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <modal :ishidden="ishidden">
            <form>
                <div class="mb-6">
                    <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expense Type</label>
                    <select name="" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Food</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expended Type</label>
                    <select  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Cash</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                    <input type="number"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                </div>

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Expenses</button>
            </form>
        </modal>
    </div>
</template>

<script>
    import mainLayout from "./mainLayout.vue";
    import GoogleChart  from "../components/Chart.vue";
    import modal from "../components/modal.vue";
    export default {
        components: {mainLayout,GoogleChart,modal},
        data() {
            return {
                chartData: [
                    ['Month', 'Income', 'Expenses'],
                    ['June',  1000,      400],
                    ['July',  1170,      460],
                    ['August',  660,       1120],
                    ['September',  1030,      540]
                ],
                chartOptions: {
                    title: 'Income Vs Expenses',
                    curveType: 'function',
                    legend: { position: 'bottom' },
                    animation: {
                        startup: true, // Enable animation on initial load
                        duration: 2000, // Animation duration in milliseconds
                        easing: 'out' // Animation easing function
                    }
                },
                ishidden:true
            };
        },
    }
</script>


<style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@200&display=swap');
    body{
        font-family: 'Public Sans', sans-serif;
    }

</style>
