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
      :loading="loading"
    >
    <template v-slot:item.status="{ item }">
      <v-switch
          color="primary"
          v-model="item.status"
          @click="status(item)"
        ></v-switch>
    </template>
    <template v-slot:item.actions="{ item }">
      <v-icon
        small
        class="mr-2"
        @click="editItem(item)"
      >
        mdi-pencil
      </v-icon>
    </template>
  </v-data-table>
 
  <v-dialog
  v-model="dialog"
  width="20%"
  >
  <v-card>
    <v-card-title>
      <!-- <span class="text-h5">{{ formTitle }}</span> -->
      Add New Item
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
            label="Food Classification"
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
   <v-dialog
  v-model="editDialog"
  width="20%"
  >
  <v-card>
    <v-card-title>
      <!-- <span class="text-h5">{{ formTitle }}</span> -->
      Edit Item
    </v-card-title>

    <v-card-text>
      <v-container>
        <div class="img-holder">
            <v-img
              style="width: 100px; height: 100%;"
              :src="editedItem.photo || logo"
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
              v-model="editedItem.name"
            ></v-text-field>
          </v-col>
          <v-col
          
          >
            <v-select
            :items="type"
            v-model="editedItem.type"
            filled
            item-text="name"
            item-value="name"
            label="Food Classification"
          ></v-select>
          </v-col>
          <v-col
          >
            <v-text-field
              label="Price"
              type="number"
              v-model="editedItem.price"
            ></v-text-field>
          </v-col>
      </v-container>
    </v-card-text>
    <v-card-actions>
      <v-btn
      @click="editFood()"
      >
        Save Changes
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
      loading: true,
      payload: {
        id : '',
        photo: '',
        name : '',
        type : '',
        price : ''
      },
      switch1: false,
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
        { text : 'Status', value: 'status'},
        { text : 'Actions', value: 'actions'}
      ],
      food: [],
      type: [],
      editedItem: {
        id : '',
        photo: '',
        name : '',
        price: '',
        type: '',
      },
      editedIndex: -1,
      editDialog : false,
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
              this.loading = false
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
      },
      status(item){
        axios.put('food_status/' + item.id).then(response=> {
          console.log(response.data)
        })

      },
      editItem(item) {
        this.editedIndex = this.food.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.editDialog = true
      },
      editFood(){

        const imageLabel = document.getElementById('fileData');

        let payload = this.editedItem
        if (imageLabel.value == '') {
          axios.post('editFoodnoPic/' + payload.id, payload ).then(response =>  {
          console.log(response.data)
          this.show()
          this.editDialog = false
        })
        }else {
          axios.post('editFood/' + payload.id, payload ).then(response =>  {
          console.log(response.data)
          this.loading = true
          this.show()
          this.editDialog = false
        })
      }
    }
  }
}
</script>