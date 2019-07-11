@extends('layouts.app')

@section('content')

<div>
<v-app id="inspire">
    <v-content class="grey">
      <v-container >
        <v-layout align-center justify-center row>

         <v-flex>
                  <v-card>
                      <v-card-text>

                        <h1 class="text-md-center">SISTEMA DE GESTION ABOGADOS</h1>
                        <h2 class="text-md-center">JEP</h2>

                      </v-card-text>
                </v-card>
         </v-flex>

         </v-layout>

           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>
           <br>


         <v-layout align-center justify-center row>

          <v-flex xs5>

            <v-card class="grey">
                <v-toolbar color="blue">
                  <v-toolbar-title class="white--text">Ingresar</v-toolbar-title>
                </v-toolbar>
                <v-card-text>
                    <v-form method="POST" action="{{ route('login') }}">
                        @csrf
                      <v-text-field prepend-icon="person" name="email" label="Email" type="text"></v-text-field>
                      <v-text-field prepend-icon="lock" name="password" label="Contraseña" id="password" type="password"></v-text-field>
                      <v-card-actions>
                          <v-spacer></v-spacer>
                          <v-btn color="blue" class="white--text" type="submit">Login</v-btn>
                      </v-card-actions>
                      @if (Route::has('password.request'))
                                          <a  class="white--text" href="{{ route('password.request') }}">
                                              {{ __('¿Olvidó su Contraseña?') }}
                                          </a>
                      @endif
                    </v-form>
                </v-card-text>
            </v-card>

          <v-flex>

          </v-layout>

      </v-container>
    </v-content>
  </v-app>
</div>

@endsection
