<template>
    <div>
        <v-container
        class="fill-height"
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

                        <v-card flat class="text-center ">
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
                                    <v-card flat>
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
                                                        ></v-select>
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
                                                        />

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
                                                        />

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
                                                        />
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
                                                        />
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
                                                        />
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
                                                        />
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
                                                        />
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

                                    <v-card flat>
                                        <v-card-text>
                                            <v-form ref="roleForm" @submit.prevent="updateUser" >
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
                                                            v-model="userForm.old_password"
                                                            append-icon="lock"
                                                        />

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
                                                            v-model="userForm.password"
                                                            append-icon="lock"
                                                        />

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
                                                            v-model="userForm.password_confirmation"
                                                            append-icon="lock"
                                                        />

                                                    </v-col>
                                                    
                                                </v-row>
                                            </v-form>
                                        </v-card-text>
                                        <v-card-actions>
                                            <v-btn color="success darken-1" class="white--text ml-2" :loading="loading" @click="updateUser(userForm.id)" >Update</v-btn>
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
                this.message = err.response.data
                this.type = 'error'
                Fire.$emit('showSnackbar')
            })
        },
    },

    mounted() {
        this.userForm.fill(this.$store.getters.user)
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