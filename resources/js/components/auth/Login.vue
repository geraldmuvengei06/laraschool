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
            class="hidden-xs-only is-background"
          >
            <div class="is-background-content">
              <v-spacer></v-spacer>
              <p class="is-logo white blue--text" >LS</p>
              <h4 class="title white--text">Laraschool</h4>
              <p class="subtitle-2 white--text">A school management system</p>
              <v-spacer></v-spacer>
              <p class="subtitle-2 white--text"><v-icon class="white--text">link</v-icon> Visit <a class="white--text" href="https://thundersoftwares.com">thundersoftwares.com</a> </p>
            </div>
          </v-col>
        
          <v-col
            cols="12"
            sm="6"
            md="4"
            xs="12"
          >
            <v-card class="elevation-0 flat">
              <v-toolbar
                color="transparent"
                light
                flat
              >
                <v-toolbar-title>Login to your account</v-toolbar-title>
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
                  <v-text-field
                    label="Login"
                    name="login"
                    prepend-icon="person"
                    type="text"
                  />

                  <v-text-field
                    id="password"
                    label="Password"
                    name="password"
                    prepend-icon="lock"
                    type="password"
                  />
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-btn outlined color="accent">Forgot password?</v-btn>
                <v-spacer />
                <v-btn color="primary">Login</v-btn>

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
  }
</script>

<style lang="scss" scoped>

  .container{
    padding-top: 0;
    padding-bottom: 0;
  }

  .is-background{
    background: #2196f3;
    
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
  
</style>