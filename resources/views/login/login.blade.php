<x-layout :footer="false" :header="false" :chevron="false" title="Admin Login">

    <form class="flex flex-col mx-auto my-auto h-screen bg-blue-200"
          action="{{ route('admin.login.post') }}" method="POST">
        @csrf

        <div class="m-auto flex-col flex max-w-xl w-full p-10 shadow-2xl rounded-2xl bg-[#F8FAFC]">
            <div class="">
                <div class="flex max-w-4xl justify-center w-full">
                    <img src="../assets/seameo.png" class="size-24" alt="">
                    <img src="../assets/seaqim.png" class="size-24" alt="">
                </div>
                <h1 class="text-center text-[40px] font-bold text-blue-800">ISMEI</h1>
                <h2 class="text-center text-[25px] font-medium text-blue-800">Admin Panel</h2>
            </div>

            @if($errors->any())
                <div class="max-w-md mx-auto w-full mt-4 px-4 py-3 bg-red-100 border border-red-300 text-red-700 rounded-xl text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="max-w-md py-3 w-full mx-auto">
                <h3 class="pb-1 px-2">Email</h3>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="outline-none rounded-xl py-2 px-3 border w-full @error('email') border-red-400 @enderror"
                    placeholder="Masukkan email">

                <h3 class="pb-1 pt-5 px-2">Password</h3>
                <input
                    type="password"
                    name="password"
                    class="outline-none py-2 rounded-xl px-3 border w-full"
                    placeholder="Masukkan password">
            </div>

            <div class="max-w-md mx-auto w-full flex justify-between items-center mb-7">
                <label class="flex items-center gap-2 text-sm text-blue-900 cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded">
                    Remember Me
                </label>
                <a class="text-sm text-blue-800 hover:underline" href="/forgot-the-password">
                    Forgot Password?
                </a>
            </div>

            <button type="submit"
                class="cursor-pointer max-w-md w-full rounded-xl py-2 mx-auto bg-blue-800 hover:bg-blue-900 transition text-[#F8FAFC]">
                Login
            </button>

        </div>

    </form>

</x-layout>