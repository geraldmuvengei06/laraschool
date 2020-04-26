<template>
    <div>
        <v-container
        class="fill-height is-profile"
        fluid
      >
        <v-row
          justify="center"
          align="center"
        >
            <v-col
            cols="12"
            lg="10"
            md="10"
            sm="12"
            xs="12"
            class="col-has-margin-top"
            >
                <v-row>
                    <v-col
                    cols="12"
                    lg="3"
                    md="4"
                    sm="12"
                    xs="12"
                    >

                        <v-card flat elevation="1" class="text-center ">
                            <v-responsive class="py-4">
                            <v-avatar
                                size="100"
                                color="grey lighten-2"
                            >
                                <img :src="profile" :alt="$store.getters.username ">
                            </v-avatar>
                            </v-responsive>
                            <v-card-text>
                            <div class="subheading is-uppercase">{{ $store.getters.username }}</div>
                            <div class="grey--text is-capitalized">admin</div>
                            </v-card-text>

                            <v-card-actions>
                                <v-btn text color="success">
                                    <v-icon small left>mail</v-icon>
                                    <span>Email</span>
                                </v-btn>
                                <v-spacer></v-spacer>
                                <v-btn text color="success">
                                    <v-icon small left>phone</v-icon>
                                    <span>Call</span>
                                </v-btn>
                            </v-card-actions>

                        </v-card>

                    </v-col>
                    <!-- ./profile card col -->

                    <v-col
                    cols="12"
                    lg="9"
                    md="8"
                    sm="12"
                    xs="12"
                    >
                        <v-card flat>
                            <v-tabs
                                v-model="userTabs"
                                color="success"
                                light
                                slider-color="success lighten2"
                            >

                            <v-tabs-slider></v-tabs-slider>
                                <v-tab href="#edit">
                                    <v-icon class="pr-1" >edit</v-icon>
                                    <span>Edit</span>
                                </v-tab>
                                    <v-tab href="#password">
                                    <v-icon class="pr-1">lock</v-icon>
                                    <span>Password</span>
                                </v-tab>
                            </v-tabs>

                            <v-tabs-items v-model="userTabs">
                                <v-tab-item
                                value="edit">
                                    <v-card flat class="pb-4">
                                        <v-card-text>
                                            <v-form ref="roleForm" @submit.prevent="updateUser" >
                                                <v-row>
                                                    <v-col cols="12"
                                                    lg="3"
                                                    md="3"
                                                    sm="12"
                                                    xs=12
                                                    class="py-1">
                                                        <v-select
                                                            dense
                                                            outlined
                                                            :items="initials"
                                                            v-model="userForm.initials"
                                                            label="Initials"
                                                            overflow="hidden"
                                                            hide-details
                                                        ></v-select>
                                                        <div class="v-text-field__details">
                                                            <div class="v-messages theme--light">
                                                                <div class="v-messages__wrapper">
                                                                    <has-error :form="userForm" class="v-messages theme--light error--text" field="initials"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </v-col>

                                                    <v-col cols="12"
                                                    lg="5"
                                                    md="5"
                                                    sm="12"
                                                    xs=12
                                                    class="py-1">

                                                        <v-text-field
                                                        
                                                            dense
                                                            outlined
                                                            label="First"
                                                            name="first"
                                                            type="first"
                                                            v-model="userForm.first"
                                                            hide-details
                                                        />
                                                        <div class="v-text-field__details">
                                                            <div class="v-messages theme--light">
                                                                <div class="v-messages__wrapper">
                                                                    <has-error :form="userForm" class="v-messages theme--light error--text" field="first"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </v-col>

                                                    <v-col cols="12"
                                                    lg="4"
                                                    md="4"
                                                    sm="12"
                                                    xs=12
                                                    class="py-1">

                                                        <v-text-field
                                                        
                                                            dense
                                                            outlined
                                                            label="Last"
                                                            name="last"
                                                            type="last"
                                                            v-model="userForm.last"
                                                            hide-details
                                                        />
                                                        <div class="v-text-field__details">
                                                            <div class="v-messages theme--light">
                                                                <div class="v-messages__wrapper">
                                                                    <has-error :form="userForm" class="v-messages theme--light error--text" field="last"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </v-col>

                                                    <v-col cols="12"
                                                    lg="6"
                                                    md="6"
                                                    sm="12"
                                                    xs=12
                                                    class="py-1">
                                                        
                                                        <v-text-field
                                                        
                                                            dense
                                                            outlined
                                                            label="Email"
                                                            name="email"
                                                            append-icon="mail"
                                                            type="email"
                                                            v-model="userForm.email"
                                                            hide-details
                                                        />
                                                        <div class="v-text-field__details">
                                                            <div class="v-messages theme--light">
                                                                <div class="v-messages__wrapper">
                                                                    <has-error :form="userForm" class="v-messages theme--light error--text" field="email"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </v-col>

                                                    <v-col cols="12"
                                                    lg="6"
                                                    md="6"
                                                    sm="12"
                                                    xs=12
                                                    class="py-1">
                                                        
                                                        <v-text-field
                                                        
                                                            dense
                                                            outlined
                                                            label="Phone"
                                                            name="phone"
                                                            append-icon="phone"
                                                            type="phone"
                                                            v-model="userForm.phone"
                                                            hide-details
                                                        />
                                                        <div class="v-text-field__details">
                                                            <div class="v-messages theme--light">
                                                                <div class="v-messages__wrapper">
                                                                    <has-error :form="userForm" class="v-messages theme--light error--text" field="phone"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </v-col>

                                                     <v-col cols="12"
                                                    lg="6"
                                                    md="6"
                                                    sm="12"
                                                    xs=12
                                                    class="py-1">
                                                        
                                                        <v-text-field
                                                        
                                                            dense
                                                            outlined
                                                            label="ID Number"
                                                            name="id_number"
                                                            append-icon="person"
                                                            type="numeric"
                                                            v-model="userForm.id_number"
                                                            hide-details
                                                        />
                                                        <div class="v-text-field__details">
                                                            <div class="v-messages theme--light">
                                                                <div class="v-messages__wrapper">
                                                                    <has-error :form="userForm" class="v-messages theme--light error--text" field="id_number"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </v-col>

                                                     <v-col cols="12"
                                                    lg="6"
                                                    md="6"
                                                    sm="12"
                                                    xs=12
                                                    class="py-1">
                                                        
                                                        <v-text-field
                                                        
                                                            dense
                                                            outlined
                                                            label="Profession"
                                                            name="profession"
                                                            append-icon="grade"
                                                            type="text"
                                                            v-model="userForm.profession"
                                                            hide-details
                                                        />
                                                        <div class="v-text-field__details">
                                                            <div class="v-messages theme--light">
                                                                <div class="v-messages__wrapper">
                                                                    <has-error :form="userForm" class="v-messages theme--light error--text" field="profession"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </v-col>

                                                    <v-col cols="12"
                                                    lg="12"
                                                    md="12"
                                                    sm="12"
                                                    xs=12
                                                    class="py-1">
                                                        
                                                        <v-textarea
                                                            label="Address"
                                                            name="address"
                                                            append-icon="map"
                                                            type="text"
                                                            textarea
                                                            v-model="userForm.address"
                                                            dense
                                                            rows="2"
                                                            hide-details
                                                        />
                                                        <div class="v-text-field__details">
                                                            <div class="v-messages theme--light">
                                                                <div class="v-messages__wrapper">
                                                                    <has-error :form="userForm" class="v-messages theme--light error--text" field="address"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </v-col>
                                                    
                                                </v-row>
                                            </v-form>
                                        </v-card-text>
                                        <v-card-actions>
                                            <v-btn color="success darken-1" class="white--text ml-2" :loading="loading" @click="updateUser(userForm.id)" >Update</v-btn>
                                        </v-card-actions>
                                    </v-card>
                                </v-tab-item>
                                <v-tab-item
                                value="password">

                                    <v-card class="pb-4" flat>
                                        <v-card-text>
                                            <v-form ref="roleForm" @submit.prevent="updatePassword" >
                                                <v-row>
                                                   

                                                    <v-col cols="12"
                                                    lg="7"
                                                    md="7"
                                                    sm="12"
                                                    xs=12
                                                    class="py-1">

                                                        <v-text-field
                                                        
                                                            dense
                                                            outlined
                                                            label="Old Password"
                                                            name="old_password"
                                                            type="password"
                                                            v-model="passwordForm.old_password"
                                                            append-icon="lock"
                                                            hide-details
                                                        />
                                                        <div class="v-text-field__details">
                                                            <div class="v-messages theme--light">
                                                                <div class="v-messages__wrapper">
                                                                    <has-error :form="passwordForm" class="v-messages theme--light error--text" field="old_password"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </v-col>

                                                    <v-col cols="12"
                                                    lg="7"
                                                    md="7"
                                                    sm="12"
                                                    xs=12
                                                    class="py-1">

                                                        <v-text-field
                                                        
                                                            dense
                                                            outlined
                                                            label="New Password"
                                                            name="password"
                                                            type="password"
                                                            v-model="passwordForm.password"
                                                            append-icon="lock"
                                                            hide-details
                                                        />

                                                        <div class="v-text-field__details">
                                                            <div class="v-messages theme--light">
                                                                <div class="v-messages__wrapper">
                                                                    <has-error :form="passwordForm" class="v-messages theme--light error--text" field="password"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </v-col>

                                                    <v-col cols="12"
                                                    lg="7"
                                                    md="7"
                                                    sm="12"
                                                    xs=12
                                                    class="py-1">

                                                        <v-text-field
                                                        
                                                            dense
                                                            outlined
                                                            label="Confirm Password"
                                                            name="password_confirmation"
                                                            type="password"
                                                            v-model="passwordForm.password_confirmation"
                                                            append-icon="lock"
                                                        />
                                                        

                                                    </v-col>
                                                    
                                                </v-row>
                                            </v-form>
                                        </v-card-text>
                                        <v-card-actions>
                                            <v-btn color="success darken-1" class="white--text ml-2" :loading="loading" @click="updatePassword(userForm.id)" >Update</v-btn>
                                        </v-card-actions>
                                    </v-card>
                                    
                                </v-tab-item>
                            </v-tabs-items>
                            
                        </v-card>
                    </v-col>
                    <!-- ./profile card col -->
                </v-row>
            </v-col>
        </v-row>
      </v-container>
        <snackbar-component :message="message"  :type="type"></snackbar-component>
    </div>
