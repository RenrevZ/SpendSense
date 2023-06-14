<template>
  <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
	<div class="relative py-3 sm:max-w-xl sm:mx-auto">
		<div
			class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
		</div>
		<div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">

            <SuccessMessage :message="message"/>
            <ErrorMessage :errorMessage="Error" :hasError="hasError"/>

			<div class="max-w-md mx-auto">
				<div class="flex justify-center">
					<h1 class="text-2xl font-semibold text-sky-600"><i class="fa-solid fa-dollar-sign"></i>pendSense</h1>
				</div>
				<div class="divide-y divide-gray-200">
                    <form action="/login/submit" @submit.prevent="SubmitForm">
					    <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
						<div class="relative flex">
                                <span class="p-3">
                                    <i class="fas fa-user-alt text-sky-600 ml"></i>
                                </span>
                                <input autocomplete="off" v-model="username" id="username" name="email" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 focus:border-sky-300" placeholder="Email address" />
                                <label for="username" class="absolute left-10 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                                    Username</label>
						</div>

                         <!-- ERROR MESSAGE FOR PASSWORD-->
                         <small class="text-rose-500 flex justify-center my-2" id="error_username"></small>

						<div class="relative flex">
                            <span class="p-3">
                                <i class="fas fa-user-lock text-sky-600 ml"></i>
                                </span>
							<input autocomplete="off" v-model="password" id="password" name="password" type="password" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 focus:border-sky-300" placeholder="Password" />
							<label for="password" class="absolute left-10 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
						</div>

                         <!-- ERROR MESSAGE FOR PASSWORD-->
                         <small class="text-rose-500 flex justify-center my-2" id="error_pass"></small>

                            <div v-if="isLoading">
                                <button disabled type="button" class="w-full block text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex items-center">
                                    <svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                    </svg>
                                    Logging in...
                                </button>
                            </div>
                            <div v-else>
                                <div class="relative">
                                    <button type="submit" class="bg-blue-500 hover:scale-105 transition-all text-white rounded-md px-2 py-1 w-full">Login</button>
                                </div>
                            </div>

                        <div class="relative flex justify-between align-bottom">

                            <a href="#" class="bg-sky-500 hover:scale-105 transition-all text-white rounded-md px-1 py-1 w-32 text-center">
                                   <small>Forgot Pass</small>
                            </a>

                            <a href="/signup" class="bg-sky-500 hover:scale-105 transition-all text-white rounded-md px-1 py-1 w-32 text-center">
                                   <small>Signup</small>
                            </a>
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
import SuccessMessage from '../components/Success-Alert.vue';
import ErrorMessage from "../components/ErrorMessage.vue";

export default {
    components:{SuccessMessage,ErrorMessage},
    data(){
        return{
            username : '',
            password : '',
            message  : '',
            Error: [],
            hasError: false,
            isLoading:false
        }
    },
    methods:{
        SubmitForm(e){
            axios.post('/api/Login/user',{
                username : this.username,
                password : this.password
            })
            .then(response => {
                this.isLoading = true
                if(response.data == 'success'){
                    this.message = 'Thank you for Signing in';

                    setTimeout(() =>{
                    this.$router.push({name : 'Dashboard'})
                        this.isLoading = false
                    },3000)
                }else{

                    function ErrorMessage(input,error,errordata){
                        error = document.getElementById(error);
                        input = document.getElementById(input);
                        error.innerHTML = errordata;
                        input.classList.add('border-rose-500');
                        setTimeout(() =>{
                            input.classList.remove('border-rose-500')
                            error.textContent = ''
                        },3000)
                    }

                    ErrorMessage('password','error_pass','Error User credentials is not valid')
                    this.isLoading = false
                }

            })
            .catch(err => {
                this.isLoading = true
                function ErrorMessage(input,error,errordata){
                        error = document.getElementById(error);
                        input = document.getElementById(input);
                        error.innerHTML = errordata;
                        input.classList.add('border-rose-500');
                        setTimeout(() =>{
                            input.classList.remove('border-rose-500')
                            error.textContent = ''
                        },3000)
                    }

                    function checkifTrue(error,data){
                        if(error){
                            data
                        }
                    }

                    if(err.response.data.message){
                        this.hasError = true
                        this.Error.push(err.response.data.message)
                        setTimeout(() => {
                            this.hasError = false
                            this.Error = ['']
                        },4000)

                        this.isLoading = false
                    }

                    checkifTrue(err.response.data.errors,
                                ErrorMessage('password','error_pass',err.response.data.errors.password[0]))

                    checkifTrue(err.response.data.message,
                                ErrorMessage('password','error_pass',err.response.data.message))

                    checkifTrue(err.response.data.errors,
                                ErrorMessage('username','error_username',err.response.data.errors.username[0]))
            })
        }
    }
}
</script>

<style>

</style>
