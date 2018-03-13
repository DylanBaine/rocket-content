<template>
 <v-card class="text-xs-center padded-lg">

    <div class="text-xs-left padded">
        <h2>Register</h2>
    </div>
    <hr>
    <br>
	<v-form method="post" action="register" v-model="valid">

	    <div class="margin-auto" style="width: 80%;">

	    	<input type="hidden" v-model="csrf" name="_token">

	        <v-text-field
	            name="name"
	            label="Name"
	            v-model="name"
	            :rules="nameRules"
	        ></v-text-field>

	        <v-text-field
	            name="email"
	            label="Email"
	            v-model="email"
	            :rules="emailRules"
	        ></v-text-field>

	        <v-text-field
	            name="password"
	            type="password"
	            label="Password"
	            v-model="password"
	            :rules="passwordRules"
	        ></v-text-field>

	        <v-text-field
	            name="password_confirmation"
	            type="password"
	            label="Confirm Password"
	            v-model="confirmPassword"
	            :rules="confirmPasswordRules"
	        ></v-text-field>

	    </div>

	    <v-card-actions>
	        <v-btn type="submit" primary block>Register</v-btn>
	    </v-card-actions>                        
    </v-form>

</v-card>
</template>

<script>
	export default {
		data(){
			return {
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
				valid: false,
				name: '',
				email: '',
				password: '',
				confirmPassword: '',
				nameRules: [
					(v) => !!v || 'Name is required',
				],
				emailRules: [
					(v) => !!v || 'E-mail is required',
					(v) => /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be a valid email'
				],
				passwordRules: [
					(v) => !!v || "You must enter a password.",
					(v) => v.length > 8 || 'Email must be more than 8 characters'
				],
				confirmPasswordRules: [
					(v) => !!v || "Must match.",
					(v) => v == this.password || "Passwords must match."
				]
			}
		},

	}
</script>