<template>
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <router-link :to="{name:'Dashboard'}"
                                 :class="{'flex items-center p-2 bg-yellow-400 text-lime-100 rounded-lg dark:text-white hover:bg-yellow-500 dark:hover:bg-yellow-600': currentRouteName === 'Dashboard',
                                            'flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-yellow-600': currentRouteName !== 'Dashboard'}">

                        <svg aria-hidden="true" ref="dashboardSvg" class="w-6 h-6 text-gray-500  transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                        <span class="ml-3">Dashboard</span>
                    </router-link>
                </li>

                <li>
                    <router-link :to="{name:'CashRegistry'}"
                                 :class="{'flex items-center p-2 bg-yellow-400 text-lime-100 rounded-lg dark:text-white hover:bg-yellow-500 dark:hover:bg-gray-700' : currentRouteName === 'CashRegistry',
                                          'flex items-center p-2 text-gray-900 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' : currentRouteName !== 'CashRegistry'}">
                        <svg aria-hidden="true"
                             ref="CashRegistry"
                             class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"  fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Cash Registry</span>
                    </router-link>
                </li>

                <li>
                    <router-link :to="{name:'ExpenseType'}"
                                 :class="{'flex items-center p-2 bg-yellow-400 text-lime-100 rounded-lg dark:text-white hover:bg-yellow-500 dark:hover:bg-gray-700' : currentRouteName === 'ExpenseType',
                                          'flex items-center p-2 text-gray-900 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' : currentRouteName !== 'ExpenseType'}">
                        <svg ref="ExpenseType" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Expense Type</span>
                    </router-link>
                </li>

                <li>
                    <a href="#"
                       :class="{'flex items-center p-2 bg-yellow-400 text-lime-100 rounded-lg dark:text-white hover:bg-yellow-500 dark:hover:bg-gray-700' : currentRouteName === 'Goals',
                                'flex items-center p-2 text-gray-900 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' : currentRouteName !== 'Goals'}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                        </svg>

                        <span class="flex-1 ml-3 whitespace-nowrap">Budget</span>
                    </a>
                </li>
                <li>
                    <router-link :to="{name:'Reports'}"
                                 :class="{'flex items-center p-2 bg-yellow-400 text-lime-100 rounded-lg dark:text-white hover:bg-yellow-500 dark:hover:bg-gray-700' : currentRouteName === 'Reports',
                                          'flex items-center p-2 text-gray-900 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' : currentRouteName !== 'Reports'}">
                        <svg ref="ReportSvg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Reports</span>
                    </router-link>
                </li>

            </ul>
        </div>
    </aside>
</template>

<script>
    export default {
        computed: {
            currentRouteName() {
                return this.$route.name;
            },

        },
        mounted() {
            switch (this.$route.name) {
                case 'Dashboard' :
                    this.$refs.dashboardSvg.classList.remove('text-gray-500')
                    break
                case 'CashRegistry':
                    this.$refs.CashRegistry.classList.remove('text-gray-500')
                    break
                case 'ExpenseType':
                    this.$refs.ExpenseType.classList.remove('text-gray-500')
                    break;
                case 'Reports':
                    this.$refs.ReportSvg.classList.remove('text-gray-500')
                    break;
            }
        }
    }
</script>

<style scoped>

</style>