</template>

<script>
import profile from '../../assets/images/profile.png';
export default {
    data() {
      return {
        sheet: false,
        profile: profile,
        userTabs: null,
        // for loading button
        loading: false,
        // for snackbar
        message : '',
        type : '',

        initials: ['Mr', 'Mrs', 'Miss', 'Dr', 'Prof'],

        userForm: new Form({
            id: '',
            initials: '',
            first: '',
            last: '',
            email: '',
            phone: '',
            id_number: '',
            address: '',
            profession: '',
        }),

        passwordForm: new Form({
            old_password: '',
            password: '',
            password_confirmation: '',
        })
      }
    },

    methods: {
        updateUser(id){
            this.userForm.put('/users/update-profile/' + id).then((res) => {
                this.message = res.data
                this.type = 'success'
                Fire.$emit('showSnackbar')
                this.editUserDialog = false
            }).catch((err) => {
                this.message = err.response.data.message
                this.type = 'error'
                Fire.$emit('showSnackbar')
            })
        },

        updatePassword(id){
            this.loading = true
            this.passwordForm.put('/users/update-password/' + id).then((res) => {
                this.message = res.data
                this.type = 'success'
                Fire.$emit('showSnackbar')
                this.editUserDialog = false
            }).catch((err) => {
                this.message = err.response.data.message
                this.type = 'error'
                Fire.$emit('showSnackbar')
            })
            this.loading = false
            
        }
    },

    mounted() {
        this.userForm.fill(this.$store.getters.user)
        this.passwordForm.reset()
    }
}
</script>

<style lang="scss" scoped>
    .col-has-margin-top{
        margin-top: 20px;
    }
    .is-paddingless{
        padding: 0px !important;
    }
</style>