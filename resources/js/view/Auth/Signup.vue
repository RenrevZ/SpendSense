<template>
    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
	<div class="relative py-3 sm:max-w-xl sm:mx-auto">
		<div
			class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
		</div>
		<div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
			<div class="max-w-md mx-auto">
                <div class="flex justify-center">
                    <h1 class="text-3xl text-sky-600">Sign Up</h1>
                </div>
                <form action="/login/submit" @submit.prevent="SubmitForm">
                <div class="border-t-2 border-sky-200 pt-3">
                    <div class="container md:flex">
                        <div class="relative flex md:w-80 mb-2">
                                <span class="p-3">
                                    <i class="far fa-user text-lg text-sky-600 ml"></i>
                                </span>
                                    <input autocomplete="off" v-model="username" id="username" name="email" type="text" class="peer h-10 placeholder-transparent w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 focus:border-sky-300" placeholder="Email address" />
                                    <label for="username" class="absolute left-10 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                                        Username</label>
                        </div>
                        <span class="flex flex-col">
                         <!-- ERROR MESSAGE FOR USERNAME-->
                         <small class="text-rose-500 flex justify-center" id="error_username"></small>
                        </span>

                        <div class="relative flex md:w-80 mb-2">
                                <span class="p-3">
                                    <i class="far fa-user text-lg text-sky-600 ml"></i>
                                </span>
                                    <input autocomplete="off" v-model="Fullname" id="fullname" name="email" type="text" class="peer h-10 placeholder-transparent w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 focus:border-sky-300" placeholder="Email address" />
                                    <label for="username" class="absolute left-10 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                                        Full Name</label>
                        </div>
                        <!-- ERROR MESSAGE FOR FULLNAME-->
                        <small class="text-rose-500 flex justify-center" id="error_fullname"></small>
                    </div>
                    <div class="mb-2">
                        <div class="relative flex mb-2">
                                <span class="p-3">
                                    <i class="fas fa-user-lock text-sky-600 ml"></i>
                                </span>
                                    <input autocomplete="off" v-model="password" id="password" name="email" type="text" class="peer h-10 placeholder-transparent w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 focus:border-sky-300" placeholder="Email address" />
                                    <label for="username" class="absolute left-10 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                                        Password</label>
                        </div>
                         <!-- ERROR MESSAGE FOR EMAIL-->
                         <small class="text-rose-500 flex justify-center" id="error_pass"></small>
                        <div class="relative flex">
                                <span class="p-3">
                                    <i class="fas fa-user-lock text-sky-600 ml"></i>
                                </span>
                                <input autocomplete="off" v-model="Repeatpass" id="repeat_pass" name="email" type="text" class="peer h-10 placeholder-transparent w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 focus:border-sky-300" placeholder="Email address" />
                                <label for="username" class="absolute left-10 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                                    Repeat Password</label>
                        </div>
                    </div>

                    <div>
                        <div class="relative flex">
                                <span class="p-3 text-sky-600 ml">
                                    <i class="far fa-envelope"></i>
                                </span>
                                    <input autocomplete="off" v-model="email" id="email" name="email" type="text" class="peer h-10 placeholder-transparent w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 focus:border-sky-300" placeholder="Email address" />
                                    <label for="username" class="absolute left-10 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                                        Email</label>

                        </div>
                        <!-- ERROR MESSAGE FOR EMAIL-->
                        <small class="text-rose-500 flex justify-center" id="error_email"></small>
                    </div>
                </div>

                <div class="border-b-2 border-sky-200 flex justify-center">
                    <div class="contaner mb-2">
                        <button type="submit" class="bg-blue-500 text-white rounded-md px-2 py-1 w-72"><i class="fa-solid fa-key"></i> Submit</button>
                    </div>
                </div>
            </form>
            </div>
		</div>
	</div>
</div>
</template>

<script>
export default {
    data(){
        return {
            username : '',
            Fullname : '',
            password : '',
            Repeatpass : '',
            email    : ''
        }
    },
    methods:{
        SubmitForm(){
            axios.post('/api/login/user',{
                name:this.Fullname,
                username:this.username,
                password:this.password,
                email:this.email
            })
            .then(response => {
                console.log(response);
            })
            .catch(err => {

                function ErrorMessage(input,error,errordata){
                    error = document.getElementById(error);
                    input = document.getElementById(input);
                    error.innerHTML = errordata;
                    input.classList.add('border-rose-500');
                }

                ErrorMessage('email','error_email',err.response.data.errors.email[0])
                ErrorMessage('password','error_pass',err.response.data.errors.password[0])
                ErrorMessage('username','error_username',err.response.data.errors.username[0])
                ErrorMessage('fullname','error_fullname',err.response.data.errors.name[0])
            })
        }
    }
}
</script>

<style>

</style>
