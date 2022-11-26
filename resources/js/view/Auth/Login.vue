<template>
  <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
	<div class="relative py-3 sm:max-w-xl sm:mx-auto">
		<div
			class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
		</div>
		<div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
			<div class="max-w-md mx-auto">
				<div class="flex justify-center">
					<h1 class="text-2xl font-semibold text-sky-600"><span class="text-3xl text-sky-800">X</span>pense Tracker <i class="fas fa-search-dollar text-sky-700 text-5xl"></i></h1>
				</div>
				<div class="divide-y divide-gray-200">
                    <form action="/login/submit" @submit.prevent="SubmitForm">
					    <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
						<div class="relative flex">
                                <span class="p-3">
                                    <i class="fas fa-user-alt text-sky-600 ml"></i>
                                </span>
                                <input autocomplete="off" v-model="username" id="email" name="email" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 focus:border-sky-300" placeholder="Email address" />
                                <label for="username" class="absolute left-10 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                                    Username</label>
						</div>
						<div class="relative flex">
                            <span class="p-3">
                                <i class="fas fa-user-lock text-sky-600 ml"></i>
                                </span>
							<input autocomplete="off" v-model="password" id="password" name="password" type="password" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 focus:border-sky-300" placeholder="Password" />
							<label for="password" class="absolute left-10 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
						</div>
						<div class="relative">
							<button type="submit" class="bg-blue-500 text-white rounded-md px-2 py-1 w-72"><i class="fa-solid fa-key"></i> Submit</button>
						</div>

                        <div class="relative flex justify-end">
                            <span class="text-sm"> dont have account yet? <a href="/signup" class="text-sky-700">Login</a></span>
                        </div>
					    </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>
</template>

<script>
export default {
    data(){
        return{
            username : '',
            password : '',
        }
    },
    methods:{
        SubmitForm(e){
            console.log(this.password,this.username)
        }
    }
}
</script>

<style>

</style>
