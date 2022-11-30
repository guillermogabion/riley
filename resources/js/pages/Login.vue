<template>
<v-app>
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
                            v-model="email"
                            filled
                            rounded
                            dense
                            label="Email"
                        ></v-text-field>
                
                        <v-text-field
                            v-model="password"
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
                                @click="dialog=true"
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
    <v-dialog
    width="500px"
    v-model="dialog"
    persistent
    >
    <v-card>
        <v-card-title class="text-h5 grey lighten-2">
          Edit Profile
        </v-card-title>
        <v-card-text
        color="grey"
        style="padding-top: 1em;"
        >
        </v-card-text>
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
        </v-col>
        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn
            color="success"
            @click="register()"
            >Register</v-btn>
            <v-btn
            color="error"
            @click="registerClose()"
            >Close</v-btn>
        </v-card-actions>
    </v-card>
    </v-dialog>
</div>
</v-app>
</template>

<script>
import axios from '../plugins/axios'
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
        dialog: false,
        payload: {
            first_name: '',
            last_name : '',
            birthdate : '',
            address : '',
            landmark : '',
            contact : '',
            email : '',
            password : ''
        }
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
        },

        registerClose(){
            this.dialog = false
        },

        register(){
            axios.post('register', this.payload).then(response => {
                console.log(response.data)
                this.dialog = false
            })
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