<x-layout :footer="false" :header="false" :chevron="false" title="Reset Password">

    <div class="flex flex-col mx-auto my-auto h-screen bg-blue-200">
        <div class="m-auto flex-col flex max-w-xl w-full p-10 shadow-2xl rounded-2xl bg-[#F8FAFC]">

            {{-- Logo --}}
            <div class="mb-4">
                <div class="flex justify-center w-full">
                    <img src="../assets/seameo.png" class="size-24" alt="">
                    <img src="../assets/seaqim.png" class="size-24" alt="">
                </div>
                <h1 class="text-center text-[40px] font-bold text-blue-800">ISMEI</h1>
                <h2 class="text-center text-[20px] font-medium text-blue-800">Password Baru</h2>
                <p class="text-center text-sm text-black/50 mt-1">
                    Masukkan password baru untuk akunmu.
                </p>
            </div>

            {{-- Error --}}
            @if($errors->any())
                <div class="max-w-md mx-auto w-full mb-5 px-4 py-3 bg-red-100 border border-red-300 text-red-700 rounded-xl text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.reset.update') }}" method="POST">
                @csrf

                {{-- Token tersembunyi, email tidak ditampilkan --}}
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="max-w-md w-full mx-auto flex flex-col gap-4 pt-2">

                    <div>
                        <label class="pb-1 px-2 block text-sm font-medium text-blue-900">Password Baru</label>
                        <input
                            type="password"
                            name="password"
                            class="outline-none rounded-xl py-2 px-3 border w-full"
                            placeholder="Minimal 8 karakter">
                    </div>

                    <div>
                        <label class="pb-1 px-2 block text-sm font-medium text-blue-900">Konfirmasi Password</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            class="outline-none rounded-xl py-2 px-3 border w-full"
                            placeholder="Ulangi password baru">
                    </div>

                </div>

                <div class="max-w-md mx-auto w-full mt-6 flex flex-col gap-3">
                    <button type="submit"
                        class="cursor-pointer w-full rounded-xl py-2 bg-blue-800 hover:bg-blue-900 transition text-[#F8FAFC]">
                        Reset Password
                    </button>
                    <a href="{{ route('admin.login') }}"
                        class="text-center text-sm text-blue-800 hover:underline">
                        Kembali ke Login
                    </a>
                </div>

            </form>

        </div>
    </div>

</x-layout>