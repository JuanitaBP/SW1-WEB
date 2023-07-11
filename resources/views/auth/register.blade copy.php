<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mt-4">
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <div class="mt-4">
                <x-label for="name2" value="{{ __('Name2') }}" />
                <x-input id="name2" class="block mt-1 w-full" type="text" name="name2" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <div class="mt-4">
                <x-label for="apellido" value="{{ __('apellido') }}" />
                <x-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="ci" value="{{ __('ci') }}" />
                <x-input id="ci" class="block mt-1 w-full" type="text" name="ci" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="numero1" value="{{ __('numero1') }}" />
                <x-input id="numero1" class="block mt-1 w-full" type="text" name="numero1" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <div class="mt-4">
                <x-label for="numero2" value="{{ __('numero2') }}" />
                <x-input id="numero2" class="block mt-1 w-full" type="text" name="numero2" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="ciudadci" value="{{ __('ciudadci') }}" />
                <x-input id="ciudadci" class="block mt-1 w-full" type="text" name="ciudadci" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <div class="mt-4">
                <x-label for="verificacion" value="{{ __('verificacion') }}" />
                <x-input id="verificacion" class="block mt-1 w-full" type="text" name="verificacion" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email_verified_at" value="{{ __('email_verified_at') }}" />
                <x-input id="email_verified_at" class="block mt-1 w-full" type="datetime" name="email_verified_at" :value="old('email_verified_at', date('Y-m-d H:i:s'))" required autofocus autocomplete="name" />
            </div>
            <div  class="mt-4">
                <x-label for="current_team_id" value="{{ __('current_team_id') }}" />
                <x-input id="current_team_id" class="block mt-1 w-full" type="text" name="current_team_id" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div  class="mt-4" >
                <x-label for="profile_photo_path" value="{{ __('profile_photo_path') }}" />
                <x-input id="profile_photo_path" class="block mt-1 w-full" type="text" name="profile_photo_path" :value="old('name')" required autofocus autocomplete="name" />
            </div>
              <div>
                <x-label for="estado" value="{{ __('estado')}}" />
                <x-input id="estado" class="block mt-1 w-full" type="text" name="estado" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>






