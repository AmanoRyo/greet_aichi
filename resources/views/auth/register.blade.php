<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

         <!-- Language -->
        <div class="mb-4">
                        <label for="language" class="block text-gray-700 text-sm font-bold mb-2">Language</label>
                        <select name="language">
                        <option disabled selected>Select Language</option>
                            <option value="zh-CN">Chinese</option>
                            <option value="en"> English</option>
                            <option value="ja">Japanese</option>
                            <option value="pt">Portugal</option>
                        </select>
                    </div>        
        <!-- City -->
        <div class="mt-4">
            <x-input-label for="city" :value="__('City')" />
               <select name="city">
                    <option disabled selected>Select City</option>
                    <option>名古屋市</option>
                    <option>一宮市</option>
                    <option>瀬戸市</option>
                    <option>春日井市</option>
                    <option>犬山市</option>
                    <option>江南市</option>
                    <option>小牧市</option>
                    <option>稲沢市</option>
                    <option>尾張旭市</option>
                    <option>岩倉市</option>
                    <option>豊明市</option>
                    <option>日進市</option>
                    <option>清須市</option>
                    <option>北名古屋市</option>
                    <option>長久手市</option>
                    <option>東郷町</option>
                    <option>豊山町</option>
                    <option>大口町</option>
                    <option>扶桑町</option>
                    <option>津島市</option>
                    <option>愛西市</option>
                    <option>弥富市</option>
                    <option>あま市</option>
                    <option>大治町</option>
                    <option>蟹江町</option>
                    <option>飛島村</option>
                    <option>半田市</option>
                    <option>常滑市</option>
                    <option>東海市</option>
                    <option>大府市</option>
                    <option>知多市</option>
                    <option>阿久比町</option>
                    <option>東浦町</option>
                    <option>南知多町</option>
                    <option>美浜町</option>
                    <option>武豊町</option>
                    <option>岡崎市</option>
                    <option>碧南市</option>
                    <option>刈谷市</option>
                    <option>豊田市</option>
                    <option>安城市</option>
                    <option>西尾市</option>
                    <option>知立市</option>
                    <option>高浜市</option>
                    <option>みよし市</option>
                    <option>幸田町</option>
                    <option>豊橋市</option>
                    <option>豊川市</option>
                    <option>蒲郡市</option>
                    <option>新城市</option>
                    <option>田原市</option>
                    <option>設楽町</option>
                    <option>東栄町</option>
                    <option>豊根村</option>
                </select>


            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <!-- Age -->
        <div class="mt-4">
            <x-input-label for="age" :value="__('Age')" />
            <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required />
            <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>

          <!-- Gender -->
          <div class="mb-4">
                        <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Gender</label>
                        <select name="gender">
                        <option disabled selected>Select Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>その他</option>
                        </select>
                    </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
        
      
    </form>
</x-guest-layout>
