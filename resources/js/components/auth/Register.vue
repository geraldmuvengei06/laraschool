<template>
  <v-app id="inspire">
    <v-content>
      <v-container
        class="fill-height"
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col
            cols="12"
            md="8"
            sm="6"
            class="hidden-xs-only is-background primary"
          >
            <div class="is-background-content">
              <v-spacer></v-spacer>
              <p class="is-logo white primary--text" >LS</p>
              <h4 class="title white--text">Laraschool</h4>
              <p class="subtitle-2 white--text">A school management system</p>
              <v-spacer></v-spacer>
              <p class="subtitle-2 white--text"><v-icon class="white--text">link</v-icon> Visit <a class="white--text" href="https://thundersoftwares.com">thundersoftwares.com</a> </p>
            </div>
          </v-col>

          <v-col
            cols="12"
            md="8"
            sm="6"
            class="hidden-sm-and-up is-background"
          >
          <div class="is-background-content-mini mt-6">
            <v-spacer></v-spacer>
            <p class="is-logo primary white--text" >LS</p>
            <h4 class="title accent--text">Laraschool</h4>
            <p class="subtitle-2 accent--text">A school management system</p>
            <v-spacer></v-spacer>
          </div>
          
          </v-col>
        
          <v-col
            cols="12"
            sm="6"
            md="4"
            xs="12"
          >
            <v-card class="elevation-0 flat ma-4">
              <v-toolbar
                color="transparent"
                light
                flat
              >
                <v-toolbar-title>{{ title }}</v-toolbar-title>
                <v-spacer />
                <v-tooltip bottom>
                  <template v-slot:activator="{ on }">
                    <v-btn
                      :href="source"
                      icon
                      large
                      target="_blank"
                      v-on="on"
                    >
                      <v-icon>help</v-icon>
                    </v-btn>
                  </template>
                  <span>Source</span>
                </v-tooltip>
               
              </v-toolbar>
              <v-card-text>
                <v-form>
                
                <v-row>
                    <v-col cols="12"
                    lg="6"
                    md="6"
                    sm="12"
                    xs=12>

                        <v-text-field
                            label="First"
                            name="first"
                            dense
                            outlined
                            append-icon="person"
                            type="first"
                            v-model="form.first"
                        />
                        <has-error :form="form" class="v-messages theme--light error--text" field="first"></has-error>

                    </v-col>

                    <v-col cols="12"
                    lg="6"
                    md="6"
                    sm="12"
                    xs=12>

                        <v-text-field
                            label="Last"
                            name="last"
                            type="last"
                            dense
                            outlined
                            v-model="form.last"
                        />
                        <has-error :form="form" class="v-messages theme--light error--text" field="last"></has-error>

                    </v-col>

                    <v-col cols="12">
                        
                        <v-text-field
                            label="Email"
                            name="email"
                            dense
                            outlined
                            append-icon="mail"
                            type="email"
                            v-model="form.email"
                        />
                        <has-error :form="form" class="v-messages theme--light error--text" field="email"></has-error>
                    </v-col>

                    <v-col cols="12"
                    lg="6"
                    md="6"
                    sm="12"
                    xs=12>

                        <v-text-field
                            id="password"
                            label="Password"
                            name="password"
                            dense
                            outlined
                            append-icon="lock"
                            type="password"
                            v-model="form.password"
                        />
                        <has-error :form="form" class="v-messages theme--light error--text" field="password"></has-error>
                    </v-col>


                    <v-col cols="12"
                    lg="6"
                    md="6"
                    sm="12"
                    xs=12>

                        <v-text-field
                            id="password"
                            label="Confirm Password"
                            name="password_confirmation"
                            type="password"
                            dense
                            outlined
                            v-model="form.password_confirmation"
                        />
                        <has-error :form="form" class="v-messages theme--light error--text" field="password_confirmation"></has-error>
                    </v-col>
                </v-row>


                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-btn color="primary" :loading="loading" @click="doRegister">Register</v-btn>
                <v-spacer />
                <v-btn flat text color="primary" link :to="{ name: 'login'}"  >Have an account?</v-btn>

              </v-card-actions>
            </v-card>
                
          </v-col>

          
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
  export default {
    props: {
      source: String,
    },

    data() {
      return {
        title: "Register here",
        loading: false,
      
        form: new Form({
          first: '',
          last: '',
          email: '',
          password: '',
          password_confirmation: '',
          remember: false
        }),
        emailRules: [
          v => !!v || 'E-mail is required',
          v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
        ],
        passwordRules: [
          v => !!v || 'Password is required',
          v => v.length >= 8 || 'Password must be 8 characters or more'
        ]
      }
    },

    methods: {
      doRegister() {
        // if (this.form.validate()) {
          this.loading = true
          
          this.form.post('/register').then((res) => {
            document.location.href = '/login'
            this.form.reset()
            this.loading = false
          }).catch((err) => {
              this.loading = false

          })

        // }
        
      }
    },

    mounted() {
      axios.get('/user').then((res) => {
        console.log(res);
        
        if(res != null || res != undefined){
          document.location.href = '/home/dashboard'
        }
      })
    },
  }
</script>

<style lang="scss" scoped>

  .container{
    padding-top: 0;
    padding-bottom: 0;
  }

  .col, .col-sm-12, .col-md-6, .col-lg-6, .col-12{
      padding-left: 0 !important;
      padding-top: 0 !important;
      padding-bottom: 0 !important;
  }

  .is-background{
    // background: #9652ff;
    
    .is-background-content{
      display: flex;
      height: 100vh;
      justify-content: center;
      align-items: center;
      flex-direction: column;

      .is-logo{
        font-size: 24px;
        font-weight: bold;
        padding: 12px 16px;
        border-radius: 50%;
      }
    }

  }

  .is-background-content-mini{
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;

      .is-logo{
        font-size: 24px;
        font-weight: bold;
        padding: 12px 16px;
        border-radius: 50%;
      }
    }
  
</style>