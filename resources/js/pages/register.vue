<template>
    <div>
    <v-sheet
    style="max-height: 101.2vh;"
    fluid
    >
    <div class="text-center login">
                    <v-card
                    width="500"
                    class="mx-auto"
                    elevation="3"
                    color="white"
                    >
                    <v-card>
                        <div
                         style="padding-top: 4%"
                        >
                        <v-img 
                        contain
                        :src="logocard"
                        max-height="30%"
                        width="50%"
                        class="mx-auto"
                        />
                    </div>

                    <v-col>
                        <v-text-field
                            v-model="payload.first_name"
                            filled
                            rounded
                            dense
                            label="First Name"
                        ></v-text-field>
                        <v-text-field
                            v-model="payload.last_name"
                            filled
                            rounded
                            dense
                            label="Last Name"
                        ></v-text-field>
                        <v-text-field
                            v-model="payload.birthdate"
                            filled
                            rounded
                            dense
                            label="Birth Date"
                        ></v-text-field>
                        <v-text-field
                            v-model="payload.address"
                            filled
                            rounded
                            dense
                            label="Address"
                        ></v-text-field>
                        <v-text-field
                            v-model="payload.landmark"
                            filled
                            rounded
                            dense
                            label="Landmark"
                        ></v-text-field>
                        <v-text-field
                            v-model="payload.contact"
                            filled
                            rounded
                            dense
                            label="Contact Number"
                        ></v-text-field>
                        <v-text-field
                            v-model="payload.email"
                            filled
                            rounded
                            dense
                            label="Email"
                        ></v-text-field>
                
                        <v-text-field
                            v-model="payload.password"
                            filled
                            rounded
                            dense
                            :type="isPasswordVisible ? 'text' : 'password'"
                            label="Password"
                            placeholder="············"
                            :append-icon="isPasswordVisible ? icons.mdiEyeOffOutline : icons.mdiEyeOutline"
                            @click:append="isPasswordVisible = !isPasswordVisible"
                        
                        ></v-text-field>
                        
                        <v-card-actions>
                        <v-spacer></v-spacer>
                            <v-btn
                                rounded
                                color="success"
                                class= "mb-2 px-7"
                                @click="Login()"
                            >
                                Login
                            </v-btn>
                            <v-btn
                                rounded
                                color="primary"
                                class= "mb-2 px-3"
                            >
                                Register
                            </v-btn>
                        <v-spacer></v-spacer>
                        </v-card-actions>
                    </v-col>
                    </v-card>
                    </v-card>
                </div>
     
    </v-sheet>
</div>
</template>
<script>
import logo from '../assets/rileylogo.png'
import logocard from '../assets/rileylogo.png'
import { mdiEyeOutline, mdiEyeOffOutline } from '@mdi/js'
import { login } from "../repositories/user.api";
export default {
   data() {
    return {
        isPasswordVisible: false,
        icons: {
            mdiEyeOutline,
            mdiEyeOffOutline,
        },
        logo, 
        logocard,
        email: '',
        password: '',
    }
   },
   methods : {
        Login() {
          const login_data = {
              email: this.email,
              password: this.password
          }
          login(login_data).then(({data}) => {
            //   this.$store.commit('login', data)
              localStorage.setItem('token', data.access_token)
              this.routeEnter();
          }).catch((errors)=> {
              console.log(errors)
              alert("Invalid Credentials");
            //   this.snackbar = true
              
          })
        },
        routeEnter(){
            this.$router.push('/dashboard');
        },
        routeAttend(){
            this.$router.push('/attendance');
        }
   }
}
</script>
<style>
/* .login-page {
padding-top : 10em;
background-color: green;
} */
body {
  overflow: hidden; /* Hide scrollbars */
}

.login {
    padding-top: 10%;
}



.border {
    background-color: white;
    border-top-left-radius: 100% 55%;
    border-bottom-left-radius: 100% 55%;
    height: 100%;
    border-style: solid;
    border-width: 5px;
    box-shadow: 2px 2px 4px #000000;
    padding-left: 2em;
    padding-right: 2em;
}

</style>