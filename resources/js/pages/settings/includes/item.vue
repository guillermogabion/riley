<template>
  <v-card>
    <v-card-title>
      Food and Drinks
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="mdi-magnify"
        label="Search"
        single-line
        hide-details
      ></v-text-field>
      <div class="pa-2">
        <v-btn
        color="primary"
        @click="dialog=true"
        >
          Add Item
        </v-btn>
      </div>
    </v-card-title>
    <v-data-table
      :headers="headers"
      :items="food"
      :search="search"
    >
  </v-data-table>
  <v-dialog
  v-model="dialog"
  width="20%"
  >
  
  <v-card>
    <v-card-title>
      <!-- <span class="text-h5">{{ formTitle }}</span> -->
    </v-card-title>

    <v-card-text>
      <v-container>
        <div class="img-holder">
            <v-img
              style="width: 100px; height: 100%;"
              :src="this.payload.photo || logo"
            >
            <div class="upload-options" required style="padding-top: 5px;">
              <input
                accept="image/png, image/gif, image/jpeg"
                id="fileData"
                type="file"
                @change="onFileChange"
                style="padding-left: 20%;"
                class="fileInput hidden"
              />

            </div>
            </v-img>
          </div>
          <v-col
          
          >
            <v-text-field
              label="Name"
              v-model="payload.name"
            ></v-text-field>
          </v-col>
          <v-col
          
          >
            <v-select
            :items="type"
            v-model="payload.type"
            filled
            item-text="name"
            item-value="name"
            label="Filled style"
          ></v-select>
          </v-col>
          <v-col
          >
            <v-text-field
              label="Price"
              type="number"
              v-model="payload.price"
            ></v-text-field>
          </v-col>
      </v-container>
    </v-card-text>
    <v-card-actions>
      <v-btn
      @click="addFood()"
      >
        Save
      </v-btn>
      <v-btn>
        Close
      </v-btn>
    </v-card-actions>
  </v-card>
  </v-dialog>
  </v-card>
</template>
<script>
import axios from '../../../plugins/axios'
import logo from '../../../assets/logos/cc.png'
export default {
  data () {
    return {
      payload: {
        id : '',
        photo: '',
        name : '',
        type : '',
        price : ''
      },
      logo,
      dialog: false,
      search: '',
      headers: [
        {
          text: 'Name',
          align: 'start',
          sortable: false,
          value: 'name',
        },
        { text: 'Type', value: 'type' },
        { text: 'Price', value: 'price' },
        // { text: 'Address', value: 'address' },
        // { text: 'Contact', value: 'contact' },
        // { text: 'email', value: 'email' },
        // { text: 'Actions', value: 'actions' },
      ],
      food: [],
      type: [],
    }
  },
  mounted(){
      this.show()
      this.getType()
  },
  methods: {
      show(){
          axios.get('searchFood').then(response => {
              console.log(response.data)
              this.food = response.data
          })
      },
      onFileChange(e) {
        var files = e.target.files || e.dataTransfer.files;
        this.createImg(files[0]);
      },
      createImg(file){
        var reader = new FileReader; 
        reader.onload = (e) => {
          this.payload.photo = e.target.result;
          };
        reader.readAsDataURL(file)
      },
      addFood(){
        if(!this.payload.id){
            axios.post('addFood', this.payload).then(response => {
            console.log(response.data)
            this.show();
            this.dialog = false
            this.clear()
          })
        }else {
            axios.post('editFood/' + this.payload.id, this.payload ).then(response => {
            console.log(response.data)
            this.show()
            this.dialog = false
            this.clear()
          })
        }
      
      },
      editFood() {
       
      },
      clear(){
        this.$nextTick(() => {
          this.payload = Object.assign({}, this.payload)
          this.editedIndex = -1
        })
      },

      getType(){
        axios.get('getType').then(response => {
          console.log(response.data)
          this.type = response.data
        })
      }
  }
}
</script>