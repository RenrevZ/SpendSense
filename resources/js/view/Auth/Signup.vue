<template>
    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
	<div class="relative py-3 sm:max-w-xl sm:mx-auto">
		<div
			class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
		</div>
		<div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
            <!-- ==== SUCCESS MESSAGE ==== -->
            <SuccessMessage :message="message"/>

			<div class="max-w-md mx-auto">
                <div class="flex justify-center">
                    <h1 class="text-3xl text-sky-600">Sign Up</h1>
                </div>
                <form action="/login/submit" @submit.prevent="SubmitForm">
                <div class="border-t-2 border-sky-200 pt-3">
                     <!-- ERROR MESSAGE FOR USERNAME-->
                     <span class="md:flex justify-around">
                            <small class="text-rose-500 flex justify-center transition-all" id="error_username"></small>
                             <!-- ERROR MESSAGE FOR FULLNAME-->
                            <small class="text-rose-500 flex justify-center transition-all" id="error_fullname"></small>
                     </span>

                    <div class="container md:flex">
                        <div class="relative flex md:w-80 mb-2">
                            <!-- ==== USERNAME ===== -->
                                <span class="p-3">
                                    <i class="far fa-user text-lg text-sky-600 ml"></i>
                                </span>
                                    <input autocomplete="off" v-model="username" id="username" type="text" class="peer h-10 placeholder-transparent w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 focus:border-sky-300" placeholder="Email address" />
                                    <label for="username" class="absolute left-10 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                                        Username</label>
                        </div>


                        <div class="relative flex md:w-80 mb-2">
                             <!-- ==== FULLNAME ===== -->
                                <span class="p-3">
                                    <i class="far fa-user text-lg text-sky-600 ml"></i>
                                </span>
                                    <input autocomplete="off" v-model="Fullname" id="fullname" name="email" type="text" class="peer h-10 placeholder-transparent w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 focus:border-sky-300" placeholder="Email address" />
                                    <label for="username" class="absolute left-10 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                                        Full Name</label>
                        </div>

                    </div>
                    <div class="mb-2">
                        <div class="relative flex mb-2">
                             <!-- ==== PASSWORD ===== -->
                                <span class="p-3">
                                    <i class="fas fa-user-lock text-sky-600 ml"></i>
                                </span>
                                    <input autocomplete="off" v-model="password" id="password" name="email" type="password" class="peer h-10 placeholder-transparent w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 focus:border-sky-300" placeholder="Email address" />
                                    <label for="username" class="absolute left-10 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                                        Password</label>
                        </div>
                         <!-- ERROR MESSAGE FOR PASSWORD-->
                         <small class="text-rose-500 flex justify-center my-2" id="error_pass"></small>
                        <div class="relative flex">
                             <!-- ==== REPEAT PASSWORD ===== -->
                                <span class="p-3">
                                    <i class="fas fa-user-lock text-sky-600 ml"></i>
                                </span>
                                <input autocomplete="off" v-model="password_confirmation" id="repeat_pass" name="password_confirmation  " type="password" class="peer h-10 placeholder-transparent w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 focus:border-sky-300" placeholder="Email address" />
                                <label for="username" class="absolute left-10 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                                    Repeat Password</label>
                        </div>
                    </div>

                    <div>
                        <div class="relative flex">
                             <!-- ==== EMAIL ===== -->
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
                        <button type="submit" class="bg-blue-500 text-white rounded-md px-2 py-1 w-72 hover:scale-105 transition-all"><i class="fa-solid fa-key"></i> Submit</button>
                    </div>
                </div>
                <!-- ==== END FORM === -->
            </form>
            </div>
		</div>
	</div>
</div>
</template>

<script>
 import SuccessMessage from '../components/Success-Alert.vue';

export default {
    components:{SuccessMessage},

    data(){
        return {
            username : '',
            Fullname : '',
            password : '',
            password_confirmation : '',
            email    : '',
            message  : ''
        }
    },
    methods:{
        SubmitForm(){
            axios.post('/api/Signup/user',{
                name:this.Fullname,
                username:this.username,
                password:this.password,
                password_confirmation: this.password_confirmation,
                email:this.email
            })
            .then(response => {
                this.message = 'You can now Login';
                setTimeout(() =>{
                    this.$router.push({name : 'login'})
                },3000)
            })
            .catch(err => {
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

                    checkifTrue(err.response.data.errors.email,
                                ErrorMessage('email','error_email',err.response.data.errors.email[0]))

                    checkifTrue(err.response.data.errors.password,
                                ErrorMessage('password','error_pass',err.response.data.errors.password[0]))

                    checkifTrue(err.response.data.errors.username,
                                ErrorMessage('username','error_username',err.response.data.errors.username[0]))

                    checkifTrue(err.response.data.errors.name,
                                ErrorMessage('fullname','error_fullname',err.response.data.errors.name[0]))
            })
        }
    }
}
</script>

<style scoped>
</style>
