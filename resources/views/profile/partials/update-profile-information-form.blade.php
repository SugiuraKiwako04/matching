<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
        
        <div>
            <x-input-label for="image" :value="__('Image')" />
            <x-text-input id="image" name="image" type="text" class="mt-1 block w-full" :value="old('image', $user->image)" required autofocus autocomplete="image" />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>
        
        <div>
            <x-input-label for="age" :value="__('Age')" />
            <x-text-input id="age" name="age" type="text" class="mt-1 block w-full" :value="old('age', $user->age)" required autofocus autocomplete="age" />
            <x-input-error class="mt-2" :messages="$errors->get('age')" />
        </div>
        
        <div>
            <x-input-label for="gender" :value="__('Gender')" />
            <x-text-input id="gender" name="gender" type="text" class="mt-1 block w-full" :value="old('gender', $user->gender)" required autofocus autocomplete="gender" />
            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
        </div>
        
        <div>
            <x-input-label for="comment" :value="__('Comment')" />
            <x-text-input id="comment" name="comment" type="comment" class="mt-1 block w-full" :value="old('comment', $user->comment)" required autofocus autocomplete="comment" />
            <x-input-error class="mt-2" :messages="$errors->get('comment')" />
        </div>
        
        <div>
            <x-input-label for="bio" :value="__('Bio')" />
            <x-text-input id="bio" name="bio" type="text" class="mt-1 block w-full" :value="old('bio', $user->bio)" required autofocus autocomplete="bio" />
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>
        
        <div>
            <x-input-label for="prefecture_id" :value="__('Prefecture_id')" />
            <x-text-input id="prefecture_id" name="prefecture_id" type="foreignId" class="mt-1 block w-full" :value="old('prefecture_id', $user->prefecture_id)" required autofocus autocomplete="prefecture_id" />
            <x-input-error class="mt-2" :messages="$errors->get('prefecture_id')" />
        </div>
        
        <div>
            <x-input-label for="regidence_prefecture_id" :value="__('Regidence_prefecture_id')" />
            <x-text-input id="regidence_prefecture_id" name="regidence_prefecture_id" type="foreignId" class="mt-1 block w-full" :value="old('regidence_prefecture_id', $user->regidence_prefecture_id)" required autofocus autocomplete="regidence_prefecture_id" />
            <x-input-error class="mt-2" :messages="$errors->get('regidence_prefecture_id')" />
        </div>
        
        <div>
            <x-input-label for="purpose" :value="__('Purpose')" />
            <x-text-input id="purpose" name="purpose" type="text" class="mt-1 block w-full" :value="old('purpose', $user->purpose)" required autofocus autocomplete="purpose" />
            <x-input-error class="mt-2" :messages="$errors->get('purpose')" />
        </div>
        
        
        
        
    </form>
</section>
