<template>
    <div
  
    >
        <v-menu
          button
          offset-y
          content-class="bubble-menu"
          style="z-index:999"
        >
          <template
            v-slot:activator="{ on }"
          >
            <v-avatar
              color="white"
              v-on="on"
              size="32"
              class="clicker"
            >
              <v-img
                  :src="logo"
                  contain
                  alt="admin"
              />
            </v-avatar>
          </template>
           <v-list
              dense
              class="clicker"
            >
              <v-list-item
                dense
                class="text-capitalize"
                @click = "dialog = true"
              >
                edit profile
              </v-list-item>
              <v-list-item
                dense
                class="text-capitalize"
                @click="logout"
              >
                logout
              </v-list-item>
              <v-list-item
                dense
                class="text-capitalize"
                @click="backHome()"
              >
                 Back Home
              </v-list-item>
            </v-list>
        </v-menu>
        <v-dialog
        v-model="dialog"
        >
        <v-dialog
    width="500px"
    v-model="dialog"
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
                v-model="user.first_name"
                filled
                rounded
                dense
                label="First Name"
            ></v-text-field>
            <v-text-field
                v-model="user.last_name"
                filled
                rounded
                dense
                label="Last Name"
            ></v-text-field>
            <v-text-field
                v-model="user.birthdate"
                filled
                rounded
                dense
                label="Birth Date"
            ></v-text-field>
            <v-text-field
                v-model="user.address"
                filled
                rounded
                dense
                label="Address"
            ></v-text-field>
            <v-text-field
                v-model="user.landmark"
                filled
                rounded
                dense
                label="Landmark"
            ></v-text-field>
            <v-text-field
                v-model="user.contact"
                filled
                rounded
                dense
                label="Contact Number"
            ></v-text-field>
           
        </v-col>
        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn
            color="green"
            @click="update()"
            >
              Save
            </v-btn>
        </v-card-actions>
    </v-card>
    </v-dialog>
        </v-dialog>
    </div>
  </template>
  <script>
  import axios from '../../plugins/axios'
  import logo from '../../assets/rileylogo.png'
  export default {
    data(){
      return {
        logo,
        dialog: false ,
        payload : {
          first_name: '',
          last_name : '',
          birthdate : '',
          address : '',
          landmark : '',
          contact : ''
        },
        user: []
      }
    },
    methods:{
      logout(){
        localStorage.setItem('token', '')
        location.reload();
      },
      getProfile(){
        axios.get('getProfile').then(response => {
          console.log(response.data)
          this.user = response.data
        })
      },
      update(){
        axios.post('updateUser/' + this.user.id, this.user).then(response => {
          console.log(response.data)
          this.dialog = false
        })
      },
      backHome(){
        window.location.href = '/design';
      }
    },
    mounted(){
      this.getProfile()
    }
  }
  </script>
  
  